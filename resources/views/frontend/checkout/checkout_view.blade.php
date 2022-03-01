@extends('frontend.main_master')
@section('content')

<div class="body-content">
	<div class="container" style="margin-top: 4rem; margin-bottom:4rem;">
		<div class="checkout-box ">
			<div class="row">
				<div class="col-md-8">
					<div class="panel-group checkout-steps" id="accordion">
						<!-- checkout-step-01  -->
                        
<div class="panel panel-default checkout-step-01">
    <h4>ADDRESS FOR SHIPPING AND BILLING</h4>
	<div id="collapseOne" class="panel-collapse collapse in">

		<!-- panel-body  -->
	    <div class="panel-body">
    <form class="register-form" method="post" action="{{route('checkout.store')}}">
        @csrf
		<div class="row">		
            <div class="col-md-6 col-sm-6 already-registered-login">
               
                <div class="form-group">
                    <label class="info-title" for="exampleInputEmail1">Full Name <span>*</span></label>
                    <input type="text" name="shipping_name" class="form-control unicase-form-control text-input" id="exampleInputEmail1" placeholder="Full Name" value="{{ Auth::user()->name }}" required="">
                  </div>  <!-- // end form group  -->
            
            
                <div class="form-group">
                    <label class="info-title" for="exampleInputEmail1">Email <span>*</span></label>
                    <input type="email" name="shipping_email" class="form-control unicase-form-control text-input" id="exampleInputEmail1" placeholder="Email" value="{{ Auth::user()->email }}" required="">
                  </div>  <!-- // end form group  -->
            
            
                <div class="form-group">
                    <label class="info-title" for="exampleInputEmail1">Phone <span>*</span></label>
                    <input type="text" name="shipping_phone" class="form-control unicase-form-control text-input" id="exampleInputEmail1" placeholder="Phone" value="{{ Auth::user()->phone }}" required="">
                  </div>  <!-- // end form group  -->
            
            
                  <div class="form-group">
                    <label class="info-title" for="exampleInputEmail1">Post Code <span>*</span></label>
                    <input type="text" name="post_code" class="form-control unicase-form-control text-input" id="exampleInputEmail1" placeholder="Post Code" required="">
                  </div>  <!-- // end form group  -->
                
            </div>	
				<!-- guest-login -->
          
				<!-- already-registered-login -->
				<div class="col-md-6 col-sm-6 already-registered-login">
					

                        <div class="form-group">
                            <label class="info-title" for="exampleInputEmail1">Country <span>*</span></label>
                            <input type="text" name="country" class="form-control unicase-form-control text-input" id="exampleInputEmail1" required="">
                          </div>  <!-- // end form group  -->
                    
                    
                    <div class="form-group">
                            <label class="info-title" for="exampleInputEmail1">City <span>*</span></label>
                            <input type="text" name="city" class="form-control unicase-form-control text-input" id="exampleInputEmail1"  required="">
                          </div>  <!-- // end form group  -->
                    
                    
                    <div class="form-group">
                            <label class="info-title" for="exampleInputEmail1">Address <span>*</span></label>
                            <input type="text" name="address" class="form-control unicase-form-control text-input" id="exampleInputEmail1"  required="">
                          </div>  <!-- // end form group  -->
                    
                    
                          <div class="form-group">
                            <label class="info-title" for="exampleInputEmail1">Notes <span>*</span></label>
                            <textarea name="notes" class="form-control unicase-form-control text-input" cols="30" rows="5"></textarea>
                          </div>  <!-- // end form group  -->
                          
				</div>	
				<!-- already-registered-login -->		
		</div>
    		
		</div>
		<!-- panel-body  -->

	</div><!-- row -->
</div>
<!-- checkout-step-01  -->

					  	
					</div><!-- /.checkout-steps -->
				</div>
		    
<div class="col-md-4">
 <!-- checkout-progress-sidebar -->
<div class="checkout-progress-sidebar ">
	<div class="panel-group">
		<div class="panel panel-default">
			<div class="panel-heading">
		    	<h4 class="unicase-checkout-title">Your Checkout Progress</h4>
		    </div>
		    <div class="">
                @foreach ($carts as $item)
                <div class="row" style="margin-bottom:2rem;">
                    <div class="col-md-4">
                        <img src="{{asset($item->options->image)}}" style="height: 130px; width: 120px;" >
                    </div>
                    <div class="col-md-8">
                        <p><strong>Name: </strong>{{$item->name}}</p>
                        <p><strong>Quantity: </strong>{{$item->qty}}</p>
                        <p><strong>Color: </strong>{{$item->options->color}}</p>
                        <p><strong>Price: </strong>{{$item->price}}€</p>
                        <p><strong>SubTotal: </strong>{{$item->subtotal}}€</p>
                    </div>
                </div>
                @endforeach	
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

<div class="col-md-4">
    <!-- checkout-progress-sidebar -->
   <div class="checkout-progress-sidebar ">
       <div class="panel-group">
           <div class="panel panel-default">
               <div class="panel-heading">
                   <h4 class="unicase-checkout-title">Select Payment Method</h4>
               </div>
               <div class="row">
                   	<div class="col-md-4">
                        <label for="">Stripe</label>
                        <input type="radio" name="payment_method" value="stripe">
                        <img src="{{asset('frontend/assets/images/payments/3.png')}}" >
                    </div>
                    <div class="col-md-4">
                        <label for="">Card</label>
                        <input type="radio" name="payment_method" value="card">
                        <img src="{{asset('frontend/assets/images/payments/4.png')}}" >
                    </div>
                    <div class="col-md-4">
                        <label for="">Cash</label>
                        <input type="radio" name="payment_method" value="cash">
                        <img src="{{asset('frontend/assets/images/payments/6.png')}}" >
                    </div>
               </div>
               <hr>
               <button type="submit" class="btn-upper btn btn-primary checkout-page-button">Payment Step</button>
           </div>
       </div>
   </div> 
   <!-- checkout-progress-sidebar -->		
   </div>

</form>	
			</div><!-- /.row -->
		</div><!-- /.checkout-box -->
	</div><!-- /.container -->
</div><!-- /.body-content -->


@endsection