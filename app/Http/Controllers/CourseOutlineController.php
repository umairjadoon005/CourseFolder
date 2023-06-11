<?php

namespace App\Http\Controllers;

use App\Http\Requests\CourseOutlineRequest;
use App\Models\Course;
use App\Models\CourseOutline;
use App\Models\CourseOutlineTopicDetail;
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
     */
    public function index()
    {
        $course_outlines=CourseOutline::join('courses','courses.id','=','course_outlines.course_id')
        // ->
        // join('teacher_courses', 'courses.id', '=', 'teacher_courses.course_id')
        // ->join('teachers', 'teachers.id', '=', 'teacher_courses.id')
        ->where('courses.id', '=', session('default_course'))// COURSES.ID=SESSION(COURSES.ID)
       // ->where('courses.user_id','=',$this->user->id)
        ->select('course_outlines.*','courses.course_title')->get();
        return view('course-outline.index',compact('course_outlines'));
        //
    }
    /**
     * Show the form for creating a new resource.
     *
     */
    public function create()
    {
        return view('course-outline.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CourseOutlineRequest $request)
    {
       
        $request->validate([
            'credit_hours'=> 'required',
            'course_type' => 'required',
             'course_duration' => 'required',
             'weekly_tutition_pattern'=> 'required',
             'course_structure'=> 'required',
             'course_style'=> 'required',
             'web_link'=> 'required',
             'teaching_team'=> 'required',
             'course_description'=> 'required',
             'slos'=> 'required',
             'tools_and_tech'=> 'required',
             'tentative_grading_policy'=> 'required',
             'attendance'=> 'required',
             'general_info'=> 'required',
            
            ]);

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
        $outlineDetail = CourseOutlineTopicDetail::where('course_outlines_id',$id)->get();
        return view('course-outline.show',compact('outline','outlineDetail'))->render();
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
        $outline=CourseOutline::findOrFail($id);
        return view('course-outline.edit',compact('outline'));
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
        $request->validate([
            'credit_hours'=> 'required',
            'course_type' => 'required',
             'course_duration' => 'required',
             'weekly_tutition_pattern'=> 'required',
             'course_structure'=> 'required',
             'course_style'=> 'required',
             'web_link'=> 'required',
             'teaching_team'=> 'required',
             'course_description'=> 'required',
             'slos'=> 'required',
             'tools_and_tech'=> 'required',
             'tentative_grading_policy'=> 'required',
             'attendance'=> 'required',
             'general_info'=> 'required',
            
            ]);
            
        $outline = CourseOutline::findOrFail($id);
   $this->saveAndUpdate($request,$outline);
        return response()->json('Outline successfully updated.',200);
    }
private function saveAndUpdate($request,$outline){
    $outline->credit_hours = $request->credit_hours;
    $outline->course_type = $request->course_type;
    $outline->course_duration = $request->course_duration;
    $outline->weekly_tution_pattern = $request->weekly_tution_pattern;
    $outline->course_structure = $request->course_structure;
    $outline->course_style = $request->course_style;
    $outline->web_link = $request->web_link;
    $outline->teaching_team = $request->teaching_team;
    $outline->course_description = $request->course_description;
    $outline->slos = $request->slos;
    $outline->tools_and_tech = $request->tools_and_tech;
    $outline->tentative_grading_policy = $request->tentative_grading_policy;
    $outline->attendance = $request->attendance;
    $outline->general_info = $request->general_info;
    $outline->course_id = $request->course_id;
    
    // $outline->duration_unit = $request->duration_unit;
    // $outline->source_structure = $request->source_structure;
    
   
   
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
