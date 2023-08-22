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
                <!-- Page Header -->
                <div class="page-header pt-3 mb-0 ">
                    <div class="row">
                    
                        <div class="col text-end">
                            <ul class="list-inline-item ps-0">
                                <li class="list-inline-item">
                                    <a class="add btn btn-gradient-primary font-weight-bold text-white todo-list-add-btn btn-rounded" target="_blank" href="{{route('course-outlines.create')}}">New Outline</a>
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
                                                <th>Course</th>
                                                <th>Course Type</th>
                                                <th>Credit Hours</th>
                                                <th>Course Duration</th>
                                                <th>Created At</th>
                                                <th class="text-end">Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($course_outlines as $outline)
                                            <tr>
                                                <td>
                                                    <a href="{{route('course-descriptions.show',$outline->course_id)}}" target="_blank">{{$outline->course_title}}</a>
                                                </td>
                                                <td>{{$outline->course_type}}</td>
                                                <td> {{$outline->credit_hours}}</td>
                                                <td> {{$outline->course_duration}}</td>
                                                <td>{{$outline->created_at}}</td>
                                                <td class="text-center">
                                                    <div class="dropdown dropdown-action">
                                                        <a href="#" class="action-icon dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false"><i class="material-icons">more_vert</i></a>
                                                        <div class="dropdown-menu dropdown-menu-right">
                                                            <a class="dropdown-item" href="{{route('course-outlines.show',$outline->id)}}" target="_blank">View</a>
                                                            <a class="dropdown-item" href="{{route('course-outlines.edit',$outline->id)}}" target="_blank">Edit</a>
                                                            <!-- <a class="dropdown-item" onclick="deleteRecord('delete','{{route('course-outlines.destroy',$outline->id)}}','By deleting outline, you would not be able to revert it.');" href="#">Delete</a> -->
                                                            <a class="dropdown-item" href="{{ route('course-outlines.downloadPdf', $outline->id) }}">Download PDF</a>

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