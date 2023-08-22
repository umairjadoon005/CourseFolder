<?php

namespace App\Http\Controllers;

use App\Http\Requests\AttendanceRequest;
use App\Models\Course;
use App\Models\Attendance;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Storage;
use ZipArchive;
use PDF;

class AttendanceController extends BaseController
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
        $attendances=Attendance::join('courses','courses.id','=','attendances.course_id')
        ->where('courses.id', '=', session('default_course'))
        ->select('attendances.*','courses.course_title')
        ->select('attendances.*','courses.course_title')->get();
        return view('attendance.index',compact('attendances'));
        //
    }

    public function downloadPDF($id)
{
    $attendance=Attendance::findOrFail($id);

    $dynamicData = [
        'title' => 'PDF Data',
        'content' => 'This is PDF content.',
        'attendance' => $attendance,  
    ];
 

    $pdf = Pdf::loadView('attendance/attendancepdf', $dynamicData);


    return $pdf->download('Attendance.pdf');

}
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
     
        return view('attendance.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(AttendanceRequest $request)
    {
 
        $attendance = new Attendance();
        $this->saveAndUpdate($attendance,$request);
        return response()->json('Attendance successfully saved.',200);
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
    
        return Response::download($file, 'Attendance.'.$extension, $headers);
    }
    $zip = new ZipArchive();
    $fileName = 'Attendances.zip';
    if ($zip->open(public_path($fileName), ZipArchive::CREATE)== TRUE)
    {
        $attendance=Attendance::findOrFail($id);

        $files = json_decode($attendance->document_path);
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
        $attendance=Attendance::findOrFail($id);
        return view('attendance.show',compact('attendance'))->render();
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
   
        $attendance=Attendance::findOrFail($id);
        return view('attendance.edit',compact('attendance'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function update(AttendanceRequest $request, $id)
    {

        $attendance = Attendance::findOrFail($id);
      $this->saveAndUpdate($attendance,$request);
        return response()->json('Attendance successfully updated.',200);
    }

    private function saveAndUpdate($attendance,$request){
        $attendance->course_id = $request->course_id;
        $attendance->title = $request->title;
        $attendance->description = $request->description;
        $attendance->roll_no = $request->roll_no;
        $attendance->student_name = $request->student_name;
        $attendance->activity_ref = $request->activity_ref;
        $attendance->total_attendence = $request->total_attendence;
        $attendance->total_absents = $request->total_absents;
        $attendance->percentage = $request->percentage;
        $attendance->status = $request->status;

        $file_array=$this->UploadFile($request,'attendance_document');
        $attendance->document_path = json_encode($file_array);
        
        $attendance->save();
      
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Attendance::destroy($id);
        return response()->json('Attendance successfully deleted.',200);
    }
}
