@extends('layout.mainlayout')
@section('content')		
<!-- Page Wrapper -->
<div class="page-wrapper">
			
            <!-- Page Content -->
            <div class="content container-fluid">

                @component('components.breadcrumb')                
                    @slot('title') Course Logs  @endslot
                    @slot('li_1') Dashboard @endslot
                    @slot('li_2') Course Logs @endslot
                    @slot('li_3') <i class="feather-smartphone"></i> @endslot
                @endcomponent
                
                <!-- Content Starts -->
                <div class="row">
                    <div class="col-md-12">
                        <div class="card mb-0">
                            <div class="card-body">
<div class="modal-header">
                <h4 class="modal-title text-center">Add Log</h4>
              </div>

            <div class="modal-body">
                <div class="row">
                    <div class="col-md-12">
                        <form id="save-log">
                        @csrf 
                        <div class="row">
                                <div class="col-md-6">
                                <div class="form-group">    
                                <label class="col-form-label">Course<span class="text-danger">*</span></label>  
                                  <select class="form-control" name="course_id">
                                        @foreach($courses as $course)
                                        <option value="{{$course->id}}" >{{$course->course_title}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                </div>
                            </div>
                            
                            <div class="form-group row">
                                <div class="col-sm-4"><label class="col-form-label">Date<span class="text-danger">*</span></label>
                                    <input class="form-control" type="date" placeholder="48" name="date">
                                </div>
                                <div class="col-sm-8">
                                    <label class="col-form-label">Duration</label>
                                    <input type="text" class="form-control" name="duration" placeholder="30 Minutes">
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-sm-6">
                                    <label class="col-form-label">Topics Covered</label>
                                    <input type="text" class="form-control"  name="topics_covered"  placeholder="Introduction To Computer">
                                </div>
                                <div class="col-sm-6">
                                    <label class="col-form-label">Evaluation instruments</label>
                                    <input type="text" class="form-control" name="evaluation_instruments"  placeholder="Software Engineering II">
                                </div>
                            </div>

                            <div class="form-group row">
                                <div class="col-sm-12">
                                    <label class="col-form-label">Upload Signature</label>
                                    <br>
                                    <input type="file" id="file-input" class="form-control" multiple="true" name="log_document[]">
                                </div>
                            </div>
                            
                            <!--

                            <div class="form-group row">
                                <div class="col-sm-12">
                                    <label class="col-form-label">Upload Best File</label>
                                    <br>
                                    <input type="file" id="file-input" class="form-control" multiple="true" name="best_file[]">
                                </div>
                            </div>

                            <div class="form-group row">
                                <div class="col-sm-12">
                                    <label class="col-form-label">Upload Average File</label>
                                    <br>
                                    <input type="file" id="file-input" class="form-control" multiple="true" name="avg_file[]">
                                </div>
                            </div>

                            <div class="form-group row">
                                <div class="col-sm-12">
                                    <label class="col-form-label">Upload Best File</label>
                                    <br>
                                    <input type="file" id="file-input" class="form-control" multiple="true" name="worst_file[]">
                                </div>
                            </div>
                            -->
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
          saveRecord(this,"POST","{{route('logs.store')}}","save-log","Log didn't saved. Please try again");
            });
</script>
@endsection
