@extends('frontend.main_master')
@section('content')


<div class="body-content">
	<div class="container" style="margin-top: 4rem; margin-bottom:4rem;">
		<div class="checkout-box ">
			<div class="row">
		    
<div class="col-md-6">
 <!-- checkout-progress-sidebar -->
<div class="checkout-progress-sidebar ">
	<div class="panel-group">
		<div class="panel panel-default">
			<div class="panel-heading">
		    	<h4 class="unicase-checkout-title">Your Payment Amount</h4>
		    </div>
		    <div class="">
                <ul class="nav nav-checkout-progress list-unstyled">
                    <li>
                        <strong>Grand Total: </strong> {{$cartTotal}}€
                    </li>    
                </ul>	
			</div>
		</div>
	</div>
</div> 
<!-- checkout-progress-sidebar -->		
</div>

<div class="col-md-6">
    <!-- checkout-progress-sidebar -->
   <div class="checkout-progress-sidebar ">
       <div class="panel-group">
           <div class="panel panel-default">
               <div class="panel-heading">
                   <h4 class="unicase-checkout-title">Selected Payment Method</h4>
               </div>
            <form action="{{route('cash.order')}}" method="post" id="payment-form">
                @csrf
                <div class="form-row">
                    <img src="{{asset('frontend/assets/images/payments/cash.png')}}" >
                    <label for="card-element">
                    </label>
                    <input type="hidden" name="name" value="{{$data['shipping_name']}}" >
                    <input type="hidden" name="email" value="{{$data['shipping_email']}}" >
                    <input type="hidden" name="phone" value="{{$data['shipping_phone']}}" >
                    <input type="hidden" name="post_code" value="{{$data['post_code']}}" >
                    <input type="hidden" name="country" value="{{$data['country']}}" >
                    <input type="hidden" name="city" value="{{$data['city']}}" >
                    <input type="hidden" name="address" value="{{$data['address']}}" >
                    <input type="hidden" name="notes" value="{{$data['notes']}}" >

                   
                </div>
                <br>
                <button class="btn btn-primary">Submit Payment</button>
            </form>
               
           </div>
       </div>
   </div> 
   <!-- checkout-progress-sidebar -->		
   </div>

			</div><!-- /.row -->
		</div><!-- /.checkout-box -->
	</div><!-- /.container -->
</div><!-- /.body-content -->



@endsection