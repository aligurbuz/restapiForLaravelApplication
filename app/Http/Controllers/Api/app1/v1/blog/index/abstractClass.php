<?php

namespace App\Http\Controllers\Api\app1\v1\blog\index;
use Illuminate\Http\Request;

abstract class abstractClass
{
    // Force Extending class to define this method
    abstract protected function main();

    // Common method
    public function get($data,$request) {

        //get provision runner
        $runProvisionForServices=app("\\App\\Http\\Controllers\\Api\\provision");

        //run never general provision control
        if(!in_array($data['servicename'],$runProvisionForServices->runNeverProvisionForServices()))
        {
            //service general provision run
            foreach ($runProvisionForServices->run as $key=>$value )
            {
                //we identify according to request ismethod
                $condition=($request->isMethod("get")) ? $value!=="postProvision" && $runProvisionForServices->$value()['success']==false : $runProvisionForServices->$value()['success']==false;

                //condition
                if($condition)
                {
                    //return config response false
                    return app("\\App\\Http\\Controllers\\Api\\config")->response([],$runProvisionForServices->$value()['message']);
                }

            }
        }


        //get provision for service
        $getProvisionService=app("\\App\\Http\\Controllers\\Api\\app1\\v1\\blog\\index\\provision");

        //service provision run
        foreach ($getProvisionService->run as $key=>$value )
        {
            //if there is success false
            if($getProvisionService->$value()['success']==false)
            {
                //return config response false
                return app("\\App\\Http\\Controllers\\Api\\config")->response([],$getProvisionService->$value()['message']);
            }
        }

        //return service config response
        return app("\\App\\Http\\Controllers\\Api\\config")->response($this->main());

    }
}