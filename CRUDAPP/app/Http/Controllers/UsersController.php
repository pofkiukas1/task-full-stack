<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Users;
use App\Http\Resources\User as UserRec; //user resource
class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //get users
        $users = Users::orderBy('created_at','desc')->paginate(100);

        // return collection -> resource
        return UserRec::collection($users);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $user = $request->isMethod('put') ? Users::findOrFail($request->user_id) : New Users;
        $user->id = $request->input('user_id');
        $user->name = $request->input('name');
        $user->lname = $request->input('lname');
        $user->email = $request->input('email');
        $user->address = $request->input('address');
        if($user->save()) {
            return new UserRec($user);
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
        // get user
        $user = Users::findOrFail($id);

        //return one user ->resourcebundle_count
        return new UserRec($user);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // get user
        $user = Users::findOrFail($id);

        if($user->delete()){
            return new UserRec($user);
        }
        
    }
}
