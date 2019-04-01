<?php

namespace App\Http\Controllers;

use App\Planning;
use App\Role;
use App\Permission;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Image;
use App\Http\Resources\PlanningResource;
use App\Http\Requests\StorePlanning;
use App\Client;
use App\Http\Requests\PlanningStoreRequest;
class PlanningController extends Controller
{
    

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $Plannings = Planning::paginate(15);

        
        return PlanningResource::collection($Plannings);
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
   
  
    public function store(PlanningStoreRequest $request)
    {



        if($Planning = Planning::create($request->except('roles', 'permissions')) ) {
            return new PlanningResource($Planning);
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
       $Planning = Planning::findOrFail($id);

       return new PlanningResource($Planning);
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
   

    public function update(PlanningStoreRequest $request, $id)
    {
      
$Planning=Planning::get()->where('id',$id)->first();
        if($Planning->update($request->toArray())) {
            return new PlanningResource($Planning);
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
        $Planning = Planning::findOrFail($id);

        if($Planning->delete()) {
            return new PlanningResource($Planning);
        }   
    }
   
}
