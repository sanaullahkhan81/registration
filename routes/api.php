<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::resource('admissions','Api\AdmissionsController');
Route::resource('courses', 'Api\CoursesController');
Route::resource('countries', 'Api\CountriesController');
Route::resource('ethnics', 'Api\EthnicController');
Route::resource('languages', 'Api\LanguageController');
Route::resource('nationalities', 'Api\NationalitiesController');
Route::resource('students', 'Api\StudentsController');
