<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;

class AttendanceRequest extends FormRequest{
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
            'title' => 'required',
            'attendance_document.*' => 'mimes:pdf,doc,docx,ppt,pptx,csv,xlsx|max:5120',
            'attendance_document'=> 'required|max:10',
             'description' => 'required',
             'roll_no'=> 'required|numeric',
             'student_name'=> 'required',
             'activity_ref'=> 'required',
             'total_attendence'=> 'required|numeric',
             'total_absents'=> 'required|numeric',
             'percentage'=> 'required|numeric',
             'status'=> 'required',
        ];
    }
    public function messages()
    {
        return [
            'attendance_document'=> 'Maximum 10 files allowed.'
        ];
    }
}