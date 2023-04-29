@extends('layout.mainlayout')
@section('content')
<!-- Page Wrapper -->
<div class="page-wrapper">

    <!-- Page Content -->
    <div class="content container-fluid">

        @component('components.breadcrumb')
        @slot('title') Attendances @endslot
        @slot('li_1') Dashboard @endslot
        @slot('li_2') Attendances @endslot
        @slot('li_3') <i class="feather-smartphone"></i> @endslot
        @endcomponent

        <!-- Content Starts -->
        <div class="row">
            <div class="col-md-12">
                <div class="card mb-0">
                    <div class="card-body">
<div class="modal-header">
                <h4 class="modal-title text-center">Attendance Details</h4>
              </div>
    
      <div class="modal-body">
                    <div class="row">
                    <div class="invoice-total-card">
												<div class="invoice-total-box">
													<div class="invoice-total-inner">
														<p>Title <span>{{$attendance->title}} </span></p>
														<p>Descripiton <span>
                                                            {{$attendance->description}}</span></p>
                                                            <p>Student's Roll No <span>
                                                            {{$attendance->roll_no}}</span></p>
                                                            <p>Student's Name <span>
                                                            {{$attendance->student_name}}</span></p>
                                                            <p>Activity Reference <span>
                                                            {{$attendance->activity_ref}}</span></p>
                                                            <p>Total Attendance <span>
                                                            {{$attendance->total_attendence}}</span></p>
                                                            <p>Total Absents <span>
                                                            {{$attendance->total_absents}}</span></p>
                                                            <p>Percentage <span>
                                                            {{$attendance->percentage}}</span></p>
                                                            <p>Status <span>
                                                            {{$attendance->status}}</span></p>
														<p>Attachments
                                                        @foreach(json_decode($attendance->document_path) as $path)
                                                        <span>
                                                        {{$path->name}} <a href="{{route('attendance.download',$attendance->id).'?document='.$path->path}}">Download</a>
                                                        @endforeach
                                                        </span></p>
                                                        
                                                        
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