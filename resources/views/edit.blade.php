<?php $page="pagee";?>
@extends('layout.mainlayout')
@section('content')	

<div class="page-wrapper">
    <div class="container container-fluid">
              @component('components.breadcrumb')                
		      @slot('title') Profile  @endslot
		      @slot('li_1') Dashboard @endslot
		      @slot('li_2') Profile @endslot
		      @slot('li_3') <i class="la la-table" aria-hidden="true"></i> @endslot
		 	@endcomponent

             <div class="row m-t-30">
                <div class="col-md-12">
                        
        <h3>Update Password</h1>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('update') }}" method="POST">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label for="current_password">Current Password</label>
                <input type="password" name="current_password" class="form-control">
            </div>

            <div class="form-group">
                <label for="new_password">New Password</label>
                <input type="password" name="new_password" class="form-control">
            </div>

            <div class="form-group">
                <label for="new_password_confirmation">Confirm New Password</label>
                <input type="password" name="new_password_confirmation" class="form-control">
            </div>

            <button type="submit" class="btn btn-primary">Update Password</button>
        </form>
            </div>
        </div>
    </div>
</div>
 @component('components.theme-settings')                
@endcomponent
@endsection
