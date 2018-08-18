<?php
namespace App\Http\Controllers;
use DB;
use Storage;
use Illuminate\Http\Request;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class EstateManagersPageController extends BaseController
{
    //use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
    
public function estateManagersPage(Request $request)
    {
    	 $identity = $request->input('password');
    	 
         return view('estateManagersPage', [ $identity ]);
    }
}
