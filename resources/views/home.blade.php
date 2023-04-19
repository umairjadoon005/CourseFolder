<?php $page="pagee";?>
@extends('layout.mainlayout')
@section('content')		
<div id="app">
	<!-- Page Wrapper -->
	<div class="page-wrapper">
	    <div class="content container-fluid">
			
			@component('components.breadcrumb')                
		      @slot('title') Dashboard  @endslot
		      @slot('li_1') Dashboard @endslot
		      @slot('li_2') Dashboard @endslot
		      @slot('li_3') <i class="la la-table" aria-hidden="true"></i> @endslot
		  	@endcomponent
			  <div class="row pt-3 pb-4">
                        <div class="col-md-3">
                          <div class="card bg-gradient-success card-img-holder text-white h-100">
                            <div class="card-body">
                              <img src="http://127.0.0.1:8000/assets/img/circle.png" class="card-img-absolute" alt="circle-image">
                              <h4 class="font-weight-normal mb-3">Total Courses</h4>
                              <span>{{$data->total_courses}}</span>
                            </div>
                          </div>
                        </div>
                        <div class="col-md-3">
                          <div class="card bg-gradient-danger card-img-holder text-white h-100">
                            <div class="card-body">
                              <img src="http://127.0.0.1:8000/assets/img/circle.png" class="card-img-absolute" alt="circle-image">
                              <h4 class="font-weight-normal mb-3">Total Papers</h4>
                              <span>{{$data->total_papers}}</span>
                            </div>
                          </div>
                        </div>
						<div class="col-md-3">
                          <div class="card bg-gradient-info card-img-holder text-white h-100">
                            <div class="card-body">
                              <img src="http://127.0.0.1:8000/assets/img/circle.png" class="card-img-absolute" alt="circle-image">
                              <h4 class="font-weight-normal mb-3">Total Lectures</h4>
                              <span>{{$data->total_notes}}</span>
                            </div>
                          </div>
                        </div>
						<div class="col-md-3">
                          <div class="card bg-gradient-danger card-img-holder text-white h-100">
                            <div class="card-body">
                              <img src="http://127.0.0.1:8000/assets/img/circle.png" class="card-img-absolute" alt="circle-image">
                              <h4 class="font-weight-normal mb-3">Total Solutions</h4>
                              <span>{{$data->total_solutions}}</span>
                            </div>
                          </div>
                        </div>
                       
                    </div>
			<div class="row graphs">
				<div class="col-md-6">
					<div class="card h-100">
						<div class="card-body">
	                    	<h3 class="card-title">Total Courses</h3>
							<div id="line-charts"></div>
	                	</div>
					</div>
				</div>
				<div class="col-md-6">
					
					<div class="card h-100">
	                    <div class="card-body">
	                    	<h3 class="card-title">Total Notes</h3>
	                     <div id="bar-charts"></div>
	                    </div>
	                </div>
				</div>
			</div>

		</div>			
	</div>
	<!-- /Page Wrapper -->

</div>
@component('components.modal-popup')                
@endcomponent
@component('components.theme-settings')                
@endcomponent
@endsection