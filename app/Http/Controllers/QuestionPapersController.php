<?php

namespace App\Http\Controllers;

use App\Http\Requests\QuestionPapersRequest;
use App\Models\Course;
use App\Models\QuestionPapers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Storage;
use ZipArchive;

class QuestionPapersController extends BaseController
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
  parent::__construct();
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $question_papers=QuestionPapers::join('courses','courses.id','=','question_papers.course_id')
        ->where('courses.id', '=', session('default_course'))
        ->select('question_papers.*','courses.course_title')->get();
        return view('question-papers.index',compact('question_papers'));
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //$courses=Course::where('user_id','=',$this->user->id)->get();
        $courses = Course::join('teacher_courses', 'courses.id', '=', 'teacher_courses.course_id')
        ->join('teachers', 'teachers.id', '=', 'teacher_courses.id')
        ->where('teachers.user_id', '=', auth()->user()->id)
        ->select('question_papers.*','courses.course_title')->get();
        return view('question-papers.create',compact('courses'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(QuestionPapersRequest $request)
    {
      
        $request->validate([
            'paper_type'=> 'required',
            'description' => 'required',
            ]);
            
        $paper = new QuestionPapers();
        $this->saveAndUpdate($paper,$request);
        return response()->json('Paper successfully saved.',200);
    }

    public function Download($id,Request $request)
    {
        if($request->has('document')){
            $file_path=$request->query('document');
        $file= storage_path(). "/app/files/".$file_path;
        $mimeType = File::mimeType($file);
        $extension = File::extension($file);
        $headers = [
            'Content-Type' => $mimeType
        ];
    
        return Response::download($file, 'Paper.'.$extension, $headers);
    }
    $zip = new ZipArchive();
    $fileName = 'Papers.zip';
    if ($zip->open(public_path($fileName), ZipArchive::CREATE)== TRUE)
    {
        $paper=QuestionPapers::findOrFail($id);

        $files = json_decode($paper->document_path);
        foreach ($files as $key => $value){
            $file= storage_path(). "/app/files/".$value->path;
            $zip->addFile($file, $value->name);
        }
        $zip->close();
    }

    return response()->download(public_path($fileName));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Course  $course
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $question_papers=QuestionPapers::findOrFail($id);
        return view('question-papers.show',compact('question_papers'))->render();
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Course  $course
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //$courses=Course::where('user_id','=',$this->user->id)->get();
        $courses = Course::join('teacher_courses', 'courses.id', '=', 'teacher_courses.course_id')
        ->join('teachers', 'teachers.id', '=', 'teacher_courses.id')
        ->where('teachers.user_id', '=', auth()->user()->id)->get();
        $question_papers=QuestionPapers::findOrFail($id);
        return view('question-papers.edit',compact('question_papers','courses'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function update(QuestionPapersRequest $request, $id)
    {
        $request->validate([
            'paper_type'=> 'required',
            'description' => 'required',
            ]);
            
        $paper = QuestionPapers::findOrFail($id);
      $this->saveAndUpdate($paper,$request);
        return response()->json('Paper successfully updated.',200);
    }

    private function saveAndUpdate($paper,$request){
        $paper->paper_type = $request->paper_type;
        $paper->description = $request->description;
      $file_array=$this->UploadFile($request,'papers_document');
        $paper->document_path = json_encode($file_array);
        $paper->course_id = $request->course_id;
        $paper->save();
      
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        QuestionPapers::destroy($id);
        return response()->json('Paper successfully deleted.',200);
    }
}
