<?php

namespace App\Http\Controllers\Api\app1\v1\blog\index\source;

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
use App\Http\Controllers\Api\app1\v1\blog\index\model\index as model;

class index
{

    private $request;
    private $config;
    private $model;
    private $list=array();

    /*
    |--------------------------------------------------------------------------
    | service construct
    |--------------------------------------------------------------------------
    |
    | Service construct is main loader for your services
    |
    */

    public function __construct(Request $request,config $config,model $model) {

        //request class
        $this->request = $request;
        //get config class
        $this->config=$config;
        //get model
        $this->model=$model;

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

        //get array list
        $this->list['result']=$this->model->get();

        //response return
        return $this->list;
    }

}