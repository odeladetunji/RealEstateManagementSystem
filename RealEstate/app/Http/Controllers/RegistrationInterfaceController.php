<?php
namespace App\Http\Controllers;
use DB;
use Storage;
use Illuminate\Http\Request;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class RegistrationInterface extends BaseController
{
    //use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
public function interface(Request $request)
    { 
         
         return view('interface');
    }
}
