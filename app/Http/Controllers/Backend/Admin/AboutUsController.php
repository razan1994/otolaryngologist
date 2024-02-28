<?php

namespace App\Http\Controllers\Backend\Admin;

use App\Models\AboutUs;
use App\Traits\SharedMethod;
use Illuminate\Http\Request;
use App\Models\SupportTicket;
use Illuminate\Routing\Route;
use App\Traits\UploadImageTrait;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\Backend\AboutUs\UpdateAboutUsRequest;
use Illuminate\Routing\Controller;

class AboutUsController extends Controller
{
    use UploadImageTrait;

    // ================================================================
    // ======================== index Function ========================
    // ================================================================
    public function index(Request $request, Route $route)
    {
        try {
            $about = AboutUs::first();
            return view('admin.about_us.index', compact('about'));
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
    // ======================== edit  Function ========================
    // ================================================================
    public function edit(Request $request, Route $route)
    {
        try {
            $about = AboutUs::first();
            return view('admin.about_us.edit', compact('about'));
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
    public function update(UpdateAboutUsRequest $request,  Route $route)
    {
        try {
            // return $request;
            $about = AboutUs::first();
            if ($about) {
                // Validation Section :
                $request->validated();
                // General Updated Data :
                $update_data = [
                    'about_dr_en' => $request->about_dr_en,
                    'about_dr_ar' => $request->about_dr_ar,
                    'about_clinic_ar' => $request->about_clinic_ar,
                    'about_clinic_en' => $request->about_clinic_en,
                    'about_clinic_en' => $request->about_clinic_en,
                    'insurance_text_ar' => $request->insurance_text_ar,
                    'insurance_text_en' => $request->insurance_text_en,
                    'vision_en' => $request->vision_en,
                    'vision_ar' => $request->vision_ar,
                    'mission_en' => $request->mission_en,
                    'mission_ar' => $request->mission_ar,

                ];

                // return  $update_data;
                DB::transaction(function () use ($update_data, $about) {
                    $about->update($update_data);
                });
                return redirect()->route('super_admin.about_us-index')->with('success', 'The data has been successfully updated');
            } else {
                return redirect()->route('super_admin.about_us-index')->with('danger', 'This record does not exist in the records');
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
