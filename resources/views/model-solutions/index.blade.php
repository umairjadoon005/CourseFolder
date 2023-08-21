@extends('layout.mainlayout')
@section('content')		
<!-- Page Wrapper -->
<div class="page-wrapper">
			
            <!-- Page Content -->
            <div class="content container-fluid">

                @component('components.breadcrumb')                
                    @slot('title') Model Solutions  @endslot
                    @slot('li_1') Dashboard @endslot
                    @slot('li_2') Model Solutions @endslot
                    @slot('li_3') <i class="feather-smartphone"></i> @endslot
                @endcomponent
                <!-- Page Header -->
                <div class="page-header pt-3 mb-0 ">
                    <div class="row">
                    
                        <div class="col text-end">
                            <ul class="list-inline-item ps-0">
                                <li class="list-inline-item">
                                    <a class="add btn btn-gradient-primary font-weight-bold text-white todo-list-add-btn btn-rounded" target="_blank" href="{{route('model-solutions.create',)}}">New Solution</a>
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
                                                <th>Solution Type</th>
                                                <th>Title</th>
                                                <th>Document(s)</th>
                                                <th>Created At</th>
                                                <th class="text-end">Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($model_solutions as $solution)
                                            <tr>
                                                <td>
{{$solution->solution_type}}
                                                </td>
                                                <td>{{$solution->title}}</td>
                                                <td>
                                                {{count(json_decode($solution->document_path))}} File(s)  <a href="{{route('paper-solutions.download',$solution->id)}}">Download Zip</a>
                                                </td>
                                                <th>{{$solution->created_at}}</th>

                                                <td class="text-center">
                                                    <div class="dropdown dropdown-action">
                                                        <a href="#" class="action-icon dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false"><i class="material-icons">more_vert</i></a>
                                                        <div class="dropdown-menu dropdown-menu-right">
                                                            <a class="dropdown-item" href="{{route('model-solutions.show',$solution->id)}}" target="_blank">View</a>
                                                            <a class="dropdown-item" href="{{route('model-solutions.edit',$solution->id)}}" target="_blank">Edit</a>
                                                            <a class="dropdown-item" onclick="deleteRecord('delete','{{route('model-solutions.destroy',$solution->id)}}','By deleting solution, you would not be able to revert it.');" href="#">Delete</a>
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