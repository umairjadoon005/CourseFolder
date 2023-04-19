@extends('layout.mainlayout')
@section('content')		
<!-- Page Wrapper -->
<div class="page-wrapper">
			
            <!-- Page Content -->
            <div class="content container-fluid">

                @component('components.breadcrumb')                
                    @slot('title') Question Papers  @endslot
                    @slot('li_1') Dashboard @endslot
                    @slot('li_2') Question Papers @endslot
                    @slot('li_3') <i class="feather-smartphone"></i> @endslot
                @endcomponent
                
                <!-- Content Starts -->
                <div class="row">
                    <div class="col-md-12">
                        <div class="card mb-0">
                            <div class="card-body">
<div class="modal-header">
                <h4 class="modal-title text-center">Question Paper Details</h4>
              </div>
    
      <div class="modal-body">
                    <div class="row">
                    <div class="invoice-total-card">
												<div class="invoice-total-box">
													<div class="invoice-total-inner">
														<p>Paper Type<br/>{{$question_papers->paper_type}}</p>
														<p>Descripiton <br/>
                                                            {{$question_papers->description}}</p>
														<p>Attachments
                                                        @foreach(json_decode($question_papers->document_path) as $document)
                                                        <br/>
                                                        {{$document->name}} <a href="{{route('question-papers.download',$question_papers->id).'?document='.$document->path}}">Download</a>
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
