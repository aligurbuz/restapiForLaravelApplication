<?php

namespace App\Http\Controllers\Api\app1\blog\index;

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
use App\Http\Controllers\Api\app1\blog\index\model\index as model;
use App\Http\Controllers\Api\app1\blog\index\source\index as source;

class index
{

    private $request;
    private $config;
    private $model;
    private $source;

    /*
    |--------------------------------------------------------------------------
    | service construct
    |--------------------------------------------------------------------------
    |
    | Service construct is main loader for your services
    |
    */

    public function __construct(Request $request,config $config,model $model,source $source) {

        //request class
        $this->request = $request;
        //get config class
        $this->config=$config;
        //get model
        $this->model=$model;
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

    public function get () {

        //response return
        return $this->config->response(['source'=>$this->source->get()]);
    }

}