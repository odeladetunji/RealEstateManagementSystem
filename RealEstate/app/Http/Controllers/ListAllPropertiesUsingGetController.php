<?php
namespace App\Http\Controllers;
use DB;
use Storage;
use Illuminate\Http\Request;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class ListAllPropertiesUsingGetController extends BaseController
{
   
public function listAllProperties(Request $request)
    {
    	 $properties = DB::select('select * from properties');
         return response()->json(Array('data'=> $properties), 200);
    }
}
