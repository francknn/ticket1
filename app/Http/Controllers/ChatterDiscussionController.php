<?php

namespace App\Http\Controllers;

use App\Chatter_discussion;
use App\Role;
use App\Permission;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Image;
use App\Http\Resources\Chatter_discussionResource;
use App\Http\Requests\StoreChatter_discussion;
use App\Client;
use App\Employe;
use App\Authorizable;use App\Http\Requests\Chatter_discussionStoreRequest;
class ChatterDiscussionController extends Controller
{
   

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $Chatter_discussions = Chatter_discussion::paginate(15);

        
        return Chatter_discussionResource::collection($Chatter_discussions);
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
    
  
    public function store(Chatter_discussionStoreRequest $request)
    {

        $request->merge([
            'user_id' => 1 ,
            'slug' => str_replace(' ', '-', strtolower($request['title']))
          ]);



        if($Chatter_discussion = Chatter_discussion::create($request->except('roles', 'permissions')) ) {
            return new Chatter_discussionResource($Chatter_discussion);
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
       $Chatter_discussion = Chatter_discussion::findOrFail($id);

       return new Chatter_discussionResource($Chatter_discussion);
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
   

    public function update(Chatter_discussionStoreRequest $request, $id)
    {

$Chatter_discussion=Chatter_discussion::get()->where('id',$id)->first();
        if($Chatter_discussion->update($request->toArray())) {
            return new Chatter_discussionResource($Chatter_discussion);
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
        $Chatter_discussion = Chatter_discussion::findOrFail($id);

        if($Chatter_discussion->delete()) {
            return new Chatter_discussionResource($Chatter_discussion);
        }   
    }
   
}
