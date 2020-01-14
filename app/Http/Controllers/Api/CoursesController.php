<?php

namespace App\Http\Controllers\Api;


use App\Course;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CoursesController extends Controller
{

    public function index()
    {

        return Course::select(['id','course_name'])->get();
    }


    public function create()
    {
        //
    }


    public function store(Request $request)
    {
        //
    }


    public function show(Course $course)
    {
        //
    }


    public function edit(Course $course)
    {
        //
    }


    public function update(Request $request, Course $course)
    {
        //
    }


    public function destroy(Course $course)
    {
        //
    }
}
