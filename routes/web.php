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

use App\Http\Middleware\AuthenticatedMiddleware;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();



Route::middleware([AuthenticatedMiddleware::class])->group(function(){
    Route::get('/home', 'HomeController@index')->name('home');
    
    Route::get('studentRegister','RegistrationController@index');

    Route::resource('students', 'StudentsController');
    Route::resource('admissions', 'AdmissionsController');
    Route::resource('courses', 'CoursesController');



});

    

