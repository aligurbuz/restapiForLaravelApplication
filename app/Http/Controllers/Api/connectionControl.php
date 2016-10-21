<?php

namespace App\Http\Controllers\Api;

/*
|--------------------------------------------------------------------------
| API Service Contract
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Contracts\Routing\ResponseFactory;

class connectionControl
{

    public $request;

    /*
    |--------------------------------------------------------------------------
    | service construct
    |--------------------------------------------------------------------------
    |
    | Service construct is main loader for your services
    |
    */

    public function __construct(Request $request)
    {
        //request class
        $this->request = $request;

    }


    /*
    |--------------------------------------------------------------------------
    | service index
    |--------------------------------------------------------------------------
    |
    | Here is where you show test request for your api
    |
    */

    public function index ()
    {
        return response()->json([

            'success'           =>true,
            'message'           =>'Test Control Api'
        ]);
    }

}