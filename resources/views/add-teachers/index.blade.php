@extends('layout.mainlayout')
@section('content')		
<!-- Page Wrapper -->
<div class="page-wrapper">
			
            <!-- Page Content -->
            
            
            <div class="content container-fluid">

                @component('components.breadcrumb')                
                    @slot('title') Teachers Details  @endslot
                    @slot('li_1') Dashboard @endslot
                    @slot('li_2') Teachers Details @endslot
                    @slot('li_3') <i class="feather-smartphone"></i> @endslot
                @endcomponent
            
                <!-- Page Header -->
                <div class="page-header pt-3 mb-0 ">
                    <div class="row">
                    
                        <div class="col text-end">
                            <ul class="list-inline-item ps-0">
                                <li class="list-inline-item">
                                    <a class="add btn btn-gradient-primary font-weight-bold text-white todo-list-add-btn btn-rounded" target="_blank" href="{{route('add-teachers.create')}}">Add Teacher</a>
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
                                                <th>Teacher Name</th>
                                                <!-- <th>Date of Joining</th> -->
                                                <th>Experience</th>
                                                <th>Specialization</th>
                                                <!-- <th>Salary</th> -->
                                                <th>Phone</th>
                                                <th>Email</th>
                                                <!-- <th>Address</th> -->
                                                <!-- <th class="text-end">Actions</th> -->
                                            </tr>
                                        </thead>
                                        <tbody>
                                             @foreach($teachers as $teacher)
                                            <tr>
                                                <td>
                                                    <a href="{{route('add-teachers.show',$teacher->id)}}" target="_blank">{{$teacher->teacher_name}}</a>
                                                </td>
                                                <!-- <td>{{$teacher->date_of_joining}}</td> -->
                                                <!-- <td>
                                                    {{$teacher->experience}}
                                                </td> -->
                                                <td>{{$teacher->specialization}}</td>
                                                <!-- <td>{{$teacher->salary}}</td> -->
                                                <td>{{$teacher->phone}}</td>
                                                <td>{{$teacher->email}}</td>
                                                <!-- <td>{{$teacher->address}}</td> -->
                                                <td class="text-center">
                                                    <div class="dropdown dropdown-action">
                                                        <a href="#" class="action-icon dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false"><i class="material-icons">more_vert</i></a>
                                                        <div class="dropdown-menu dropdown-menu-right">
                                                            <a class="dropdown-item" href="{{route('add-teachers.edit',$teacher->id)}}" target="_blank">Edit</a>
                                                            <a class="dropdown-item" href="{{route('add-teachers.show',$teacher->id)}}" target="_blank">Show</a>
                                                            <a class="dropdown-item" onclick="deleteRecord('delete','{{route('add-teachers.destroy',$teacher->id)}}','By deleting teacher details, you would not be able to revert it');" href="#">Delete</a>
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