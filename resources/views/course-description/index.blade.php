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
                <!-- Page Header -->
                <div class="page-header pt-3 mb-0 ">
                    <div class="row">
                    
                        <div class="col text-end">
                            <ul class="list-inline-item ps-0">
                                <li class="list-inline-item">
                                    <a class="add btn btn-gradient-primary font-weight-bold text-white todo-list-add-btn btn-rounded" target="_blank" href="{{route('course-descriptions.create')}}">New Course</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <!-- /Page Header -->
                
                <!-- Content Starts -->
                <div class="row">
                    <div class="col-md-12">
                        <div class="card mb-0">
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-striped table-nowrap custom-table mb-0 datatable">
                                        <thead>
                                            <tr>
                                                <th>Title</th>
                                                <th>Code</th>
                                                <th>Credit Hours</th>
                                                <th>Program</th>
                                                <th>Effect from Date</th>
                                                <th>Pre-requisites</th>
                                                <th>Post-requisites</th>
                                                <th>Topics</th>
                                                <th>Assessments</th>
                                                <th>Course Coordinator</th>
                                                <th>Text Book</th>
                                                <th>Reference Material</th>
                                                <th>Course Goals</th>
                                                <th>Course Duration</th>
                                                <th>Course Coordinator</th>
                                                <th>Instructor's Name</th>
                                                <th>Topics Covered</th>
                                                <th>Created At</th>
                                                <th class="text-end">Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($courses as $course)
                                            <tr>
                                                <td>
                                                    <a href="{{route('course-descriptions.show',$course->id)}}" target="_blank">{{$course->course_title}}</a>
                                                </td>
                                                <td>{{$course->course_code}}</td>
                                                <td>{{$course->credit_hours}}</td>
                                                <td>{{$course->program}}</td>
                                                <td>{{$course->effect_from_date}}</td>
                                                <td>{{$course->pre_requisites}}</td>
                                                <td>{{$course->post_requisites}}</td>
                                                <td>{{$course->topics}}</td>
                                                <td>{{$course->assessments}}</td>
                                                <td>{{$course->course_coordinator}}</td>
                                                <td>{{$course->textbook}}</td>
                                                <td>{{$course->reference_material}}</td>
                                                <td>{{$course->course_goals}}</td>
                                                <td>{{$course->course_duration}}</td>
                                                <td>{{$course->instructor_name}}</td>
                                                <td>{{$course->topics_covered}}</td>
                                                <td>{{$course->created_at}}</td>
                                                
                                                <td class="text-center">
                                                    <div class="dropdown dropdown-action">
                                                        <a href="#" class="action-icon dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false"><i class="material-icons">more_vert</i></a>
                                                        <div class="dropdown-menu dropdown-menu-right">
                                                            <a class="dropdown-item" href="{{route('course-descriptions.edit',$course->id)}}" target="_blank">Edit</a>
                                                            <a class="dropdown-item" href="{{route('course-descriptions.show',$course->id)}}" target="_blank">Show</a>
                                                            <a class="dropdown-item" onclick="deleteRecord('delete','{{route('course-descriptions.destroy',$course->id)}}','By deleting course, you would not be able to revert it');" href="#">Delete</a>
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