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
                <h4 class="modal-title text-center">Course Log Details</h4>
              </div>
    
      <div class="modal-body">
                    <div class="row pt-3 pb-4">
                        <div class="col-md-6">
                          <div class="card bg-gradient-success card-img-holder text-white h-100">
                            <div class="card-body">
                              <img src="{{ URL::asset('/assets/img/circle.png')}}" class="card-img-absolute" alt="circle-image">
                              <h4 class="font-weight-normal mb-3">Duration</h4>
                              <span>{{$log->duration==null?0:$log->duration}}</span>
                            </div>
                          </div>
                        </div>
                    </div>
                    <div class="row">
                    <div class="invoice-total-card">
												<div class="invoice-total-box">
													<div class="invoice-total-inner">
														<p>Topics Covered <span>{{$log->topics_covered}}</span></p>
														<p>Evaluation Instruments <span>{{$log->evaluation_instruments}}</span></p>
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
