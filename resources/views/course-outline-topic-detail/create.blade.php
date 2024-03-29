@extends('layout.mainlayout')
@section('content')
<!-- Page Wrapper -->
<div class="page-wrapper">

    <!-- Page Content -->
    <div class="content container-fluid">

        @component('components.breadcrumb')
        @slot('title') Course Outline Topic Details @endslot
        @slot('li_1') Dashboard @endslot
        @slot('li_2') Course Outline Topic Details @endslot
        @slot('li_3') <i class="feather-smartphone"></i> @endslot
        @endcomponent

        <!-- Content Starts -->
        <div class="row">
            <div class="col-md-12">
                <div class="card mb-0">
                    <div class="card-body">
                        <div class="modal-header">
                            <h4 class="modal-title text-center">Add Course Outline Topic Details</h4>
                        </div>

                        <div class="modal-body">
                            <div class="row">
                                <div class="col-md-12">
                                    <form id="save-outline">
                                        @csrf
                                        <input type="hidden" name="outline_id" value="{{$id}}"/>
                                        <div class="form-group row">
                                            <div class="col-sm-12">
                                                <div class="form-group">
                                                    <label class="col-form-label">Week Number<span class="text-danger">*</span></label>
                                                    <input class="form-control" type="text" placeholder="Week 1" name="week_no" >
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <div class="col-sm-12">
                                                <label class="col-form-label">Topics<span class="text-danger">*</span></label>
                                                <textarea class="form-control" name="topics" rows="3" ></textarea>
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
        saveRecord(this, "POST", "{{route('course-outline-topic-detail.store')}}", "save-outline", "Record hasn't been saved. Please try again");
    });
</script>
@endsection