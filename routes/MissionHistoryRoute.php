<?php

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

Route::get('/history/{id}', 'Api\MissionHistoryController@getHistoryById');