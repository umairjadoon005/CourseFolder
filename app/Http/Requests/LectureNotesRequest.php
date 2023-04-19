<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;

class LectureNotesRequest extends FormRequest{
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
            'lecture_number' => 'required',
            'topic' => 'required',
            'notes_document' => 'required|max:5',
    'notes_document.*' => 'mimes:pdf,doc,docx,ppt,pptx,csv,xlsx|max:5120'
        ];
    }
    public function messages()
    {
        return [
            'notes_document.max'=> 'Maximum 5 files allowed.'
        ];
    }
}