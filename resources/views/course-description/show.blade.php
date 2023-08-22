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
                @can('view courses')
                <div class="modal-actions"> 
                    <a class="add btn btn-gradient-primary font-weight-bold text-white todo-list-add-btn btn-rounded" style="float:right; color:white" href="{{route('edit-description',$course->id)}}">Update Course Description
</a>

<a class="add btn btn-gradient-primary font-weight-bold text-white todo-list-add-btn btn-rounded" style="float:right; margin:0 5px 0 0; color:white" href="{{ route('course-descriptions.downloadPdf', $course->id) }}">Download Pdf
</a>

</div>  

@endcan

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
													  <p>Course Code <span>{{$course->course_code}}</span></p>
                            <p>Course Title <span>{{$course->course_title}}</span></p>
														<p>Credit Hours <span>{{$course->credit_hours}}</span></p>
                            <p>Program <span>{{$course->program}}</span></p>
                            <p>Effect from Date <span>{{$course->effect_from_date}}</span></p>
                            <p>Pre Requisites<span>{{$course->pre_requisites}}</span></p>
                            <p>Post Requisites<span>{{$course->post_requisites}}</span></p>
                            <p>Topics<span>{{$course->topics}}</span></p>
                            <p>Assessments<span>{{$course->assessments}}</span></p>
														<p>Coordinator <span>{{$course->course_coordinator}}</span></p>
														<p>Text Book <span>{{$course->text_book}}</span></p>
														<p>Course Duration<span>{{$course->course_duration}}</span></p>
														<p class="mb-0">Instructor's Name <span>{{$course->instructor_name}}</span></p>
														<p>Topics Covered<span>{{$course->topics_covered}}</span></p>
													</div>
												</div>
											</div>
          
                    </div>
                    <div class="page-header pt-3 mb-0 ">
                    <div class="row">
                    
                        <div class="col text-end">
                            <ul class="list-inline-item ps-0">
                                <li class="list-inline-item">
                                    <a class="add btn btn-gradient-primary font-weight-bold text-white todo-list-add-btn btn-rounded" target="_blank" href="{{route('course-description-topic-detail.create')}}">Add Course Details</a>
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
                                                <th>Lecture Number</th>
                                                <th>Contents</th>
                                                <th class="text-end">Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($course_desc as $coursedesc)
                                            <tr>
                                                <!-- <td>
                                                    <a href="{{route('course-descriptions.show',$course->id)}}" target="_blank">{{$course->course_title}}</a>
                                                </td> -->
                                                <td>{{$coursedesc->week_no}}</td>
                                                <td>{{$coursedesc->lecture_no}}</td>
                                                <td>{{$coursedesc->contents}}</td>
                                                <td class="text-center">
                                                    <div class="dropdown dropdown-action">
                                                        <a href="#" class="action-icon dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false"><i class="material-icons">more_vert</i></a>
                                                        <div class="dropdown-menu dropdown-menu-right">
                                                            <a class="dropdown-item" href="{{route('course-description-topic-detail.edit',$coursedesc->id)}}" target="_blank">Edit</a>
                                                            <a class="dropdown-item" href="{{route('course-description-topic-detail.show',$coursedesc->id)}}" target="_blank">Show</a>
                                                            <a class="dropdown-item" onclick="deleteRecord('delete','{{route('course-description-topic-detail.destroy',$coursedesc->id)}}','By deleting course details, you would not be able to revert it');" href="#">Delete</a>
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