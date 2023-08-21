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
                <h4 class="modal-title text-center">Course Log</h4>
              </div>
    
      <div class="modal-body">
                    <div class="row">
                    <div class="invoice-total-card">
												<div class="invoice-total-box">
													<div class="invoice-total-inner">
                          <p>Log Title <span>{{$log->course_title}}</span></p>
                          <p>Catalog Number <span>{{$log->catalog_number}}</span></p>	
                            @foreach(json_decode($log->signature) as $path)
                                                         {{$path->name}} <a href="{{route('logs.download',$log->id).'?document='.$path->path}}">Download</a>
													@endforeach
                            </div>
												</div>
											</div>
                    </div>
                    <div class="page-header pt-3 mb-0 ">
                    <div class="row">
                    
                        <div class="col text-end">
                            <ul class="list-inline-item ps-0">
                                <li class="list-inline-item">
                                    <a class="add btn btn-gradient-primary font-weight-bold text-white todo-list-add-btn btn-rounded" target="_blank" href="{{route('course-log-details.CreateTopic',$log->id)}}">Add Log Details</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>

                    <div class="table-responsive">
                    <table class="table table-striped table-nowrap custom-table mb-0 datatable">
                                        <thead>
                                            <tr>
                                                <th>Log Date</th>
                                                <th>Lecture Number</th>
                                                <th>Topics Covered</th>
                                                <th class="text-end">Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($log_details as $detail)
                                            <tr>
                                                <td>{{$detail->log_date}}</td>
                                                <td>{{$detail->lecture_number}}</td>
                                                <td>{{$detail->topics_covered}}</td>
                                                <td class="text-center">
                                                    <div class="dropdown dropdown-action">
                                                        <a href="#" class="action-icon dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false"><i class="material-icons">more_vert</i></a>
                                                        <div class="dropdown-menu dropdown-menu-right">
                                                            <a class="dropdown-item" href="{{route('course-log-details.edit',$detail->id)}}" target="_blank">Edit</a>
                                                            <a class="dropdown-item" href="{{route('course-log-details.show',$detail->id)}}" target="_blank">Show</a>
                                                            <a class="dropdown-item" onclick="deleteRecord('delete','{{route('course-log-details.destroy',$detail->id)}}','By deleting log detail, you would not be able to revert it');" href="#">Delete</a>
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
