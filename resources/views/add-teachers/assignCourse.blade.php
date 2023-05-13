@extends('layout.mainlayout')
@section('content')		
<!-- Page Wrapper -->
<div class="page-wrapper">
			
            <!-- Page Content -->
            <div class="content container-fluid">

                @component('components.breadcrumb')                
                    @slot('title') Assign Course  @endslot
                    @slot('li_1') Dashboard @endslot
                    @slot('li_2') Assign Course @endslot
                    @slot('li_3') <i class="feather-smartphone"></i> @endslot
                @endcomponent

                <!-- Content Starts -->
                <div class="row">
                    <div class="col-md-12">
                        <div class="card mb-0">
                            <div class="card-body">
<div class="modal-header">
                <h4 class="modal-title text-center">Assign Course</h4>
              </div>

            <div class="modal-body">
                <div class="row">
                    <div class="col-md-12">
                        <form id="assign-course" enctype="multipart/form-data">
                        @csrf 
                       
                            <div class="form-group row">
                                <div class="col-md-12"><label class="col-form-label">Teacher ID <span class="text-danger">*</span></label></div>
                                <div class="col-md-12">
                                    <input class="form-control" type="hidden"  name="id" value="{{$teacher->id}}">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                <div class="form-group">    
                                <label class="col-form-label"> Course <span class="text-danger">*</span></label>
                                <select class="form-control" name="course_id">
                                    @foreach($courses as $course)
                                    <option value="{{$course->id}}" >{{$course->course_title}}</option>
                                    @endforeach
                                </select>
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
               
          saveRecord(this,"POST","{{route('add-teachers.store')}}","save-teacher","Teacher didn't saved. Please try again");
            });
</script>
       
@endsection
