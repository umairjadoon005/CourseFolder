<?php

namespace App\Http\Controllers;

use App\Models\CourseOutlineTopicDetail;
use Illuminate\Http\Request;

class CourseOutlineTopicDetailController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //$outlineDetail = new CourseOutlineTopicDetail;
        $outlineDetail = CourseOutlineTopicDetail::all();
        return view('course-outline-topic-detail.index', compact('outlineDetail'))->render();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //$outlineDetail = new CourseOutlineTopicDetail;
        $outlineDetail = CourseOutlineTopicDetail::all();
        return view('course-outline-topic-detail.create', compact('outlineDetail'));
    }

    public function CreateTopic($id)
    {
    
        return view('course-outline-topic-detail.create', compact('id'));
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
                 'topics' => 'required',
        ]);
        $outlineDetail = new  CourseOutlineTopicDetail();
        $this->saveAndUpdate($request,$outlineDetail);
        return response()->json('Outline Details have successfully been saved.',200);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\CourseOutlineTopicDetail  $courseOutlineTopicDetail
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $outlineDetail=CourseOutlineTopicDetail::findOrFail($id);
        return view('course-outline-topic-detail.show',compact('outlineDetail'))->render();
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\CourseOutlineTopicDetail  $courseOutlineTopicDetail
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $outlineDetail=CourseOutlineTopicDetail::findOrFail($id);

        return view('course-outline-topic-detail.edit',compact('outlineDetail'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\CourseOutlineTopicDetail  $courseOutlineTopicDetail
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'week_no' => 'required',
             'topics' => 'required',
        ]);
        $outlineDetail = CourseOutlineTopicDetail::findOrFail($id);
        $this->saveAndUpdate($request,$outlineDetail);
        return response()->json('Outline details have successfully been updated.',200);
    }

    private function saveAndUpdate($request,$outlineDetail){
        $outlineDetail->week_no = $request->week_no;
        $outlineDetail->topics = $request->topics;
        $outlineDetail->course_outlines_id=$request->outline_id;
        $outlineDetail->save();
    
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\CourseOutlineTopicDetail  $courseOutlineTopicDetail
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $outlineDetail = CourseOutlineTopicDetail::findOrFail($id);
       $outlineDetail->delete();
        //CourseOutlineTopicDetail::destroy($id);
        return response()->json('Outline details have successfully been deleted.',200);
    }
}
