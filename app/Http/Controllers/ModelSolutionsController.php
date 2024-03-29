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
use Illuminate\Database\Events\ModelsPruned;
use ZipArchive;
use PDF;

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
        $model_solutions=ModelSolutions::join('courses','courses.id','=','model_solutions.course_id')
        ->where('courses.id', '=', session('default_course'))
        ->select('model_solutions.*')->get();
        return view('model-solutions.index',compact('model_solutions'));
    }

    public function downloadPDF($id)
{
    $solution=ModelSolutions::findOrFail($id);

    $dynamicData = [
        'title' => 'Abbottabad University of Science & Technology',
        'content' => 'Ph:+92 992-811720                      Email: info@aust.edu.pk                Address: Havelian, KPK, Pakistan',
        'solution' => $solution,  
    ];


    $pdf = Pdf::loadView('model-solutions/modelsolutionspdf', $dynamicData);


    return $pdf->download('Model Solution.pdf');

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
        ->where('courses.id','=',session('default_course'))->select('question_papers.*')->get();


        return view('model-solutions.create',compact('question_papers'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ModelSolutionsRequest $request)
    {

        $solution = new ModelSolutions();
$this->saveAndUpdate($solution,$request);
        return response()->json('Solution successfully saved.',200);
    }

    private function saveAndUpdate($solution,$request){
         $solution->solution_type = $request->solution_type;
        $solution->description = $request->description;
        $file_array= $this->UploadFile($request,'solutions_document');
        $solution->document_path = json_encode($file_array);

        $solution->course_id = $request->course_id;
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
        ->where('courses.id','=',session('default_course'))->select('question_papers.*')->get();
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
