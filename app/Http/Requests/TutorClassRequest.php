<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TutorClassRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'link' => 'required|active_url',
            'name' => 'required',
            'major_id' => 'exists:majors,id',
            'course_id' => 'exists:courses,id',
            'price' => 'required|integer|regex:/^[1-9]+[0-9]*000$/',
            'date' => 'required|date_format:Y-m-d|after:' . date('Y-m-d'),
            'start_time' => 'required|date_format:H:i',
            'end_time' => 'required|date_format:H:i|after:start_time',
            'minimum_person' => 'required|integer',
            'maximum_person' => 'required|integer|gt:minimum_person',
            'description' => 'required|string',
            'requirement' => 'required|array|min:1',
            'requirement.*' => 'required|string|distinct',
        ];
    }
}
