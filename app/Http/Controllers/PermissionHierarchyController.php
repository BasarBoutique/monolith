<?php

namespace App\Http\Controllers;

use App\Models\Permission_Hierarchy;
use App\Http\Requests\StorePermission_HierarchyRequest;
use App\Http\Requests\UpdatePermission_HierarchyRequest;

class PermissionHierarchyController extends Controller
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
     * @param  \App\Http\Requests\StorePermission_HierarchyRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorePermission_HierarchyRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Permission_Hierarchy  $permission_Hierarchy
     * @return \Illuminate\Http\Response
     */
    public function show(Permission_Hierarchy $permission_Hierarchy)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Permission_Hierarchy  $permission_Hierarchy
     * @return \Illuminate\Http\Response
     */
    public function edit(Permission_Hierarchy $permission_Hierarchy)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatePermission_HierarchyRequest  $request
     * @param  \App\Models\Permission_Hierarchy  $permission_Hierarchy
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatePermission_HierarchyRequest $request, Permission_Hierarchy $permission_Hierarchy)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Permission_Hierarchy  $permission_Hierarchy
     * @return \Illuminate\Http\Response
     */
    public function destroy(Permission_Hierarchy $permission_Hierarchy)
    {
        //
    }
}
