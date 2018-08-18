<?php
namespace App\Http\Controllers;
use DB;
use Storage;
use Illuminate\Http\Request;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class DeletePropertyController extends BaseController
{
   
public function deleteProperty(Request $request)
    {
    	 $identity = request->input('message');
    	 $landLords = DB::update('delete * from properties where identity = ?', [$identity]);
         return response()->json(Array('data'=> $landLords), 200);
    }
}
