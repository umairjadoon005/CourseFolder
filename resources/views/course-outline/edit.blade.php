@extends('layout.mainlayout')
@section('content')		
<!-- Page Wrapper -->
<div class="page-wrapper">
			
            <!-- Page Content -->
            <div class="content container-fluid">

                @component('components.breadcrumb')                
                    @slot('title') Course Outlines  @endslot
                    @slot('li_1') Dashboard @endslot
                    @slot('li_2') Course Outlines @endslot
                    @slot('li_3') <i class="feather-smartphone"></i> @endslot
                @endcomponent
                
                <!-- Content Starts -->
                <div class="row">
                    <div class="col-md-12">
                        <div class="card mb-0">
                            <div class="card-body">
<div class="modal-header">
                <h4 class="modal-title text-center">Edit Outline</h4>
              </div>

            <div class="modal-body">
                <div class="row">
                    <div class="col-md-12">
                        <form id="save-outline">
                        @csrf 
                        <div class="row">
                                <div class="col-md-6">
                                <div class="form-group">    
                                <label class="col-form-label">Course<span class="text-danger">*</span></label>    <select class="form-control" name="course_id">
                                        @foreach($courses as $course)
                                        <option value="{{$course->id}}" @if($course->id==$outline->course_id) selected @endif>{{$course->course_title}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                    <label class="col-form-label">Course Type<span class="text-danger">*</span></label>
                                <select class="form-control" name="course_type">
                                <option @if($outline->course_type=="Theory+Lab") selected @endif value="Theory+Lab">Theory+Lab</option>
                                <option @if($outline->course_type=="Theory") selected @endif value="Theory">Theory</option>
                                <option @if($outline->course_type=="Lab") selected @endif value="Lab">Lab</option>
                            </select>
                                </div>
                                </div>
                            </div>
                            
                            <div class="form-group row">
                                <div class="col-sm-4"><label class="col-form-label">Credit Hours<span class="text-danger">*</span></label>
                                    <input class="form-control" type="number" placeholder="48" value="{{$outline->credit_hours}}" name="credit_hours">
                                </div>
                            </div>
                            <div class="form-group row">
                                            <div class="col-sm-6">
                                                <label class="col-form-label">Course Duration</label>
                                                <input type="number" class="form-control" name="course_duration" value="{{$outline->course_duration}}" placeholder="1">
                                            </div>
                            </div>
                                     <div class="col-sm-8">
                                                <div class="form-group">
                                                    <label class="col-form-label">Cource Structure</label>
                                                    <input type="text" class="form-control" name="cource_structure"  value="{{$outline->course_structure}}" placeholder="Books, notes and online sources">
                                                </div>
                                 </div>
                                 <div class="col-sm-6">
                                                <label class="col-form-label">Weekly Tution Pattern</label>
                                                <input type="text" class="form-control" name="weekly_tution_pattern" value="{{$outline->weekly_tution_pattern}}">
                                </div>
                                <div class="col-sm-6">
                                                <label class="col-form-label">Course Style</label>
                                                <input type="text" class="form-control" name="course_style" value="{{$outline->course_style}}">
                                </div>
                                <div class="col-sm-6">
                                                <label class="col-form-label">Web Link</label>
                                                <input type="text" class="form-control" name="web_link" value="{{$outline->web_link}}">
                                </div>
                                <div class="col-sm-12">
                                                <label class="col-form-label">Teaching Team</label>
                                                <input type="text" class="form-control" name="teaching_team" value="{{$outline->teaching_team}}">
                                </div>
                                <div class="col-sm-6">
                                                <label class="col-form-label">Course Description</label>
                                                <input type="text" class="form-control" name="course_description" value="{{$outline->course_description}}">
                                 </div>
                                 <div class="col-sm-6">
                                                <label class="col-form-label">SLOs</label>
                                                <input type="text" class="form-control" name="slos" value="{{$outline->slos}}">
                                </div>
                                <div class="col-sm-6">
                                                <label class="col-form-label">Tool & Technology</label>
                                                <input type="text" class="form-control" name="tools_and_tech" value="{{$outline->tools_and_tech}}">
                                </div>
                                <div class="col-sm-6">
                                                <label class="col-form-label">Tentative Grading Policy</label>
                                                <input type="text" class="form-control" name="tentative_grading_policy" value="{{$outline->tentative_grading_policy}}">
                                 </div>
                                 <div class="col-sm-6">
                                                <label class="col-form-label">Attendance</label>
                                                <input type="text" class="form-control" name="attendance" value="{{$outline->attendance}}">
                                 </div>
                                 <div class="col-sm-6">
                                                <label class="col-form-label">General Information</label>
                                                <input type="text" class="form-control" name="general_info" value="{{$outline->general_info}}">
                                 </div>



                                <!-- <div class="col-sm-8">
                                    <label class="col-form-label">Source Structure</label>
                                    <input type="text" class="form-control" name="source_structure" placeholder="Books, notes and online sources">
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-sm-6">
                                    <label class="col-form-label">Pre Requisites</label>
                                    <input type="text" class="form-control"  name="pre_requisites" value="{{$outline->pre_requisites}}" placeholder="Introduction To Computer">
                                </div>
                                <div class="col-sm-6">
                                    <label class="col-form-label">Post Requisites</label>
                                    <input type="text" class="form-control" name="post_requisites" value="{{$outline->post_requisites}}" placeholder="Software Engineering II">
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-sm-6">
                                    <label class="col-form-label">Course Duration</label>
                                    <input type="number" class="form-control" name="course_duration" value="{{$outline->course_duration}}" placeholder="1">
                                </div>
                                <div class="col-sm-6">
                                    <label class="col-form-label">Duration Unit</label>
<select name="duration_unit" class="form-control">
<option @if($outline->duration_unit=='Day(s)') selected @endif value="Day(s)">Day(s)</option>
<option @if($outline->duration_unit=='Week(s)') selected @endif value="Week(s)">Week(s)</option>
<option @if($outline->duration_unit=='Month(s)') selected @endif value="Month(s)">Month(s)</option>
<option @if($outline->duration_unit=='Year(s)') selected @endif value="Year(s)">Year(s)</option>
</select>
                                </div>
                            </div>
                            <div class="form-group row">
                                            <div class="col-sm-6">
                                                <label class="col-form-label">Weekly Tution Pattern</label>
                                                <input type="text" class="form-control" name="weekly_tution_pattern" placeholder="2 Lectures (90 Minutes each)">
                                            </div>
                                            <div class="col-sm-6">
                                                <label class="col-form-label">Course Structure</label>
                                                <input type="text" class="form-control" name="course_structure" placeholder="Presentation by instructors, tasks, quizzes, assignments">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <div class="col-sm-6">
                                                <label class="col-form-label">Course Style</label>
                                                <input type="text" class="form-control" name="course_style" placeholder="The course will be delivered mostly in a classroom environment">
                                            </div>
                                            <div class="col-sm-6">
                                                <label class="col-form-label">Web Link</label>
                                                <input type="text" class="form-control" name="web_link" placeholder="http://google.meet/exampleurl">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <div class="col-sm-12">
                                                <label class="col-form-label">Teaching Team</label>
                                                <input type="text" class="form-control" name="teaching_team" placeholder="Sir. John Doe">
                                            </div> -->
                                        </div>
                            <div class="text-center py-3">
                                <button type="button" id="btn-save" class="border-0 btn btn-primary btn-gradient-primary btn-rounded">Save</button>&nbsp;&nbsp;
                                <button type="button" class="btn btn-secondary btn-rounded" data-bs-dismiss="modal">Cancel</button>
                            </div>
                        </form>
                    </div>
                </div>

            </div>
            </div>
                        </div>		
                    </div>
                </div>
                <!-- /Content End -->
                
            </div>
            <!-- /Page Content -->
            
        </div>
        <!-- /Page Wrapper -->
        
    </div>
    <!-- /Main Wrapper -->

    @component('components.modal-popup')                
    @endcomponent
    @component('components.theme-settings')                
    @endcomponent
<script>
            $('#btn-save').on('click', function() {
          saveRecord(this,"put","{{route('course-outlines.update',$outline->id)}}","save-outline","Course didn't saved. Please try again");
            });
</script>
@endsection