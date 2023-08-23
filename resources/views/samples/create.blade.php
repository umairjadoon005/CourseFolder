@extends('layout.mainlayout')
@section('content')		
<!-- Page Wrapper -->
<div class="page-wrapper">
			
            <!-- Page Content -->
            <div class="content container-fluid">

                @component('components.breadcrumb')                
                    @slot('title') Samples  @endslot
                    @slot('li_1') Dashboard @endslot
                    @slot('li_2') Samples @endslot
                    @slot('li_3') <i class="feather-smartphone"></i> @endslot
                @endcomponent
                
                <!-- Content Starts -->
                <div class="row">
                    <div class="col-md-12">
                        <div class="card mb-0">
                            <div class="card-body">
                                <div class="modal-header">
                <h4 class="modal-title text-center">Add Sample</h4>
              </div>

            <div class="modal-body">
                <div class="row">
                    <div class="col-md-12">
                        <form id="save-sample" enctype="multipart/form-data">
                        @csrf 
                        <input type="hidden" name="course_id" value="{{session('default_course')}}"/>
                        <div class="form-group row">
                                <div class="col-md-12"><label class="col-form-label">Sample Type<span class="text-danger">*</span></label></div>
                                <div class="col-md-12">
                                <select class="form-control" name="sample_type">
                                        <option value="Quiz">Quiz</option>
                                        <option value="Assignment">Assignment</option>
                                        <option value="Mid Term">Mid Term</option>
                                        <option value="Final Term">Final Term</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-sm-12">
                                    <label class="col-form-label">Sample Type<span class="text-danger">*</span></label>
                                    <input type="text" class="form-control"  name="sample_type" placeholder="Sample Type"/>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-sm-12">
                                    <label class="col-form-label">Description<span class="text-danger">*</span></label>
                                    <textarea class="form-control" name="description" placeholder="Description"></textarea>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-sm-12">
                                    <label class="col-form-label">Upload Sample(s)<span class="text-danger">*</span></label>
                                    <br>
                                    <input type="file" id="file-input" class="form-control" multiple="true" name="samples_document[]">
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
          saveRecord(this,"POST","{{route('samples.store')}}","save-sample","Sample didn't saved. Please try again");
            });
</script>
@endsection