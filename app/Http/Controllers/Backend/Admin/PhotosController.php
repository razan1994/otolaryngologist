<?php

namespace App\Http\Controllers\Backend\Admin;

use App\Http\Requests\Backend\Blogs\StoreBlogFormRequest;
use App\Http\Requests\Backend\Blogs\UpdateBlogFormRequest;
use App\Models\Photo;
use App\Models\ProductImage;
use App\Traits\SharedMethod;
use Illuminate\Http\Request;
use App\Models\SupportTicket;
use Illuminate\Routing\Route;
use App\Traits\UploadImageTrait;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;


class PhotosController extends Controller
{


    use UploadImageTrait;
    use SharedMethod;

    public function index(Route $route)
    {


        try {
            $news_blogs = new Photo();

            $news_blogs = $news_blogs->select('*')->orderBy('created_at', 'asc')->get();

            return view('admin.Photo.index', compact('news_blogs',
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
            return view('admin.Photo.create');
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

    public function store(StoreBlogFormRequest $request, Route $route)
    {
        try {
            // Upload Image Section :
            if (isset($request->image) ) {
                $orginal_image = $request->file('image');
                $upload_location = 'storage/gallary/';
                $original_name = $orginal_image->getClientOriginalName();
                $last_image = $this->saveFile($orginal_image, $upload_location);

            }
            if (isset($request->image1)) {
                $orginal_image = $request->file('image1');
                $upload_location = 'storage/gallary/';
                $original_name = $orginal_image->getClientOriginalName();
                $last_image1 = $this->saveFile($orginal_image, $upload_location);

            }
            else {
                $last_image = null;
                $last_image1 = null;
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
                'image_after' =>  $last_image,
                'image_before' =>  $last_image1,
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
                Photo::create($created_data);
            });

            return redirect()->route('super_admin.Photo-index')->with('success', 'The data has been successfully updated');
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
            $news_blog = Photo::find($id);

            if ($news_blog) {
                // return $news_blog;
                return view('admin.Photo.show', compact('news_blog'));
            } else {
                return redirect()->route('super_admin.Photo-index')->with('danger', 'This record is not in the records');
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
            $news_blog = Photo::find($id);
            if ($news_blog) {
                return view('admin.Photo.edit', compact('news_blog'));
            } else {
                return redirect()->route('super_admin.Photo-index')->with('danger', 'This record is not in the records');
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

    public function update($id, UpdateBlogFormRequest $request, Route $route)
    {
        try {
            $news_blog = Photo::find($id);

            if ($news_blog) {
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
                if (isset($request->image )) {
                    $orginal_image = $request->file('image');
                    $upload_location = 'storage/gallary/';
                    $original_name = $orginal_image->getClientOriginalName();
                   
                    $last_image = $this->saveFileWithCompression('photos','image_after',$orginal_image,$original_name, $upload_location);
                    $update_data['image_after'] = $last_image;

                    // $update_data['image'] = $this->saveFileWithCompression('sliders', 'image', $orginal_image, $original_name, $upload_location);
                    File::delete($news_blog->image_after);
                }
                if(isset($request->image1 )) {
                    $orginal_image = $request->file('image1');
                    $upload_location = 'storage/gallary/';
                    $original_name = $orginal_image->getClientOriginalName();
                    
                    $last_image = $this->saveFileWithCompression('photos','image_before',$orginal_image,$original_name, $upload_location);
                    $update_data['image_before'] = $last_image;
                    File::delete($news_blog->image_before);
                }
                DB::table('photos')->where('id', $id)->update($update_data);

                return redirect()->route('super_admin.Photo-index')->with('success', 'The data has been successfully updated');
            } else {
                return redirect()->route('super_admin.Photo-index')->with('danger', 'This record does not exist in the records');
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
            $news_blog = Photo::find($id);
            if ($news_blog) {
                DB::transaction(function () use ($news_blog) {
                    $news_blog->delete();
                });
                return redirect()->route('super_admin.Photo-index')->with('success', 'The deletion process has been successful');
            } else {
                return redirect()->route('super_admin.Photo-index')->with('danger', 'This record is not in the records');
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
            $news_blogs = new Photo();
            $news_blogs = $news_blogs->onlyTrashed()->select('*')->orderBy('created_at', 'asc')->get();
            // return $news_blogs;
            return view('admin.Photo.trashed', compact(
                'news_blogs',
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
            $news_blog = Photo::onlyTrashed()->find($id);
            if ($news_blog) {
                DB::transaction(function () use ($news_blog) {
                    $news_blog->restore();
                });
                return redirect()->route('super_admin.Photo-index')->with('success', 'Restore Completed Successfully');
            } else {
                return redirect()->route('super_admin.Photo-index')->with('danger', 'This section does not exist in the records');
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
