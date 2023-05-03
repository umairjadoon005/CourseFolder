<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TeacherController extends Controller
{

    public function index()
    {
        return view('add-teachers.index');
        // $courses=Course::where('user_id','=',$this->user->id)->get();
        //return view('course-description.index',compact('courses'))->render();
    }

    public function create()
    {
        return view('add-teachers.create');
    }

    public function store()
    {
       
    }

    public function show($id)
    {
        
    }


    public function update()
    {
       
    }

    private function saveAndUpdate(Request $request){
        $teacher = new Teachers;
        $teacher->teacher_name = $request->teacher_name;
        $teacher->date_of_joining = $request->date_of_joining;
        $teacher->experience = $request->experience;
        $teacher->specialization = $request->specialization;
        $teacher->salary = $request->salary;
        $teacher->phone = $request->phone;
        $teacher->email = $request->email;
        $teacher->address = $request->address;

        $teacher->save();

       
    }

}
