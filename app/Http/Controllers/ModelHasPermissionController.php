<?php

namespace App\Http\Controllers;

use App\Model_has_permission;
use App\Role;
use App\Permission;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Image;
use App\Http\Resources\Model_has_permissionResource;
use App\Http\Requests\StoreModel_has_permission;

use App\Authorizable;use App\Employe;
use App\Http\Requests\Model_has_permissionStoreRequest;
class Model_has_permissionController extends Controller
{
   
    

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $Model_has_permissions = Model_has_permission::paginate(15);

        
        return Model_has_permissionResource::collection($Model_has_permissions);
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

        if($Model_has_permission = Model_has_permission::create($request->except('roles', 'permissions')) ) {
            return new Model_has_permissionResource($Model_has_permission);
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
       $Model_has_permission = Model_has_permission::findOrFail($id);

       return new Model_has_permissionResource($Model_has_permission);
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
    
    public function update(Model_has_permissionStoreRequest $request, $id)
    {
        
$Model_has_permission=Model_has_permission::get()->where('id',$id)->first();
        if($Model_has_permission->update($request->toArray())) {
            return new Model_has_permissionResource($Model_has_permission);
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
        $Model_has_permission = Model_has_permission::findOrFail($id);

        if($Model_has_permission->delete()) {
            return new Model_has_permissionResource($Model_has_permission);
        }   
    }
   
}
