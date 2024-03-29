<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Teacher;
use App\Models\TeacherCourse;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class TeacherController extends BaseController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $teachers = Teacher::all();
       // return view ('add-teachers.index',compact('teachers'));
       return view('add-teachers.index',compact('teachers'))->render();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('add-teachers.create');
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
            'teacher_name'=> 'required',
            'email' => 'required',
            'specialization' => 'required',
            'phone' => 'required',
            ]);

       $user=User::create([
            'name' => $request->teacher_name, 
            'email' => $request->email, 
            'password' => Hash::make('123456'),
            'email_verified_at' => now(), 
            'created_at' => now()]);
            $user->assignrole('teacher');
            $teacher = new Teacher();
            
        $teacher->id = $request->id;
        $teacher->teacher_name = $request->teacher_name;
        $teacher->specialization = $request->specialization;
        $teacher->email = $request->email;
        $teacher->phone = $request->phone;
        $teacher->department = $request->department;
        $teacher->user_id=$user->id;
        $teacher->save();
        //$teacher->date_of_joining = $request->date_of_joining;
        //$teacher->experience = $request->experience;
       // $teacher->salary = $request->salary;
       //$teacher->address = $request->address;
            
        return response()->json('Teacher successfully saved.',200);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Teacher  $teacher
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $teacher=Teacher::findOrFail($id);
        $courses = Course::join('teacher_courses', 'courses.id', '=', 'teacher_courses.course_id')
        ->join('teachers', 'teachers.id', '=', 'teacher_courses.id')
        ->where('teachers.user_id', '=', $teacher->user_id)
        ->select('courses.*')->get();
        return view('add-teachers.show',compact('teacher','courses'))->render();
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Teacher  $teacher
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        
        $teacher=Teacher::findOrFail($id);
        return view('add-teachers.edit',compact('teacher'))->render();
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Teacher  $teacher
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'teacher_name'=> 'required',
            'email' => 'required',
            'specialization' => 'required',
            'phone' => 'required',
            ]);
            
        $teacher = Teacher::findOrFail($id);
        $teacher->id = $request->id;
        $teacher->teacher_name = $request->teacher_name;
        $teacher->specialization = $request->specialization;
        $teacher->email = $request->email;
        $teacher->phone = $request->phone;
        $teacher->department = $request->department;
        $teacher->save();
        //$teacher->date_of_joining = $request->date_of_joining;
        //$teacher->experience = $request->experience;
        //$teacher->salary = $request->salary;
        //$teacher->address = $request->address;
       
        

        return response()->json('Course successfully updated.',200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Teacher  $teacher
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Teacher::destroy($id);
        return response()->json('Teacher successfully deleted.',200);
    }

    public function AssignCourse($id){
        $teacher=Teacher::findOrFail($id);
        $courses=Course::where('user_id',auth()->user()->id)->get();
        return view('add-teachers.assignCourse',compact('teacher','courses'))->render();
        
        
       
    }
    public function AssignCourseSave(Request $request,$id){
        if(TeacherCourse::where(['id'=>$id,'course_id'=>$request->course_id])->count()>0){
        throw new \Exception('Course already assigned.');
        }
        $teacherCourse= new TeacherCourse();
        $teacherCourse->id=$id;
        $teacherCourse->course_id=$request->course_id;
        $teacherCourse->save();
        return response()->json('Course successfully assigned.',200);

    }
}
