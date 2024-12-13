<?php




use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FaqController;
use App\Http\Controllers\MvcController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\TeamController;
use App\Http\Controllers\AboutController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\VideoController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\SingleController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\GalleryController;
use App\Http\Controllers\PricingController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\FrontViewController;
use App\Http\Controllers\CoverImageController;
use App\Http\Controllers\SiteSettingController;
use App\Http\Controllers\TestimonialController;
use App\Http\Controllers\LegalDocumentController;
use App\Http\Controllers\VacancyController;
use App\Http\Controllers\ApplicationController;








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
 // FRONT VIEW CONTROLLER




Route::get('/',[FrontViewController::class,'index'])->name('index');
Route::get('/index',[FrontViewController::class,'index'])->name('index');








// Route::get('/', function () {
//     return view('index');
// });




Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {




    // ROUTES FOR ADMIN




    Route::as('admin.')->prefix('admin')->group( function () {




        // ROUTES FOR ADMIN INDEX




        Route::get('/', [AdminController::class, 'index'])->name('index');




        Route::get('/change_password', function (){
            return view('admin.change_password');
        })->name('change_password');




        // ROUTE FOR ADMIN SITESETTING
        Route::as('sitesetting.')->prefix('sitesetting')->group(function (){
            Route::get('index', [SiteSettingController::class,'index'])->name('index');
            Route::get('create', [SiteSettingController::class,'create'])->name('create');
            Route::get('edit/{id}', [SiteSettingController::class,'edit'])->name('edit');
            Route::post('update', [SiteSettingController::class,'update'])->name('update');
            Route::get('destroy/{id}', [SiteSettingController::class,'destroy'])->name('destroy');
            Route::post('store', [SiteSettingController::class,'store'])->name('store');
        });




        // ROUTE FOR ADMIN ABOUT
        Route::as('about.')->prefix('about')->group(function () {
            Route::get('index', [AboutController::class, 'index'])->name('index');
            Route::get('create', [AboutController::class, 'create'])->name('create');
            Route::post('store', [AboutController::class, 'store'])->name('store');
            Route::get('edit/{id}', [AboutController::class, 'edit'])->name('edit');
            Route::post('update', [AboutController::class, 'update'])->name('update');
            Route::get('destroy/{id}', [AboutController::class, 'destroy'])->name('destroy');
        });




        // ROUTE FOR ADMIN TEAM
        Route::as('team.')->prefix('team')->group(function () {
            Route::get('index', [TeamController::class, 'index'])->name('index');
            Route::get('create', [TeamController::class, 'create'])->name('create');
            Route::post('store', [TeamController::class, 'store'])->name('store');
            Route::get('edit/{id}', [TeamController::class, 'edit'])->name('edit');
            Route::post('update', [TeamController::class, 'update'])->name('update');
            Route::get('destroy/{id}', [TeamController::class, 'destroy'])->name('destroy');
        });








        // ROUTE FOR ADMIN CONTACT
        Route::as('contact.')->prefix('contact')->group(function () {
            Route::get('index', [ContactController::class,'index'])->name('index');
            Route::get('destroy/{id}', [ContactController::class,'destroy'])->name('destroy');
        });




        // ROUTE FOR ADMIN NEWS
        Route::as('news.')->prefix('news')->group(function () {
            Route::get('index', [NewsController::class, 'index'])->name('index');
            Route::get('create', [NewsController::class, 'create'])->name('create');
            Route::post('store', [NewsController::class, 'store'])->name('store');
            Route::get('edit/{id}', [NewsController::class, 'edit'])->name('edit');
            Route::post('update', [NewsController::class, 'update'])->name('update');
            Route::get('destroy/{id}', [NewsController::class, 'destroy'])->name('destroy');
        });




        // ROUTE FOR SERVICE




        Route::as('service.')->prefix('service')->group(function(){
            Route::get('index', [ServiceController::class, 'index'])->name('index');
            Route::get('create', [ServiceController::class, 'create'])->name('create');
            Route::post('store', [ServiceController::class, 'store'])->name('store');
            Route::get('edit/{id}', [ServiceController::class, 'edit'])->name('edit');
            Route::post('update', [ServiceController::class, 'update'])->name('update');
            Route::get('destroy/{id}', [ServiceController::class, 'destroy'])->name('destroy');
        });




        // ROUTE FOR TESTIMONIAL




        Route::as('testimonial.')->prefix('testimonial')->group(function (){
            Route::get('index', [TestimonialController::class, 'index'])->name('index');
            Route::get('create', [TestimonialController::class, 'create'])->name('create');
            Route::post('store', [TestimonialController::class, 'store'])->name('store');
            Route::get('edit/{id}', [TestimonialController::class, 'edit'])->name('edit');
            Route::post('update', [TestimonialController::class, 'update'])->name('update');
            Route::get('destroy/{id}', [TestimonialController::class, 'destroy'])->name('destroy');
        });












        // ROUTE FOR ADMIN PRICING
        Route::as('pricing.')->prefix('pricing')->group(function () {
            Route::get('index', [PricingController::class, 'index'])->name('index');
            Route::get('create', [PricingController::class, 'create'])->name('create');
            Route::post('store', [PricingController::class, 'store'])->name('store');
            Route::get('edit/{id}', [PricingController::class, 'edit'])->name('edit');
            Route::post('update', [PricingController::class, 'update'])->name('update');
            Route::get('destroy/{id}', [PricingController::class, 'destroy'])->name('destroy');
        });




        // ROUTE FOR ADMIN PROJECT
        Route::as('project.')->prefix('project')->group(function (){
            Route::get('index', [ProjectController::class, 'index'])->name('index');
            Route::get('create', [ProjectController::class, 'create'])->name('create');
            Route::post('store', [ProjectController::class, 'store'])->name('store');
            Route::get('edit/{id}', [ProjectController::class, 'edit'])->name('edit');
            Route::post('update', [ProjectController::class, 'update'])->name('update');
            Route::get('destroy/{id}', [ProjectController::class, 'destroy'])->name('destroy');
        });




        // ROUTE FOR CATEGORY




        Route::as('categories.')->prefix('categories')->group(function (){
            Route::get('index', [CategoryController::class, 'index'])->name('index');
            Route::get('create', [CategoryController::class, 'create'])->name('create');
            Route::post('store', [CategoryController::class, 'store'])->name('store');
            Route::get('edit/{id}', [CategoryController::class, 'edit'])->name('edit');
            Route::post('update', [CategoryController::class, 'update'])->name('update');
            Route::get('destroy/{id}', [CategoryController::class, 'destroy'])->name('destroy');
        });








        // ROUTE FOR POST
        Route::as('posts.')->prefix('posts')->group(function (){
            Route::get('index', [PostController::class, 'index'])->name('index');
            Route::get('create', [PostController::class, 'create'])->name('create');
            Route::post('store', [PostController::class, 'store'])->name('store');
            Route::get('edit/{id}', [PostController::class, 'edit'])->name('edit');
            Route::post('update', [PostController::class, 'update'])->name('update');
            Route::get('destroy/{id}', [PostController::class, 'destroy'])->name('destroy');
        });




        // ROUTE FOR ADMIN CLIENT
        Route::as('client.')->prefix('client')->group(function (){
            Route::get('index', [ClientController::class, 'index'])->name('index');
            Route::get('create', [ClientController::class, 'create'])->name('create');
            Route::post('store', [ClientController::class, 'store'])->name('store');
            Route::get('edit/{id}', [ClientController::class, 'edit'])->name('edit');
            Route::post('update', [ClientController::class, 'update'])->name('update');
            Route::get('destroy/{id}', [ClientController::class, 'destroy'])->name('destroy');
        });




        // ROUTE FOR FAQ




        Route::as('faq.')->prefix('faq')->group(function (){
            Route::get('index', [FaqController::class, 'index'])->name('index');
            Route::get('create', [FaqController::class, 'create'])->name('create');
            Route::post('store', [FaqController::class, 'store'])->name('store');
            Route::get('edit/{id}', [FaqController::class, 'edit'])->name('edit');
            Route::post('update', [FaqController::class, 'update'])->name('update');
            Route::get('destroy/{id}', [FaqController::class, 'destroy'])->name('destroy');
        });








        // ROUTE FOR GALLERY




        Route::as('gallery.')->prefix('gallery')->group(function (){
            Route::get('index', [GalleryController::class, 'index'])->name('index');
            Route::get('create', [GalleryController::class, 'create'])->name('create');
            Route::post('store', [GalleryController::class, 'store'])->name('store');
            Route::get('edit/{id}', [GalleryController::class, 'edit'])->name('edit');
            Route::post('update', [GalleryController::class, 'update'])->name('update');
            Route::get('destroy/{id}', [GalleryController::class, 'destroy'])->name('destroy');




        });




        // ROUTE FOR ADMIN VIDEO
        Route::as('video.')->prefix('video')->group(function (){
            Route::get('index', [VideoController::class, 'index'])->name('index');
            Route::get('create', [VideoController::class, 'create'])->name('create');
            Route::post('store', [VideoController::class, 'store'])->name('store');
            Route::get('edit/{id}', [VideoController::class, 'edit'])->name('edit');
            Route::post('update', [VideoController::class, 'update'])->name('update');
            Route::get('destroy/{id}', [VideoController::class, 'destroy'])->name('destroy');
        });




           // ROUTE FOR LEGAL DOCUMENT
        Route::as('legaldocument.')->prefix('legaldocument')->group(function (){
            Route::get('index', [LegalDocumentController::class, 'index'])->name('index');
            Route::get('create', [LegalDocumentController::class, 'create'])->name('create');
            Route::post('store', [LegalDocumentController::class, 'store'])->name('store');
            Route::get('edit/{id}', [LegalDocumentController::class, 'edit'])->name('edit');
            Route::post('update', [LegalDocumentController::class, 'update'])->name('update');
            Route::get('destroy/{id}', [LegalDocumentController::class, 'destroy'])->name('destroy');
        });




        // ROUTE FOR ADMIN MVC
        Route::as('mvc.')->prefix('mvc')->group(function (){
            Route::get('index', [MvcController::class, 'index'])->name('index');
            Route::get('create', [MvcController::class, 'create'])->name('create');
            Route::post('store', [MvcController::class, 'store'])->name('store');
            Route::get('edit/{id}', [MvcController::class, 'edit'])->name('edit');
            Route::post('update', [MvcController::class, 'update'])->name('update');
            Route::get('destroy/{id}', [MvcController::class, 'destroy'])->name('destroy');
        });




        // ROUTE FOR ADMIN COVER IMAGE
        Route::as('coverimage.')->prefix('coverimage')->group(function (){
            Route::get('index', [CoverImageController::class, 'index'])->name('index');
            Route::get('create', [CoverImageController::class, 'create'])->name('create');
            Route::post('store', [CoverImageController::class, 'store'])->name('store');
            Route::get('edit/{id}', [CoverImageController::class, 'edit'])->name('edit');
            Route::post('update', [CoverImageController::class, 'update'])->name('update');
            Route::get('destroy/{id}', [CoverImageController::class, 'destroy'])->name('destroy');
        });




         // ROUTE FOR ADMIN VACANCIES
         Route::as('vacancies.')->prefix('vacancies')->group(function () {
            Route::get('index', [VacancyController::class, 'index'])->name('index');
            Route::get('create', [VacancyController::class, 'create'])->name('create');
            Route::post('store', [VacancyController::class, 'store'])->name('store');
            Route::get('edit/{id}', [VacancyController::class, 'edit'])->name('edit');
            Route::put('update/{id}', [VacancyController::class, 'update'])->name('update');
            Route::delete('admin/vacancy/{id}', [VacancyController::class, 'destroy'])->name('destroy');
        });




           // ROUTE FOR ADMIN APPLICATIONS
           Route::as('applications.')->prefix('applications')->group(function (){
           Route::get('index', [ApplicationController::class, 'index'])->name('index');
           Route::post('/applications/store/{id}', [ApplicationController::class, 'store'])->name('store');
           Route::post('/applications/destroy/{id}', [ApplicationController::class, 'destroy'])->name('destroy');
           Route::patch('/admin/applications/{id}/update-status', [ApplicationController::class, 'updateStatus'])
           ->name('update-status');
       
        });




    });








});












