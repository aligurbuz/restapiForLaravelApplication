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
use App\Http\Controllers\Api\config as config;

class serviceRequest
{

    private $request;
    private $config;
    private $path='\\App\\Http\\Controllers\\Api';

    /*
    |--------------------------------------------------------------------------
    | service construct
    |--------------------------------------------------------------------------
    |
    | Service construct is main loader for your services
    |
    */

    public function __construct(Request $request,config $config)
    {
        //request class
        $this->request = $request;
        //get config
        $this->config=$config;

    }


    /*
    |--------------------------------------------------------------------------
    | service index
    |--------------------------------------------------------------------------
    |
    | Here is where you send firstly request for your api
    |
    */

    public function index ($appname=false,$servicename=false) {
        //url service
        $getServiceData=[

            'appname'                   =>$appname,
            'servicename'               =>$servicename,
            'version'                   =>$this->config->version,
            'urldata'                   =>\Input::all()

        ];

        //service name and data control
        return $this->serviceControl($getServiceData,function() use ($getServiceData) {

            //directory control
            return $this->serviceDirectoryControl($getServiceData,function () use ($getServiceData) {

                //service return
                return app("".$this->path."\\".$getServiceData['appname']."\\".$this->config->version."\\".$getServiceData['servicename']."\\index\\index")->get($getServiceData,$this->request);
            });
        });

    }


    /*
    |--------------------------------------------------------------------------
    | service control
    |--------------------------------------------------------------------------
    |
    | Here is where you send firstly request for your api
    |
    */

    private function serviceControl ($data=array(),$callback) {

        //get service token control
        return $this->serviceTokenControl($data,function() use ($callback) {

            //return callback
            return call_user_func($callback);

        });

    }


    /*
    |--------------------------------------------------------------------------
    | service token control
    |--------------------------------------------------------------------------
    |
    | Here is where you check service access is with token for your api
    |
    */

    private function serviceTokenControl ($data=array(),$callback) {

        //get token control from serviceTokens
        if(array_key_exists('token',$data['urldata']) &&
            array_key_exists($data['urldata']['token'],app("".$this->path."\\serviceTokens")->getTokens())) {

            //return callback
            return call_user_func($callback);
        }


        //directly access without token
        if(in_array($data['servicename'],app("".$this->path."\\serviceTokens")->getAccessWithoutToken()))
        {
            //return callback
            return call_user_func($callback);
        }

        //service token false
        return $this->config->response([],'Invalid Token');
    }


    /*
    |--------------------------------------------------------------------------
    | service directory control
    |--------------------------------------------------------------------------
    |
    | Here is where you check whether directory is available for request for your api
    |
    */

    private function serviceDirectoryControl ($data=array(),$callback) {

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