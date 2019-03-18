<?php

namespace App\Http\Controllers;

use App\Employe;
use App\Role;
use App\Permission;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Image;
use App\Http\Resources\EmployeResource;
use App\Http\Requests\StoreEmploye;
use App\Client;
use App\Http\Requests\EmployeStoreRequest;
class EmployeController extends Controller
{
    

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $Employes = Employe::paginate(15);

        
        return EmployeResource::collection($Employes);
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
   
  
    public function store(EmployeStoreRequest $request)
    {



        if($Employe = Employe::create($request->except('roles', 'permissions')) ) {
            return new EmployeResource($Employe);
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
       $Employe = Employe::findOrFail($id);

       return new EmployeResource($Employe);
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
   

    public function update(EmployeStoreRequest $request, $id)
    {
      
$Employe=Employe::get()->where('id',$id)->first();
        if($Employe->update($request->toArray())) {
            return new EmployeResource($Employe);
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
        $Employe = Employe::findOrFail($id);

        if($Employe->delete()) {
            return new EmployeResource($Employe);
        }   
    }
   
}
