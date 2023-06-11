@extends('layout.mainlayout')
@section('content')
<!-- Page Wrapper -->
<div class="page-wrapper">

    <!-- Page Content -->
    <div class="content container-fluid">

        @component('components.breadcrumb')
        @slot('title') Attendances @endslot
        @slot('li_1') Dashboard @endslot
        @slot('li_2') Attendances @endslot
        @slot('li_3') <i class="feather-smartphone"></i> @endslot
        @endcomponent

        <!-- Content Starts -->
        <div class="row">
            <div class="col-md-12">
                <div class="card mb-0">
                    <div class="card-body">
                        <div class="modal-header">
                            <h4 class="modal-title text-center">Edit Attendance</h4>
                        </div>

                        <div class="modal-body">
                            <div class="row">
                                <div class="col-md-12">
                                    <form id="save-attendance">
                                        @csrf
                                        <div class="row">
                                            <div class="form-group row">
                                                <label class="col-form-label">Course<span class="text-danger">*</span></label> <select class="form-control" name="course_id">
                                                    @foreach($courses as $course)
                                                    <option value="{{$course->id}}" @if($course->id==$attendance->course_id) selected @endif>{{$course->course_title}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="form-group row">
                                                <div class="col-md-12"><label class="col-form-label">Title<span class="text-danger">*</span></label></div>
                                                <div class="col-md-12">
                                                    <input type="text" class="form-control" placeholder="Title" value="{{$attendance->title}}" name="title">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <div class="col-sm-12">
                                                    <label class="col-form-label">Description<span class="text-danger">*</span></label>
                                                    <textarea class="form-control" name="description" placeholder="Description">{{$attendance->description}}</textarea>
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <div class="col-sm-12">
                                                    <label class="col-form-label">Student's Roll No<span class="text-danger">*</span></label>
                                                    <input type="text" class="form-control" name="roll_no" value="{{$attendance->roll_no}}">
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <div class="col-sm-12">
                                                    <label class="col-form-label">Student's Name<span class="text-danger">*</span></label>
                                                    <input type="text" class="form-control" name="student_name" value="{{$attendance->student_name}}">
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <div class="col-sm-12">
                                                    <label class="col-form-label">Activity Reference<span class="text-danger">*</span></label>
                                                    <input type="text" class="form-control" name="activity_ref" value="{{$attendance->activity_ref}}">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <div class="col-sm-12">
                                                    <label class="col-form-label">Total Attendance<span class="text-danger">*</span></label>
                                                    <input type="text" class="form-control" name="total_attendence" value="{{$attendance->total_attendence}}">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <div class="col-sm-12">
                                                    <label class="col-form-label">Total Absents<span class="text-danger">*</span>/label>
                                                    <input type="text" class="form-control" name="total_absents" value="{{$attendance->total_absents}}">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <div class="col-sm-12">
                                                    <label class="col-form-label">Percentage<span class="text-danger">*</span></label>
                                                    <input type="text" class="form-control" name="percentage" value="{{$attendance->percentage}}">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <div class="col-sm-12">
                                                    <label class="col-form-label">Status<span class="text-danger">*</span></label>
                                                    <input type="text" class="form-control" name="status" value="{{$attendance->status}}">
                                                </div>
                                            </div>
                                            
                                            <div class="form-group row">
                                                <div class="col-sm-12">
                                                    <label class="col-form-label">Upload Attendance<span class="text-danger">*</span></label>
                                                    <br>
                                                    <input type="file" id="file-input" class="form-control" multiple="true" name="attendance_document[]">
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
        saveRecord(this, "put", "{{route('attendance.update',$attendance->id)}}", "save-attendance", "Attendance didn't saved. Please try again");
    });
</script>
@endsection