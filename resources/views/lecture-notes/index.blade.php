@extends('layout.mainlayout')
@section('content')		
<!-- Page Wrapper -->
<div class="page-wrapper">
			
            <!-- Page Content -->
            <div class="content container-fluid">

                @component('components.breadcrumb')                
                    @slot('title') Lecture Notes  @endslot
                    @slot('li_1') Dashboard @endslot
                    @slot('li_2') Lecture Notes @endslot
                    @slot('li_3') <i class="feather-smartphone"></i> @endslot
                @endcomponent
                <!-- Page Header -->
                <div class="page-header pt-3 mb-0 ">
                    <div class="row">
                    
                        <div class="col text-end">
                            <ul class="list-inline-item ps-0">
                                <li class="list-inline-item">
                                    <a target="_blank" class="add btn btn-gradient-primary font-weight-bold text-white todo-list-add-btn btn-rounded" href="{{route('lecture-notes.create')}}">New Note</a>
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
                                                <th>Lecture Number.</th>
                                                <th>Topic</th>
                                                <th>Document(s)</th>
                                                <th>Created At</th>
                                                <th class="text-end">Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($lecture_notes as $note)
                                            <tr>
                                                <td>
                                                    <a href="{{route('course-descriptions.show',$note->course_id)}}" target="_blank">{{$note->course_title}}</a>
                                                </td>
                                                <td>{{$note->lecture_number}}</td>
                                                <td>{{$note->topic}}</td>
                                                <td>
                                                {{count(json_decode($note->notes_path))}} File(s)  <a href="{{route('lecture-notes.download',$note->id)}}">Download Zip</a>
                                                </td>
                                                <td>{{$note->created_at}}</td>

                                                <td class="text-center">
                                                    <div class="dropdown dropdown-action">
                                                        <a href="#" class="action-icon dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false"><i class="material-icons">more_vert</i></a>
                                                        <div class="dropdown-menu dropdown-menu-right">
                                                            <a class="dropdown-item" href="{{route('lecture-notes.show',$note->id)}}" target="_blank">View</a>
                                                            <a class="dropdown-item" href="{{route('lecture-notes.edit',$note->id)}}" target="_blank">Edit</a>
                                                            <a class="dropdown-item" onclick="deleteRecord('delete','{{route('lecture-notes.destroy',$note->id)}}','By deleting note, you would not be able to revert it.');" href="#">Delete</a>
                                                            <a class="dropdown-item" href="{{ route('lecture-notes.downloadPdf', $note->id) }}">Download PDF</a>
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