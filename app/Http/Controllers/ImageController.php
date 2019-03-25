<?php

namespace App\Http\Controllers;

use App\Client;
use App\Role;
use App\Permission;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Image;
use App\Http\Resources\ClientResource;
use App\Http\Requests\StoreClient;

use App\Authorizable;use App\Employe;
use App\Http\Requests\ClientStoreRequest;
class ImageController extends Controller
{
   
    

    public function store(Request $request)
    {

        if($request->hasfile('image'))
        {
     
               $image=$request->file('image');
               $filename=time().'.'.$image->getClientOriginalExtension();
               $destinationPath = public_path('/images'); //public path folder dir
               $image->move($destinationPath, $filename);  //mve to destination you mentioned 
               
               return response()->json([
                'nom' =>$filename,
            ]);
              
        }
        return 0;
          
    }

}
