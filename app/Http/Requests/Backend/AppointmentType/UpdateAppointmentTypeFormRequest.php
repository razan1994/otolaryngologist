<?php

namespace App\Http\Requests\Backend\AppointmentType;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class UpdateAppointmentTypeFormRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return Auth::check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name_ar' => 'required|string|max:255',
            'name_en' => 'required|string|max:255',
            'duration' => 'required|integer|min:5',
            'description_ar' => 'nullable|string',
            'description_en' => 'nullable|string',
            'status' => 'required|numeric',
        ];
    }

    public function messages()
    {
        return [
            'name_ar.required' => 'Name AR is Required',
            'name_ar.string' => 'Name AR must be a string',
            'name_ar.max' => 'Name AR must not exceed 255 characters',

            'name_en.required' => 'Name EN is Required',
            'name_en.string' => 'Name EN must be a string',
            'name_en.max' => 'Name EN must not exceed 255 characters',

            'duration.required' => 'Duration is Required',
            'duration.integer' => 'Duration must be an integer',
            'duration.min' => 'Duration must be at least 5 minutes',

            'description_ar.string' => 'Description AR must be a string',
            'description_en.string' => 'Description EN must be a string',

            'status.required' => 'Status is Required',
            'status.numeric' => 'Status must be numeric',
        ];
    }
}
