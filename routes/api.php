<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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


Route::group(['middleware' => 'auth:api'],function(){
  
    Route::apiResource('/student','App\Http\Controllers\StudentController');
    Route::apiResource('/teacher','App\Http\Controllers\TeacherController');
 
});
Route::get('/user', 'App\Http\Controllers\AuthController@user');

//


Route::post('/studentauth', 'App\Http\Controllers\AuthController@studentreg');
Route::post('/teacherauth', 'App\Http\Controllers\AuthController@teacherreg');





Route::post('/register','App\Http\Controllers\AuthController@register');
Route::post('/login','App\Http\Controllers\AuthController@login');
Route::post('/logout','App\Http\Controllers\AuthController@logout');


 