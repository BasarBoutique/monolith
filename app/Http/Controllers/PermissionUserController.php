<?php

namespace App\Http\Controllers;

use App\Models\Permission_User;
use App\Http\Requests\StorePermission_UserRequest;
use App\Http\Requests\UpdatePermission_UserRequest;

class PermissionUserController extends Controller
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
     * @param  \App\Http\Requests\StorePermission_UserRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorePermission_UserRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Permission_User  $permission_User
     * @return \Illuminate\Http\Response
     */
    public function show(Permission_User $permission_User)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Permission_User  $permission_User
     * @return \Illuminate\Http\Response
     */
    public function edit(Permission_User $permission_User)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatePermission_UserRequest  $request
     * @param  \App\Models\Permission_User  $permission_User
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatePermission_UserRequest $request, Permission_User $permission_User)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Permission_User  $permission_User
     * @return \Illuminate\Http\Response
     */
    public function destroy(Permission_User $permission_User)
    {
        //
    }
}
