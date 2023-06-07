@extends('layout.mainlayout')
@section('content')		
<!-- Page Wrapper -->
<div class="page-wrapper">
			
            <!-- Page Content -->
            <div class="content container-fluid">

                @component('components.breadcrumb')                
                    @slot('title') Course Descripion Topic Detail  @endslot
                    @slot('li_1') Dashboard @endslot
                    @slot('li_2') Course Descripion Topic Detail @endslot
                    @slot('li_3') <i class="feather-smartphone"></i> @endslot
                @endcomponent
                
                <!-- Content Starts -->
                <div class="row">
                    <div class="col-md-12">
                        <div class="card mb-0">
                            <div class="card-body">
                  
                            <div class="modal-header">
                <h4 class="modal-title text-center">Course Descripion Topic Details</h4>
              </div>
    
      <div class="modal-body">
        <!-- <div class="col-md-12">
          <button class="btn btn-info" style="float:right; color:white" onclick="PrintElem(this)">Print
</button>
</div> -->
                
                    <div class="row">
                    <div class="invoice-total-card">
												<div class="invoice-total-box">
													<div class="invoice-total-inner">
													    <p>Week Number <span>{{$course_desc->week_no}}</span></p>
                                                        <p>Lecture Number <span>{{$course_desc->lecture_no}}</span></p>
													    <p>Contents <span>{{$course_desc->contents}}</span></p>

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