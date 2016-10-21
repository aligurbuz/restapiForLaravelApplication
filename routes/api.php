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

//api services (http/api/services request)
Route::match(['get','post'],"{appname}/service/{serviceName}/{serviceExtension?}", "Api\\serviceRequest@index");
