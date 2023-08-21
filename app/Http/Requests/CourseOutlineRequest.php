<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;

class CourseOutlineRequest extends FormRequest{
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
            'course_id' => 'required',
            'course_type' => 'required',
            'credit_hours'=> 'required',
             'course_duration' => 'required',
             'weekly_tution_pattern'=> 'required',
             'course_structure'=> 'required',
             'course_style'=> 'required',
             'web_link'=> 'required',
             'teaching_team'=> 'required',
             'course_description'=> 'required',
             'slos'=> 'required',
             'tools_and_tech'=> 'required',
             'tentative_grading_policy'=> 'required',
             'attendance'=> 'required',
             'general_info'=> 'required',
        ];
    }
}