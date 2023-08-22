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
                                                    <input type="hidden" name="course_id" value="{{session('default_course')}}">
                                            <div class="col-md-12">
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
                                            <div class="col-sm-12">
                                                <div class="form-group">
                                                    <label class="col-form-label">Credit Hours<span class="text-danger">*</span></label>
                                                    <input class="form-control" type="number" placeholder="48" name="credit_hours">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <div class="col-sm-12">
                                                <label class="col-form-label">Course Duration<span class="text-danger">*</span></label>
                                                <input type="number" class="form-control" name="course_duration" placeholder="1">
                                            </div>
                                        </div>
                                            <div class="col-sm-12">
                                                <div class="form-group">
                                                    <label class="col-form-label">Course Structure<span class="text-danger">*</span></label>
                                                    <input type="text" class="form-control" name="course_structure" placeholder="Books, notes and online sources">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                            <div class="col-sm-12">
                                                <label class="col-form-label">Weekly Tution Pattern<span class="text-danger">*</span></label>
                                                <input type="text" class="form-control" name="weekly_tution_pattern" placeholder="2 Lectures (90 Minutes each)">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <div class="col-sm-12">
                                                <label class="col-form-label">Course Style<span class="text-danger">*</span></label>
                                                <input type="text" class="form-control" name="course_style" placeholder="The course will be delivered mostly in a classroom environment">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                        <div class="col-sm-12">
                                                <label class="col-form-label">Web Link<span class="text-danger">*</span></label>
                                                <input type="text" class="form-control" name="web_link" placeholder="http://google.meet/exampleurl">
                                            </div>
                                            </div>
                                            <div class="form-group row">
                                            <div class="col-sm-12">
                                                <label class="col-form-label">Teaching Team<span class="text-danger">*</span></label>
                                                <input type="text" class="form-control" name="teaching_team" placeholder="Sir. John Doe">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                        <div class="col-sm-12">
                                                <label class="col-form-label">Course Description<span class="text-danger">*</span></label>
                                                <input type="text" class="form-control" name="course_description" placeholder="Enter Course Description">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                        <div class="col-sm-12">
                                                <label class="col-form-label">Student Learning Objectives<span class="text-danger">*</span></label>
                                                <input type="text" class="form-control" name="slos" placeholder="Enter Student Learning Objectives">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                        <div class="col-sm-12">
                                                <label class="col-form-label">Tool & Technology<span class="text-danger">*</span></label>
                                                <input type="text" class="form-control" name="tools_and_tech" placeholder="Enter Tools and Technology">
                                            </div>
                                        </div>
                                       
                                        <div class="form-group row">
                                            <div class="col-sm-12">
                                                <label class="col-form-label">Attendance Requirements<span class="text-danger"></span></label>
                                                <textarea type="text" class="form-control" name="attendance" placeholder="Enter Attendance">Students are encouraged and expected to attend all lectures, lab sessions, or any other activity related to the course. Moreover, students are responsible for their attendance and they must meet the minimum attendance requirement policy of the Department for appearing in final term exam.</textarea>
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <div class="col-sm-12">
                                                <label class="col-form-label">Grading Policy<span class="text-danger"></span></label>
                                                <textarea type="text" class="form-control" name="tentative_grading_policy" placeholder="Enter Grading Policy"></textarea>
                                            </div>
                                        </div>


                                        <div class="form-group row">
                                            <div class="col-sm-12">
                                                <label class="col-form-label">General Information<span class="text-danger">*</span></label>
                                                <textarea rows="3" class="form-control" name="general_info" placeholder="Enter General Information">Students are required to be familiar with the University’s code of conduct, and to abide by its terms and conditions.
Students must provide proper references to acknowledge other’s works/ideas. Students are required to follow American Psychological Association (APA) style of referencing or any other style recommended by the department. 
In order to avoid plagiarism, students are required to follow the guidelines provided by the Department/University. 
Students may use any sources (acknowledged) other than the assignments of fellow students.
</textarea>
                                            </div>
                                        </div>
                                        
                                        <div class="form-group row">
                                 <div class="col-sm-12">
                                                <label class="col-form-label">TextBooks<span class="text-danger"></span></label>
                                                <textarea type="text" class="form-control" name="textbook"></textarea>
                                 </div></div>
                                 <div class="form-group row">
                                 <div class="col-sm-12">
                                                <label class="col-form-label">Objectives<span class="text-danger"></span></label>
                                                <textarea type="text" class="form-control" name="objectives"></textarea>
                                 </div></div>
                                 <div class="form-group row">
                                 <div class="col-sm-12">
                                                <label class="col-form-label">Other Resources<span class="text-danger"></span></label>
                                                <textarea type="text" class="form-control" name="other_resources"></textarea>
                                 </div></div>
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