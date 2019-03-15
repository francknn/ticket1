<?php

namespace App\Http\Controllers;

use App\Chatter_user_discussion;
use App\Role;
use App\Permission;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Image;
use App\Http\Resources\Chatter_user_discussionResource;
use App\Http\Requests\StoreChatter_user_discussion;
use App\Client;
use App\Authorizable;use App\Employe;

class ChatterUserDiscussionController extends Controller
{
    use Authorizable;
    

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $Chatter_user_discussions = Chatter_user_discussion::paginate(15);

        
        return Chatter_user_discussionResource::collection($Chatter_user_discussions);
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

        


        if($Chatter_user_discussion = Chatter_user_discussion::create($request->except('roles', 'permissions')) ) {
            return new Chatter_user_discussionResource($Chatter_user_discussion);
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
       $Chatter_user_discussion = Chatter_user_discussion::findOrFail($id);

       return new Chatter_user_discussionResource($Chatter_user_discussion);
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
        
$Chatter_user_discussion=Chatter_user_discussion::get()->where('id',$id)->first();
        if($Chatter_user_discussion->update($request->toArray())) {
            return new Chatter_user_discussionResource($Chatter_user_discussion);
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
        $Chatter_user_discussion = Chatter_user_discussion::findOrFail($id);

        if($Chatter_user_discussion->delete()) {
            return new Chatter_user_discussionResource($Chatter_user_discussion);
        }   
    }
   
}
