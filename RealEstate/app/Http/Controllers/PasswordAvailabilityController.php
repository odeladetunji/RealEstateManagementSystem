<?php
namespace App\Http\Controllers;
use DB;
use Storage;
use Illuminate\Http\Request;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class PasswordAvailabilityController extends BaseController
{

public function password(Request $request)
    {
         $password = $request->post('message');
    	 $data = DB::select('select * from registration where password = ?', [$password]);
         $message = "password is not available";
         $message2 = 'password is available';
         
         if (sizeof($data) == 0) {
             return $message2;
         }
         
         if (sizeof($data) > 0) {
             return $message;
         }
    }
}


