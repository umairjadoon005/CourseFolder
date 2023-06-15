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
            'date' => 'required',
        
            'log_document' => 'required|max:1',
    'lolg_document.*' => 'mimes:pdf,doc,docx,ppt,pptx,csv,xlsx,png,jpg,jpeg,gif|max:5120',
    'course_title' => 'required',
    'catalog_number' => 'required',
    
    'duration'=> 'required',
    'topics_covered'=> 'required',
    'evaluation_instruments'=> 'required',
        ];
    }
    public function messages()
    {
        return [
            'notes_document.max'=> 'Maximum 1 files allowed.'
        ];
    }
}