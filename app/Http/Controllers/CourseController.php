<?php

namespace App\Http\Controllers;

use App\Http\Requests\SaveCourseRequest;
use Illuminate\Http\Request;
use App\Models\Course;
use Exception;
use App\Libs\FileUploadHandler;
use App\Models\Category;

class CourseController extends Controller
{
	
	public function index(Request $request)
	{
		$courses = Course::where('user_id', $request->user()->id)
			->orderBy('created_at', 'desc')
			->with('category')
			->get();

		return view('courses.index', [
			'courses' => $courses,
		]);
	}
	
	public function create()
	{
		$course = new Course;

		return view('courses.add_edit_form', [
			'course' => $course,
			'categories' => Category::getIdNameList()
		]);
	}

	public function store(SaveCourseRequest $request)
	{
		try {
			$this->uploadSave($request);
		} catch (Exception $ex) {
			return redirect()->back()->with('error', $ex->getMessage());
		}

		return redirect()->route('courses.index')->with('success', 'Course created successfully');
	}

	public function show(Course $course)
	{
		return view('courses.show', [
			'course' => $course,
		]);
	} 

	public function edit(Course $course)
	{
		return view('courses.add_edit_form', [
			'course' => $course,
			'categories' => Category::getIdNameList()
		]);
	}

	public function update(SaveCourseRequest $request, Course $course)
	{
		try {
			$this->uploadSave($request, $course);
		} catch (Exception $ex) {
			return redirect()->back()->with('error', $ex->getMessage());
		}

		return redirect()->route('courses.index')->with('success', 'Course updated successfully');
	}

	public function uploadSave($request, $course = null)
	{
		set_time_limit(0);
        ini_set('memory_limit', '-1');

		$course ??= new Course;

		$course->fill($request->except([
			'thumbnail', 'trailer', 'trailer_cover'
		]));

		//upload course related images
		if (!empty($trailer = $request->file('thumbnail'))){
			$filePath = FileUploadHandler::uploadFile($trailer, Course::IMAGES_DIR);
			!empty($course->thumbnail) && @unlink(public_path($course->thumbnail));
            $course->thumbnail = $filePath;
        }

		if (!empty($trailer = $request->file('trailer_cover'))){
			$filePath = FileUploadHandler::uploadFile($trailer, Course::IMAGES_DIR);
			!empty($course->trailer_cover) && @unlink(public_path($course->trailer_cover));
            $course->trailer_cover = $filePath;
        }

		//upload course trailer video
		if (!empty($trailer = $request->file('trailer'))){
			$filePath = FileUploadHandler::uploadFile($trailer, Course::VIDEOS_DIR);
			if (!empty($course->trailer) && $course->trailer_storage_type == 'local'){
				@unlink(public_path($course->trailer));
			}
            $course->trailer = $filePath;
        }

		$course->user_id = auth()->id();

		return $course->save();
	}

	public function destroy(string $id)
	{
		//
	}

}
