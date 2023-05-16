<?php

namespace App\Http\Controllers;

use App\Http\Requests\CourseOutlineRequest;
use App\Models\Course;
use App\Models\CourseOutline;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CourseOutlineController extends BaseController
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
        $course_outlines=CourseOutline::join('courses','courses.id','=','course_outlines.course_id')->where('courses.user_id','=',$this->user->id)
        ->select('course_outlines.*','courses.course_title')->get();
        return view('course-outline.index',compact('course_outlines'));
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       // $courses=Course::where('user_id','=',$this->user->id)->get();
       $courses = Course::join('teacher_courses', 'courses.id', '=', 'teacher_courses.course_id')
        ->join('teachers', 'teachers.id', '=', 'teacher_courses.id')
        ->where('teachers.user_id', '=', auth()->user()->id)->get();
       
        return view('course-outline.create',compact('courses'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CourseOutlineRequest $request)
    {
        $outline = new CourseOutline;
$this->saveAndUpdate($request,$outline);
        return response()->json('Outline successfully saved.',200);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Course  $course
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $outline=CourseOutline::findOrFail($id);
        return view('course-outline.show',compact('outline'))->render();
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
        $outline=CourseOutline::findOrFail($id);
        return view('course-outline.edit',compact('outline','courses'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Course  $course
     * @return \Illuminate\Http\Response
     */
    public function update(CourseOutlineRequest $request, $id)
    {
        $outline = CourseOutline::findOrFail($id);
   $this->saveAndUpdate($request,$outline);
        return response()->json('Outline successfully updated.',200);
    }
private function saveAndUpdate($request,$outline){
    $outline->credit_hours = $request->credit_hours;
    $outline->pre_requisite = $request->pre_requisite;
    $outline->post_requisite = $request->post_requisite;
    $outline->course_type = $request->course_type;
    $outline->course_duration = $request->course_duration;
    $outline->duration_unit = $request->duration_unit;
    $outline->source_structure = $request->source_structure;
    $outline->course_id = $request->course_id;
    $outline->weekly_tution_pattern = $request->weekly_tution_pattern;
    $outline->course_structure = $request->course_structure;
    $outline->course_style = $request->course_style;
    $outline->web_link = $request->web_link;
    $outline->teaching_team = $request->teaching_team;
    $outline->save();

}
    /**
     * Remove the specified resource from storage.
     *
     * @param  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        CourseOutline::destroy($id);
        return response()->json('Outline successfully deleted.',200);
    }
}
