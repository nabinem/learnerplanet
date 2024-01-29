<?php

namespace App\Http\Controllers;

use App\Http\Requests\SaveCourseRequest;
use Illuminate\Http\Request;
use App\Models\Course;
use Illuminate\Support\Facades\Validator;

class CourseController extends Controller
{
    
    public function index()
    {
        return view('courses.index');
    }
    
    public function create()
    {
        $course = new Course;

        return view('courses.create', ['course' => $course]);
    }

    public function store(SaveCourseRequest $request)
    {
        dd($request->all());
    }

    public function show(string $id)
    {
        //
    }

    public function edit(string $id)
    {
        //
    }

    public function update(SaveCourseRequest $request, string $id)
    {
        //
    }

    public function destroy(string $id)
    {
        //
    }

}
