<?php

use App\Http\Controllers\Backend\Admin\AboutUsController;
use App\Http\Controllers\Backend\Admin\AdminDashboardController;
use App\Http\Controllers\Backend\Admin\Auth\AdminLoginController;
use App\Http\Controllers\Backend\Admin\BlogsController;
use App\Http\Controllers\Backend\Admin\ContactUsController;
use App\Http\Controllers\Backend\Admin\FaqController;
use App\Http\Controllers\Backend\Admin\InsuranceController as AdminInsuranceController;
use App\Http\Controllers\Backend\Admin\PhotosController;
use App\Http\Controllers\Backend\Admin\PrivacyPolicyController;
use App\Http\Controllers\Backend\Admin\SeoOperationsController;
use App\Http\Controllers\Backend\Admin\ServicesContoller;
use App\Http\Controllers\Backend\Admin\SliderController;
use App\Http\Controllers\Backend\Admin\TermAndConditionController;
use App\Http\Controllers\Backend\Admin\TreatmentController;
use App\Http\Controllers\Frontend\FrontendController;
use App\Http\Controllers\SupportTicketController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::group(['prefix' => LaravelLocalization::setLocale(), 'middleware' => ['localeSessionRedirect', 'localizationRedirect', 'localeViewPath']], function () {

    Route::get('/', [FrontendController::class, 'welcome'])->name('welcome');
    Route::get('/'.str_replace(' ','-',trans('front_end.ContactUs_Contact')), [FrontendController::class, 'ContactUs'])->name('ContactUs');
    Route::post('/contactUsRequest1', [FrontendController::class, 'contactUsRequest1'])->name('contactUsRequest1');
    Route::get('/'.str_replace(' ','-',trans('front_end.nav_Dr_Anas')), [FrontendController::class, 'Dranas'])->name('dranas');
    Route::get('/'.str_replace(' ','-',trans('front_end.footer_OurClinic')), [FrontendController::class, 'Clinic'])->name('aboutClinic');
    Route::get('/'.str_replace(' ','-',trans('front_end.Insurance_Certified')), [FrontendController::class, 'Insurance'])->name('insurance');
    Route::get('/'.str_replace(' ','-',trans('front_end.nav_Treatments')), [FrontendController::class, 'Treatments'])->name('treatments');
    Route::get('/'.str_replace(' ','-',trans('front_end.ourTreatments_Treatments')).'/{aliasname}', [FrontendController::class, 'TreatmentsDetails'])->name('treatments-details');
    Route::get('/'.str_replace(' ','-',trans('front_end.nav_Gallery')), [FrontendController::class, 'Gallary'])->name('gallery');
    Route::get('/'.str_replace(' ','-',trans('front_end.seo_Blogs')), [FrontendController::class, 'Blogs'])->name('blogs');
    Route::get('/'.str_replace(' ','-',trans('front_end.seo_Blogs')).'/{aliasname}', [FrontendController::class, 'BlogDetails'])->name('blog-details');
    Route::get('/'.str_replace(' ','-',trans('front_end.nav_Gallery')).'/{aliasname}', [FrontendController::class, 'GallaryDetails'])->name('gallery-details');
    Route::get('/'.str_replace(' ','-',trans('front_end.seo_FAQ')), [FrontendController::class, 'FAQ'])->name('FAQ');
    Route::get('/'.str_replace(' ','-',trans('front_end.PrivacyPolicy_Privacy')), [FrontendController::class, 'PrivacyPolicy'])->name('privacy-policy');
    Route::get('/'.str_replace(' ','-',trans('front_end.Eardisease_AllServices')).'/{alias_name}', [FrontendController::class, 'ServiceDetails'])->name('services-details');
    Route::get('/'.str_replace(' ','-',trans('front_end.footer_terms')), [FrontendController::class, 'TermsAndConditions'])->name('Terms&Conditions');


    // Route::get('/policy', function () {
    //     return view('policy');
    // });
    // Route::get('Front/terms', function () {
    //     return view('terms');
    // });


});


