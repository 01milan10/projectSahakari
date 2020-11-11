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

Route::get('/get-comments/{pagination}', 'commentController@getComments');
Route::get('/get-oppurtunity', 'opportunitiesController@getCareer');
Route::get('/get-downloads', 'downloadsController@getDownloads');
Route::get('/get-contacts', 'contactController@getContacts');
Route::get('/get-team/{paginate}', 'committeeController@getTeam');
Route::get('/get-images/{paginate}', 'galleryController@getImages');
Route::post('/sendMessage', 'backendController@sendMessage');
Route::get('/get-deposits', 'balanceController@getDeposits');
Route::get('get-features', 'FeatureController@index');
Route::get('get-clients', 'ClientsController@index');
