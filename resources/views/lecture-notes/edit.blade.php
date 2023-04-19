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
                <h4 class="modal-title text-center">Edit Note</h4>
              </div>

            <div class="modal-body">
                <div class="row">
                    <div class="col-md-12">
                        <form id="save-note" enctype="multipart/form-data">
                        @csrf 
                        <div class="row">
                                <div class="col-sm-6">
                                <div class="form-group">    
                                <label class="col-form-label">Course<span class="text-danger">*</span></label>
                                    <select class="form-control"  name="course_id">
                                        @foreach($courses as $course)
                                        <option  @if($course->id==$lecture_notes->course_id) selected @endif value="{{$course->id}}">{{$course->course_title}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                </div>
                                <div class="col-sm-6">
                                <div class="form-group">    
                                <label class="col-form-label">Lecture Number<span class="text-danger">*</span></label>
                                    <input class="form-control" type="number" placeholder="01" value="{{$lecture_notes->lecture_number}}" name="lecture_number">
                                </div>
                                </div>
                            </div>
                            
                            <div class="form-group row">
                                <div class="col-md-12"><label class="col-form-label">Topic<span class="text-danger">*</span></label></div>
                                <div class="col-md-12">
                                    <input class="form-control" type="text" value="{{$lecture_notes->topic}}" placeholder="Introduction To Computer" name="topic">
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-sm-12">
                                    <label class="col-form-label">Description</label>
                                    <textarea class="form-control" name="description" value="{{$lecture_notes->description}}" placeholder="Description"></textarea>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-sm-12">
                                    <label class="col-form-label">Upload Notes</label>
                                    <br>
                                    <input type="file" id="file-input" class="form-control" multiple="true" name="notes_document[]" >
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
          saveRecord(this,"PUT","{{route('lecture-notes.update',$lecture_notes->id)}}","save-note","Note didn't saved. Please try again");
            });
</script>
@endsection
