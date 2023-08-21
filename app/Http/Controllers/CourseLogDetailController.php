<?php

namespace App\Http\Controllers;

use App\Models\CourseLogDetail;
use Illuminate\Http\Request;

class CourseLogDetailController extends Controller
{
    public function index()
    {
        $course_desc = CourseLogDetail::all();   
        return view('course-log-details.index',compact('course_desc'))->render();
    }

    public function CreateTopic($id)
    {
    
        return view('course-log-details.create', compact('id'));
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('course-log-details.create');
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
            'log_date' => 'required',
             'lecture_number' => 'required',
            ]);

            $log_details = new CourseLogDetail();
            $this->saveAndUpdate($log_details, $request);
            return response()->json('Log Details has successfully been saved.',200);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\CourseDescriptionTopicDetail  $courseDescriptionTopicDetail
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $log_details=CourseLogDetail::findOrFail($id);
        return view('course-log-details.show',compact('log_details'))->render();
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\CourseDescriptionTopicDetail  $courseDescriptionTopicDetail
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $log_details=CourseLogDetail::findOrFail($id);
        return view('course-log-details.edit',compact('log_details'));
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
             'log_date' => 'required',
             'lecture_number' => 'required'
            ]);

        $course_desc = CourseLogDetail::findOrFail($id);
        $this->saveAndUpdate($course_desc,$request);
        return response()->json('Log Details successfully updated.',200);
    }

    private function saveAndUpdate($course_desc,$request){

        $course_desc->course_log_id = $request->course_log_id;
        $course_desc->duration = $request->duration;
        $course_desc->lecture_number = $request->lecture_number;
        $course_desc->topics_covered = $request->topics_covered;
        $course_desc->log_date = $request->log_date;
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
        CourseLogDetail::destroy($id);
        return response()->json('Log detail successfully deleted.',200);
    }

}
