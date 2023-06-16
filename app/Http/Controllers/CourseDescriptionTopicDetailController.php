<?php

namespace App\Http\Controllers;

use App\Models\CourseDescriptionTopicDetail;
use Illuminate\Http\Request;

class CourseDescriptionTopicDetailController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $course_desc = CourseDescriptionTopicDetail::all();   
        return view('course-description-topic-detail.index',compact('course_desc'))->render();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $course_desc = CourseDescriptionTopicDetail::all(); 
        return view('course-description-topic-detail.create', compact('course_desc'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'week_no' => 'required',
             'lecture_no' => 'required',
             'contents'=> 'required'
            ]);

            $course_desc = new CourseDescriptionTopicDetail();
            $this->saveAndUpdate($course_desc, $request);
            return response()->json('Course description record has successfully been saved.',200);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\CourseDescriptionTopicDetail  $courseDescriptionTopicDetail
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $course_desc=CourseDescriptionTopicDetail::findOrFail($id);
        return view('course-description-topic-detail.show',compact('course_desc'))->render();
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\CourseDescriptionTopicDetail  $courseDescriptionTopicDetail
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $course_desc=CourseDescriptionTopicDetail::findOrFail($id);
        return view('course-description-topic-detail.edit',compact('course_desc'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\CourseDescriptionTopicDetail  $courseDescriptionTopicDetail
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
             'week_no' => 'required',
             'lecture_no' => 'required',
             'contents'=> 'required'
            ]);

        $course_desc = CourseDescriptionTopicDetail::findOrFail($id);
        $this->saveAndUpdate($course_desc,$request);
        return response()->json('Course Desc Details successfully updated.',200);
    }

    private function saveAndUpdate($course_desc,$request){

        $course_desc->course_id = $request->course_id;
        $course_desc->week_no = $request->week_no;
        $course_desc->lecture_no = $request->lecture_no;
        $course_desc->contents = $request->contents;
        $course_desc->save();
    } 

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\CourseDescriptionTopicDetail  $courseDescriptionTopicDetail
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        CourseDescriptionTopicDetail::destroy($id);
        return response()->json('Course successfully deleted.',200);
    }

}

