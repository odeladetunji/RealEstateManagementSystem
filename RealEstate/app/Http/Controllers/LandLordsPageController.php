<?php
namespace App\Http\Controllers;
use DB;
use Storage;
use Illuminate\Http\Request;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class LandLordsPageController extends BaseController
{
   
public function landLords(Request $request)
    { 
    	 $identity = $request->input('identity');
    	 /*print_r($identity);
    	 return;*/
         //return view('landLordsPage')->with('identity', ['identity'=> $identity]);
         return view('landLordsPage', ['identity' => $identity]);//->with("identity", $identity);
    }
}
