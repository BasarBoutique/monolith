<?php

namespace App\Http\Controllers;

use App\Models\Courses_Details;
use App\Http\Requests\StoreCourses_DetailsRequest;
use App\Http\Requests\UpdateCourses_DetailsRequest;

class CoursesDetailsController extends Controller
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
     * @param  \App\Http\Requests\StoreCourses_DetailsRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreCourses_DetailsRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Courses_Details  $courses_Details
     * @return \Illuminate\Http\Response
     */
    public function show(Courses_Details $courses_Details)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Courses_Details  $courses_Details
     * @return \Illuminate\Http\Response
     */
    public function edit(Courses_Details $courses_Details)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateCourses_DetailsRequest  $request
     * @param  \App\Models\Courses_Details  $courses_Details
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateCourses_DetailsRequest $request, Courses_Details $courses_Details)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Courses_Details  $courses_Details
     * @return \Illuminate\Http\Response
     */
    public function destroy(Courses_Details $courses_Details)
    {
        //
    }
}
