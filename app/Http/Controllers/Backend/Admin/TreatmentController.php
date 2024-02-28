<?php

namespace App\Http\Controllers\Backend\Admin;

use App\Http\Requests\Backend\Slider\UpdateSliderFormRequest;
use Illuminate\Routing\Controller;
use App\Http\Requests\Backend\Treatment\StoreTreatmentFormRequest;
use App\Models\SupportTicket;
use App\Models\Treatment;
use App\Traits\SharedMethod;
use App\Traits\UploadImageTrait;
use Illuminate\Http\Request;
use Illuminate\Routing\Route;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;

class TreatmentController extends Controller
{
    use UploadImageTrait;
    use SharedMethod;

    // ================================================================
    // ======================== index Function ========================
    // ================================================================


    public function index(Request $request, Route $route)
    {
        try {
            $treatments = Treatment::select('*')->orderBy('created_at', 'asc')->get();
            return view('admin.treatments.index', compact('treatments'));
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

    // ================================================================
    // ======================= Create Function ========================
    // ================================================================
    public function create(Route $route)
    {
        try {
            return view('admin.treatments.create');
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

    // ================================================================
    // ======================= Store Function =========================
    // ================================================================
    public function store(StoreTreatmentFormRequest $request, Route $route)
    {
        try {
            // Upload Image Section :
            if (isset($request->image)) {
                $orginal_image = $request->file('image');
                $upload_location = 'storage/treatments/';
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
                'page_desc_ar'=>$request->page_desc_ar,
                'page_desc_en'=>$request->page_desc_en,
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
                Treatment::create($created_data);
            });

            return redirect()->route('super_admin.treatments-index')->with('success', 'The data has been successfully updated');
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

     // ================================================================
    // ======================== Edit show =========================
    // ================================================================

    public function show($id, Route $route)
    {
        try {
            $treatment = Treatment::find($id);

            if ($treatment) {
                // return $service;
                return view('admin.treatments.show', compact('treatment'));
            } else {
                return redirect()->route('super_admin.treatments-index')->with('danger', 'This record is not in the records');
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

    // ================================================================
    // ======================== Edit Function =========================
    // ================================================================
    public function edit($treatment_id, Route $route)
    {
        try {
            $treatments = Treatment::find($treatment_id);
            if ($treatments) {
                return view('admin.treatments.edit', compact('treatments'));
            } else {
                return redirect()->route('super_admin.treatments-index')->with('danger', 'This record is not in the records');
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

    // ================================================================
    // ======================= Update Function ========================
    // ================================================================
    public function update($treatment_id, UpdateSliderFormRequest $request, Route $route)
    {
        try {
            $treatment = Treatment::find($treatment_id);

            if ($treatment) {
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


                $update_data['tags'] = $request->tags;
                
               

                // Upload Image Section :
                if (isset($request->image)) {
                    $orginal_image = $request->file('image');
                    $upload_location = 'storage/treatments/';
                    $original_name = $orginal_image->getClientOriginalName();
                    $last_image = $this->saveFileWithCompression('treatments','image',$orginal_image,$original_name, $upload_location);
                    $update_data['image'] = $last_image;
                  //  $update_data['image'] = $this->saveFile($orginal_image, $upload_location);
                    // $update_data['image'] = $this->saveFileWithCompression('sliders', 'image', $orginal_image, $original_name, $upload_location);
                    File::delete($treatment->image);
                }

                DB::table('treatments')->where('id', $treatment_id)->update($update_data);

                return redirect()->route('super_admin.treatments-index')->with('success', 'The data has been successfully updated');
            } else {
                return redirect()->route('super_admin.treatments-index')->with('danger', 'This record does not exist in the records');
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


    // ================================================================
    // ===================== Soft Delete Function =====================
    // ================================================================
    public function softDelete($id, Route $route)
    {
        try {
            $treatment = Treatment::find($id);
            if ($treatment) {
                DB::transaction(function () use ($treatment) {
                    $treatment->delete();
                });
                return redirect()->route('super_admin.treatments-index')->with('success', 'The deletion process has been successful');
            } else {
                return redirect()->route('super_admin.treatments-index')->with('danger', 'This record is not in the records');
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

    // ================================================================
    // ====================== Show Soft Delete ========================
    // ================================================================
    public function showSoftDelete(Request $request, Route $route)
    {
        $treatments = new Treatment();
        $treatments = $treatments->onlyTrashed()->select('*')->orderBy('created_at', 'asc')->get();
        return view('admin.treatments.trashed', compact('treatments'));
        // try {
        //     $treatments = new Treatment();
        //     $treatments = $treatments->onlyTrashed()->select('*')->orderBy('created_at', 'asc')->get();
        //     return view('admin.treatments.trashed', compact('treatments'));
        // } catch (\Throwable $th) {
        //     $function_name =  $route->getActionName();
        //     $check_old_errors = new SupportTicket();
        //     $check_old_errors = $check_old_errors->select('*')->where([
        //         'error_location' => $th->getFile(),
        //         'error_description' => $th->getMessage(),
        //         'function_name' => $function_name,
        //         'error_line' => $th->getLine(),
        //     ])->get();

        //     if ($check_old_errors->count() == 0) {
        //         $new_error_ticket = SupportTicket::create([
        //             'error_location' => $th->getFile(),
        //             'error_description' => $th->getMessage(),
        //             'function_name' => $function_name,
        //             'error_line' =>  $th->getLine(),
        //         ]);
        //         $end_error_ticket = $new_error_ticket;
        //     } else {
        //         $end_error_ticket = $check_old_errors->first();
        //     }
        //     return view('errors.support_tickets', compact('th', 'function_name', 'end_error_ticket'));
        // }
    }

    // ================================================================
    // ===================== Soft Delete Restore ======================
    // ================================================================
    public function softDeleteRestore($id, Route $route)
    {
        try {
            $treatment = Treatment::onlyTrashed()->find($id);
            if ($treatment) {
                $treatment->restore();
                return redirect()->route('super_admin.treatments-index')->with('success', 'Restore Completed Successfully');
            } else {
                return redirect()->route('super_admin.treatments-index')->with('danger', 'This section does not exist in the records');
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

    // ================================================================
    // ===================== Destroy Function =========================
    // ================================================================
    public function destroy($treatment_id, Route $route)
    {
        try {
            $treatment = Treatment::where('id', $treatment_id)->withTrashed()->get()->first();
            if ($treatment) {
                File::delete($treatment->image);
                $treatment->forceDelete();
                return redirect()->back()->with('success', 'The process has successfully');
            } else {
                return redirect()->back()->with('danger', 'This record is not in the records');
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
