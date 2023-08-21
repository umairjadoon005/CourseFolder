@extends('layout.mainlayout')
@section('content')		
<!-- Page Wrapper -->
<div class="page-wrapper">
			
            <!-- Page Content -->
            <div class="content container-fluid">

                @component('components.breadcrumb')                
                    @slot('title') Samples  @endslot
                    @slot('li_1') Dashboard @endslot
                    @slot('li_2') Samples @endslot
                    @slot('li_3') <i class="feather-smartphone"></i> @endslot
                @endcomponent
                <!-- Content Starts -->
                <div class="row">
                    <div class="col-md-12">
                        <div class="card mb-0">
                            <div class="card-body">

                            <div class="modal-header">
                <h4 class="modal-title text-center">Sample Details</h4>
              </div>
    
      <div class="modal-body">
                    <div class="row">
                    <div class="invoice-total-card">
												<div class="invoice-total-box">
													<div class="invoice-total-inner">
														<p>Sample Type<br/>{{$sample->sample_type}}</p>
														<p>Descripiton <br/>
                                                            {{$sample->description}}</p>
														<p>Attachments
                                                        @foreach(json_decode($sample->document_path) as $path)
                                                        <br/>
                                                        {{$path->name}} <a href="{{route('samples.download',$sample->id).'?document='.$path->path}}">Download</a>
                                                        @endforeach
                                                        </p>

                                                        <!-- <p>Best File 
                                                         @foreach(json_decode($sample->best_file) as $path)
                                                        </br>
                                                         {{$path->name}} <a href="{{route('samples.downloadBest',$sample->id).'?document='.$path->path}}">Download</a>
                                                        @endforeach
                                                         </p>

                                                         <p>Average File 
                                                         @foreach(json_decode($sample->avg_file) as $path)
                                                        </br>
                                                         {{$path->name}} <a href="{{route('samples.downloadAvg',$sample->id).'?document='.$path->path}}">Download</a>
                                                        @endforeach
                                                         </p>

                                                         <p>Worst File 
                                                         @foreach(json_decode($sample->worst_file) as $path)
                                                        </br>
                                                         {{$path->name}} <a href="{{route('samples.downloadWorst',$sample->id).'?document='.$path->path}}">Download</a>
                                                        @endforeach
                                                         </p> -->
                           
                                                        
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