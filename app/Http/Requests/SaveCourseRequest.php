<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rules\File;

class SaveCourseRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        $course = $this->route('course');

        //create
        if (empty($course)) return true;

        return $course->canUserAccess();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'title' => 'required|max:100',
            'description' => 'required',
            'thumbnail' => ['nullable', File::image()->max('1mb')],
            'trailer' => [
                'nullable',
                'mimetypes:'.config('app.validVideoMimes'),
                'max:'.config('app.videoMaxUploadSize')
            ],
            'trailer_cover' => ['nullable', File::image()->max('1mb')],
        ];
    }


}
