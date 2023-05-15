@extends('layout.mainlayout')
@section('content')		
<!-- Page Wrapper -->
<div class="page-wrapper">
			
            <!-- Page Content -->
            <div class="content container-fluid">

                @component('components.breadcrumb')                
                    @slot('title') Courses  @endslot
                    @slot('li_1') Dashboard @endslot
                    @slot('li_2') Courses @endslot
                    @slot('li_3') <i class="feather-smartphone"></i> @endslot
                @endcomponent
                
                <!-- Content Starts -->
                <div class="row">
                    <div class="col-md-12">
                        <div class="card mb-0">
                            <div class="card-body">
                                <div class="modal-header">
                <h4 class="modal-title text-center">Edit Course</h4>
              </div>

            <div class="modal-body">
                <div class="row">
                    <div class="col-md-12">
                        <form id="save-course" enctype="multipart/form-data">
                        @csrf 
                        <div class="form-group row">
                                <div class="col-md-12"><label class="col-form-label">Course Code <span class="text-danger">*</span></label></div>
                                <div class="col-md-12">
                                    <input class="form-control" value="{{$course->course_code}}" type="text" placeholder="CS7201" name="course_code">
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-md-12"><label class="col-form-label">Course Title <span class="text-danger">*</span></label></div>
                                <div class="col-md-12">
                                    <input class="form-control" type="text" value="{{$course->course_title}}" placeholder="Software Engineering" name="course_title">
                                </div>
                            </div>
                            
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                    <label class="col-form-label">Credit Hours <span class="text-danger">*</span></label>
                                    <input class="form-control" type="number" value="{{$course->credit_hours}}" placeholder="48" name="credit_hours">
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label class="col-form-label">Pre Requisites</label>
                                    <input type="text" class="form-control" value="{{$course->pre_requisites}}" name="pre_requisites" placeholder="Introduction To Computer">
                                </div>
                            </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-sm-12">
                                    <label class="col-form-label">Topics</label>
                                    <input type="text" class="form-control" value="{{$course->topics}}" name="topics" placeholder="Introduction, History, Research Methods">
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-sm-6">
                                    <label class="col-form-label">Assessments</label>
                                    <input type="text" class="form-control" name="assessments" value="{{$course->assessments}}" placeholder="Exams, quizzes, research paper">
                                </div>
                                <div class="col-sm-6">
                                    <label class="col-form-label">Course Coordinator</label>
                                    <input type="text" class="form-control" value="{{$course->course_coordinator}}" name="course_coordinator" placeholder="Professor John Smith">
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-sm-6">
                                    <label class="col-form-label">Text Book</label>
                                    <input type="text" class="form-control" name="textbook" value="{{$course->textbook}}" placeholder="Introduction To Software Engineering">
                                </div>
                                <div class="col-sm-6">
                                    <label class="col-form-label">Reference Material</label>
                                    <input type="text" class="form-control"  name="reference_material" value="{{$course->reference_material}}" placeholder="Software 101 Study Guide">
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-sm-12">
                                    <label class="col-form-label">Course Goals</label>
                                    <textarea type="text" class="form-control" value="{{$course->course_goals}}" name="course_goals" placeholder="Understand the basics of software engineering and apply its tecniques">
                                    </textarea>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-sm-12">
                                    <label class="col-form-label">Upload Signature</label>
                                    <br>
                                    <input type="file" id="file-input" class="form-control" multiple="true" name="log_document[]">
                                </div>
                            </div>
                            <div class="text-center py-3">
                                <button type="button" id="btn-save" class="border-0 btn btn-primary btn-gradient-primary btn-rounded">Save</button>&nbsp;&nbsp;
                                <button type="button" data-bs-dismiss="modal" class="btn btn-secondary btn-rounded">Cancel</button>
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
          saveRecord(this,"PUT","{{route('course-descriptions.update',$course->id)}}","save-course","Course didn't saved. Please try again");
            });
</script>
@endsection