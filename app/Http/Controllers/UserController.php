<?php

namespace App\Http\Controllers;

use App\User;
use App\Role;
use App\Permission;
use App\Authorizable;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Image;
use App\Http\Resources\UserResource;
use App\Http\Requests\StoreUser;
use App\Client;
use App\Employe;

class UserController extends Controller
{
    
    use Authorizable;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::paginate(15);

        
        return UserResource::collection($users);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
    }

   
  
    public function store(Request $request)
    {

        $this->validate($request, [
            'name' => 'bail|required|min:2',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6',
           
        ]);


        if($user = User::create($request->except('roles', 'permissions')) ) {
            return new UserResource($user);
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
       $User = User::findOrFail($id);

       return new UserResource($User);
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

   

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name' => 'bail|required|min:2',
            'email' => 'required|email|unique:users,email,' . $id,
        ]);
$user=User::get()->where('id',$id)->first();
        if($user->update($request->toArray())) {
            return new UserResource($user);
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
        $User = User::findOrFail($id);

        if($User->delete()) {
            return new UserResource($User);
        }   
    }
   
}
