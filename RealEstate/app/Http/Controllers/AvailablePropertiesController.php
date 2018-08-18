<?php

namespace App\Http\Controllers;
use DB;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class AvailablePropertiesController extends BaseController
{
    //use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
    public function availableProperties(Request $request)
    {
       $value = "not available";
       $properties = DB::select('select * from properties where availability = ?', [ $value ]);  
       return response()->json(array('properties'=> $properties), 200);
    }
}
