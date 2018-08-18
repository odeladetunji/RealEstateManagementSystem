<?php
namespace App\Http\Controllers;
use DB;
use Storage;
use Illuminate\Http\Request;
use Illuminate\Http\File;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class PropertyPostByLandlordController extends BaseController
{
   
public function property(Request $request)
    {
         
    	 $location = $request->location;
    	 $state = $request->state;
    	 $localGovernment = $request->localgovernment;
    	 $condition = $request->condition;
         $caption = $request->caption;
    	 $type = $request->type;
         $discription = $request->discription;
         $owner = $request->owner;
         $price = $request->price;
         $identity = $request->user;
         $phoneNumber = $request->phone;
         $availability = $request->availability;
         $userIdentity = $request->user;
         
         $picture0 = $request->firstpicture->getClientOriginalName();
         $picture1 = $request->secondpicture->getClientOriginalName();
         $picture2 = $request->thirdpicture->getClientOriginalName();
         $picture3 = $request->fouthpicture->getClientOriginalName();

         $newPictureName =  $userIdentity.$picture0;
         $newPictureName1 = $userIdentity.$picture1;
         $newPictureName2 = $userIdentity.$picture2;
         $newPictureName3 = $userIdentity.$picture3;


         Storage::putFileAs('/public/images', new File($request->firstpicture), $newPictureName);
         Storage::putFileAs('/public/images', new File($request->secondpicture), $newPictureName1);
         Storage::putFileAs('/public/images', new File($request->thirdpicture), $newPictureName2);
         Storage::putFileAs('/public/images', new File($request->fouthpicture), $newPictureName3);
            
    	 $property = DB::insert('insert into properties (caption, location, state, localgovernment, thecondition, type, discription, owner, price, identity, phonenumber, availability, firstpicture, secondpicture, thirdpicture, fouthpicture) value (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)', [$caption, $location, $state, $localGovernment, $condition, $type, $discription, $owner, $price, $identity, $phoneNumber, $availability, $newPictureName, $newPictureName1, $newPictureName2, $newPictureName3]);

         $message = 'Listed Successfully!';
         return response()->json(array('message'=> $message), 200);
    }
}
