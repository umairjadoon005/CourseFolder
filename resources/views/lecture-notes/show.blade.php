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
                <!-- Content Starts -->
                <div class="row">
                    <div class="col-md-12">
                        <div class="card mb-0">
                            <div class="card-body">
<div class="modal-header">
                <h4 class="modal-title text-center">Lecture Notes Details</h4>
              </div>
    
      <div class="modal-body">
                    <div class="row pt-3 pb-4">
                        <div class="col-md-6">
                          <div class="card bg-gradient-success card-img-holder text-white h-100">
                            <div class="card-body">
                              <img src="{{ URL::asset('/assets/img/circle.png')}}" class="card-img-absolute" alt="circle-image">
                              <h4 class="font-weight-normal mb-3">Lecture Number</h4>
                              <span>{{$lecture_notes->lecture_number}}</span>
                            </div>
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="card bg-gradient-danger card-img-holder text-white h-100">
                            <div class="card-body">
                              <img src="{{ URL::asset('/assets/img/circle.png')}}" class="card-img-absolute" alt="circle-image">
                              <h4 class="font-weight-normal mb-3">Attachments</h4>
                              <span>{{count(json_decode($lecture_notes->notes_path))}}</span>
                            </div>
                          </div>
                        </div>
                       
                    </div>
                    <div class="row">
                    <div class="invoice-total-card">
												<div class="invoice-total-box">
													<div class="invoice-total-inner">
														<p>Course Type<br/>{{$lecture_notes->topic}}</p>
														<p>Descripiton <br/>
                                                            {{$lecture_notes->description}}</p>
														<p>Attachments
                                                        @foreach(json_decode($lecture_notes->notes_path) as $notes)
                                                        <br/>
                                                        {{$notes->name}} <a href="{{route('lecture-notes.download',$lecture_notes->id).'?document='.$notes->path}}">Download</a> 
                                                        <!-- &nbsp; <a id="print" href="#" onclick="Print('{{route('lecture-notes.download',$lecture_notes->id).'?document='.$notes->path}}');">Print</a> -->
                                                        @endforeach

                                                        </p>
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
    <script>

    function Print(url) {
        var hiddenIFrameID = 'hiddenDownloader',
            iframe = document.getElementById(hiddenIFrameID);
        if (iframe === null) {
            iframe = document.createElement('iframe');
            iframe.id = hiddenIFrameID;
            iframe.style.display = 'none';
            document.body.appendChild(iframe);
        }
        iframe.src = url;
        iframe.contentWindow.print();
    }
</script>
    @component('components.modal-popup')                
    @endcomponent
    @component('components.theme-settings')                
    @endcomponent
@endsection
