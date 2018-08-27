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
        $user_profile = User::select(
            'id as Id', 
            'name as Name', 
            'email as Email', 
            'date_of_birth as Dob', 
            'phone as Phone',
            'address as Address',
            'city as City',
            'state as State',
            'zipcode as ZipCode',
            'country_id as CountryId',
            'identity_type as IdType'
        )->get();
       
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
        $user_profile = User::where('id', '=', $id)->select(
            'id as Id', 
            'name as Name', 
            'email as Email', 
            'date_of_birth as Dob', 
            'phone as Phone',
            'address as Address',
            'city as City',
            'state as State',
            'zipcode as ZipCode',
            'country_id as CountryId',
            'identity_type as IdType',
            'created_at as CreatedAt',
            'updated_at as UpdatedAt'
        )->get();
       
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
        $user_profile->name                 = $request->Name;
        $user_profile->phone           = $request->input('Phone');
        $user_profile->city                = $request->input('City');
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
