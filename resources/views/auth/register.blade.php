@extends('frontend.main_master')
@section('content')

<div class="body-content">
	<div style="margin-top: 4rem; margin-bottom: 4rem;">
		<div class="sign-in-page" style="max-width: 500px;">
			<div class="row">
 
    <div class="col-md-12 col-sm-12 create-new-account">
	    <h4 class="checkout-subtitle">Sign up</h4>
	    <p class="text title-tag-line">Create your new account.</p>

	    <form method="POST" action="{{ route('register') }}">
            @csrf
		    <div class="form-group">
	    	    <label class="info-title" for="exampleInputEmail2">Email Address <span>*</span></label>
	    	    <input type="email" class="form-control unicase-form-control text-input" id="email" name="email" >
                @error('email')
                    <span>
                        <strong style="color:red !important;">{{$message}}</strong>
                    </span>
                @enderror
	  	    </div>
            <div class="form-group">
		        <label class="info-title" for="exampleInputEmail1">Name <span>*</span></label>
		        <input type="text" class="form-control unicase-form-control text-input" id="name" name="name" >
                @error('name')
                    <span>
                        <strong style="color:red !important;">{{$message}}</strong>
                    </span>
                @enderror
		    </div>
            <div class="form-group">
		        <label class="info-title" for="exampleInputEmail1">Phone Number <span>*</span></label>
		        <input type="text" class="form-control unicase-form-control text-input" id="phone" name="phone" >
                @error('phone')
                    <span>
                        <strong style="color:red !important;">{{$message}}</strong>
                    </span>
                @enderror
		    </div>
            <div class="form-group">
		        <label class="info-title" for="exampleInputEmail1">Password <span>*</span></label>
		        <input type="password" class="form-control unicase-form-control text-input" id="password" name="password" >
                @error('password')
                    <span>
                        <strong style="color:red !important;">{{$message}}</strong>
                    </span>
                @enderror
		    </div>
            <div class="form-group">
		        <label class="info-title" for="exampleInputEmail1">Confirm Password <span>*</span></label>
		        <input type="password" class="form-control unicase-form-control text-input" id="password_confirmation" name="password_confirmation" >
                @error('password_confirmation')
                    <span>
                        <strong style="color:red !important;">{{$message}}</strong>
                    </span>
                @enderror
		    </div>
	  	    <button type="submit" class="btn-upper btn btn-primary checkout-page-button">Sign Up</button>
	    </form>
	
	
    </div> 		
    </div>
	</div>
    </div>
</div>

@endsection