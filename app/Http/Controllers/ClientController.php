<?php

namespace App\Http\Controllers;

use App\Client;
use App\Role;
use App\Permission;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Image;
use App\Http\Resources\ClientResource;
use App\Http\Requests\StoreClient;

use App\Authorizable;use App\Employe;
use App\Http\Requests\ClientStoreRequest;
class ClientController extends Controller
{
    use Authorizable;
    

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
    
  
    public function store(ClientStoreRequest $request)
    {

     

        if($Client = Client::create($request->except('roles', 'permissions')) ) {
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
   
}
