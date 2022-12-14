<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CourseUpdateRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        $uuid = $this->course??null;
        return [
            'name'=>['required', 'min:3', 'max:255', 'unique:courses,name,{$uuid},uuid'],
            'description'=>['nullable', 'min:3', 'max:9999']
        ];
    }
}
