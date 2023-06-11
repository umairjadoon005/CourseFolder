<?php

namespace App\Http\Controllers;

use App\Http\Requests\ModelSolutionsRequest;
use App\Models\ModelSolutions;
use App\Models\QuestionPapers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Storage;
use App\Models\Course;
use ZipArchive;

class ModelSolutionsController extends BaseController
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
        $model_solutions=ModelSolutions::join('question_papers','question_papers.id','=','model_solutions.paper_id')->join('courses','courses.id','=','question_papers.course_id')
        ->where('courses.id', '=', session('default_course'))
        ->select('model_solutions.*','question_papers.paper_type')->get();
        return view('model-solutions.index',compact('model_solutions'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $user_id= $this->user->id;
        $question_papers=QuestionPapers::join('courses','courses.id','=','question_papers.course_id')
        ->where('courses.user_id','=',$this->user->id)->select('question_papers.*')->get();

        $courses = Course::join('teacher_courses', 'courses.id', '=', 'teacher_courses.course_id')
        ->join('teachers', 'teachers.id', '=', 'teacher_courses.id')
        ->where('teachers.user_id', '=', auth()->user()->id)->get();

        return view('model-solutions.create',compact('question_papers','courses'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ModelSolutionsRequest $request)
    {
        $request->validate([
            'title'=> 'required',
            'description' => 'required',
 
            ]);

        $solution = new ModelSolutions();
$this->saveAndUpdate($solution,$request);
        return response()->json('Solution successfully saved.',200);
    }

    private function saveAndUpdate($solution,$request){
        $solution->title = $request->title;
        $solution->description = $request->description;
        $file_array= $this->UploadFile($request,'solutions_document');
        $solution->document_path = json_encode($file_array);
        $solution->paper_id = $request->paper_id;
        $solution->save();

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
    
        return Response::download($file, 'Solution.'.$extension, $headers);
    }
    $zip = new ZipArchive();
    $fileName = 'Solutions.zip';
    if ($zip->open(public_path($fileName), ZipArchive::CREATE)== TRUE)
    {
        $solution=ModelSolutions::findOrFail($id);

        $files = json_decode($solution->document_path);
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
        $solution=ModelSolutions::findOrFail($id);
        return view('model-solutions.show',compact('solution'))->render();
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Course  $course
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $question_papers=QuestionPapers::join('courses','courses.id','=','question_papers.course_id')
        ->where('courses.user_id','=',$this->user->id)->select('question_papers.*')->get();
        $courses = Course::join('teacher_courses', 'courses.id', '=', 'teacher_courses.course_id')
        ->join('teachers', 'teachers.id', '=', 'teacher_courses.id')
        ->where('teachers.user_id', '=', auth()->user()->id)->get();
        $solution=ModelSolutions::findOrFail($id);
        return view('model-solutions.edit',compact('question_papers','solution'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function update(ModelSolutionsRequest $request, $id)
    {
        $request->validate([
            'title'=> 'required',
            'description' => 'required',
 
            ]);
            
        $solution = ModelSolutions::findOrFail($id);
$this->saveAndUpdate($solution,$request);
        return response()->json('Solution successfully updated.',200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        ModelSolutions::destroy($id);
        return response()->json('Solution successfully deleted.',200);
    }
}
