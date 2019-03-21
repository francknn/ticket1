<?php

namespace App\Http\Controllers;

use App\Chatter_categories;
use App\Role;
use App\Permission;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Image;
use App\Http\Resources\Chatter_categoriesResource;
use App\Http\Requests\StoreChatter_categories;
use App\Client;
use App\Http\Requests\Chatter_categoriesStoreRequest;
use App\Authorizable;use App\Employe;
class ChatterCategoriesController extends Controller
{
   
    

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $Chatter_categoriess = Chatter_categories::paginate(15);

        
        return Chatter_categoriesResource::collection($Chatter_categoriess);
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
   
  
    public function store(Chatter_categoriesStoreRequest $request)
    {

       


        if($Chatter_categories = Chatter_categories::create($request->except('roles', 'permissions')) ) {
            return new Chatter_categoriesResource($Chatter_categories);
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
       $Chatter_categories = Chatter_categories::findOrFail($id);

       return new Chatter_categoriesResource($Chatter_categories);
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
   
    public function update(Chatter_categoriesStoreRequest $request, $id)
    {
        
$Chatter_categories=Chatter_categories::get()->where('id',$id)->first();
        if($Chatter_categories->update($request->toArray())) {
            return new Chatter_categoriesResource($Chatter_categories);
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
        $Chatter_categories = Chatter_categories::findOrFail($id);

        if($Chatter_categories->delete()) {
            return new Chatter_categoriesResource($Chatter_categories);
        }   
    }
   
}
