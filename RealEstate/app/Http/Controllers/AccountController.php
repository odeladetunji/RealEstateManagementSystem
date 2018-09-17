<?php
namespace App\Http\Controllers;
use DB;
use Storage;
use Illuminate\Http\Request;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class AccountController extends BaseController
{
    //use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
   
public function account(Request $request)
    {
    	 $username = $request->input('username');
    	 $password = $request->input('password');
         $value = DB::select('select identity from registration where username = ? and password = ?', [$username, $password]);
    	 return view('landLordsPage')->with('identity', $value[0]->identity);
	  }
}
