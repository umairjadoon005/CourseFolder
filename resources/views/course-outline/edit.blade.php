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
                                    <label class="col-form-label">Type<span class="text-danger">*</span></label>
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
                                <div class="col-sm-8">
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