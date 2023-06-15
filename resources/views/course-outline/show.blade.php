@extends('layout.mainlayout')
@section('content')		
<!-- Page Wrapper -->
<div class="page-wrapper">
			
            <!-- Page Content -->
            <div class="content container-fluid">

                @component('components.breadcrumb')                
                    @slot('title') Course Outlines  @endslot
                    @slot('li_1') Dashboard @endslot
                    @slot('li_2') Course Outlines @endslot
                    @slot('li_3') <i class="feather-smartphone"></i> @endslot
                @endcomponent
                
                <!-- Content Starts -->
                <div class="row">
                    <div class="col-md-12">
                        <div class="card mb-0">
                            <div class="card-body">

                            <div class="modal-header">
                <h4 class="modal-title text-center">Course Outline Details</h4>
              </div>
    
      <div class="modal-body">
                    <div class="row pt-3 pb-4">
                        <div class="col-md-6">
                          <div class="card bg-gradient-success card-img-holder text-white h-100">
                            <div class="card-body">
                              <img src="{{ URL::asset('/assets/img/circle.png')}}" class="card-img-absolute" alt="circle-image">
                              <h4 class="font-weight-normal mb-3">Duration</h4>
                              <span>{{$outline->course_duration==null?0:$outline->course_duration}} {{$outline->duration_unit}}</span>
                            </div>
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="card bg-gradient-danger card-img-holder text-white h-100">
                            <div class="card-body">
                              <img src="{{ URL::asset('/assets/img/circle.png')}}" class="card-img-absolute" alt="circle-image">
                              <h4 class="font-weight-normal mb-3">Credit Hours</h4>
                              <span>{{$outline->credit_hours}}</span>
                            </div>
                          </div>
                        </div>
                       
                    </div>
                    <div class="row">
                    <div class="invoice-total-card">
												<div class="invoice-total-box">
													<div class="invoice-total-inner">
														<p>Course Type <span>{{$outline->course_type}}</span></p>
														<p>Pre Requisite <span>{{$outline->course->pre_requisites}}</span></p>
														<!-- <p>Course Duration <span>{{$outline->course_duration}}</span></p> -->
														<p>Course Structure <span>{{$outline->course_structure}}</span></p>
														<p>Weekly Tuition Pattern <span>{{$outline->weekly_tution_pattern}}</span></p>
                            <p>Course Style <span>{{$outline->course_style}}</span></p>
                            <p>Web Link <span>{{$outline->web_link}}</span></p>
                            <p>Teaching Team <span>{{$outline->teaching_team}}</span></p>
                            <p>Course Description <span>{{$outline->course_description}}</span></p>
                            <p>SLOs<span>{{$outline->slos}}</span></p>
                            <p>Tools & Technology<span>{{$outline->tools_and_tech}}</span></p>
                            <p>Tentative Grading Policy<span>{{$outline->tentative_grading_policy}}</span></p>
                            <p>Attendance<span>{{$outline->attendance}}</span></p>
                            <p>SLOs<span>{{$outline->slos}}</span></p>
                            <p>General Information<span>{{$outline->general_info}}</span></p>
													</div>
												</div>
											</div>
                    </div>
                    <div class= "row">
                    <div class="page-header pt-3 mb-0 ">
                    <div class="row">
                        <div class="col text-end">
                            <ul class="list-inline-item ps-0">
                                <li class="list-inline-item">
                                    <a class="add btn btn-gradient-primary font-weight-bold text-white todo-list-add-btn btn-rounded" target="_blank" href="{{route('course-outline-topic-detail.CreateTopic',$outline->id)}}">Add Outline Details</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                    <div class="table-responsive">
                                    <table class="table table-striped table-nowrap custom-table mb-0 datatable">
                                        <thead>
                                            <tr>
                                                <th>Week Number</th>
                                                <th>Topics</th>
                                                <th class="text-end">Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($outlineDetail as $outline)
                                            <tr>
                                                
                                                <td>{{$outline->week_no}}</td>
                                                <td>{{$outline->topics}} </td>
                                                <td class="text-center">
                                                    <div class="dropdown dropdown-action">
                                                        <a href="#" class="action-icon dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false"><i class="material-icons">more_vert</i></a>
                                                        <div class="dropdown-menu dropdown-menu-right">
                                                            <a class="dropdown-item" href="{{route('course-outline-topic-detail.show',$outline->id)}}" target="_blank">View</a>
                                                            <a class="dropdown-item" href="{{route('course-outline-topic-detail.edit',$outline->id)}}" target="_blank">Edit</a>
                                                            <a class="dropdown-item" onclick="deleteRecord('delete','{{route('course-outlines.destroy',$outline->id)}}','By deleting outline, you would not be able to revert it.');" href="#">Delete</a>
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                       @endforeach
                                          
                                        </tbody>
                                    </table>
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
