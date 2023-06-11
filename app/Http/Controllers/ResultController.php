<?php

namespace App\Http\Controllers;

use App\Http\Requests\ResultsRequest;
use App\Models\Result;
use App\Models\QuestionPapers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Storage;
use ZipArchive;

class ResultController extends BaseController
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
        $results=Result::join('question_papers','question_papers.id','=','results.paper_id')->join('courses','courses.id','=','question_papers.course_id')
        ->where('courses.id', '=', session('default_course'))
        ->select('results.*','question_papers.paper_type')->get();
        return view('results.index',compact('results'));
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
        return view('results.create',compact('question_papers'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ResultsRequest $request)
    {
        $request->validate([
            'title'=> 'required',
            'description' => 'required',
            ]);

        $result = new Result();
$this->saveAndUpdate($result,$request);
        return response()->json('Result successfully saved.',200);
    }

    private function saveAndUpdate($result,$request){
        $result->title = $request->title;
        $result->description = $request->description;
        $file_array= $this->UploadFile($request,'result_document');
        $result->document_path = json_encode($file_array);
        $result->paper_id = $request->paper_id;
        $result->save();

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
    
        return Response::download($file, 'Result.'.$extension, $headers);
    }
    $zip = new ZipArchive();
    $fileName = 'Results.zip';
    if ($zip->open(public_path($fileName), ZipArchive::CREATE)== TRUE)
    {
        $result=Result::findOrFail($id);

        $files = json_decode($result->document_path);
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
        $result=Result::findOrFail($id);
        return view('results.show',compact('result'))->render();
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
        $result=Result::findOrFail($id);
        return view('results.edit',compact('question_papers','result'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function update(ResultsRequest $request, $id)
    {
        $request->validate([
            'title'=> 'required',
            'description' => 'required',
            ]);
        $result = Result::findOrFail($id);
$this->saveAndUpdate($result,$request);
        return response()->json('Result successfully updated.',200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Result::destroy($id);
        return response()->json('Result successfully deleted.',200);
    }
}
