<?php

namespace App\Http\Controllers\Api\app1\v1\blog\index;

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
use App\Http\Controllers\Api\config as config;
use App\Http\Controllers\Api\app1\v1\blog\index\source\index as source;

class index extends \App\Http\Controllers\Api\app1\v1\blog\index\abstractClass implements  \App\Http\Controllers\Api\interfaceService
{

    private $request;
    private $config;
    private $source;
    private $list=array();

    /*
    |--------------------------------------------------------------------------
    | service construct
    |--------------------------------------------------------------------------
    |
    | Service construct is main loader for your services
    |
    */

    public function __construct(Request $request,config $config,source $source) {

        //request class
        $this->request = $request;
        //get config class
        $this->config=$config;
        //get source
        $this->source=$source;

    }


    /*
    |--------------------------------------------------------------------------
    | service index
    |--------------------------------------------------------------------------
    |
    | Here is where you get blog service request for your api
    |
    */

    public function main () {

        //get source
        $result=$this->source->get();

        //response return
        return $result;

    }

}