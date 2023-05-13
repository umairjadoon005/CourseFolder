@extends('layout.mainlayout')
@section('content')		
<!-- Page Wrapper -->
<div class="page-wrapper">
			
            <!-- Page Content -->
            <div class="content container-fluid">

                @component('components.breadcrumb')                
                    @slot('title') Teacher Details  @endslot
                    @slot('li_1') Dashboard @endslot
                    @slot('li_2') Teacher Details @endslot
                    @slot('li_3') <i class="feather-smartphone"></i> @endslot
                @endcomponent
                
                <!-- Content Starts -->
                <div class="row">
                    <div class="col-md-12">
                        <div class="card mb-0">
                            <div class="card-body">
                  
                            <div class="modal-header">
                <h4 class="modal-title text-center">Teacher Details</h4>
                <div class="text-center py-3">
                <a class="border-0 btn btn-primary btn-gradient-primary btn-rounded" href="" target="_blank">Assign Course</a> 
                </div>
                </div>
                    <div class="row">
                    <div class="invoice-total-card">
												<div class="invoice-total-box">
													<div class="invoice-total-inner">
														<p>Teacher Name <span>{{$teacher->teacher_name}}</span></p>
														<p>Date of Joining <span>{{$teacher->date_of_joining}}</span></p>
														<p>Experience <span>{{$teacher->experience}}</span></p>
														<p>Specialization <span>{{$teacher->specialization}}</span></p>
														<p>Salary <span>{{$teacher->salary}}</span></p>
														<p>Phone<span>{{$teacher->phone}}</span></p>
														<p>Email<span>{{$teacher->email}}</span></p>
														<p>Address<span>{{$teacher->address}}</span></p>
												</div>
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

<script>
            $('#btn-save').on('click', function() {
               
          saveRecord(this,"POST","{{route('course-descriptions.store')}}","save-course","Course didn't saved. Please try again");
            });
</script>
@endcomponent
@endsection