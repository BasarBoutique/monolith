<?php

namespace App\Http\Controllers;

use App\Models\Courses_Logs;
use App\Http\Requests\StoreCourses_LogsRequest;
use App\Http\Requests\UpdateCourses_LogsRequest;

class CoursesLogsController extends Controller
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
     * @param  \App\Http\Requests\StoreCourses_LogsRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreCourses_LogsRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Courses_Logs  $courses_Logs
     * @return \Illuminate\Http\Response
     */
    public function show(Courses_Logs $courses_Logs)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Courses_Logs  $courses_Logs
     * @return \Illuminate\Http\Response
     */
    public function edit(Courses_Logs $courses_Logs)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateCourses_LogsRequest  $request
     * @param  \App\Models\Courses_Logs  $courses_Logs
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateCourses_LogsRequest $request, Courses_Logs $courses_Logs)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Courses_Logs  $courses_Logs
     * @return \Illuminate\Http\Response
     */
    public function destroy(Courses_Logs $courses_Logs)
    {
        //
    }
}
