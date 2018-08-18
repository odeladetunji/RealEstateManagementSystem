<?php
namespace App\Http\Controllers;
use DB;
use Storage;
use Illuminate\Http\Request;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class ViewAvailablePropertiesController extends BaseController
{
   
public function veiwAvailableProperties(Request $request)
    {
    	 $uri = $request->path();
         $identity = explode("/", $uri);
         
    	 $property = DB::select('select * from properties where identity = ?', [$identity]);
         return response()->json(Array('property'=> $property), 200);
    }
}
