<?php

namespace App\Http\Controllers;

use App\Models\Permission_Log;
use App\Http\Requests\StorePermission_LogRequest;
use App\Http\Requests\UpdatePermission_LogRequest;

class PermissionLogController extends Controller
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
     * @param  \App\Http\Requests\StorePermission_LogRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorePermission_LogRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Permission_Log  $permission_Log
     * @return \Illuminate\Http\Response
     */
    public function show(Permission_Log $permission_Log)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Permission_Log  $permission_Log
     * @return \Illuminate\Http\Response
     */
    public function edit(Permission_Log $permission_Log)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatePermission_LogRequest  $request
     * @param  \App\Models\Permission_Log  $permission_Log
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatePermission_LogRequest $request, Permission_Log $permission_Log)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Permission_Log  $permission_Log
     * @return \Illuminate\Http\Response
     */
    public function destroy(Permission_Log $permission_Log)
    {
        //
    }
}
