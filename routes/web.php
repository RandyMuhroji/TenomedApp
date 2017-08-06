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
    Route::resource('messages', 'MessageController');

    Route::group(['prefix' => 'reservation'],function(){
        Route::get('/',"ReservationController@index")->name('admin_reservation');
    });

    Route::group(['prefix' => 'settings'], function(){
        Route::get('/account',"SettingsController@account")->name('admin_account');
        Route::put('/account',"SettingsController@accountStore");
        Route::post('/account/password',"SettingsController@changePassword")->name('change_password_admin');

        Route::get('/administrator',"SettingsController@showAdmin")->name('admin_list');
        Route::post('/administrator/add',"SettingsController@addAdmin")->name('add_admin');
        Route::put('/administrator/update/{id}',"SettingsController@updateAdmin")->name('update_admin');
        Route::delete('/administrator/delete/{id}',"SettingsController@deleteAdmin")->name('delete_admin');
    });
});

Route::group(['prefix' => 'manage-cafe','middleware' => 'auth','namespace' => 'Owner'],function(){
    Route::get('/',"DashboardController@index")->name('owner');
    Route::resource('menus',"MenuController");
    Route::resource('gallery',"GalleryController");

    Route::post('gallery/album',"GalleryController@album")->name("galery_album");
    Route::delete('gallery/album/{id}',"GalleryController@deleteAlbum");

    Route::resource('reviews',"ReviewController");
    Route::resource('reservations',"reservationController");
    Route::resource('messages', 'MessageController');
    Route::group(['prefix' => 'settings'], function(){
        Route::get('/account',"SettingsController@account")->name('owner_account');
        Route::put('/account/{id}',"SettingsController@accountStore");

        Route::get('/cafe',"SettingsController@cafe")->name('owner_cafe');
        Route::put('/cafe/{id}',"SettingsController@cafeStore");

        Route::post('/account/password',"SettingsController@changePassword")->name('change_password');
    });
});

Route::group(['prefix' => 'user','middleware' => 'auth','namespace' => 'user'],function(){
    Route::resource('profile', 'ProfileController');
    Route::resource('bookingList', 'NotificationController');
    Route::resource('bookmarks', 'BookmarksController');
    Route::resource('review', 'ReviewController');
    Route::resource('setting', 'SettingController');
    Route::resource('chatting', 'ChattingController');
    Route::post('password',"SettingsController@changePassword");

});


//Auth::routes();
//Authentication Routes...

$this->get('login', 'Auth\LoginController@showLoginForm')->name('login');
$this->post('login', 'Auth\LoginController@login');
$this->post('logout', 'Auth\LoginController@logout')->name('logout');

$this->get('register', 'Auth\RegisterController@showRegistrationForm')->name('register');
$this->post('register', 'Auth\RegisterController@create');
Route::get('user/activation/{token}', 'Auth\LoginController@activateUser')->name('user.activate');

// Password Reset Routes...
$this->get('password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('password.reset');
$this->post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('password.email');
$this->get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm')->name('password.reset.token');
$this->post('password/reset', 'Auth\ResetPasswordController@reset');



Route::get('/basicemail','MailController@basic_email');
Route::get('/htmlemail','MailController@html_email');
Route::get('/attachmentemail','MailController@attachment_email');

Route::post('/user/update/{id}', 'user\SettingController@update');
Route::get('/home', 'HomeController@index');


Route::get('/detail/{id}', 'cafes@detail');
Route::get('/bookmarks', 'cafes@bookmarks');
Route::get('/cafeList', 'cafes@lists');
Route::post('/sendReview', 'cafes@sendReview');
Route::post('/sendReport', 'cafes@sendReport');
Route::post('/message', 'cafes@Message');
Route::post('/pesan', 'cafes@pesan');
Route::get('/cari', 'cafes@cari');
Route::get('/cekPass', 'cafes@cekEmail');
Route::get('/booking/{id}', 'booking@booking');
Route::get('listChat', 'cafes@listChat');

Route::post('/saveBooking/{id}', 'booking@saveBooking');
Route::get('/invoice/{id}', 'booking@invoice');

Route::get('/slots/{id}', 'cafes@slots');
// Route::get('/user/deleteReview/{$id}', 'user\ReviewController@deleteReview');
Route::get('/seats/{id}', 'cafes@seats');
Route::get('/user/deleteReview/{id}', 'cafes@deleteReview');
Route::post('/user/updateReview/{id}', 'cafes@updateReview');
Route::get('/user/InvoiceDownload/{id}', 'cafes@downloadPDF');