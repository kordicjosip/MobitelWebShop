@extends('frontend.main_master')
@section('content')

<div class="body-content">
	<div style="margin-top: 4rem; margin-bottom: 4rem;">
		<div class="sign-in-page" style="max-width: 500px;">
			<div class="row">
				<!-- Sign-in -->			
    <div class="col-md-12 col-sm-12 sign-in">
	    <h4 class="">Login</h4>
	    <p class="">Hello, Welcome to your account.</p>
	    <form method="POST" action="{{ isset($guard) ? url($guard.'/login') : route('login') }}">
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
	  	    <div class="form-group">
		        <label class="info-title" for="exampleInputPassword1">Password <span>*</span></label>
		        <input type="password" class="form-control unicase-form-control text-input" id="password" name="password" >
                @error('password')
                    <span>
                        <strong style="color:red !important;">{{$message}}</strong>
                    </span>
                @enderror
		    </div>
		    <div class="radio outer-xs">
		  	    <label>
		    	    <input type="radio" name="remember" id="remember_me" value="option2">Remember me!
		  	    </label>
		  	    <a href="{{ route('password.request') }}" class="forgot-password pull-right">Forgot your Password?</a>
		    </div>
	  	    <button type="submit" class="btn-upper btn btn-primary checkout-page-button">Login</button>
	    </form>					
    </div><!-- Sign-in -->

    	
    </div>
	</div>
    </div>
</div>

@endsection