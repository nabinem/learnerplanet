<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
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
		$course->trailer_storage_type = 'local';

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
		// return view('courses.show', [
		// 	'course' => $course,
		// ]);
		 return redirect()->route('courses.index');
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
			'thumbnail',
			'trailer_cover',
			'trailer',
			'trailer_ext_link'
		]));

		//upload course related images
		if (!empty($trailerThumb = $request->file('thumbnail'))) {
			$filePath = FileUploadHandler::uploadFile($trailerThumb, Course::IMAGES_DIR);
			!empty($course->thumbnail) && @unlink(public_path($course->thumbnail));
			$course->thumbnail = $filePath;
		}

		if (!empty($trailerCover = $request->file('trailer_cover'))) {
			$filePath = FileUploadHandler::uploadFile($trailerCover, Course::IMAGES_DIR);
			!empty($course->trailer_cover) && @unlink(public_path($course->trailer_cover));
			$course->trailer_cover = $filePath;
		}

		//upload course trailer video
		if ($request->input('trailer_storage_type') == 'local') {
			if (!empty($trailer = $request->file('trailer'))) {
				$filePath = FileUploadHandler::uploadFile($trailer, Course::VIDEOS_DIR);
				if (!empty($course->trailer)) {
					//delete older video
					@unlink(public_path($course->trailer));
				}
				$course->trailer = $filePath;
			}
		} else {
			$course->trailer =  $request->input('trailer_ext_link');
		}

		$course->user_id = auth()->id();

		return $course->save();
	}

	public function destroy(Course $course)
	{
		$this->authorize('delete courses');
		$course->delete();
		return redirect()->route('courses.index')->with('success', 'Course deleted successfully.');
	}

	public function deleteMedia(Request $request, Course $course, $mediaField)
	{
		if (!$course->canUserAccess()) abort(500);

		if (unlink(public_path($course->$mediaField))) {
			$course->$mediaField = null;
			$course->save();
		} else {
			abort(500, 'Error deleting image.');
		}

		return ['status' => 'success'];
	}
}
