<?php

namespace App\Http\Controllers\Backend\Admin;

use Illuminate\Routing\Controller;
use App\Http\Requests\Backend\StoreServiceFormRequest;
use App\Http\Requests\Backend\UpdateServiceFormRequest;
use App\Models\Service;
use App\Models\SupportTicket;
use Illuminate\Http\Request;
use Illuminate\Routing\Route;
use Illuminate\Support\Facades\DB;
use App\Traits\SharedMethod;
use App\Traits\UploadImageTrait;
use Illuminate\Support\Facades\File;

class ServicesContoller extends Controller
{
    use UploadImageTrait;
    use SharedMethod;

    public function index(Route $route)
    {
        try {
            $services = new Service();

            $services = $services->select('*')->orderBy('created_at', 'asc')->get();

            return view('admin.services.index', compact('services',
            ));
        } catch (\Throwable $th) {
            $function_name =  $route->getActionName();
            $check_old_errors = new SupportTicket();
            $check_old_errors = $check_old_errors->select('*')->where([
                'error_location' => $th->getFile(),
                'error_description' => $th->getMessage(),
                'function_name' => $function_name,
                'error_line' => $th->getLine(),
            ])->get();

            if ($check_old_errors->count() == 0) {
                $new_error_ticket = SupportTicket::create([
                    'error_location' => $th->getFile(),
                    'error_description' => $th->getMessage(),
                    'function_name' => $function_name,
                    'error_line' =>  $th->getLine(),
                ]);
                $end_error_ticket = $new_error_ticket;
            } else {
                $end_error_ticket = $check_old_errors->first();
            }
            return view('errors.support_tickets', compact('th', 'function_name', 'end_error_ticket'));
        }
    }

    public function create(Route $route)
    {
        try {
            return view('admin.services.create');
        } catch (\Throwable $th) {
            $function_name =  $route->getActionName();
            $check_old_errors = new SupportTicket();
            $check_old_errors = $check_old_errors->select('*')->where([
                'error_location' => $th->getFile(),
                'error_description' => $th->getMessage(),
                'function_name' => $function_name,
                'error_line' => $th->getLine(),
            ])->get();

            if ($check_old_errors->count() == 0) {
                $new_error_ticket = SupportTicket::create([
                    'error_location' => $th->getFile(),
                    'error_description' => $th->getMessage(),
                    'function_name' => $function_name,
                    'error_line' =>  $th->getLine(),
                ]);
                $end_error_ticket = $new_error_ticket;
            } else {
                $end_error_ticket = $check_old_errors->first();
            }
            return view('errors.support_tickets', compact('th', 'function_name', 'end_error_ticket'));
        }
    }

    public function store(StoreServiceFormRequest $request, Route $route)
    {
        try {
            // Upload Image Section :
            if (isset($request->image)) {
                $orginal_image = $request->file('image');
                $upload_location = 'storage/services/';
                $original_name = $orginal_image->getClientOriginalName();
                $last_image = $this->saveFile($orginal_image, $upload_location);

            } else {
                $last_image = null;
            }

            $created_data = [
                'user_id' => auth()->user()->id,
                'title_ar' => $request->title_ar,
                'title_en' => $request->title_en,
                'status' => $request->status,
                'desc_ar' => $request->desc_ar,
                'desc_en' => $request->desc_en,
                'alias_name_ar' => str_replace(array(' ','"','>','<','#','%','|','/'),'-',$request->title_ar),
                'alias_name_en' => str_replace(array(' ','"','>','<','#','%','|','/'),'-',$request->title_en),
                'image' =>  $last_image,
                'alt_text_ar'=> $request->alt_text_ar,
                'alt_text_en'=> $request->alt_text_en,
                'image_title_text_ar'=> $request->image_title_text_ar,
                'image_title_text_en'=> $request->image_title_text_en,
                'h1_val_ar'=> $request->h1_val_ar,
                'h1_val_en'=> $request->h1_val_en,
                'h2_val_ar'=> $request->h2_val_ar,
                'h2_val_en'=> $request->h2_val_en,
                'seo_title_ar'=> $request->seo_title_ar,
                'seo_title_en'=> $request->seo_title_en,
                'keywords_ar'=> $request->keywords_ar,
                'keywords_en'=> $request->keywords_en,
                'redirect_301_ar'=> $request->redirect_301_ar,
                'redirect_301_en'=> $request->redirect_301_en,
                'meta_desc_ar' => $request->meta_desc_ar,
                'meta_desc_en' => $request->meta_desc_en,
                'tags' => $request->tags
            ];

            DB::transaction(function () use ($created_data) {
                Service::create($created_data);
            });

            return redirect()->route('super_admin.services-index')->with('success', 'The data has been successfully updated');
        } catch (\Throwable $th) {
            $function_name =  $route->getActionName();
            $check_old_errors = new SupportTicket();
            $check_old_errors = $check_old_errors->select('*')->where([
                'error_location' => $th->getFile(),
                'error_description' => $th->getMessage(),
                'function_name' => $function_name,
                'error_line' => $th->getLine(),
            ])->get();
            if ($check_old_errors->count() == 0) {
                $new_error_ticket = SupportTicket::create([
                    'error_location' => $th->getFile(),
                    'error_description' => $th->getMessage(),
                    'function_name' => $function_name,
                    'error_line' =>  $th->getLine(),
                ]);
                $end_error_ticket = $new_error_ticket;
            } else {
                $end_error_ticket = $check_old_errors->first();
            }
            return view('errors.support_tickets', compact('th', 'function_name', 'end_error_ticket'));
        }
    }


