<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;
use App\User;


class UserProfileController extends Controller
{

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('api');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //1. Get all users
        $user_profile = User::all();
       
        return response()->json($user_profile);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //1. Get all users
        $user_profile = User::where('id', '=', $id)->get();
        return response()->json($user_profile);
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
        Log::debug($request);
        $user_profile = User::find($id);
        $user_profile->name                 = $request->name;
        $user_profile->date_of_birth        = $request->date_of_birth;
        $user_profile->phone                = $request->phone;
        $user_profile->street_1             = $request->street_1;
        $user_profile->street_2             = $request->street_2;
        $user_profile->city                 = $request->city;
        $user_profile->state                = $request->state;
        $user_profile->zipcode              = $request->zipcode;
        $user_profile->country_id           = $request->country_id;
        $user_profile->address_id           = $request->address_id;
        $user_profile->language             = $request->language;
        $user_profile->save();
        return response()->json($user_profile);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
