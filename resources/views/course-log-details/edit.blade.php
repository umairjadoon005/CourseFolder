@extends('layout.mainlayout')
@section('content')		
<!-- Page Wrapper -->
<div class="page-wrapper">
			
            <!-- Page Content -->
            <div class="content container-fluid">

                @component('components.breadcrumb')                
                    @slot('title') Course Log Detail  @endslot
                    @slot('li_1') Dashboard @endslot
                    @slot('li_2') Course Log Detail @endslot
                    @slot('li_3') <i class="feather-smartphone"></i> @endslot
                @endcomponent

                <!-- Content Starts -->
                <div class="row">
                    <div class="col-md-12">
                        <div class="card mb-0">
                            <div class="card-body">
<div class="modal-header">
                <h4 class="modal-title text-center">Add Course Topics Details</h4>
              </div>

            <div class="modal-body">
                <div class="row">
                    <div class="col-md-12">
                        <form id="save-course" enctype="multipart/form-data">
         
                      
                        @csrf 
                        <div class="row">
                     <div class="col-md-6">
                     <input type="hidden" name="course_log_id" value="{{$log_details->course_log_id}}">
                    </div>
                        </div>
                        <div class="form-group row">
                                <div class="col-md-12"><label class="col-form-label">Log Date<span class="text-danger">*</span></label></div>
                                <div class="col-md-12">
                                    <input class="form-control" type="date" value="{{$log_details->log_date}}" name="log_date">
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-md-12"><label class="col-form-label">Lecture Number<span class="text-danger">*</span></label></div>
                                <div class="col-md-12">
                                    <input class="form-control" type="text" value="{{$log_details->lecture_number}}" name="lecture_number">
                                </div>
                            </div>
                            <div class="form-group row">
                            
                                <div class="col-md-12">
                                <div class="form-group">Topics Covered<span class="text-danger">*</span></label>
                                    <input class="form-control" type="text" value="{{$log_details->topics_covered}}" name="contents">
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
               
          saveRecord(this,"PUT","{{route('course-log-details.update', $log_details->id)}}","save-course","Course didn't saved. Please try again");
            });
</script>

    @endsection
