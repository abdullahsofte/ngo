<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\SocialController;
use App\Http\Controllers\Admin\NewsController;
use App\Http\Controllers\WhyspecailController;
use App\Http\Controllers\Admin\AboutController;
use App\Http\Controllers\Admin\AcademicController;
use App\Http\Controllers\Admin\AcademicSectionController;
use App\Http\Controllers\Admin\QueryController;
use App\Http\Controllers\Admin\VideoController;
use App\Http\Controllers\Admin\NoticeController;
use App\Http\Controllers\Admin\SliderController;
use App\Http\Controllers\Admin\GalleryController;
use App\Http\Controllers\Admin\MessageController;
use App\Http\Controllers\Admin\PartnerController;
use App\Http\Controllers\Admin\ServiceController;
use App\Http\Controllers\Admin\TeacherController;
use App\Http\Controllers\Admin\ActivityController;
use App\Http\Controllers\Admin\AdmissionController;
use App\Http\Controllers\Admin\AdmissionSectionController;
use App\Http\Controllers\Admin\AnnouncementController;
use App\Http\Controllers\Admin\AnnouncementSectionController;
use App\Http\Controllers\Admin\BackImageController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\MessengerController;
use App\Http\Controllers\Admin\FacilitiesController;
use App\Http\Controllers\Admin\ManagementController;
use App\Http\Controllers\Admin\RegistrationController;
use App\Http\Controllers\Admin\ImportantlinkController;
use App\Http\Controllers\Admin\AuthenticationController;
use App\Http\Controllers\Admin\BookletController;
use App\Http\Controllers\Admin\CompanyProfileController;
use App\Http\Controllers\Admin\ContentController;
use App\Http\Controllers\Admin\CtetActivityController;
use App\Http\Controllers\Admin\CtetController;
use App\Http\Controllers\Admin\CtetReportController;
use App\Http\Controllers\Admin\DonateController;
use App\Http\Controllers\Admin\EventController;
use App\Http\Controllers\Admin\IctController;
use App\Http\Controllers\Admin\PaymentTypeController;
use App\Http\Controllers\Admin\ProjectController;
use App\Http\Controllers\Admin\ReportController;
use App\Http\Controllers\Admin\ResultController;
use App\Http\Controllers\Admin\SubReportController;
use App\Http\Controllers\Admin\SuccessStudentController;
use App\Http\Controllers\Admin\SyllabusController;
use App\Http\Controllers\Admin\TestimonialController;
use App\Http\Controllers\Admin\WelcomeController;
use App\Http\Controllers\Admin\YearController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group noticeswhich
| contains the "web" middleware group. Now create something great!
|
*/


Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/about-history', [HomeController::class, 'about'])->name('about');
Route::get('/message-page', [HomeController::class, 'messagePage'])->name('messagePage');
Route::get('/mission-vision', [HomeController::class, 'missionVision'])->name('missionVision');
Route::get('/welcome-note', [HomeController::class, 'welcome'])->name('welcome');

Route::get('/donate', [HomeController::class, 'donat'])->name('donat');
Route::get('/donat-details/{id}', [HomeController::class, 'donatDetails'])->name('donatDetails');
Route::get('/ict-page', [HomeController::class, 'ictPage'])->name('ictPage');

Route::get('/report-publication', [HomeController::class, 'report'])->name('report.publication');

Route::get('/news', [HomeController::class, 'news'])->name('news');
Route::get('/news-details/{id}', [HomeController::class, 'newsdetails'])->name('newsdetails');

Route::get('/events', [HomeController::class, 'events'])->name('events');
Route::get('/events-details/{id}', [HomeController::class, 'eventDetails'])->name('eventDetails');

Route::get('/all-project', [HomeController::class, 'project'])->name('project');
Route::get('/project-details/{id}', [HomeController::class, 'projectDetails'])->name('projectDetails');

Route::get('/notices', [HomeController::class, 'notices'])->name('notices');

Route::get('/ctet-about', [HomeController::class, 'ctetAbout'])->name('ctetAbout');
Route::get('/ctet-activity', [HomeController::class, 'ctetActivity'])->name('ctetActivity');
Route::get('/ctet-reports', [HomeController::class, 'ctetRreports'])->name('ctetRreports');
Route::get('/year-wise-reports/{id}', [HomeController::class, 'yearWise'])->name('yearWise');