    public function show($id, Route $route)
    {
        try {
            $service = Service::find($id);

            if ($service) {
                // return $service;
                return view('admin.services.show', compact('service'));
            } else {
                return redirect()->route('super_admin.services-index')->with('danger', 'This record is not in the records');
            }
        } catch (\Throwable $th) {
            $function_name =  $route->getActionName();
            $check_old_errors = new SupportTicket();
            $check_old_errors = $check_old_errors->select('*')->where([
                'error_location' => $th->getFile(),
                'error_description' => $th->getMessage(),
                'function_name' => $function_name,
                'error_line' => $th->getLine(),
            ])->get();

            if ($check_old_errors->count() == 0) {
                $new_error_ticket = SupportTicket::create([
                    'error_location' => $th->getFile(),
                    'error_description' => $th->getMessage(),
                    'function_name' => $function_name,
                    'error_line' =>  $th->getLine(),
                ]);
                $end_error_ticket = $new_error_ticket;
            } else {
                $end_error_ticket = $check_old_errors->first();
            }
            return view('errors.support_tickets', compact('th', 'function_name', 'end_error_ticket'));
        }
    }


    public function edit($id, Route $route)
    {
        try {
            $service = Service::find($id);
            if ($service) {
                return view('admin.services.edit', compact('service'));
            } else {
                return redirect()->route('super_admin.services-index')->with('danger', 'This record is not in the records');
            }
        } catch (\Throwable $th) {
            $function_name =  $route->getActionName();
            $check_old_errors = new SupportTicket();
            $check_old_errors = $check_old_errors->select('*')->where([
                'error_location' => $th->getFile(),
                'error_description' => $th->getMessage(),
                'function_name' => $function_name,
                'error_line' => $th->getLine(),
            ])->get();

            if ($check_old_errors->count() == 0) {
                $new_error_ticket = SupportTicket::create([
                    'error_location' => $th->getFile(),
                    'error_description' => $th->getMessage(),
                    'function_name' => $function_name,
                    'error_line' =>  $th->getLine(),
                ]);
                $end_error_ticket = $new_error_ticket;
            } else {
                $end_error_ticket = $check_old_errors->first();
            }
            return view('errors.support_tickets', compact('th', 'function_name', 'end_error_ticket'));
        }
    }

    public function update($id, UpdateServiceFormRequest $request, Route $route)
    {
        try {
            $service = Service::find($id);

            if ($service) {
                // Standard Updated Data :
                $update_data['title_ar'] = $request->title_ar;
                $update_data['title_en'] = $request->title_en;
                $update_data['status'] = $request->status;
                $update_data['desc_ar'] = $request->desc_ar;
                $update_data['desc_en'] = $request->desc_en;
                $update_data['alias_name_ar'] = str_replace(array(' ','"','>','<','#','%','|','/'),'-',$request->title_ar);
                $update_data['alias_name_en'] = str_replace(array(' ','"','>','<','#','%','|','/'),'-',$request->title_en);
                $update_data['alt_text_ar'] = $request->alt_text_ar;
                $update_data['alt_text_en'] = $request->alt_text_en;
                $update_data['image_title_text_ar'] = $request->image_title_text_ar;
                $update_data['image_title_text_en'] = $request->image_title_text_en;
                $update_data['h1_val_ar'] = $request->h1_val_ar;
                $update_data['h1_val_en'] = $request->h1_val_ar;
                $update_data['h2_val_ar'] = $request->h2_val_ar;
                $update_data['h2_val_en'] = $request->h2_val_en;
                $update_data['seo_title_ar'] = $request->seo_title_ar;
                $update_data['seo_title_en'] = $request->seo_title_en;
                $update_data['keywords_ar'] = $request->keywords_ar;
                $update_data['keywords_en'] = $request->keywords_en;
                $update_data['redirect_301_ar'] = $request->redirect_301_ar;
                $update_data['redirect_301_en'] = $request->redirect_301_en;
                $update_data['meta_desc_ar'] = $request->meta_desc_ar;
                $update_data['meta_desc_en'] = $request->meta_desc_en;

                // Upload Image Section :
                if (isset($request->image)) {
                    $orginal_image = $request->file('image');
                    $upload_location = 'storage/services/';
                    $original_name = $orginal_image->getClientOriginalName();
                    $last_image = $this->saveFileWithCompression('services','image',$orginal_image,$original_name, $upload_location);
                    $update_data['image'] = $last_image;
                   // $update_data['image'] = $this->saveFile($orginal_image, $upload_location);
                    // $update_data['image'] = $this->saveFileWithCompression('sliders', 'image', $orginal_image, $original_name, $upload_location);
                    File::delete($service->image);
                }

                DB::table('services')->where('id', $id)->update($update_data);

                return redirect()->route('super_admin.services-index')->with('success', 'The data has been successfully updated');
            } else {
                return redirect()->route('super_admin.services-index')->with('danger', 'This record does not exist in the records');
            }
        } catch (\Throwable $th) {
            $function_name =  $route->getActionName();
            $check_old_errors = new SupportTicket();
            $check_old_errors = $check_old_errors->select('*')->where([
                'error_location' => $th->getFile(),
                'error_description' => $th->getMessage(),
                'function_name' => $function_name,
                'error_line' => $th->getLine(),
            ])->get();

            if ($check_old_errors->count() == 0) {
                $new_error_ticket = SupportTicket::create([
                    'error_location' => $th->getFile(),
                    'error_description' => $th->getMessage(),
                    'function_name' => $function_name,
                    'error_line' =>  $th->getLine(),
                ]);
                $end_error_ticket = $new_error_ticket;
            } else {
                $end_error_ticket = $check_old_errors->first();
            }
            return view('errors.support_tickets', compact('th', 'function_name', 'end_error_ticket'));
        }
    }

