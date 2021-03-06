<?php

namespace App\Http\Controllers;

use App\Requete;
use App\Role;
use App\Permission;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Image;
use App\Http\Resources\RequeteResource;
use App\Http\Requests\StoreRequete;
use App\Client;
use App\Authorizable;use App\Employe;
use App\Http\Requests\RequeteStoreRequest;
class RequeteController extends Controller
{
   
    

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $Requetes = Requete::paginate(15);

        
        return RequeteResource::collection($Requetes);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
    }

    /**
     *  $request->merge([
            'client_id' => 1 
           
          ]);
          $r=new Request();
          $r=$request->except('categorie_id');
          $a=2;
          $a=intval($request['categorie_id']);
return $a;
          
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
   
  
    public function store(Request $request)
    {

        $request->merge([
            'client_id' => 1 ,
            'categorie_id' => 1
          ]);

        if($Requete = Requete::create($request->except('roles', 'permissions')) ) {
            return new RequeteResource($Requete);
        }
          
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
       $Requete = Requete::findOrFail($id);

       return new RequeteResource($Requete);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
     
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
   

    public function update(RequeteStoreRequest $request, $id)
    {
$Requete=Requete::get()->where('id',$id)->first();
        if($Requete->update($request->toArray())) {
            return new RequeteResource($Requete);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     * @internal param Request $request
     */
   
    public function destroy($id)
    {
        $Requete = Requete::findOrFail($id);

        if($Requete->delete()) {
            return new RequeteResource($Requete);
        }   
    }
   
}
