<?php $page="pagee";?>
@extends('layout.mainlayout')
@section('content')		
<div id="app">
	<!-- Page Wrapper -->
	<div class="page-wrapper">
	    <div class="content container-fluid">
			
			@component('components.breadcrumb')                
		      @slot('title') Profile  @endslot
		      @slot('li_1') Dashboard @endslot
		      @slot('li_2') Profile @endslot
		      @slot('li_3') <i class="la la-table" aria-hidden="true"></i> @endslot
		  	@endcomponent
			  <div class="row m-t-30">
<div class="col-md-12">
							<div class="card">
								<div class="card-header">
									<h5 class="card-title">Profile Settings</h5>
								</div>
								<div class="card-body pt-0">
									<form id="save-profile" enctype="multipart/form-data">
										<div class="settings-form">
											<div class="form-group">
												<label>Name <span class="star-red">*</span></label>
												<input type="text" name="name" value="{{$user->name}}" class="form-control" placeholder="Full Name">
											</div>
											<div class="form-group">
												<label>Email <span class="star-red">*</span></label>
												<input type="text" name="email" value="{{$user->email}}" class="form-control" placeholder="Full Name">
											</div>
											<div class="form-group">
												<p class="settings-label">College Logo <span class="star-red">*</span></p>
												<div class="settings-btn">
													<input type="file" accept="image/*" multiple name="logo" id="file-input" class="hide-input">
													<label for="file" class="upload">
														<i class="feather-upload"></i>
													</label>
												</div>
												<div class="upload-images">
													<img src="{{$user->logo==null?'assets/img/logo.png':$user->logo}}" alt="Image">
												</div>
											</div>
											<div class="form-group">
												<p class="settings-label">Profile Picture</p>
												<div class="settings-btn">
													<input type="file" accept="image/*" multiple name="profile_picture" id="files-input" class="form-control">
												</div>
												<h6 class="settings-size mt-1">Accepted formats: only png and jpg</h6>
												<div class="upload-images upload-size">
													<img src="{{$user->logo==null?'assets/img/profiles/avatar-21.jpg':$user->logo}}" alt="Image">
												</div>
											</div>
											<div class="form-group mb-0">
												<div class="settings-btns">
													<button type="submit" id="btn-save" class="border-0 btn btn-primary btn-gradient-primary btn-rounded">Update</button>&nbsp;&nbsp;
												</div>
											</div>
										</div>
									</form>
								</div>
							</div>
						</div>

                        </div>			
	</div>
	<!-- /Page Wrapper -->
</div>
</div>
<script>
            $('#btn-save').on('click', function() {
          saveRecord(this,"POST","{{route('profile.store')}}","save-profile","Profile didn't updated. Please try again");
            });
</script>
@component('components.theme-settings')                
@endcomponent
@endsection