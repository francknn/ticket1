<?php

namespace App\Http\Controllers;

use App\Service;
use App\Role;
use App\Permission;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Image;
use App\Http\Resources\ServiceResource;
use App\Http\Requests\StoreService;
use App\Client;
use App\Authorizable;use App\Employe;
use App\Http\Requests\ServiceStoreRequest;
class ServiceController extends Controller
{
    use Authorizable;
    

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $Services = Service::paginate(15);

        
        return ServiceResource::collection($Services);
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
  
  
    public function store(ServiceStoreRequest $request)
    {



        if($Service = Service::create($request->except('roles', 'permissions')) ) {
            return new ServiceResource($Service);
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
       $Service = Service::findOrFail($id);

       return new ServiceResource($Service);
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
    
    public function update(ServiceStoreRequest $request, $id)
    {
       
$Service=Service::get()->where('id',$id)->first();
        if($Service->update($request->toArray())) {
            return new ServiceResource($Service);
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
        $Service = Service::findOrFail($id);

        if($Service->delete()) {
            return new ServiceResource($Service);
        }   
    }
   
}
