<?php

namespace App\Http\Controllers\Frontend;

use App\Models\AboutUs;
use App\Models\Blogs;
use App\Models\ContactUsRequest;
use App\Models\Faq;
use App\Models\Insurance;
use App\Models\Photo;
use App\Models\PrivacyPolicy;
use App\Models\TermAndCondition;
use App\Models\SeoOperation;
use App\Models\Service;
use App\Models\Slider;
use App\Models\SupportTicket;
use App\Models\Treatment;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Routing\Route;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\DB;

class FrontendController extends Controller
{
    public function welcome()
    {
        $photos = Photo::where('status', 1)
            ->orderBy('created_at', 'desc')
            ->get();
        $about = AboutUs::first();
        $sliders = Slider::where('status', 1)->get();
        $services = Service::get();
        $services1 = Service::latest()->limit(3)->get();
        $treatments = Treatment::latest()->get();
        $blogs = Blogs::where('status', 1)->limit(3)->get();
        $seo_operation = SeoOperation::where('page_name', 'Welcome')->get()->first();
        // return   $blogs;
        return view('Front/welcome', compact('about', 'services', 'services1', 'treatments', 'blogs', 'seo_operation', 'photos'));

    }

    public function ServiceDetails(Route $route, $aliasname)
    {
        if (Config::get('app.locale') == 'en') {
            $news_blog = Service::where('alias_name_en', '=', $aliasname)->get()->first();
        } else {
            $news_blog = Service::where('alias_name_ar', '=', $aliasname)->get()->first();
        }

        if ($news_blog) {
            $popular_blogs = Service::latest()->where('id', '!=', $news_blog->id)->limit(6)->get();


            return view('Front/services-details', compact('news_blog', 'popular_blogs'));
        } else {
            return redirect()->back()->with('danger', 'Blog Not Found !!!');
        }

    }
    public function PrivacyPolicy()
    {
        $seo_operation = SeoOperation::where('page_name', 'Privacy')->get()->first();
        $privacy = PrivacyPolicy::get()->first();
        // return   $privacy;
        return view('Front/privacy-policy', compact('seo_operation', 'privacy'));



    }

    public function TermsAndConditions()
    {
        $seo_operation = SeoOperation::where('page_name', 'Terms')->get()->first();
        $term_and_conditions = TermAndCondition::get()->first();
        // return   $privacy;
        return view('Front/terms', compact('seo_operation', 'term_and_conditions'));



    }
    public function Gallary()
    {

        $photos = Photo::where('status', 1)->paginate(12);

        $seo_operation = SeoOperation::where('page_name', 'Gallery')->get()->first();
        // return $photos;
        return view('Front/gallery', compact('photos', 'seo_operation'));
    }
    public function Insurance()
    {
        $seo_operation = SeoOperation::where('page_name', 'Insurance')->get()->first();
        $insurances = Insurance::get();
        // return   $insurances;
        return view('Front/About/insurance', compact('seo_operation', 'insurances'));
    }

    public function FAQ()
    {
        $seo_operation = SeoOperation::where('page_name', 'Faq')->get()->first();
        $faqs = Faq::get();
        // return   $faqs;
        return view('Front/FAQ', compact('seo_operation', 'faqs'));

    }
    public function Dranas()
    {

        $services = Service::get();
        $about = AboutUs::first();
        $seo_operation = SeoOperation::where('page_name', 'About Dr')->get()->first();
        // return   $blogs;
        return view('Front/About/dranas', compact('about', 'services', 'seo_operation'));



    }

    public function ContactUs()
    {
        $seo_operation = SeoOperation::where('page_name', 'Contact Us')->get()->first();

        return view('Front/ContactUs', compact('seo_operation'));
    }

