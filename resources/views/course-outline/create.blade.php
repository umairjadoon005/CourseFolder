@extends('layout.mainlayout')
@section('content')
<!-- Page Wrapper -->
<div class="page-wrapper">

    <!-- Page Content -->
    <div class="content container-fluid">

        @component('components.breadcrumb')
        @slot('title') Course Outlines @endslot
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
                            <h4 class="modal-title text-center">Add Outline</h4>
                        </div>

                        <div class="modal-body">
                            <div class="row">
                                <div class="col-md-12">
                                    <form id="save-outline">
                                        @csrf
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="col-form-label">Course<span class="text-danger">*</span></label> <select class="form-control" name="course_id">
                                                        @foreach($courses as $course)
                                                        <option value="{{$course->id}}">{{$course->course_title}}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="col-form-label">Course Type<span class="text-danger">*</span></label>
                                                    <select class="form-control" name="course_type">
                                                        <option value="Theory+Lab">Theory+Lab</option>
                                                        <option value="Theory">Theory</option>
                                                        <option value="Lab">Lab</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-sm-4">
                                                <div class="form-group">
                                                    <label class="col-form-label">Credit Hours<span class="text-danger">*</span></label>
                                                    <input class="form-control" type="number" placeholder="48" name="credit_hours">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <div class="col-sm-6">
                                                <label class="col-form-label">Course Duration</label>
                                                <input type="number" class="form-control" name="course_duration" placeholder="1">
                                            </div>
                                        </div>
                                            <div class="col-sm-8">
                                                <div class="form-group">
                                                    <label class="col-form-label">Course Structure</label>
                                                    <input type="text" class="form-control" name="course_structure" placeholder="Books, notes and online sources">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                            <div class="col-sm-6">
                                                <label class="col-form-label">Weekly Tution Pattern</label>
                                                <input type="text" class="form-control" name="weekly_tution_pattern" placeholder="2 Lectures (90 Minutes each)">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <div class="col-sm-6">
                                                <label class="col-form-label">Course Style</label>
                                                <input type="text" class="form-control" name="course_style" placeholder="The course will be delivered mostly in a classroom environment">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                        <div class="col-sm-6">
                                                <label class="col-form-label">Web Link</label>
                                                <input type="text" class="form-control" name="web_link" placeholder="http://google.meet/exampleurl">
                                            </div>
                                            </div>
                                            <div class="form-group row">
                                            <div class="col-sm-12">
                                                <label class="col-form-label">Teaching Team</label>
                                                <input type="text" class="form-control" name="teaching_team" placeholder="Sir. John Doe">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                        <div class="col-sm-6">
                                                <label class="col-form-label">Course Description</label>
                                                <input type="text" class="form-control" name="course_description" placeholder="Enter Course Description">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                        <div class="col-sm-6">
                                                <label class="col-form-label">SLOs</label>
                                                <input type="text" class="form-control" name="slos" placeholder="Enter SLOs">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                        <div class="col-sm-6">
                                                <label class="col-form-label">Tool & Technology</label>
                                                <input type="text" class="form-control" name="tools_and_tech" placeholder="Enter Tools and Technology">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <div class="col-sm-6">
                                                <label class="col-form-label">Tentative Grading Policy</label>
                                                <input type="text" class="form-control" name="tentative_grading_policy" placeholder="Enter Tentative Grading Policy">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <div class="col-sm-6">
                                                <label class="col-form-label">Attendance</label>
                                                <input type="text" class="form-control" name="attendance" placeholder="Enter Attendance">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <div class="col-sm-6">
                                                <label class="col-form-label">General Information</label>
                                                <input type="text" class="form-control" name="general_info" placeholder="Enter General Information">
                                            </div>
                                        </div>
                                        
                                            <!-- <div class="col-sm-6">
                                                <label class="col-form-label">Duration Unit</label>
                                                <select name="duration_unit" class="form-control">
                                                    <option value="Day(s)">Day(s)</option>
                                                    <option value="Week(s)">Week(s)</option>
                                                    <option value="Month(s)">Month(s)</option>
                                                    <option value="Year(s)">Year(s)</option>
                                                </select>
                                            </div> -->
                                        </div>
                                        
                                            
                                        </div>
                                        
                                            
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
        saveRecord(this, "POST", "{{route('course-outlines.store')}}", "save-outline", "Course didn't saved. Please try again");
    });
</script>
@endsection