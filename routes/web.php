<?php

use App\Http\Controllers\AdsController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\Controller;
use App\Http\Controllers\DefaultController;
use App\Http\Controllers\InterviewsController;
use App\Http\Controllers\PodcastController;
use App\Http\Controllers\RjInfoController;
use App\Http\Controllers\SettingsController;
use App\Http\Controllers\ShowController;
use App\Http\Controllers\StaticPagesConrtroller;
use App\Http\Controllers\StoryController;
use App\Http\Controllers\VideoesController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
 */

Route::get('/', function () {
    return view('front.home');
})->name('home');
Route::get('/radio', function () {
    return view('front.radio');
})->name('radio');
Route::get('/podcasts', function () {
    return view('front.podcasts');
})->name('podcasts');



Route::get('videos', function () {
    return view('front.videos-page');
})->name('videoes.page');
Route::get('/reads', function () {
    return view('front.reads');
})->name('reads');
Route::get('/settings', function () {
    return view('front.settings');
})->name('settings');
Route::get('/top20', function () {
    return view('front.top-music');
})->name('top20');
Route::get('/top-stories', function () {
    return view('front.top-stories');
})->name('top-stories');
Route::get('/government_schemes',function(){
    return view('front.government-schemas');
})->name('government_schemes');
// Route::get('/blogs',[BlogController::class,'frontBlogList'])->name('front-blog-list');

Route::get('/blogs/{id}',[BlogController::class,'frontBlog'])->name('front-blog');
Route::get('careers',[DefaultController::class,'careers'])->name('careers');
Route::get('contact-us',[DefaultController::class,'contactUs'])->name('contact-us');
Route::get('about-us',[DefaultController::class,'aboutUs'])->name('about-us');
Route::get('advertise',[DefaultController::class,'advertise'])->name('advertise');
Route::get('privacy-policy',[DefaultController::class,'privacyPolicy'])->name('privacy-policy');
Route::get('terms-and-conditions',[DefaultController::class,'termsAndCondition'])->name('terms-and-conditions');
Route::get('mtmf',[DefaultController::class,'mtmf'])->name('mtmf');
Route::post('add-comment',[CommentController::class,'AddComment'])->name('add_comment');

Route::get('/term-of-use',function(){
    return view('front.term-of-use');
});

Auth::routes();

Route::get('admin',function(){
    return redirect()->route('dashboard');
});


Route::prefix('admin')->middleware(['auth'])->group(function () {

    // // Seo Routes
    // Route::get('/seo/settings', [GeneralSettingController::class, 'index'])->name('seo.settings');
    // Route::post('/seo/settings', [GeneralSettingController::class, 'store']);

    //Dashboard Route
    // Route::get('/dashboard','Controller@index')->name('dashboard');
    Route::get('dashboard', [Controller::class, 'index'])->name('dashboard');

    // Route::post('/dashboard/bar-chart-data', [Controller::class, 'barChartData'])->name('dashboard.bar.chart.data');

    Route::get('/adminEdit', [Controller::class,'adminEdit'])->name('admin-edit');
    Route::post('adminUpdate', [Controller::class,'adminUpdate'])->name('admin-update');
    Route::post('resetpassword1', [Controller::class,'resetpassword1'])->name('admin-resetpassword1');

    Route::get('blogs',[BlogController::class,'index'])->name('admin-blogs');
    Route::get('blogs/create',[BlogController::class,'create'])->name('admin-blogs.create');
    Route::post('admin-blog',[BlogController::class,'store'])->name('admin-blog.store');
    Route::get('admin-blog/{id}/edit',[BlogController::class,'edit'])->name('admin-blog.edit');
    Route::PUT('admin-blog/{id}',[BlogController::class,'update'])->name('admi-blog.update');
    Route::DELETE('admin-blog/{id}',[BlogController::class,'destroy'])->name('admin-blog.destroy');

    Route::resource('rj-info',RjInfoController::class);
    Route::get('rj-get-info',[RjInfoController::class,'getData'])->name('rj_get');

    Route::resource('show', ShowController::class);
    Route::resource('podcasts',PodcastController::class);
    Route::resource('interviews',InterviewsController::class);

    Route::get('get-interviews-data',[InterviewsController::class,'getData'])->name('get_interviews_data');

    Route::get('get-podcast-data',[PodcastController::class,'getData'])->name('get_podcasts_data');


    Route::resource('settings',SettingsController::class);
    Route::get('/get_show_schedule_data',[ShowController::class,'getData'])->name('get_show_schedule_data');

    Route::resource('ad-manage',AdsController::class);
    Route::get('get-ads-data',[AdsController::class,'getData'])->name('get_ads_data');

    Route::resource('static-pages',StaticPagesConrtroller::class);
    Route::get('get-static-pages-data',[StaticPagesConrtroller::class,'getData'])->name('get_static_pages_data');

    Route::resource('comments',CommentController::class);
    Route::get('get-comment-data',[CommentController::class,'getData'])->name('get_comment_data');
    Route::post('comment/verify',[CommentController::class,'verifyComment'])->name('verify_comment');


});

Route::middleware(['guest'])->group(function () {

    Route::get('/admin/dashboard/test', function () {
        return view('admin.auth.login');
    })->name('admin-login');
});

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home2');

Route::fallback(function () {
    return view('front.static-pages.404-page');
  });
