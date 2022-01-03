<?php

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

Route::get('/', function () {
  $dados = [];
  return view('travel_list', []);
  
});

Route::get('/teste', function () {
  $dados = [];
  return response()->json(['teste' => 'pablo']);
  
});

Route::get('/teste/{id}', 'Auth\ResetPasswordController@testeController');
