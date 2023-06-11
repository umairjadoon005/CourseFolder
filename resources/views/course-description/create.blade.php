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
                <h4 class="modal-title text-center">Add Course</h4>
              </div>

            <div class="modal-body">
                <div class="row">
                    <div class="col-md-12">
                        <form id="save-course" enctype="multipart/form-data">
         
                      
                        @csrf 
                        <div class="form-group row">
                                <div class="col-md-12"><label class="col-form-label">Course Code <span class="text-danger">*</span></label></div>
                                <div class="col-md-12">
                                    <input class="form-control" type="text" placeholder="CS7201" name="course_code">
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-md-12"><label class="col-form-label">Course Title <span class="text-danger">*</span></label></div>
                                <div class="col-md-12">
                                    <input class="form-control" type="text" placeholder="Software Engineering" name="course_title">
                                </div>
                            </div>
                            
                            <div class="row">
                                <div class="col-md-6">
                                <div class="form-group">    
                                <label class="col-form-label">Credit Hours <span class="text-danger">*</span></label>
                                    <input class="form-control" type="number" placeholder="48" name="credit_hours">
                                </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                    <label class="col-form-label">Program<span class="text-danger">*</span></label>
                                    <input type="text" class="form-control"  name="program" placeholder="Enter Program">
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                    <label class="col-form-label">Effect from Date<span class="text-danger">*</span></label>
                                    <input type="date" class="form-control"  name="effect_from_date" placeholder="Enter Date">
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                    <label class="col-form-label">Pre Requisites<span class="text-danger">*</span></label>
                                    <input type="text" class="form-control"  name="pre_requisites" placeholder="Enter Pre-requisites">
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                    <div class="form-group">
                                    <label class="col-form-label">Post Requisites<span class="text-danger">*</span></label>
                                    <input type="text" class="form-control"  name="post_requisites" placeholder="Enter Post-requisites">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-sm-12">
                                    <label class="col-form-label">Topics<span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" name="topics" placeholder="Introduction, History, Research Methods">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                    <label class="col-form-label">Assessments<span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" name="assessments" placeholder="Exams, quizzes, research paper">
                                </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                    <label class="col-form-label">Course Coordinator<span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" name="course_coordinator" placeholder="Professor John Smith">
                                </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-sm-6">
                                    <label class="col-form-label">Text Book<span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" name="textbook" placeholder="Introduction To Software Engineering">
                                </div>
                                <div class="col-sm-6">
                                    <label class="col-form-label">Reference Material<span class="text-danger">*</span></label>
                                    <input type="text" class="form-control"  name="reference_material" placeholder="Software 101 Study Guide">
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-sm-12">
                                    <label class="col-form-label">Course Goals<span class="text-danger">*</span></label>
                                    <textarea type="text" class="form-control" name="course_goals" placeholder="Understand the basics of software engineering and apply its tecniques">
                                    </textarea>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-sm-12">
                                    <label class="col-form-label">Course Duration<span class="text-danger">*</span></label>
                                    <input type="text" class="form-control"  name="course_duration" placeholder="Enter Course Duration">
                                </div>
                            </div>
                            <div class="col-sm-6">
                                    <div class="form-group">
                                    <label class="col-form-label">Instructor's Name<span class="text-danger">*</span></label>
                                    <input type="text" class="form-control"  name="instructor_name" placeholder="Enter Instructor's Name">
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                    <label class="col-form-label">Topics Covered<span class="text-danger">*</span></label>
                                    <input type="text" class="form-control"  name="topics_covered" placeholder="Enter Topics Covered">
                                    </div>
                                </div>
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
               
          saveRecord(this,"POST","{{route('course-descriptions.store')}}","save-course","Course didn't saved. Please try again");
            });
</script>

    @endsection
