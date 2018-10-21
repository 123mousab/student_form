<?php

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
Route::pattern('id', '[0-9]+');
Route::get('/', function () {
    return view('welcome');
});
Route::group(['middleware'=>'students'],function (){
Route::get('student/form', 'StudentsController@stuForm');
Route::post('insert/student', 'StudentsController@insert_student');
Route::delete('del/student/{id?}', 'StudentsController@delete');
});
//Route::get('student/form', 'StudentsController@stuForm')->middleware('students');
Auth::routes();
/*Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');
Route::post('login', 'Auth\LoginController@login');
Route::post('logout', 'Auth\LoginController@logout')->name('logout');

// Registration Routes...
Route::get('register', 'Auth\RegisterController@showRegistrationForm')->name('register');
Route::post('register', 'Auth\RegisterController@register');

// Password Reset Routes...
Route::get('password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('password.request');
Route::post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('password.email');
Route::get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm')->name('password.reset');
Route::post('password/reset', 'Auth\ResetPasswordController@reset');*/

Route::get('/home', 'HomeController@index')->name('home');
Route::group(['middleware'=>'guest'],function (){
    Route::get('manual/login', 'Users@login_get');
    Route::post('manual/login', 'Users@login_post');
});
// guard=admin in the middlware

/*Route::get('admin/path', function (){
    return 'Hello my frined';
})->middleware('students');*/

Route::get('admin/path', function (){
    return 'Hello my frined';
})->middleware('AuthAdmin:webAdmin');
Route::get('admin/login', 'Admin@login_get');
Route::post('admin/login', 'Admin@login_post');

