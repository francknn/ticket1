<?php

namespace App\Http\Controllers;

use App\Permission;
use App\Role;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Image;
use App\Http\Resources\PermissionResource;
use App\Http\Requests\StorePermission;
use App\Client;
use App\Authorizable;use App\Employe;
use App\Http\Requests\PermissionStoreRequest;
class PermissionController extends Controller
{
   
    

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $Permissions = Permission::paginate(15);

        
        return PermissionResource::collection($Permissions);
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
   
  
    public function store(PermissionStoreRequest $request)
    {



        if($Permission = Permission::create($request->except('roles', 'permissions')) ) {
            return new PermissionResource($Permission);
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
       $Permission = Permission::findOrFail($id);

       return new PermissionResource($Permission);
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
   

    public function update(PermissionStoreRequest $request, $id)
    {
$Permission=Permission::get()->where('id',$id)->first();
        if($Permission->update($request->toArray())) {
            return new PermissionResource($Permission);
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
        $Permission = Permission::findOrFail($id);

        if($Permission->delete()) {
            return new PermissionResource($Permission);
        }   
    }
   
}
