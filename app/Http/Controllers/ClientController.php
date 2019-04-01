<?php

namespace App\Http\Controllers;

use App\Client;
use App\Role;
use App\Permission;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Image;
use App\Http\Resources\ClientResource;
use App\Http\Requests\StoreClient;

use App\Authorizable;use App\Employe;
use App\Http\Requests\ClientStoreRequest;
class ClientController extends Controller
{
   
    

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $Clients = Client::paginate(15);

        
        return ClientResource::collection($Clients);
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

        if($Client = Client::create($request->except('roles', 'permissions')) ) {

            $request->merge(['password' => bcrypt("secret"),'name' =>$request['nom']." ".$request['prenom']]);

            // Create the user
            if ( $user = User::create($request->except('roles', 'permissions')) ) {
    
                $this->syncPermissions($request, $user);
                $Client['user_id']=$user['id'];
                flash('User has been created.');
    
            } else {
                flash()->error('Unable to create user.');
            }

            return new ClientResource($Client);
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
       $Client = Client::findOrFail($id);

       return new ClientResource($Client);
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
    
    public function update(ClientStoreRequest $request, $id)
    {
        
$Client=Client::get()->where('id',$id)->first();
        if($Client->update($request->toArray())) {

            $user = User::findOrFail($Client['user_id']);

            // Update user
            $user->fill($request->except('roles', 'permissions', 'password'));
    
            // check for password change
            if($request->get('password')) {
                $user->password = bcrypt($request->get('password'));
            }
    
            // Handle the user roles
            $this->syncPermissions($request, $user);
    
            $user->save();
    


            return new ClientResource($Client);
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
        $Client = Client::findOrFail($id);

        if($Client->delete()) {
            return new ClientResource($Client);
        }   
    }

    private function syncPermissions(Request $request, $user)
    {
        // Get the submitted roles
        $roles = $request->get('roles', []);
        $permissions = $request->get('permissions', []);

        // Get the roles
        $roles = Role::find($roles);

        // check for current role changes
        if( ! $user->hasAllRoles( $roles ) ) {
            // reset all direct permissions for user
            $user->permissions()->sync([]);
        } else {
            // handle permissions
            $user->syncPermissions($permissions);
        }

        $user->syncRoles($roles);

        return $user;
    }
   
}
