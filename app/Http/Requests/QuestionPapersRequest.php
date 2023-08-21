<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;

class QuestionPapersRequest extends FormRequest{
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
            'paper_type' => 'required',
            'papers_document.*' => 'mimes:pdf,doc,docx,ppt,pptx,csv,xlsx|max:5120',
            'papers_document'=> 'required|max:10',
            'description' => 'required',
        ];
    }
    public function messages()
    {
        return [
            'papers_document'=> 'Maximum 10 files allowed.'
        ];
    }
}