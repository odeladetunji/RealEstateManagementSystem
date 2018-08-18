<?php
namespace App\Http\Controllers;
use DB;
use Storage;
use Illuminate\Http\Request;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class LandingPageController extends BaseController
{
    //use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
public function landingpage(Request $request)
    {
         return view('landingpage');
    }
}
