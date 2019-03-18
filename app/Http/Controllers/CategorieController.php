<?php

namespace App\Http\Controllers;

use App\Categorie;
use App\Role;
use App\Permission;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Image;
use App\Http\Resources\CategorieResource;
use App\Http\Requests\StoreCategorie;
use App\Client;
use App\Authorizable;use App\Employe;
use App\Http\Requests\Chatter_categoriesStoreRequest;
class CategorieController extends Controller
{
    use Authorizable;
    

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $Categories = Categorie::paginate(15);

        
        return CategorieResource::collection($Categories);
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
    
  
    public function store(Request $request)
    {


        if($Categorie = Categorie::create($request->except('roles', 'permissions')) ) {
            return new CategorieResource($Categorie);
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
       $Categorie = Categorie::findOrFail($id);

       return new CategorieResource($Categorie);
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


    public function update(Request $request, $id)
    {
       
$Categorie=Categorie::get()->where('id',$id)->first();
        if($Categorie->update($request->toArray())) {
            return new CategorieResource($Categorie);
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
        $Categorie = Categorie::findOrFail($id);

        if($Categorie->delete()) {
            return new CategorieResource($Categorie);
        }   
    }
   
}
