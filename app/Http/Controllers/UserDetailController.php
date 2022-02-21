<?php

namespace App\Http\Controllers;

use App\Models\User_Detail;
use App\Http\Requests\StoreUser_DetailRequest;
use App\Http\Requests\UpdateUser_DetailRequest;

class UserDetailController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
     * @param  \App\Http\Requests\StoreUser_DetailRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreUser_DetailRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\User_Detail  $user_Detail
     * @return \Illuminate\Http\Response
     */
    public function show(User_Detail $user_Detail)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\User_Detail  $user_Detail
     * @return \Illuminate\Http\Response
     */
    public function edit(User_Detail $user_Detail)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateUser_DetailRequest  $request
     * @param  \App\Models\User_Detail  $user_Detail
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateUser_DetailRequest $request, User_Detail $user_Detail)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User_Detail  $user_Detail
     * @return \Illuminate\Http\Response
     */
    public function destroy(User_Detail $user_Detail)
    {
        //
    }
}