//    SINGLE CONTROLLER




Route::get('render_about', [SingleController::class, 'render_about'])->name('render_about');
Route::get('render_testimonial', [SingleController::class, 'render_testimonial'])->name('render_testimonial');
Route::get('render_vacancy', [SingleController::class, 'render_vacancy'])->name('render_vacancy');
Route::get('/vacancy/{id}', [SingleController::class, 'render_vacancy_single'])->name('vacancy.single');
Route::get('render_team', [SingleController::class, 'render_team'])->name('render_team');
Route::get('render_faq', [SingleController::class, 'render_faq'])->name('render_faq');
Route::get('render_pricing', [SingleController::class, 'render_pricing'])->name('render_pricing');
Route::get('render_projects', [SingleController::class, 'render_projects'])->name('render_projects');
Route::get('render_services', [SingleController::class, 'render_services'])->name('render_services');
Route::get('render_single_services/{slug}', [SingleController::class, 'render_single_services'])->name('render_single_services');
Route::get('render_single_project/{slug}', [SingleController::class, 'render_single_project'])->name('render_single_project');
Route::get('render_single_image/{slug}', [SingleController::class, 'render_single_image'])->name('render_single_image');




Route::get('render_news', [SingleController::class, 'render_news'])->name('render_news');
Route::get('render_contact', [SingleController::class, 'render_contact'])->name('render_contact');
Route::get('render_image', [SingleController::class, 'render_image'])->name('render_image');




Route::get('render_video', [SingleController::class, 'render_video'])->name('render_video');
Route::get('render_client', [SingleController::class, 'render_client'])->name('render_client');
// Route::get('render_legaldocument', [SingleController::class, 'render_legaldocument'])->name('render_legaldocument');




Route::post('admin.contact.store', [ContactController::class,'store'])->name('admin.contact.store');
Route::post('admin.contact.newstore', [ContactController::class,'newstore'])->name('admin.contact.newstore');








// SEARCH
Route::get('search',[FrontViewController::class,'searchServices'])->name('searchServices');
Route::get('/applications/create/{id}', [SingleController::class, 'apply'])->name('create');

//

Route::get('/careers', [App\Http\Controllers\SingleController::class, 'careers'])->name('render_careers');