// ==================================================================================================================
// =========================================== Super Admin Routes ===================================================
// ==================================================================================================================
Route::prefix('super_admin')->name('super_admin.')->group(function () {

        Route::get('/login', [AdminLoginController::class, 'showLoginForm'])->name('login');
        Route::post('/login', [AdminLoginController::class, 'login'])->name('login.submit');
        Route::group(['middleware' => 'auth:super_admin'], function () {
        // Dashboard Route :
        Route::get('/dashboard', [AdminDashboardController::class, 'dashboard'])->name('dashboard');
        // Support Tickets :
        // ==============================================================================
        Route::group(['prefix' => 'support_tickets'], function () {
        Route::get('/index', [SupportTicketController::class, 'index'])->name('support_tickets-index');
        Route::get('destroy/{id}', [SupportTicketController::class, 'destroy'])->name('support_tickets-destroy');
        });

        // About Us Routes :
        // ==============================================================================
        Route::group(['prefix' => 'about_us'], function () {
            Route::get('/index', [AboutUsController::class, 'index'])->name('about_us-index');
            Route::get('edit', [AboutUsController::class, 'edit'])->name('about_us-edit');
            Route::post('update', [AboutUsController::class, 'update'])->name('about_us-update');
        });


        // SEO operations
        // ==============================================================================
       Route::group(['prefix' => 'seo_operations'], function () {
           Route::get('/index', [SeoOperationsController::class, 'index'])->name('seo_operations-index');
           Route::get('edit/{id}', [SeoOperationsController::class, 'edit'])->name('seo_operations-edit');
          Route::post('update/{id}', [SeoOperationsController::class, 'update'])->name('seo_operations-update');
      });



        // Blogs
        // ==============================================================================
        Route::group(['prefix' => 'blogs'], function () {
            Route::get('/index', [BlogsController::class, 'index'])->name('blogs-index');
            Route::get('/create', [BlogsController::class, 'create'])->name('blogs-create');
            Route::post('/store', [BlogsController::class, 'store'])->name('blogs-store');
            Route::get('show/{id}', [BlogsController::class, 'show'])->name('blogs-show');
            Route::get('edit/{id}', [BlogsController::class, 'edit'])->name('blogs-edit');
            Route::post('update/{id}', [BlogsController::class, 'update'])->name('blogs-update');
            Route::get('softDelete/{id}', [BlogsController::class, 'softDelete'])->name('blogs-softDelete');
            Route::get('/showSoftDelete', [BlogsController::class, 'showSoftDelete'])->name('blogs-showSoftDelete');
            Route::get('softDeleteRestore/{id}', [BlogsController::class, 'softDeleteRestore'])->name('blogs-softDeleteRestore');

        });



        // Term And Conditions Routes:
        // ==============================================================================
        Route::group(['prefix' => 'term_and_conditions'], function () {
            Route::get('/index', [TermAndConditionController::class, 'index'])->name('term_and_conditions-index');
            Route::get('/create', [TermAndConditionController::class, 'create'])->name('term_and_conditions-create');
            Route::post('/store', [TermAndConditionController::class, 'store'])->name('term_and_conditions-store');
            Route::get('show/{id}', [TermAndConditionController::class, 'show'])->name('term_and_conditions-show');
            Route::get('edit/{id}', [TermAndConditionController::class, 'edit'])->name('term_and_conditions-edit');
            Route::post('update/{id}', [TermAndConditionController::class, 'update'])->name('term_and_conditions-update');
            Route::get('softDelete/{id}', [TermAndConditionController::class, 'softDelete'])->name('term_and_conditions-softDelete');
            Route::get('/showSoftDelete', [TermAndConditionController::class, 'showSoftDelete'])->name('term_and_conditions-showSoftDelete');
            Route::get('softDeleteRestore/{id}', [TermAndConditionController::class, 'softDeleteRestore'])->name('term_and_conditions-softDeleteRestore');
        });

        // Privacy Policy Routes:
        // ==============================================================================
        Route::group(['prefix' => 'privacy_policies'], function () {
            Route::get('/index', [PrivacyPolicyController::class, 'index'])->name('privacy_policies-index');
            Route::get('/create', [PrivacyPolicyController::class, 'create'])->name('privacy_policies-create');
            Route::post('/store', [PrivacyPolicyController::class, 'store'])->name('privacy_policies-store');
            Route::get('show/{id}', [PrivacyPolicyController::class, 'show'])->name('privacy_policies-show');
            Route::get('edit/{id}', [PrivacyPolicyController::class, 'edit'])->name('privacy_policies-edit');
            Route::post('update/{id}', [PrivacyPolicyController::class, 'update'])->name('privacy_policies-update');
            Route::get('softDelete/{id}', [PrivacyPolicyController::class, 'softDelete'])->name('privacy_policies-softDelete');
            Route::get('/showSoftDelete', [PrivacyPolicyController::class, 'showSoftDelete'])->name('privacy_policies-showSoftDelete');
            Route::get('softDeleteRestore/{id}', [PrivacyPolicyController::class, 'softDeleteRestore'])->name('privacy_policies-softDeleteRestore');
        });


        // Terms Routes:
        // ==============================================================================
        Route::group(['prefix' => 'term&condition'], function () {
            Route::get('/index', [TermAndConditionController::class, 'index'])->name('term&condition-index');
            Route::get('/create', [TermAndConditionController::class, 'create'])->name('term&condition-create');
            Route::post('/store', [TermAndConditionController::class, 'store'])->name('term&condition-store');
            Route::get('show/{id}', [TermAndConditionController::class, 'show'])->name('term&condition-show');
            Route::get('edit/{id}', [TermAndConditionController::class, 'edit'])->name('term&condition-edit');
            Route::post('update/{id}', [TermAndConditionController::class, 'update'])->name('term&condition-update');
            Route::get('softDelete/{id}', [TermAndConditionController::class, 'softDelete'])->name('term&condition-softDelete');
            Route::get('/showSoftDelete', [TermAndConditionController::class, 'showSoftDelete'])->name('term&condition-showSoftDelete');
            Route::get('softDeleteRestore/{id}', [TermAndConditionController::class, 'softDeleteRestore'])->name('term&condition-softDeleteRestore');
        });

        // FAQ Routes :
        // ==============================================================================
        Route::group(['prefix' => 'faqs'], function () {
            Route::get('/create', [FaqController::class, 'create'])->name('faqs-create');
            Route::post('/store', [FaqController::class, 'store'])->name('faqs-store');
            Route::get('/index', [FaqController::class, 'index'])->name('faqs-index');
            Route::get('show/{id}', [FaqController::class, 'show'])->name('faqs-show');
            Route::get('edit/{id}', [FaqController::class, 'edit'])->name('faqs-edit');
            Route::post('update/{id}', [FaqController::class, 'update'])->name('faqs-update');
            Route::get('activeInactiveSingle/{id}', [FaqController::class, 'activeInactiveSingle'])->name('faqs-activeInactiveSingle');
            Route::get('softDelete/{id}', [FaqController::class, 'softDelete'])->name('faqs-softDelete');
            Route::get('showSoftDelete', [FaqController::class, 'showSoftDelete'])->name('faqs-showSoftDelete');
            Route::get('softDeleteRestore/{id}', [FaqController::class, 'softDeleteRestore'])->name('faqs-softDeleteRestore');
            Route::get('destroy/{id}', [FaqController::class, 'destroy'])->name('faqs-destroy');
        });





        // Contact Us Routes :
        // ==============================================================================
        Route::group(['prefix' => 'contact_us'], function () {
            Route::get('/index', [ContactUsController::class, 'index'])->name('contact_us-index');
            Route::get('edit', [ContactUsController::class, 'edit'])->name('contact_us-edit');
            Route::post('update', [ContactUsController::class, 'update'])->name('contact_us-update');
            //Contact Us Requests
            Route::get('/requests', [ContactUsController::class, 'requests'])->name('contact_us-requests');
            Route::get('showRequest/{id}', [ContactUsController::class, 'showRequest'])->name('contact_us-showrequest');
            Route::get('destroy/{id}', [ContactUsController::class, 'destroyRequest'])->name('contact_us-destroyrequest');
        });

        // Slider Routes :
        // ==============================================================================
        Route::group(['prefix' => 'sliders'], function () {
            Route::get('/create', [SliderController::class, 'create'])->name('sliders-create');
            Route::post('/store', [SliderController::class, 'store'])->name('sliders-store');
            Route::get('/index', [SliderController::class, 'index'])->name('sliders-index');
            Route::get('show/{id}', [SliderController::class, 'show'])->name('sliders-show');
            Route::get('edit/{id}', [SliderController::class, 'edit'])->name('sliders-edit');
            Route::post('update/{id}', [SliderController::class, 'update'])->name('sliders-update');
            Route::get('activeInactiveSingle/{id}', [SliderController::class, 'activeInactiveSingle'])->name('sliders-activeInactiveSingle');
            Route::get('softDelete/{id}', [SliderController::class, 'softDelete'])->name('sliders-softDelete');
            Route::get('showSoftDelete', [SliderController::class, 'showSoftDelete'])->name('sliders-showSoftDelete');
            Route::get('softDeleteRestore/{id}', [SliderController::class, 'softDeleteRestore'])->name('sliders-softDeleteRestore');
            Route::get('destroy/{id}', [SliderController::class, 'destroy'])->name('sliders-destroy');
        });


        // Services Routes :
        // ==============================================================================
        Route::group(['prefix' => 'services'], function () {
            Route::get('/create', [ServicesContoller::class, 'create'])->name('services-create');
            Route::post('/store', [ServicesContoller::class, 'store'])->name('services-store');
            Route::get('/index', [ServicesContoller::class, 'index'])->name('services-index');
            Route::get('edit/{id}', [ServicesContoller::class, 'edit'])->name('services-edit');
            Route::post('update/{id}', [ServicesContoller::class, 'update'])->name('services-update');
            Route::get('softDelete/{id}', [ServicesContoller::class, 'softDelete'])->name('services-softDelete');
            Route::get('/showSoftDelete', [ServicesContoller::class, 'showSoftDelete'])->name('services-showSoftDelete');
            Route::get('softDeleteRestore/{id}', [ServicesContoller::class, 'softDeleteRestore'])->name('services-softDeleteRestore');
            Route::get('show/{id}', [ServicesContoller::class, 'show'])->name('services-show');
        });

        // Services treatments :
        // ==============================================================================
        Route::group(['prefix' => 'treatments'], function () {
            Route::get('/create', [TreatmentController::class, 'create'])->name('treatments-create');
            Route::post('/store', [TreatmentController::class, 'store'])->name('treatments-store');
            Route::get('/index', [TreatmentController::class, 'index'])->name('treatments-index');
            Route::get('edit/{id}', [TreatmentController::class, 'edit'])->name('treatments-edit');
            Route::post('update/{id}', [TreatmentController::class, 'update'])->name('treatments-update');
            Route::get('softDelete/{id}', [TreatmentController::class, 'softDelete'])->name('treatments-softDelete');
            Route::get('/showSoftDelete', [TreatmentController::class, 'showSoftDelete'])->name('treatments-showSoftDelete');
            Route::get('softDeleteRestore/{id}', [TreatmentController::class, 'softDeleteRestore'])->name('treatments-softDeleteRestore');
            Route::get('show/{id}', [TreatmentController::class, 'show'])->name('treatments-show');
        });
        //  Insurance :
        // ==============================================================================
        Route::group(['prefix' => 'insurances'], function () {
            Route::get('/create', [AdminInsuranceController::class, 'create'])->name('insurances-create');
            Route::post('/store', [AdminInsuranceController::class, 'store'])->name('insurances-store');
            Route::get('/index', [AdminInsuranceController::class, 'index'])->name('insurances-index');
            Route::get('edit/{id}', [AdminInsuranceController::class, 'edit'])->name('insurances-edit');
            Route::post('update/{id}', [AdminInsuranceController::class, 'update'])->name('insurances-update');
            Route::get('softDelete/{id}', [AdminInsuranceController::class, 'softDelete'])->name('insurances-softDelete');
            Route::get('/showSoftDelete', [AdminInsuranceController::class, 'showSoftDelete'])->name('insurances-showSoftDelete');
            Route::get('softDeleteRestore/{id}', [AdminInsuranceController::class, 'softDeleteRestore'])->name('insurances-softDeleteRestore');
            Route::get('show/{id}', [AdminInsuranceController::class, 'show'])->name('insurances-show');
        });


        Route::group(['prefix' => 'photos'], function () {
            Route::get('/index',        [PhotosController::class, 'index'])->name('photos-index');
            Route::post('/store',       [PhotosController::class, 'store'])->name('photos-store');
            Route::get('/destroy/{id}', [PhotosController::class, 'destroy'])->name('photos-destroy');
        });

         // Photo
        // ==============================================================================
        Route::group(['prefix' => 'Photo'], function () {
            Route::get('/index', [PhotosController::class, 'index'])->name('Photo-index');
            Route::get('/create', [PhotosController::class, 'create'])->name('Photo-create');
            Route::post('/store', [PhotosController::class, 'store'])->name('Photo-store');
            Route::get('show/{id}', [PhotosController::class, 'show'])->name('Photo-show');
            Route::get('edit/{id}', [PhotosController::class, 'edit'])->name('Photo-edit');
            Route::post('update/{id}', [PhotosController::class, 'update'])->name('Photo-update');
            Route::get('softDelete/{id}', [PhotosController::class, 'softDelete'])->name('Photo-softDelete');
            Route::get('/showSoftDelete', [PhotosController::class, 'showSoftDelete'])->name('Photo-showSoftDelete');
            Route::get('softDeleteRestore/{id}', [PhotosController::class, 'softDeleteRestore'])->name('Photo-softDeleteRestore');

        });




    });
});
