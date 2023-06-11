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
                <h4 class="modal-title text-center">Add Result</h4>
              </div>

            <div class="modal-body">
                <div class="row">
                    <div class="col-md-12">
                        <form id="save-result" enctype="multipart/form-data">
                        @csrf 
                        <div class="form-group row">
                                <div class="col-md-12"><label class="col-form-label">Paper<span class="text-danger">*</span></label></div>
                                <div class="col-md-12">
                                    <select class="form-control" name="paper_id">
                                        @foreach($question_papers as $paper)
                                        <option @if($result->paper_id==$paper->id) selected @endif value="{{$paper->id}}">{{$paper->paper_type}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-md-12"><label class="col-form-label">Title<span class="text-danger">*</span></label></div>
                                <div class="col-md-12">
                                    <input type="text" class="form-control" placeholder="Title" value="{{$result->title}}" name="title">
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-sm-12">
                                    <label class="col-form-label">Description<span class="text-danger">*</span></label>
                                    <textarea class="form-control"  name="description" placeholder="Description">{{$result->description}}</textarea>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-sm-12">
                                    <label class="col-form-label">Upload Result<span class="text-danger">*</span></label>
                                    <br>
                                    <input type="file" id="file-input" class="form-control" multiple="true" name="result_document[]">
                                </div>
                            </div>
                            <div class="text-center py-3">
                                <button type="button" id="btn-save" class="border-0 btn btn-primary btn-gradient-primary btn-rounded">Save</button>&nbsp;&nbsp;
                                <button type="button" class="btn btn-secondary btn-rounded" data-bs-dismiss="modal">Cancel</button>
                            </div>
                        </form>
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
<script>
            $('#btn-save').on('click', function() {
          saveRecord(this,"PUT","{{route('results.update',$result->id)}}","save-result","Result didn't updated. Please try again");
            });
</script>
@endsection