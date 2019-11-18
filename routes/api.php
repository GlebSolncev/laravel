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

# AUTH
Route::post('login', 'API\UserController@login');
Route::post('register', 'API\UserController@register');
Route::group(['middleware' => 'auth:api'], function(){
    Route::group(['prefix' => 'user',
        'middleware' => ['auth', 'can:user'],
    ],function () {
        Route::post('details', 'API\UserController@details');
    }
    );


    Route::post('videos', 'API\UserController@videos');
});

# OTHER
Route::group(['prefix' => 'component'], function() {
    Route::get('all', 'API\UserController@components');
    Route::get('find/{name}', 'API\UserController@component');
});



# OLD
Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
