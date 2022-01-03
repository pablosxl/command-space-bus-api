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

Route::post('/mission/start', 'Api\MissionController@create');

Route::put('/mission/bus/uncouple/{id}', 'Api\MissionController@uncoupleSpaceBus');

Route::put('/mission/init/{id}', 'Api\MissionController@init');

Route::put('/mission/thrusters/activate/{id}', 'Api\MissionController@activateThrusters');

Route::put('/mission/landinggear/open/{id}', 'Api\MissionController@openLandingGear');

Route::put('/mission/landingprocedure/init/{id}', 'Api\MissionController@initLandingProcedure');

Route::put('/mission/finish/{id}', 'Api\MissionController@finish');

Route::get('/mission/teste/{id}', 'Api\MissionController@testeController');