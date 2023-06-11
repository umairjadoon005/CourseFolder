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
                                <input type="hidden" value="{{$outline->course_id}}" name="course_id"/>
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
                                <div class="col-sm-12"><label class="col-form-label">Credit Hours<span class="text-danger">*</span></label>
                                    <input class="form-control" type="number" placeholder="48" value="{{$outline->credit_hours}}" name="credit_hours">
                                </div>
                            </div>
                            <div class="form-group row">
                                            <div class="col-sm-12">
                                                <label class="col-form-label">Course Duration<span class="text-danger">*</span></label>
                                                <input type="number" class="form-control" name="course_duration" value="{{$outline->course_duration}}" placeholder="1">
                                            </div>
                            </div>
                            <div class="form-group row">
                                     <div class="col-sm-12">
                                                <div class="form-group">
                                                    <label class="col-form-label">Course Structure<span class="text-danger">*</span></label>
                                                    <input type="text" class="form-control" name="course_structure"  value="{{$outline->course_structure}}" placeholder="Books, notes and online sources">
                                                </div>
                                 </div></div>
                                 <div class="form-group row">
                                 <div class="col-sm-12">
                                                <label class="col-form-label">Weekly Tution Pattern<span class="text-danger">*</span></label>
                                                <input type="text" class="form-control" name="weekly_tution_pattern" value="{{$outline->weekly_tution_pattern}}">
                                </div></div>
                                <div class="form-group row">
                                <div class="col-sm-12">
                                                <label class="col-form-label">Course Style<span class="text-danger">*</span></label>
                                                <input type="text" class="form-control" name="course_style" value="{{$outline->course_style}}">
                                </div></div>
                                <div class="form-group row">
                                <div class="col-sm-12">
                                                <label class="col-form-label">Web Link<span class="text-danger">*</span></label>
                                                <input type="text" class="form-control" name="web_link" value="{{$outline->web_link}}">
                                </div></div>
                                <div class="form-group row">
                                <div class="col-sm-12">
                                                <label class="col-form-label">Teaching Team<span class="text-danger">*</span></label>
                                                <input type="text" class="form-control" name="teaching_team" value="{{$outline->teaching_team}}">
                                </div></div>
                                <div class="form-group row">
                                <div class="col-sm-12">
                                                <label class="col-form-label">Course Description<span class="text-danger">*</span></label>
                                                <input type="text" class="form-control" name="course_description" value="{{$outline->course_description}}">
                                 </div></div>
                                 <div class="form-group row">
                                 <div class="col-sm-12">
                                                <label class="col-form-label">SLOs<span class="text-danger">*</span></label>
                                                <input type="text" class="form-control" name="slos" value="{{$outline->slos}}">
                                </div></div>
                                <div class="form-group row">
                                <div class="col-sm-12">
                                                <label class="col-form-label">Tool & Technology<span class="text-danger">*</span></label>
                                                <input type="text" class="form-control" name="tools_and_tech" value="{{$outline->tools_and_tech}}">
                                </div>
                                <div class="col-sm-12">
                                                <label class="col-form-label">Tentative Grading Policy<span class="text-danger">*</span></label>
                                                <input type="text" class="form-control" name="tentative_grading_policy" value="{{$outline->tentative_grading_policy}}">
                                 </div></div>
                                 <div class="form-group row">
                                 <div class="col-sm-12">
                                                <label class="col-form-label">Attendance<span class="text-danger">*</span></label>
                                                <input type="text" class="form-control" name="attendance" value="{{$outline->attendance}}">
                                 </div></div>
                                 <div class="form-group row">
                                 <div class="col-sm-12">
                                                <label class="col-form-label">General Information<span class="text-danger">*</span></label>
                                                <input type="text" class="form-control" name="general_info" value="{{$outline->general_info}}">
                                 </div></div>

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