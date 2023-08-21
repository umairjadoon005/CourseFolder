<?php

namespace App\Http\Controllers;
use App\Models\Course;
use App\Models\LectureNotes;
use App\Models\QuestionPapers;
use App\Models\ModelSolutions;
use Illuminate\Http\Request;
use App\Http\Requests\UserRequest;
use Illuminate\Support\Facades\Auth;

class HomeController extends BaseController
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
public function settings(){
    $user=$this->user;
    return view('profile',compact('user'));
}
public function store(UserRequest $request){
$user= Auth::user();
$user->name=$request->name;
$user->email=$request->email;
$profile_pic=$this->UploadFile($request,'profile_picture');
$pic=reset($profile_pic);
$user->profile_picture=$profile_pic['key'];
$logo=$this->UploadFile($request,'logo');
$logo=reset($logo);
$user->logo=$logo['key'];
$user->save();
return response()->json('Profile updated successfully.',200);
}
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
$lastWeek = \Carbon\Carbon::now()->subWeek();
$total_courses=Course::where('user_id','=',$this->user->id)->count();
$total_notes=LectureNotes::join('courses','courses.id','=','lecture_notes.course_id')
->where('courses.user_id','=',$this->user->id)->count();
$total_solutions=ModelSolutions::
join('courses','courses.id','=','model_solutions.course_id')
->where('courses.user_id','=',$this->user->id)->count();
$total_papers=QuestionPapers::join('courses','courses.id','=','question_papers.course_id')
->where('courses.user_id','=',$this->user->id)->count();
$course_count = Course::whereDate('created_at', '>=', $lastWeek)
->where('user_id',$this->user->id)
->groupBy(\DB::raw("DATE(created_at)"))
->get([
    \DB::raw('DATE(created_at) as date'),
    \DB::raw('COUNT(*) as count')
])
->toJson();
$notes_count = LectureNotes::join('courses','courses.id','=','lecture_notes.course_id')
->where('courses.user_id',$this->user->id)
->whereDate('lecture_notes.created_at', '>=', $lastWeek)
->groupBy(\DB::raw("DATE(lecture_notes.created_at)"))
->get([
    \DB::raw('DATE(lecture_notes.created_at) as date'),
    \DB::raw('COUNT(*) as count')
])
->toJson();
$data= new \stdClass;
    $data->course_count=$course_count;
    $data->notes_count=$notes_count;
    $data->total_courses=$total_courses;
    $data->total_papers=$total_papers;
    $data->total_notes=$total_notes;
    $data->total_solutions=$total_solutions;
return view('home', compact('data'));
    }
}
