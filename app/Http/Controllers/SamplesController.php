<?php

namespace App\Http\Controllers;

use App\Http\Requests\SamplesRequest;
use App\Models\QuestionPapers;
use App\Models\Samples;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Storage;
use App\Models\Course;
use ZipArchive;
use PDF;

class SamplesController extends BaseController
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
        $user_id=$this->user->id;
        $samples=Samples::join('courses','courses.id','=','samples.course_id')
        ->where('courses.id', '=', session('default_course'))
        ->select('samples.*')->get();
        return view('samples.index',compact('samples'));
    }


    public function downloadPDF($id)
{

    $sample=Samples::findOrFail($id);
        

    $dynamicData = [
        'title' => '',
        'content' => '',
        'sample' => $sample,
    ];


    $pdf = PDF::loadView('samples/samplespdf', $dynamicData);


    return $pdf->download('Sample.pdf');

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
        ->where('courses.user_id','=',$this->user->id)
        ->select('question_papers.*')
        ->get();
        return view('samples.create',compact('question_papers'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(SamplesRequest $request)
    {
        $sample = new Samples();
       $this->saveAndUpdate($sample,$request);
        return response()->json('Sample successfully saved.',200);
    }

private function saveAndUpdate($sample,$request){
    // $sample->title = $request->title;
    $sample->sample_type = $request->sample_type;
    $sample->description = $request->description;
    $file_array=$this->UploadFile($request,'samples_document');
    $sample->document_path = json_encode($file_array);
    $sample->course_id = $request->course_id;

    // $file_array = $this->UploadFile($request,'best_file');
    // $sample->best_file = json_encode($file_array);

    // $file_array = $this->UploadFile($request,'avg_file');
    // $sample->avg_file = json_encode($file_array);

    // $file_array = $this->UploadFile($request,'worst_file');
    // $sample->worst_file = json_encode($file_array);



    $sample->save();
   
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
    
        return Response::download($file, 'Sample.'.$extension, $headers);
    }
    $zip = new ZipArchive();
    $fileName = 'Samples.zip';
    if ($zip->open(public_path($fileName), ZipArchive::CREATE)== TRUE)
    {
        $sample=Samples::findOrFail($id);

        $files = json_decode($sample->document_path);
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

     public function downloadBest($id,Request $request)
     {
         if($request->has('document')){
             $file_path=$request->query('document');
         $file= storage_path(). "/app/files/".$file_path;
         $mimeType = File::mimeType($file);
         $extension = File::extension($file);
         $headers = [
             'Content-Type' => $mimeType
         ];
     
         return Response::download($file, 'BestSample.'.$extension, $headers);
     }
     $zip = new ZipArchive();
     $fileName = 'BestSample.zip';
     if ($zip->open(public_path($fileName), ZipArchive::CREATE)== TRUE)
     {
         $sample=Samples::findOrFail($id);
 
         $files = json_decode($sample->document_path);
         foreach ($files as $key => $value){
             $file= storage_path(). "/app/files/".$value->path;
             $zip->addFile($file, $value->name);
         }
         $zip->close();
     }
 
     return response()->download(public_path($fileName));
     }



     public function downloadAvg($id,Request $request)
     {
         if($request->has('document')){
             $file_path=$request->query('document');
         $file= storage_path(). "/app/files/".$file_path;
         $mimeType = File::mimeType($file);
         $extension = File::extension($file);
         $headers = [
             'Content-Type' => $mimeType
         ];
     
         return Response::download($file, 'AvgSample.'.$extension, $headers);
     }
     $zip = new ZipArchive();
     $fileName = 'AvgSample.zip';
     if ($zip->open(public_path($fileName), ZipArchive::CREATE)== TRUE)
     {
         $sample=Samples::findOrFail($id);
 
         $files = json_decode($sample->document_path);
         foreach ($files as $key => $value){
             $file= storage_path(). "/app/files/".$value->path;
             $zip->addFile($file, $value->name);
         }
         $zip->close();
     }
 
     return response()->download(public_path($fileName));
     }


     public function downloadWorst($id,Request $request)
     {
         if($request->has('document')){
             $file_path=$request->query('document');
         $file= storage_path(). "/app/files/".$file_path;
         $mimeType = File::mimeType($file);
         $extension = File::extension($file);
         $headers = [
             'Content-Type' => $mimeType
         ];
     
         return Response::download($file, 'WorstSample.'.$extension, $headers);
     }
     $zip = new ZipArchive();
     $fileName = 'WorstSample.zip';
     if ($zip->open(public_path($fileName), ZipArchive::CREATE)== TRUE)
     {
         $sample=Samples::findOrFail($id);
 
         $files = json_decode($sample->document_path);
         foreach ($files as $key => $value){
             $file= storage_path(). "/app/files/".$value->path;
             $zip->addFile($file, $value->name);
         }
         $zip->close();
     }
 
     return response()->download(public_path($fileName));
     }

     public function downloadSignature($id,Request $request)
     {
         if($request->has('document')){
             $file_path=$request->query('document');
         $file= storage_path(). "/app/files/".$file_path;
         $mimeType = File::mimeType($file);
         $extension = File::extension($file);
         $headers = [
             'Content-Type' => $mimeType
         ];
     
         return Response::download($file, 'Sample.'.$extension, $headers);
     }
     $zip = new ZipArchive();
     $fileName = 'Samples.zip';
     if ($zip->open(public_path($fileName), ZipArchive::CREATE)== TRUE)
     {
         $sample=Samples::findOrFail($id);
 
         $files = json_decode($sample->document_path);
         foreach ($files as $key => $value){
             $file= storage_path(). "/app/files/".$value->path;
             $zip->addFile($file, $value->name);
         }
         $zip->close();
     }
 
     return response()->download(public_path($fileName));
     }





    public function show($id)
    {
        $sample=Samples::findOrFail($id);
        return view('samples.show',compact('sample'))->render();
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
        ->where('courses.user_id','=',$this->user->id)
        ->select('question_papers.*')
        ->get();
        $sample=Samples::findOrFail($id);
        return view('samples.edit',compact('question_papers','sample'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function update(SamplesRequest $request, $id)
    {
       
        $sample = Samples::findOrFail($id);
        $this->saveAndUpdate($sample,$request);
        return response()->json('Sample successfully updated.',200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Samples::destroy($id);
        return response()->json('Sample successfully deleted.',200);
    }
}
