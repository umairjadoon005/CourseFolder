<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;

class ModelSolutionsRequest extends FormRequest{
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
            'paper_id' => 'required',
            'title' => 'required',
            'solutions_document.*' => 'mimes:pdf,doc,docx,ppt,pptx,csv,xlsx|max:5120',
          'solutions_document' => 'required|max:10',
            'description' => 'required',
        ];
    }
    public function messages()
    {
        return [
            'solutions_document'=> 'Maximum 10 files allowed.'
        ];
    }
}