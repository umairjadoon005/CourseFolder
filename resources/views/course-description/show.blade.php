@extends('layout.mainlayout')
@section('content')		
<!-- Page Wrapper -->
<div class="page-wrapper">
			
            <!-- Page Content -->
            <div class="content container-fluid">

                @component('components.breadcrumb')                
                    @slot('title') Courses  @endslot
                    @slot('li_1') Dashboard @endslot
                    @slot('li_2') Courses @endslot
                    @slot('li_3') <i class="feather-smartphone"></i> @endslot
                @endcomponent
                
                <!-- Content Starts -->
                <div class="row">
                    <div class="col-md-12">
                        <div class="card mb-0">
                            <div class="card-body">
                  
                            <div class="modal-header">
                <h4 class="modal-title text-center">Course Details</h4>
              </div>
    
      <div class="modal-body">
        <!-- <div class="col-md-12">
          <button class="btn btn-info" style="float:right; color:white" onclick="PrintElem(this)">Print
</button>
</div> -->
                    <div class="row pt-3 pb-4">
                        <div class="col-md-6">
                          <div class="card bg-gradient-success card-img-holder text-white h-100">
                            <div class="card-body">
                              <img src="{{ URL::asset('/assets/img/circle.png')}}" class="card-img-absolute" alt="circle-image">
                              <h4 class="font-weight-normal mb-3">Lecture Notes</h4>
                              <span>{{$notes_count}}</span>
                            </div>
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="card bg-gradient-danger card-img-holder text-white h-100">
                            <div class="card-body">
                              <img src="{{ URL::asset('/assets/img/circle.png')}}" class="card-img-absolute" alt="circle-image">
                              <h4 class="font-weight-normal mb-3">Question Papers</h4>
                              <span>{{$papers_count}}</span>
                            </div>
                          </div>
                        </div>
                       
                    </div>
                    <div class="row">
                    <div class="invoice-total-card">
												<div class="invoice-total-box">
													<div class="invoice-total-inner">
														<p>Course Title <span>{{$course->course_title}}</span></p>
														<p>Course Code <span>{{$course->course_code}}</span></p>
														<p>Credit Hours <span>{{$course->credit_hours}}</span></p>
														<p>Coordinator <span>{{$course->course_coordinator}}</span></p>
														<p>Text Book <span>{{$course->text_book}}</span></p>
														<p>Pre Requisites<span>{{$course->pre_requisites}}</span></p>
														<p>Topics<span>{{$course->topics}}</span></p>
														<p>Assessments<span>{{$course->assessments}}</span></p>
														<p>Reference Material<span>{{$course->reference_material}}</span></p>
														<p class="mb-0">Course Goals <span>{{$course->course_goals}}</span></p>
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
    @endcomponent
@endsection