@extends('layout.mainlayout')
@section('content')		
<!-- Page Wrapper -->
<div class="page-wrapper">
			
            <!-- Page Content -->
            <div class="content container-fluid">

                @component('components.breadcrumb')                
                    @slot('title') Results  @endslot
                    @slot('li_1') Dashboard @endslot
                    @slot('li_2') Results @endslot
                    @slot('li_3') <i class="feather-smartphone"></i> @endslot
                @endcomponent
                <!-- Content Starts -->
                <div class="row">
                    <div class="col-md-12">
                        <div class="card mb-0">
                            <div class="card-body">
<div class="modal-header">
                <h4 class="modal-title text-center">Results Details</h4>
              </div>
    
      <div class="modal-body">
                    <div class="row">
                    <div class="invoice-total-card">
												<div class="invoice-total-box">
													<div class="invoice-total-inner">
														<p>Title<br/>{{$result->title}}</p>
														<p>Descripiton <br/>
                                                            {{$result->description}}</p>
														<p>Attachments
                                                        @foreach(json_decode($result->document_path) as $path)
                                                        <br/>
                                                        {{$path->name}} <a href="{{route('results.download',$result->id).'?document='.$path->path}}">Download</a>
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

    @component('components.modal-popup')                
    @endcomponent
    @component('components.theme-settings')                
    @endcomponent
@endsection