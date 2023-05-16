<?php

namespace App\Http\Controllers;

use App\Http\Requests\CourseLogRequest;
use App\Http\Requests\CourseOutlineRequest;
use App\Models\Course;
use App\Models\CourseLog;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use App\Models\Result;
use App\Http\Controllers\Response;

class CourseLogController extends BaseController
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
        $course_logs=CourseLog::join('courses','courses.id','=','course_logs.course_id')->where('courses.user_id','=',$this->user->id)
        ->select('course_logs.*','courses.course_title')->get();
        return view('course-log.index',compact('course_logs'));
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
        ->where('teachers.user_id', '=', auth()->user()->id)->get();
        return view('course-log.create',compact('courses'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CourseLogRequest $request)
    {
        $outline = new CourseLog;
        $this->saveAndUpdate($request,$outline);
        return response()->json('Log successfully created.',200);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Course  $course
     * @return \Illuminate\Http\Response
     */
     public function show($id)
    {
        $log=CourseLog::findOrFail($id);
        return view('course-log.show',compact('log'))->render();
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
        $log=CourseLog::findOrFail($id);
        return view('course-log.edit',compact('log','courses'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Course  $course
     * @return \Illuminate\Http\Response
     */
    public function update(CourseLogRequest $request, $id)
    {
        $log = CourseLog::findOrFail($id);
   $this->saveAndUpdate($request,$log);
        return response()->json('Log successfully updated.',200);
    }
private function saveAndUpdate($request,$log){
    $log->date = $request->date;
    $log->topics_covered = $request->topics_covered;
    $log->duration = $request->duration;
    // $log->duration_unit = $request->duration_unit;
    $log->evaluation_instruments = $request->evaluation_instruments;
    $log->course_id = $request->course_id;
    $file_array=$this->UploadFile($request,'log_document');
    $log->signature = json_encode($file_array);
    

    /** 
     * $file_array = $this->UploadFile($request,'best_file');
    *$log->best_file = json_encode($file_array);

    *$file_array = $this->UploadFile($request,'avg_file');
    *$log->avg_file = json_encode($file_array);

    *$file_array = $this->UploadFile($request,'worst_file');
    *$log->worst_file = json_encode($file_array);
     * 
     * 
    */
    $log->save();
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
    
        return Response::download($file, 'Signature.'.$extension, $headers);
    }
    $zip = new ZipArchive();
    $fileName = 'Signature.zip';
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
     * Remove the specified resource from storage.
     *
     * @param  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        CourseLog::destroy($id);
        return response()->json('Log successfully deleted.',200);
    }
}
