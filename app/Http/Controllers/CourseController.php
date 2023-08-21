<?php

namespace App\Http\Controllers;

use App\Http\Requests\CourseRequest;
use App\Models\Course;
use App\Models\LectureNotes;
use App\Models\QuestionPapers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\CourseDescriptionTopicDetail;

class CourseController extends BaseController
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
        $courses=Course::where('user_id','=',$this->user->id)->get();
        // $courses = Course::join('teacher_courses', 'courses.id', '=', 'teacher_courses.course_id')
        // ->join('teachers', 'teachers.id', '=', 'teacher_courses.id')
        // ->where('teachers.user_id', '=', auth()->user()->id)
        // ->select('courses.*')->get();
        return view('course-description.index',compact('courses'))->render();
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('course-description.create');
    }

    public function SetDefaultCourse(Request $request){
        session(['default_course'=>$request->course_id]);

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CourseRequest $request)
    {
        
        $course = new Course;
        $this->saveAndUpdate($course,$request);
        return response()->json('Course successfully saved.',200);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Course  $course
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $course=Course::findOrFail($id);
        $notes_count=LectureNotes::where('course_id','=',$id)->count();
        $papers_count=QuestionPapers::where('course_id','=',$id)->count();
        $course_desc = \App\Models\CourseDescriptionTopicDetail::where('course_id',$id)->get();   
        return view('course-description.show',compact('course','course_desc','notes_count','papers_count'))->render();

    
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Course  $course
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $course=Course::findOrFail($id);
        return view('course-description.edit',compact('course'));
    }

    public function editDescription($id)
    {
        $course=Course::findOrFail($id);
        return view('course-description.editDescription',compact('course'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Course  $course
     * @return \Illuminate\Http\Response
     */
    public function update(CourseRequest $request, $id)
    {
    
        $course = Course::findOrFail($id);
        $this->saveAndUpdate($course,$request);
        return response()->json('Course successfully updated.',200);
    }

    public function updateDescription(Request $request, $id)
    {
        $course = Course::findOrFail($id);
        $course->pre_requisites = $request->pre_requisites;
        $course->post_requisites = $request->post_requisites;
        $course->topics = $request->topics;
        $course->assessments = $request->assessments;
        $course->course_coordinator = $request->course_coordinator;
        $course->textbook = $request->textbook;
        $course->reference_material = $request->reference_material;
        $course->course_goals = $request->course_goals;
        $course->course_duration = $request->course_duration;
        $course->instructor_name = $request->instructor_name;
        $course->topics_covered = $request->topics_covered;
        $course->save();
        return response()->json('Course successfully updated.',200);
    }

        
    private function saveAndUpdate($course,$request){
        $course->course_code = $request->course_code;
        $course->course_title = $request->course_title;
        $course->credit_hours = $request->credit_hours;
        $course->program = $request->program;
        $course->effect_from_date = $request->effect_from_date;
        $course->user_id = $this->user->id;
        $course->save();
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Course::destroy($id);
        return response()->json('Course successfully deleted.',200);
    }
}
