<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;

class CourseRequest extends FormRequest{
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
            'course_code' => 'required',
            'course_title' => 'required',
            'credit_hours' => 'required',
            'program'=> 'required',
            'effect_from_date'=> 'required',
  
        ];
    }
}