<?php

namespace App\Http\Controllers;

use App\Http\Requests\LectureNotesRequest;
use App\Models\Course;
use App\Models\LectureNotes;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Storage;
use ZipArchive;
use PDF;


class LectureNotesController extends BaseController
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
            $lecture_notes = LectureNotes::join('courses', 'courses.id', '=', 'lecture_notes.course_id')->
            where('courses.id', '=', session('default_course'))
            ->select('lecture_notes.*', 'courses.course_title')->get();

        return view('lecture-notes.index', compact('lecture_notes'));
        //
    }

    
    public function downloadPDF($id)
{
    $lecture_notes=LectureNotes::findOrFail($id);

    $dynamicData = [
        'title' => 'PDF Data',
        'content' => 'This is PDF content.',
        'lecture_notes' => $lecture_notes,  
    ];
 

    $pdf = Pdf::loadView('lecture-notes/lecturenotespdf', $dynamicData);


    return $pdf->download('Lecture Notes.pdf');

}
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //$courses = Course::where('user_id', '=', $this->user->id)->get();
        // $courses = Course::join('teacher_courses', 'courses.id', '=', 'teacher_courses.course_id')
        // //->join('teachers', 'teachers.id', '=', 'teacher_courses.id')
        // ->where('teachers.user_id', '=', auth()->user()->id)->get();
        //->select('lecture-notes.*','courses.course_title')->get();
        return view('lecture-notes.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(LectureNotesRequest $request)
    {
      
       
        $note = new LectureNotes();
$this->saveAndUpdate($note,$request);
        return response()->json('Note successfully saved.', 200);
    }
    private function saveAndUpdate($note,$request){
        $note->lecture_number = $request->lecture_number;
        $note->topic = $request->topic;
        $note->description = $request->description;
       $file_array= $this->UploadFile($request,'notes_document');
        $note->notes_path = json_encode($file_array);
        $note->course_id = $request->course_id;
        $note->save();
    }
    public function Print($id,Request $request)
    {
        // if($request->has('document')){
        //     $file_path = $request->query('document');
        //     $id=\Printing::printers();
        //     dd($id);
        //     $printJob = \Printing::newPrintTask()
        //     ->printer()
        //     ->file(storage_path(). "/app/files/".$file_path)
        //     ->send();

        //     $printJob->id();
            // return response()->file( storage_path(). "/app/files/".$file_path);
    //  }
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
    
        return Response::download($file, 'Note.'.$extension, $headers);
    }
    $zip = new \ZipArchive();
    $fileName = 'Notes.zip';
    if ($zip->open(public_path($fileName), \ZipArchive::CREATE)== TRUE)
    {
        $note=LectureNotes::findOrFail($id);

        $files = json_decode($note->notes_path);
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
        $lecture_notes = LectureNotes::findOrFail($id);
        return view('lecture-notes.show', compact('lecture_notes'))->render();
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Course  $course
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
       // $courses = Course::where('user_id', '=', $this->user->id)->get();
 
        $lecture_notes = LectureNotes::findOrFail($id);
        return view('lecture-notes.edit', compact('lecture_notes'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function update(LectureNotesRequest $request, $id)
    {
       
        $note = LectureNotes::findOrFail($id);
        $this->saveAndUpdate($note,$request);
        return response()->json('Note successfully updated.', 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        LectureNotes::destroy($id);
        return response()->json('Note successfully deleted.', 200);
    }
}
