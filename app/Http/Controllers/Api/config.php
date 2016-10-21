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

class config
{

    public $request;
    public $version='v1';
    public $outputMethod='json';

    /*
    |--------------------------------------------------------------------------
    | service construct
    |--------------------------------------------------------------------------
    |
    | Service construct is main loader for your services
    |
    */

    public function __construct(Request $request) {

        //request class
        $this->request = $request;

    }


    /*
    |--------------------------------------------------------------------------
    | service response json
    |--------------------------------------------------------------------------
    |
    | Here is where you get response for your api
    |
    */

    public function response ($data,$message=false) {

        if($this->outputMethod=="json") {

            if(count($data))
            {
                //return config response
                return response()->json([

                    'success'=>true,
                    'data'=>$data
                ]);
            }

            //return response fail
            return response()->json([

                'success'=>false,
                'message'=>$message
            ]);


        }

    }


}