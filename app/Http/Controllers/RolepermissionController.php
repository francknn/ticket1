<?php

namespace App\Http\Controllers;

use App\Role_has_permission;
use App\Role;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Image;
use App\Http\Resources\Role_has_permissionResource;
use App\Http\Requests\StoreRole_has_permission;
use App\Client;
use App\Authorizable;use App\Employe;
use App\Http\Requests\Role_has_permissionStoreRequest;
class RolepermissionController extends Controller
{
   
    

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $Role_has_permissions = Role_has_permission::paginate(15);

        
        return Role_has_permissionResource::collection($Role_has_permissions);
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
   
  
    public function store(Role_has_permissionStoreRequest $request)
    {



        if($Role_has_permission = Role_has_permission::create($request->except('roles', 'Role_has_permissions')) ) {
            return new Role_has_permissionResource($Role_has_permission);
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
       $Role_has_permission = Role_has_permission::get()->where('role_id',$id);

       return Role_has_permissionResource::collection($Role_has_permission);
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
   

    public function update(Role_has_permissionStoreRequest $request, $id)
    {
$Role_has_permission=Role_has_permission::get()->where('id',$id)->first();
        if($Role_has_permission->update($request->toArray())) {
            return new Role_has_permissionResource($Role_has_permission);
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
        $Role_has_permission = Role_has_permission::findOrFail($id);

        if($Role_has_permission->delete()) {
            return new Role_has_permissionResource($Role_has_permission);
        }   
    }
   
}
