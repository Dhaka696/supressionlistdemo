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

Route::post('/createSuppression', 'SuppressionListController@createSuppression');
Route::post('/updateSuppression', 'SuppressionListController@updateSuppression');
Route::post('/deleteSuppression', 'SuppressionListController@deleteSuppression');
Route::get('/getAllReversed', 'SuppressionListController@getAllReversed');
Route::get('/getAll', 'SuppressionListController@getAll');
    