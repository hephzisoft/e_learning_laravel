<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::group(['namespace' => 'Api'], function () {

  
    Route::post('/login', 'UserController@login');
    // AUTHENTICATION MODDLEWARE
    Route::group(['middleware' => 'auth:sanctum'], function () {
        Route::any('/courselist', 'CourseController@courseList');
        Route::any('/coursedetail', 'CourseController@courseDetail');
    });

});
