@extends('frontend.main_master')
@section('content')

<div class="body-content">
	<div style="margin-top: 4rem; margin-bottom: 4rem;">
		<div class="sign-in-page" style="max-width: 500px;">
			<div class="row">
		
    <div class="col-md-12 col-sm-12 mx-auto">
	    <h4 class="">Forgot your password?</h4>
        <hr>
	    <p class=""> No problem. Just let us know your email address and we will email you a password reset link that will allow you to choose a new one.</p>
	    
        <form method="POST" action="{{ route('password.email') }}">
            @csrf
		    <div class="form-group">
		        <label class="info-title" for="exampleInputEmail1">Email Address <span>*</span></label>
		        <input type="email" name="email" class="form-control unicase-form-control text-input" id="email" >
                @error('email')
                    <span>
                        <strong style="color:red !important;">{{$message}}</strong>
                    </span>
                @enderror
		    </div>
	  	    <button type="submit" class="btn-upper btn btn-primary checkout-page-button">Send Reset Link</button>
	    </form>					
    </div>

    	
    </div>
	</div>
    </div>
</div>

@endsection