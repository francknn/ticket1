<?php

namespace App\Http\Controllers;

use App\Authorizable;
use App\Permission;
use App\Role;
use Illuminate\Http\Request;
use App\Http\Requests\Chatter_categoriesStoreRequest;
use App\Http\Requests\RoleStoreRequest;
use App\Http\Resources\RoleResource;
class RoleController extends Controller
{
   
   

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        $permissions = Permission::all();
        $roles = Role::paginate(15);

        
        return RoleResource::collection($roles);}

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store1(Request $request)
    {
        $this->validate($request, ['name' => 'required|unique:roles']);

        if( Role::create($request->only('name')) ) {
            flash('Role Added');
        }

        return redirect()->back();
    }

    public function store(Request $request)
    {


        $request->merge([
            'guard_name' =>"web" ]);


        if($Role = Role::create($request->except('roles', 'permissions')) ) {
            return new RoleResource($Role);
        }
          
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update1(Request $request, $id)
    {
        if($role = Role::findOrFail($id)) {
            // admin role has everything
            if($role->name === 'Admin') {
                $role->syncPermissions(Permission::all());
                return redirect()->route('roles.index');
            }

            $permissions = $request->get('permissions', []);

            $role->syncPermissions($permissions);

            flash( $role->name . ' permissions has been updated.');
        } else {
            flash()->error( 'Role with id '. $id .' note found.');
        }

        return redirect()->route('roles.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
       $Role = Role::findOrFail($id);

       return new RoleResource($Role);
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
$Role=Role::get()->where('id',$id)->first();
        if($Role->update($request->toArray())) {
            return new RoleResource($Role);
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
        $Role = Role::findOrFail($id);

        if($Role->delete()) {
            return new RoleResource($Role);
        }   
    }
}
