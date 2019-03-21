<?php

namespace App\Http\Controllers;

use App\Chatter_post;
use App\Role;
use App\Permission;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Image;
use App\Http\Resources\Chatter_postResource;
use App\Http\Requests\StoreChatter_post;
use App\Client;
use App\Authorizable;use App\Employe;
use App\Http\Requests\Chatter_postStoreRequest;
class ChatterPostController extends Controller
{
   
    

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $Chatter_posts = Chatter_post::paginate(15);

        
        return Chatter_postResource::collection($Chatter_posts);
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
    
  
    public function store(Chatter_postStoreRequest $request)
    {

      

        if($Chatter_post = Chatter_post::create($request->except('roles', 'permissions')) ) {
            return new Chatter_postResource($Chatter_post);
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
       $Chatter_post = Chatter_post::findOrFail($id);

       return new Chatter_postResource($Chatter_post);
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
    

    public function update(Chatter_postStoreRequest $request, $id)
    {
       
$Chatter_post=Chatter_post::get()->where('id',$id)->first();
        if($Chatter_post->update($request->toArray())) {
            return new Chatter_postResource($Chatter_post);
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
        $Chatter_post = Chatter_post::findOrFail($id);

        if($Chatter_post->delete()) {
            return new Chatter_postResource($Chatter_post);
        }   
    }
   
}
