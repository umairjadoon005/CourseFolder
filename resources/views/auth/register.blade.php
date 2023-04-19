@extends('layout.mainlayout')
@section('content')
<!-- Main Wrapper -->
<div class="main-wrapper">
			<div class="account-content">
				
				<div class="container">
				
					<!-- Account Logo -->
					<div class="account-logo">
						<a href="index.html"><img src="assets/img/logo.png"></a>
					</div>
					<!-- /Account Logo -->
					
					<div class="account-box">
						<div class="account-wrapper">
							<h3 class="account-title">{{ __('Register') }}</h3>
							<p class="account-subtitle">Access to our dashboard</p>
							
							<!-- Account Form -->
                            <form method="POST" action="{{ route('register') }}">
                        @csrf
                        <div class="form-group">
									<label>{{ __('Name') }}</label>
                                    <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

@error('name')
    <span class="invalid-feedback" role="alert">
        <strong>{{ $message }}</strong>
    </span>
@enderror
								</div>
                        <div class="form-group">
									<label>{{ __('Email Address') }}</label>
                                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

@error('email')
    <span class="invalid-feedback" role="alert">
        <strong>{{ $message }}</strong>
    </span>
@enderror
								</div>
								<div class="form-group">
									<label>{{ __('Password') }}</label>
                                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

@error('password')
    <span class="invalid-feedback" role="alert">
        <strong>{{ $message }}</strong>
    </span>
@enderror
								</div>
								<div class="form-group">
									<label>{{ __('Confirm Password') }}</label>
                                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
								</div>
								<div class="form-group text-center">
									<button class="btn btn-primary account-btn" type="submit">{{ __('Register') }}</button>
								</div>
								<div class="account-footer">
									<p>Already have an account? <a href="{{route('login')}}">{{ __('Login') }}</a></p>
								</div>
							</form>
							<!-- /Account Form -->
						</div>
					</div>
				</div>
			</div>
        </div>
		<!-- /Main Wrapper -->
        @endsection


