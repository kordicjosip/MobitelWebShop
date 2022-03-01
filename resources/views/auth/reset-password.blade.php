@extends('frontend.main_master')
@section('content')

<div class="body-content">
	<div style="margin-top: 4rem; margin-bottom: 4rem;">
		<div class="sign-in-page" style="max-width: 500px;">
			<div class="row">
					
    <div class="col-md-12 col-sm-12 mx-auto">
	    <h4 class="">Reset password</h4>
        <hr>
	    <form method="POST" action="{{ route('password.update') }}">
            @csrf
            <input type="hidden" name="token" value="{{ $request->route('token') }}">
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
            <div class="form-group">
		        <label class="info-title" for="exampleInputPassword1">Password <span>*</span></label>
		        <input type="password" class="form-control unicase-form-control text-input" id="password_confirmation" name="password_confirmation" >
                @error('password_confirmation')
                    <span>
                        <strong style="color:red !important;">{{$message}}</strong>
                    </span>
                @enderror
		    </div>
		    
	  	    <button type="submit" class="btn-upper btn btn-primary checkout-page-button">Reset Password</button>
	    </form>					
    </div>

    	
    </div>
	</div>
    </div>
</div>

@endsection