    public function softDelete($id, Route $route)
    {
        try {
            $service = Service::find($id);
            if ($service) {
                DB::transaction(function () use ($service) {
                    $service->delete();
                });
                return redirect()->route('super_admin.services-index')->with('success', 'The deletion process has been successful');
            } else {
                return redirect()->route('super_admin.services-index')->with('danger', 'This record is not in the records');
            }
        } catch (\Throwable $th) {
            $function_name =  $route->getActionName();
            $check_old_errors = new SupportTicket();
            $check_old_errors = $check_old_errors->select('*')->where([
                'error_location' => $th->getFile(),
                'error_description' => $th->getMessage(),
                'function_name' => $function_name,
                'error_line' => $th->getLine(),
            ])->get();

            if ($check_old_errors->count() == 0) {
                $new_error_ticket = SupportTicket::create([
                    'error_location' => $th->getFile(),
                    'error_description' => $th->getMessage(),
                    'function_name' => $function_name,
                    'error_line' =>  $th->getLine(),
                ]);
                $end_error_ticket = $new_error_ticket;
            } else {
                $end_error_ticket = $check_old_errors->first();
            }
            return view('errors.support_tickets', compact('th', 'function_name', 'end_error_ticket'));
        }
    }

    public function showSoftDelete(Request $request, Route $route)
    {
        try {
            $services = new Service();
            $services = $services->onlyTrashed()->select('*')->orderBy('created_at', 'asc')->get();
            // return $services;
            return view('admin.services.trashed', compact(
                'services',
            ));
        } catch (\Throwable $th) {
            $function_name =  $route->getActionName();
            $check_old_errors = new SupportTicket();
            $check_old_errors = $check_old_errors->select('*')->where([
                'error_location' => $th->getFile(),
                'error_description' => $th->getMessage(),
                'function_name' => $function_name,
                'error_line' => $th->getLine(),
            ])->get();

            if ($check_old_errors->count() == 0) {
                $new_error_ticket = SupportTicket::create([
                    'error_location' => $th->getFile(),
                    'error_description' => $th->getMessage(),
                    'function_name' => $function_name,
                    'error_line' =>  $th->getLine(),
                ]);
                $end_error_ticket = $new_error_ticket;
            } else {
                $end_error_ticket = $check_old_errors->first();
            }
            return view('errors.support_tickets', compact('th', 'function_name', 'end_error_ticket'));
        }
    }

    public function softDeleteRestore($id, Route $route)
    {
        try {
            $service = Service::onlyTrashed()->find($id);
            if ($service) {
                DB::transaction(function () use ($service) {
                    $service->restore();
                });
                return redirect()->route('super_admin.services-index')->with('success', 'Restore Completed Successfully');
            } else {
                return redirect()->route('super_admin.services-index')->with('danger', 'This section does not exist in the records');
            }
        } catch (\Throwable $th) {
            $function_name =  $route->getActionName();
            $check_old_errors = new SupportTicket();
            $check_old_errors = $check_old_errors->select('*')->where([
                'error_location' => $th->getFile(),
                'error_description' => $th->getMessage(),
                'function_name' => $function_name,
                'error_line' => $th->getLine(),
            ])->get();

            if ($check_old_errors->count() == 0) {
                $new_error_ticket = SupportTicket::create([
                    'error_location' => $th->getFile(),
                    'error_description' => $th->getMessage(),
                    'function_name' => $function_name,
                    'error_line' =>  $th->getLine(),
                ]);
                $end_error_ticket = $new_error_ticket;
            } else {
                $end_error_ticket = $check_old_errors->first();
            }
            return view('errors.support_tickets', compact('th', 'function_name', 'end_error_ticket'));
        }
    }
}
