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

class provision
{

    public $request;
    public $run=['postProvision'];

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
    | service provisions
    |--------------------------------------------------------------------------
    |
    | Here is where you identify obligatory provision for your api
    |
    */

    public function postProvision () {

        /**
         * @method provision default success
         * @result success post method
         * @return true false
         */
        $success=false;

        /**
         * @method provision condition
         * @result success post method
         * @return true false
         */
        if($this->request->isMethod("post"))
        {
            //success statu
            $success=(array_key_exists("_token",\Input::all())) ? true : false;
        }

        //post provision return
        return ['success'=>$success,'message'=>'post provision condition'];

    }


    /*
    |--------------------------------------------------------------------------
    | service provisions run condition
    |--------------------------------------------------------------------------
    |
    | Here is where you identify obligatory provision for your api
    |
    */

    public function runNeverProvisionForServices () {

        return [

            //service_name
        ];

    }


}