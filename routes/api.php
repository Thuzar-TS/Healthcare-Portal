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

Route::get('jobs', 'JobController@index');
<<<<<<< HEAD
Route::get('facilities', 'FacilityController@index');



Route::group(['prefix' => 'facility'], function () {
    Route::post('add', 'FacilityController@add');  
    Route::get('edit/{id}', 'FacilityController@edit');
    Route::post('update/{id}', 'FacilityController@update');
    Route::delete('delete/{id}', 'FacilityController@destroy');
});
=======
Route::get('job_details', 'JobDetailController@index');
>>>>>>> e27209ac48d25d023f4519d1da169645c65ddb85