    // ==========================================================================
    // ======================== Contact Details Function ========================
    // ==========================================================================
    public function contactUsRequest1(Route $route, Request $request)
    {
        try {
            $created_data = [
                'full_name' => $request->full_name,
                'email' => $request->email,
                'subject' => $request->subject,
                'phone' => $request->phone,
                'message' => $request->message,
            ];

            // Start the transaction
            DB::transaction(function () use ($created_data) {
                ContactUsRequest::create($created_data);
            });

            return redirect()->back()->with('success', 'is done');
            // return "good";
        } catch (\Throwable $th) {
            $function_name = $route->getActionName();
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
                    'error_line' => $th->getLine(),
                ]);
                $end_error_ticket = $new_error_ticket;
            } else {
                $end_error_ticket = $check_old_errors->first();
            }
            return view('errors.support_tickets', compact('th', 'function_name', 'end_error_ticket'));
        }
    }
    public function Clinic()
    {

        $about = AboutUs::first();
        $seo_operation = SeoOperation::where('page_name', 'About Clinic')->get()->first();
        // return   $blogs;
        return view('Front/About/aboutClinic', compact('about', 'seo_operation'));



    }
    public function Blogs()
    {

        $blogs = Blogs::where('status', 1)->paginate(6);
        $recentBlogs = Blogs::where('status', 1)->orderBy('created_at', 'desc')->take(3)->get();

        $seo_operation = SeoOperation::where('page_name', 'Blogs')->get()->first();
        return view('Front.blogs', compact('blogs', 'seo_operation', 'recentBlogs'));
    }



    public function BlogDetails(Route $route, $aliasname)
    {
        if (Config::get('app.locale') == 'en') {
            $news_blog = Blogs::where('status', 1)
                ->where('alias_name_en', '=', $aliasname)
                ->first();
        } else {
            $news_blog = Blogs::where('status', 1)
                ->where('alias_name_ar', '=', $aliasname)
                ->first();
        }

        if ($news_blog) {
            $popular_blogs = Blogs::where('status', 1)
                ->where('id', '!=', $news_blog->id)
                ->limit(6)
                ->get();

            // Get recent blogs
            $recentBlogs = Blogs::where('status', 1)
                ->orderBy('created_at', 'desc')
                ->take(3)
                ->get();

            // Find previous blog
            $previous_blog = Blogs::where('status', 1)
                ->where('created_at', '<', $news_blog->created_at)
                ->orderBy('created_at', 'desc')
                ->first();

            // Find next blog
            $next_blog = Blogs::where('status', 1)
                ->where('created_at', '>', $news_blog->created_at)
                ->orderBy('created_at', 'asc')
                ->first();

            return view('Front/blog-details', compact('news_blog', 'popular_blogs', 'recentBlogs', 'previous_blog', 'next_blog'));
        } else {
            return redirect()->back()->with('danger', 'Blog Not Found !!!');
        }
    }

    public function GallaryDetails(Route $route, $aliasname)
    {
        if (Config::get('app.locale') == 'en') {
            $news_blog = Photo::where('status', 1)->where('alias_name_en', '=', $aliasname)->first();
        } else {
            $news_blog = Photo::where('status', 1)->where('alias_name_ar', '=', $aliasname)->first();
        }

        if ($news_blog) {
            $popular_blogs = Photo::where('status', 1)
                ->where('id', '!=', $news_blog->id)
                ->get();

            $recent_photos = Photo::where('status', 1)
                ->whereNotNull('image_before')
                ->whereNotNull('image_after')
                ->orderBy('created_at', 'desc')
                ->limit(4)
                ->get();

            return view('Front/gallary-details', compact('news_blog', 'popular_blogs', 'recent_photos'));
        } else {
            return redirect()->back()->with('danger', 'Gallery Not Found !!!');
        }

    }

    public function Treatments()
    {
        $seo_operation = SeoOperation::where('page_name', 'Treatments')->first();
        $treatments = Treatment::where('status', 1)->paginate(8);

        return view('Front/treatments', compact('seo_operation', 'treatments', ));
    }


    public function TreatmentsDetails(Route $route, $aliasname)
    {
        if (Config::get('app.locale') == 'en') {
            $treats = Treatment::where('status', 1)->where('alias_name_en', '=', $aliasname)->first();
        } else {
            $treats = Treatment::where('status', 1)->where('alias_name_ar', '=', $aliasname)->first();
        }

        if ($treats) {
            $previous = Treatment::where('status', 1)
                ->where('id', '<', $treats->id)
                ->orderBy('id', 'desc')
                ->first();

            $next = Treatment::where('status', 1)
                ->where('id', '>', $treats->id)
                ->orderBy('id', 'asc')
                ->first();

            $popular_treatments = Treatment::where('status', 1)
                ->where('id', '!=', $treats->id)
                ->limit(6)
                ->get();

            $recent_treatments = Treatment::where('status', 1)
                ->orderBy('created_at', 'desc')
                ->limit(3)
                ->get();

            return view('Front/treatments-details', compact('treats', 'popular_treatments', 'previous', 'next', 'recent_treatments'));
        } else {
            return redirect()->back()->with('danger', 'Treatment Not Found !!!');
        }
    }



}
