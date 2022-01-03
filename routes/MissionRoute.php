<?php

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

Route::post('/start', 'Api\MissionController@create');

Route::put('/bus/uncouple/{id}', 'Api\MissionController@uncoupleSpaceBus');

Route::put('/init/{id}', 'Api\MissionController@init');

Route::put('/thrusters/activate/{id}', 'Api\MissionController@activateThrusters');

Route::put('/engines/start/{id}', 'Api\MissionController@startEngines');

Route::put('/landinggear/open/{id}', 'Api\MissionController@openLandingGear');

Route::put('/landingprocedure/init/{id}', 'Api\MissionController@initLandingProcedure');

Route::put('/finish/{id}', 'Api\MissionController@finish');

Route::put('/disable/{id}', 'Api\MissionController@disableMission');

Route::get('/list', 'Api\MissionController@getMissions');

Route::delete('{id}', 'Api\MissionController@deleteMission');

Route::get('/teste/bus/{id}', 'Api\MissionController@testeController');

