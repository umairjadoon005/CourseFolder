@extends('layout.mainlayout')
@section('content')		
<!-- Page Wrapper -->
<div class="page-wrapper">
			
            <!-- Page Content -->
            <div class="content container-fluid">

                @component('components.breadcrumb')                
                    @slot('title') Lecture Notes  @endslot
                    @slot('li_1') Dashboard @endslot
                    @slot('li_2') Lecture Notes @endslot
                    @slot('li_3') <i class="feather-smartphone"></i> @endslot
                @endcomponent
                
                <!-- Content Starts -->
                <div class="row">
                    <div class="col-md-12">
                        <div class="card mb-0">
                            <div class="card-body">
                                <div class="table-responsive">
<div class="modal-header">
                <h4 class="modal-title text-center">Add Note</h4>
              </div>

            <div class="modal-body">
               
                        <form id="save-note" enctype="multipart/form-data">
                        @csrf 
                      <input type="hidden" value="{{session('default_course')}}" name="course_id"/>
                                                      <div class="form-group row">
                                <div class="col-sm-12">
                                <label class="col-form-label">Lecture Number<span class="text-danger">*</span></label>
                                    <input class="form-control" type="number" placeholder="01" name="lecture_number">
                                </div>
                                </div>

                            <div class="form-group row">
                                <div class="col-md-12"><label class="col-form-label">Topic<span class="text-danger">*</span></label></div>
                                <div class="col-md-12">
                                    <input class="form-control" type="text" placeholder="Introduction To Computer" name="topic">
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-sm-12">
                                    <label class="col-form-label">Description<span class="text-danger">*</span></label>
                                    <textarea class="form-control"  name="description" placeholder="Introduction To Computer"></textarea>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-sm-12">
                                    <label class="col-form-label">Upload Notes<span class="text-danger">*</span></label>
                                    <br>
                                    <input type="file" class="form-control" multiple="true" id="file-input" name="notes_document[]" >
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
          saveRecord(this,"POST","{{route('lecture-notes.store')}}","save-note","Note didn't saved. Please try again");
            });
</script>
@endsection