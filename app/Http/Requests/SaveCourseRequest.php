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
        return true;
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
                //'mimes:mp4',
                'mimetypes:video/mp4,video/quicktime,video/avi,video/mov,video/ogg,video/flv,video/x-flv,video/mpeg,video/x-msvideo,application/octet-stream,video/x-msvideo,video/x-ms-wmv,application/x-mpegURL',
            ],
            'trailer_cover' => ['nullable', File::image()->max('1mb')],
        ];
    }

    public function messages()
    {
        return [
            'trailer.mimetypes' => 'Invalid Video File'
        ];
    }


}
