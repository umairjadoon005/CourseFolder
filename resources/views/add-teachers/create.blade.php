@extends('layout.mainlayout')
@section('content')		
<!-- Page Wrapper -->
<div class="page-wrapper">
			
            <!-- Page Content -->
            <div class="content container-fluid">

                @component('components.breadcrumb')                
                    @slot('title') Add Teachers  @endslot
                    @slot('li_1') Dashboard @endslot
                    @slot('li_2') Add Teachers @endslot
                    @slot('li_3') <i class="feather-smartphone"></i> @endslot
                @endcomponent

                <!-- Content Starts -->
                <div class="row">
                    <div class="col-md-12">
                        <div class="card mb-0">
                            <div class="card-body">
<div class="modal-header">
                <h4 class="modal-title text-center">Add Teacher</h4>
              </div>

            <div class="modal-body">
                <div class="row">
                    <div class="col-md-12">
                        <form id="save-teacher" enctype="multipart/form-data">
                        @csrf 
    
                            <div class="form-group row">
                                <div class="col-md-12"><label class="col-form-label">Teacher name <span class="text-danger">*</span></label></div>
                                <div class="col-md-12">
                                    <input class="form-control" type="text" placeholder="Enter Teacher's Name" name="teacher_name">
                                </div>
                            </div>
                            <!--
                            <div class="row">
                                <div class="col-md-6">
                                <div class="form-group">    
                                <label class="col-form-label">Date of Joining <span class="text-danger">*</span></label>
                                    <input class="form-control" type="date" placeholder="Enter Joining Date" name="date_of_joining">
                                </div>
                                </div>
                                
                                <div class="col-sm-6">
                                    <div class="form-group">
                                    <label class="col-form-label">Experience</label>
                                    <input type="text" class="form-control"  name="experience" placeholder="Enter Experience">
                                    </div>
                                </div>
                            </div>

                            <div class="form-group row">
                                
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                    <label class="col-form-label">Salary</label>
                                    <input type="number" class="form-control" name="salary" placeholder="Enter Salary">
                                </div>
                                </div>
                                -->
                            <div class="row">
                                <div class="col-sm-12">
                                    <label class="col-form-label">Specialization</label>
                                    <input type="text" class="form-control" name="specialization" placeholder="Enter Specialization">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                    <label class="col-form-label">Phone</label>
                                    <input type="text" class="form-control" name="phone" placeholder="Enter Phone No">
                                </div>
                                </div>
                            </div>
                            <div class="row">
                            <div class="form-group row">
                                <div class="col-sm-6">
                                    <label class="col-form-label">Email</label>
                                    <input type="email" class="form-control" name="email" placeholder="Enter Email">
                                </div>
                                </div>
                                <!-- <div class="col-sm-6">
                                    <label class="col-form-label">Address</label>
                                    <input type="text" class="form-control"  name="address" placeholder="Enter Address">
                                </div>
                            </div> -->
                           
                            
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
