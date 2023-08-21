<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;

class CourseLogRequest extends FormRequest{
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
            'log_document' => 'required|max:10',
            'log_document.*' => 'mimes:pdf,doc,docx,ppt,pptx,csv,xlsx,png,jpg,jpeg,gif|max:5120',
            'catalog_number' => 'required'
        ];
    }
    public function messages()
    {
        return [
            'log_document.max'=> 'Maximum 10 files allowed.'
        ];
    }
}