<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\LectureNotes;
use App\Models\QuestionPapers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class BaseController extends Controller
{

    protected $user;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware(function ($request, $next) {

            $this->user = Auth::user();
if($this->user==null){
    return response()->redirectTo(route('login'));
}
            return $next($request);
        });
    }
    protected function UploadFile($request,$input_key){
        $allowedfileExtension = ['pdf', 'doc', 'docx','ppt','pptx','csv','xlsx','png','jpg','jpeg','gif'];
        $files = $request->allFiles();
        $file_array = array();
        foreach ($files[$input_key] as $key => $file) {
            $extension = $file->getClientOriginalExtension();

            if (!in_array($extension, $allowedfileExtension)) {
                continue;
            }
            $filename = uniqid() . '.' . $file->extension();
            Storage::disk('local')->putFileAs('files', $file, $filename);
            $name = [
                'name' => $file->getClientOriginalName(),
                'path' => $filename
            ];
            $file_array[$key] = $name;
        }
        return $file_array;
    }
}