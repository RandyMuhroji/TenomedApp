<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

Route::get('/', [
    'uses' => 'HomeController@index',
    'as' => 'home',
    ]);

// Route::group(['prefix' => LaravelLocalization::setLocale(),'middleware' => [ 'localeSessionRedirect', 'localizationRedirect' ]], function(){
//     //route
// });



Route::group(['prefix' => 'admin','middleware' => 'auth','namespace' => 'Admin'],function(){
    Route::get('/',"DashboardController@index")->name('admin');
    Route::resource('users', 'UsersController');
    Route::resource('cafes', 'CafesController');
    Route::resource('sponsors', 'SponsorsController');
    Route::resource('messages', 'MessageController');
});

Route::group(['prefix' => 'manage-cafe','middleware' => 'auth','namespace' => 'Owner'],function(){
    Route::get('/',"DashboardController@index")->name('owner');
    Route::resource('menus',"MenuController");
    Route::resource('gallery',"GalleryController");
    Route::resource('reviews',"ReviewController");
    Route::resource('messages', 'MessageController');
    Route::get('/settings',function(){
        return view('owner.settings.settings_view');
    });
});

Route::group(['prefix' => 'user','middleware' => 'auth','namespace' => 'user'],function(){
    Route::resource('profile', 'ProfileController');
    Route::resource('notification', 'NotificationController');
    Route::resource('bookmarks', 'BookmarksController');
    Route::resource('review', 'ReviewController');
    Route::resource('setting', 'SettingController');

});


//Auth::routes();
//Authentication Routes...
$this->get('login', 'Auth\LoginController@showLoginForm')->name('login');
$this->post('login', 'Auth\LoginController@login');
$this->post('logout', 'Auth\LoginController@logout')->name('logout');

$this->get('register', 'Auth\RegisterController@showRegistrationForm')->name('register');
$this->post('register', 'Auth\RegisterController@register');

// Password Reset Routes...
$this->get('password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('password.reset');
$this->post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('password.email');
$this->get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm')->name('password.reset.token');
$this->post('password/reset', 'Auth\ResetPasswordController@reset');



Route::post('/user/update/{id}', 'user\SettingController@update');
Route::get('/home', 'HomeController@index');


Route::get('/basicemail','MailController@basic_email');
Route::get('/htmlemail','MailController@html_email');
Route::get('/attachmentemail','MailController@attachment_email');


Route::get('/detail/{id}', 'cafes@detail');
Route::get('/bookmarks', 'cafes@bookmarks');
Route::get('/cafeList', 'cafes@lists');
Route::post('/sendReview', 'cafes@sendReview');
Route::get('/cari', 'cafes@cari');
Route::get('/cekPass', 'cafes@cekEmail');

