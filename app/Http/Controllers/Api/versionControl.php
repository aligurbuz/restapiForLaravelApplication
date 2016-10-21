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

class versionControl
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
    | service response json
    |--------------------------------------------------------------------------
    |
    | Here is where you get response for your api
    |
    */

    public function get ($data=array(),$callback,$cond=array()) {

        //true
        $bool=true;

        if($bool) {

            if(is_callable($callback)) {

                //return callback
                return call_user_func($callback);
            }
        }
    }

}