Route::get('/notice-details/{id}',[HomeController::class,'noticeDetails'])->name('notice.details');
Route::get('/photo-gallery', [HomeController::class, 'gallery'])->name('gallery');
Route::get('/video', [HomeController::class, 'video'])->name('video');
Route::get('/contact', [HomeController::class, 'contact'])->name('contact');
Route::get('/activites',[HomeController::class,'activites'])->name('activites');
Route::get('/active-details/{id}',[HomeController::class,'activeDetails'])->name('active.details');
Route::get('/chairman-message',[HomeController::class,'chairman'])->name('chairman');
Route::get('/principal-message',[HomeController::class,'principal'])->name('principal');
Route::get('/board-of-management',[HomeController::class,'boardManagement'])->name('board.management');
Route::get('/management-detail/{id}',[HomeController::class,'managementDetails'])->name('management.details');


Route::get('/management', [HomeController::class, 'management'])->name('management');



// login
Route::get('login', [AuthenticationController::class, 'login'])->name('login');
Route::post('login', [AuthenticationController::class, 'AuthCheck'])->name('login.check');

Route::group(['middleware' => ['auth']] , function()
{
    // Dashboard
    Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard');
    // logout
    Route::get('logout', [AuthenticationController::class, 'logout'])->name('logout');
    Route::put('/login', [AuthenticationController::class, 'passwordUpdate'])->name('password.change');
    // company profile
    Route::get('company-profile', [CompanyProfileController::class, 'edit'])->name('company.edit');
    Route::put('company-profile/{company}', [CompanyProfileController::class, 'update'])->name('company.update');
    // about us
    Route::get('/admin-about',[AboutController::class,'index'])->name('admin.about');
    Route::put('/admin-about/{company}',[AboutController::class,'update'])->name('update.about');

    // CTET About us
    Route::get('/admin-ctet-about',[ContentController::class,'index'])->name('admin.ctetabout');
    Route::put('/admin-ctet-about/{ctetAbout}',[ContentController::class,'update'])->name('update.ctetabout');
    
    // message
    Route::get('/admin-message',[ContentController::class,'messageAdd'])->name('messageAdd');
    Route::put('/admin-message/{message}',[ContentController::class,'messageUpdate'])->name('messageUpdate');

    //welcome note
    Route::get('/admin-welcome-note', [WelcomeController::class,'index'])->name('admin.welcome');
    Route::put('/welcome-note-update{welcome}', [WelcomeController::class,'update'])->name('welcome.update');
    // Create user
    Route::get('/registration', [RegistrationController::class, 'index'])->name('register.create');
    Route::post('/registration', [RegistrationController::class, 'store'])->name('register.store');
    Route::get('/user-edit/{id}', [RegistrationController::class, 'edit'])->name('user.edit');
    Route::put('/user-update/{id}', [RegistrationController::class, 'update'])->name('user.update');

    Route::get('/settings', [RegistrationController::class, 'settings'])->name('settings');
    Route::put('/registration', [RegistrationController::class, 'profileUpdate'])->name('register.update');
    // Route::delete('/user-delete/{id}', [RegistrationController::class, 'delete'])->name('profile.delete');

    Route::get('/user/inactive/{id}', [RegistrationController::class, 'inactive'])->name('user.inactive');
    Route::get('/user/active/{id}', [RegistrationController::class, 'active'])->name('user.active');


    // Gallery Route
    Route::get('/gallerie-add', [GalleryController::class, 'gallery'])->name('gallery.index');
    Route::post('gallery/insert', [GalleryController::class, 'galleryInsert'])->name('store.gallery');
    Route::get('gallery/edit/{id}', [GalleryController::class, 'galleryEdit'])->name('edit.gallery');
    Route::post('gallery/update/{id}', [GalleryController::class, 'galleryUpdate'])->name('update.gallery');
    Route::get('gallery/delete/{id}', [GalleryController::class, 'galleryDelete'])->name('delete.gallery');

    // payment Type Route
    Route::get('/payment-type-add', [PaymentTypeController::class, 'index'])->name('payment.type.index');
    Route::post('payment-type/insert', [PaymentTypeController::class, 'store'])->name('store.payment.type');
    Route::get('payment-type/edit/{id}', [PaymentTypeController::class, 'edit'])->name('edit.payment.type');
    Route::post('payment-type/update/{id}', [PaymentTypeController::class, 'update'])->name('update.payment.type');
    Route::get('payment-type/delete/{id}', [PaymentTypeController::class, 'delete'])->name('delete.payment.type');

    // Video Route
    Route::get('/videos', [VideoController::class, 'index'])->name('videos.index');
    Route::post('video/insert', [VideoController::class, 'store'])->name('store.video');
    Route::get('video/edit/{id}', [VideoController::class, 'edit'])->name('edit.video');
    Route::post('video/update/{id}', [VideoController::class, 'update'])->name('update.video');
    Route::get('video/delete/{id}', [VideoController::class, 'delete'])->name('delete.video');

    // News Route
    Route::get('/news-add', [NewsController::class, 'index'])->name('news.index');
    Route::post('news/insert', [NewsController::class, 'store'])->name('store.news');
    Route::get('news/edit/{id}', [NewsController::class, 'edit'])->name('news.edit');
    Route::post('news/update/{id}', [NewsController::class, 'update'])->name('news.update');
    Route::get('news/delete/{id}', [NewsController::class, 'delete'])->name('news.delete');

    // Events Route
    Route::get('/event-add', [EventController::class, 'index'])->name('event.index');
    Route::post('event/insert', [EventController::class, 'store'])->name('store.event');
    Route::get('event/edit/{id}', [EventController::class, 'edit'])->name('event.edit');
    Route::post('event/update/{id}', [EventController::class, 'update'])->name('event.update');
    Route::get('event/delete/{id}', [EventController::class, 'delete'])->name('event.delete');


     // Testimonial Route
     Route::get('/testimonial-add', [TestimonialController::class, 'index'])->name('testimonial.index');
     Route::post('testimonial/insert', [TestimonialController::class, 'store'])->name('store.testimonial');
     Route::get('testimonial/edit/{id}', [TestimonialController::class, 'edit'])->name('testimonial.edit');
     Route::post('testimonial/update/{id}', [TestimonialController::class, 'update'])->name('testimonial.update');
     Route::get('testimonial/delete/{id}', [TestimonialController::class, 'delete'])->name('testimonial.delete');

     // project Route
     Route::get('/project-add', [ProjectController::class, 'index'])->name('project.index');
     Route::post('project/insert', [ProjectController::class, 'store'])->name('store.project');
     Route::get('project/edit/{id}', [ProjectController::class, 'edit'])->name('project.edit');
     Route::post('project/update/{id}', [ProjectController::class, 'update'])->name('project.update');
     Route::get('project/delete/{id}', [ProjectController::class, 'delete'])->name('project.delete');

     // service Route
     Route::get('/service-add', [ServiceController::class, 'index'])->name('service.index');
     Route::post('service/insert', [ServiceController::class, 'store'])->name('store.service');
     Route::get('service/edit/{id}', [ServiceController::class, 'edit'])->name('service.edit');
     Route::post('service/update/{id}', [ServiceController::class, 'update'])->name('service.update');
     Route::get('service/delete/{id}', [ServiceController::class, 'delete'])->name('service.delete');


    // Management Route
    Route::get('management-add', [ManagementController::class, 'index'])->name('management.index');
    Route::post('management/store', [ManagementController::class, 'store'])->name('management.store');
    Route::get('management/edit/{id}', [ManagementController::class, 'edit'])->name('management.edit');
    Route::post('management/update/{id}', [ManagementController::class, 'update'])->name('management.update');
    Route::get('management/delete/{id}', [ManagementController::class, 'delete'])->name('management.delete');

    // Ctet Route
    Route::get('ctet-add', [CtetController::class, 'index'])->name('ctet.index');
    Route::post('ctet/store', [CtetController::class, 'store'])->name('ctet.store');
    Route::get('ctet/edit/{id}', [CtetController::class, 'edit'])->name('ctet.edit');
    Route::post('ctet/update/{id}', [CtetController::class, 'update'])->name('ctet.update');
    Route::get('ctet/delete/{id}', [CtetController::class, 'delete'])->name('ctet.delete');

    //ctet activity
    Route::get('admin-ctet-activity',[CtetActivityController::class,'index'])->name('ctetactivity.index');
    Route::post('admin-ctetactivity-store',[CtetActivityController::class,'store'])->name('ctetactivity.store');
    Route::get('admin-ctetactivity-edit/{id}',[CtetActivityController::class,'edit'])->name('ctetactivity.edit');
    Route::put('admin-ctetactivity-update/{activity}',[CtetActivityController::class,'update'])->name('ctetactivity.update');
    Route::delete('admin-ctetactivity-delete/{activity}',[CtetActivityController::class,'delete'])->name('ctetactivity.delete');

    // Ctet report Route
    Route::get('ctet-report-add', [CtetReportController::class, 'index'])->name('ctetreport.index');
    Route::post('ctet-report/store', [CtetReportController::class, 'store'])->name('ctetreport.store');
    Route::get('ctet-report/edit/{id}', [CtetReportController::class, 'edit'])->name('ctetreport.edit');
    Route::post('ctet-report/update/{id}', [CtetReportController::class, 'update'])->name('ctetreport.update');
    Route::get('ctet-report/delete/{id}', [CtetReportController::class, 'delete'])->name('ctetreport.delete');

    //ctet sub report activity
    Route::get('admin-ctet-subreport',[SubReportController::class,'index'])->name('subreport.index');
    Route::post('admin-subreport-store',[SubReportController::class,'store'])->name('subreport.store');
    Route::get('admin-subreport-edit/{id}',[SubReportController::class,'edit'])->name('subreport.edit');
    Route::put('admin-subreport-update/{subReport}',[SubReportController::class,'update'])->name('subreport.update');
    Route::delete('admin-subreport-delete/{subReport}',[SubReportController::class,'delete'])->name('subreport.delete');

    Route::get('/delete_ctet_image/{id}', [SubReportController::class, 'removeImageCtet']);

    //ict route
    Route::get('admin-ict-report',[IctController::class,'index'])->name('ict.index');
    Route::post('admin-ict-store',[IctController::class,'store'])->name('ict.store');
    Route::get('admin-ict-edit/{id}',[IctController::class,'edit'])->name('ict.edit');
    Route::put('admin-ict-update/{ict}',[IctController::class,'update'])->name('ict.update');
    Route::delete('admin-ict-delete/{ict}',[IctController::class,'delete'])->name('ict.delete');

    Route::get('/delete_ict_image/{id}', [IctController::class, 'removeImageict']);

    Route::get('sliders-add', [SliderController::class, 'index'])->name('slider.index');
    Route::post('slider/store', [SliderController::class, 'store'])->name('slider.store');
    Route::get('slider/edit/{id}', [SliderController::class, 'edit'])->name('slider.edit');
    Route::post('slider/update/{id}', [SliderController::class, 'update'])->name('slider.update');
    Route::get('slider/delete/{id}', [SliderController::class, 'delete'])->name('slider.delete');


    Route::get('/messenger', [MessengerController::class, 'edit'])->name('messenger.edit');
    Route::put('/messenger/{messenger}', [MessengerController::class, 'update'])->name('messenger.update');

    // Route::get('admin-bgslider',[BackImageController::class,'index'])->name('bgslider.index');
    // Route::post('admin-bgslider-store',[BackImageController::class,'store'])->name('bgslider.store');
    // Route::get('admin-bgslider-edit/{id}',[BackImageController::class,'edit'])->name('bgslider.edit');
    // Route::put('backimage-update/{spslider}', [BackImageController::class, 'update'])->name('backimage.update');
    // Route::delete('backimage-delete/{spslider}', [BackImageController::class, 'delete'])->name('backimage.delete');

    // about us
    Route::get('/admin-banner',[BackImageController::class,'index'])->name('admin.banner');
    Route::put('/admin-banner/{banner}',[BackImageController::class,'update'])->name('update.banner');

   
    Route::get('/queries', [QueryController::class, 'query'])->name('admin.query');
    Route::get('queries/delete/{id}', [QueryController::class, 'queryDelete'])->name('admin.query.delete');

    Route::resource('/partner', PartnerController::class)->except('show', 'create');
    //activity
    Route::get('admin-activity',[ActivityController::class,'index'])->name('activity.index');
    Route::post('admin-activity-store',[ActivityController::class,'store'])->name('activity.store');
    Route::get('admin-activity-edit/{id}',[ActivityController::class,'edit'])->name('activity.edit');
    Route::put('admin-activity-update/{activity}',[ActivityController::class,'update'])->name('activity.update');
    Route::delete('admin-activity-delete/{activity}',[ActivityController::class,'delete'])->name('activity.delete');
 
    //notice
    Route::get('admin-notice',[NoticeController::class,'index'])->name('notice.index');
    Route::post('admin-notice-store',[NoticeController::class,'store'])->name('notice.store');
    Route::get('admin-notice-edit/{id}',[NoticeController::class,'edit'])->name('notice.edit');
    Route::put('admin-notice-update/{notice}',[NoticeController::class,'update'])->name('notice.update');
    Route::delete('admin-notice-delete/{notice}',[NoticeController::class,'delete'])->name('notice.delete');

    // facilities
    Route::get('admin-facilities',[FacilitiesController::class,'index'])->name('facilities.index');
    Route::post('admin-facilities-store',[FacilitiesController::class,'store'])->name('facilities.store');
    Route::get('admin-facilities-edit/{id}',[FacilitiesController::class,'edit'])->name('facilities.edit');
    Route::put('admin-facilities-update/{facilities}',[FacilitiesController::class,'update'])->name('facilities.update');
    Route::delete('admin-facilities-delete/{facilities}',[FacilitiesController::class,'delete'])->name('facilities.delete');
 


   //social links
   Route::get('admin-sociallink',[SocialController::class,'index'])->name('social.index');
   Route::post('admin-sociallink-store',[SocialController::class,'store'])->name('social.store');
   Route::get('admin-sociallink-edit/{id}',[SocialController::class,'edit'])->name('social.edit');
   Route::put('admin-sociallink-update/{social}',[SocialController::class,'update'])->name('social.update');
   Route::delete('admin-sociallink-delete/{social}',[SocialController::class,'delete'])->name('social.delete');
   // important link
   Route::get('important-link',[ImportantlinkController::class,'index'])->name('important.index');
   Route::post('important-link-store',[ImportantlinkController::class,'store'])->name('important.store');
   Route::get('important-link-edit/{id}',[ImportantlinkController::class,'edit'])->name('important.edit');
   Route::put('important-link-update/{important}',[ImportantlinkController::class,'update'])->name('important.update');
   Route::delete('important-link-delete/{important}',[ImportantlinkController::class,'delete'])->name('important.delete');



   // report and publication
   Route::get('/admin-report', [ReportController::class,'index'])->name('report.index');
   Route::post('/report-store', [ReportController::class,'store'])->name('report.store');
   Route::get('/report-edit/{id}', [ReportController::class,'edit'])->name('report.edit');
   Route::put('/report-update/{report}', [ReportController::class,'update'])->name('report.update');
   Route::delete('/report-delete/{report}', [ReportController::class,'delete'])->name('report.delete');

   Route::get('/delete_report_image/{id}', [ReportController::class, 'removeImage']);

   //year entry
   Route::get('/gallery-year', [YearController::class,'index'])->name('year.index');
   Route::post('/gallery-year-store', [YearController::class,'store'])->name('year.store');
   Route::get('/gallery-year-edit/{id}', [YearController::class,'edit'])->name('year.edit');
   Route::put('/gallery-year-update/{year}', [YearController::class,'update'])->name('year.update');
   Route::delete('/gallery-year-delete/{year}', [YearController::class,'delete'])->name('year.delete');


});

Route::get('/messages', [MessageController::class, 'message'])->name('admin.message');
Route::post('/messages-store', [MessageController::class, 'store'])->name('store.message');
Route::get('messages/delete/{id}', [MessageController::class, 'messageDelete'])->name('admin.message.delete');

//donate store
Route::get('/donate-list', [DonateController::class, 'donateList'])->name('donateList');
Route::post('/donate-store', [DonateController::class, 'store'])->name('store.donate');
Route::get('donate/delete/{id}', [DonateController::class, 'messageDelete'])->name('admin.donate.delete');

