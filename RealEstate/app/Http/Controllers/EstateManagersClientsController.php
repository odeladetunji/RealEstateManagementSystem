<?php
namespace App\Http\Controllers;
use DB;
use Storage;
use Illuminate\Http\Request;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class EstateManagersClientsController extends BaseController
{
   
public function estateManagersClients(Request $request)
    {
    	 $uri = $request->path();
         $identity = explode("/", $uri);
         
    	 $landLords = DB::select('select * from landlords where identity = ?', [$identity]);
         return response()->json(Array('data'=> $landLords), 200);
    }
}
