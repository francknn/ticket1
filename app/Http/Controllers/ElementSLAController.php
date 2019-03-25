<?php

namespace App\Http\Controllers;

use App\ElementSLA;
use App\Role;
use App\Permission;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Image;
use App\Http\Resources\ElementSLAResource;
use App\Http\Requests\StoreElementSLA;
use App\Client;
use App\Http\Requests\ElementSLAStoreRequest;
class ElementSLAController extends Controller
{
    

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $ElementSLAs = ElementSLA::paginate(15);

        
        return ElementSLAResource::collection($ElementSLAs);
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
   
  
    public function store(ElementSLAStoreRequest $request)
    {



        if($ElementSLA = ElementSLA::create($request->except('roles', 'permissions')) ) {
            return new ElementSLAResource($ElementSLA);
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
       $ElementSLA = ElementSLA::findOrFail($id);

       return new ElementSLAResource($ElementSLA);
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
   

    public function update(ElementSLAStoreRequest $request, $id)
    {
      
$ElementSLA=ElementSLA::get()->where('id',$id)->first();
        if($ElementSLA->update($request->toArray())) {
            return new ElementSLAResource($ElementSLA);
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
        $ElementSLA = ElementSLA::findOrFail($id);

        if($ElementSLA->delete()) {
            return new ElementSLAResource($ElementSLA);
        }   
    }
   
}
