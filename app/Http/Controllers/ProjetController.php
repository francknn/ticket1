<?php

namespace App\Http\Controllers;

use App\Projet;
use App\Role;
use App\Permission;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Image;
use App\Http\Resources\ProjetResource;
use App\Http\Requests\StoreProjet;
use App\Client;
use App\Authorizable;use App\Employe;
use App\Http\Requests\ProjetStoreRequest;
class ProjetController extends Controller
{
   
    

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $Projets = Projet::paginate(15);

        
        return ProjetResource::collection($Projets);
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
   
  
    public function store(ProjetStoreRequest $request)
    {


        if($Projet = Projet::create($request->except('roles', 'permissions')) ) {
            return new ProjetResource($Projet);
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
       $Projet = Projet::findOrFail($id);

       return new ProjetResource($Projet);
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
   

    public function update(ProjetStoreRequest $request, $id)
    {
$Projet=Projet::get()->where('id',$id)->first();
        if($Projet->update($request->toArray())) {
            return new ProjetResource($Projet);
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
        $Projet = Projet::findOrFail($id);

        if($Projet->delete()) {
            return new ProjetResource($Projet);
        }   
    }
   
}
