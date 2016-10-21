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

class serviceTokens
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

    public function __construct(Request $request) {

        //request class
        $this->request = $request;

    }


    /*
    |--------------------------------------------------------------------------
    | service get Tokens json
    |--------------------------------------------------------------------------
    |
    | Here is data you access with token via url for your api
    |
    */

    public function getTokens () {

        //user list
        $list=[

            //user 1
            'ag0101'=>[

            ]
        ];

        return $list;

    }


    /*
    |--------------------------------------------------------------------------
    | service access without token
    |--------------------------------------------------------------------------
    |
    | Here is data you access without token for your api
    |
    */

    public function getAccessWithoutToken () {

        //user list
        $list=[

            'blog'
        ];

        return $list;

    }

}