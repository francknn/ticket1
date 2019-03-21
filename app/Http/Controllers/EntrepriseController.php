<?php

namespace App\Http\Controllers;

use App\Entreprise;
use App\Role;
use App\Permission;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Image;
use App\Http\Resources\EntrepriseResource;
use App\Http\Requests\StoreEntreprise;
use App\Client;
use App\Http\Requests\EntrepriseStoreRequest;
class EntrepriseController extends Controller
{
    

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $Entreprises = Entreprise::paginate(15);

        
        return EntrepriseResource::collection($Entreprises);
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
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
   
  
    public function store(EntrepriseStoreRequest $request)
    {



        if($Entreprise = Entreprise::create($request->except('roles', 'permissions')) ) {
            return new EntrepriseResource($Entreprise);
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
       $Entreprise = Entreprise::findOrFail($id);

       return new EntrepriseResource($Entreprise);
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
   

    public function update(EntrepriseStoreRequest $request, $id)
    {
      
$Entreprise=Entreprise::get()->where('id',$id)->first();
        if($Entreprise->update($request->toArray())) {
            return new EntrepriseResource($Entreprise);
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
        $Entreprise = Entreprise::findOrFail($id);

        if($Entreprise->delete()) {
            return new EntrepriseResource($Entreprise);
        }   
    }
   
}
