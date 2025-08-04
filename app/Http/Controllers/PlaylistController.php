<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Playlist;
use Illuminate\Http\Request;

class PlaylistController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create($courseId)
    {
        $course = Course::with('playlist')->findOrFail($courseId);
        $nextOrder = $course->playlist->count() + 1;

        return view('courses.playlist', compact('nextOrder', 'course'));
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, Course $course)
    {

        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'order' => 'required|integer',
        ]);

        Playlist::create([
            'course_id' => $course->id,
            'title' => $request->title,
            'description' => $request->description,
            'order' => $request->order,
        ]);

        return back()->with('success', 'Playlist created!');

    }

    /**
     * Display the specified resource.
     */
    public function show(playlist $playlist)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(playlist $playlist)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, playlist $playlist)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(playlist $playlist)
    {
        //
    }
}
