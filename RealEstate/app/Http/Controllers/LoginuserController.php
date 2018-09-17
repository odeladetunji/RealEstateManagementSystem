<?php
namespace App\Http\Controllers;
use DB;
use Storage;
use Illuminate\Http\Request;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class LoginuserController extends BaseController
{
   
public function loginuser(Request $request)
    {
    	 $password = $request->post('password');
    	 $username = $request->post('username');
    	 $data = DB::select('select * from registration where password = ? and username = ?', [$password, $username]);
    	
         $message = "user exits";
         $message2 = 'user does not exits';
         
         if (sizeof($data) > 0) {
             return $message;
         }elseif(sizeof($data) == 0){
             return $message2;
         }else{
         	 return 'no value';
         }
         
         
         //return response()->json(Array('data'=> $message3), 200);
    }
}
