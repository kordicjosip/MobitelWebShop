@extends('frontend.main_master')
@section('content')

<div class="body-content outer-top-xs">
	<div class="container" style="margin-top: 3rem; margin-bottom: 4rem;">
		<div class="row ">
			<div class="shopping-cart">
				<div class="shopping-cart-table ">
	<div class="table-responsive">
		<table class="table">
			<thead>
				<tr>
					<th class="cart-romove item">Remove</th>
					<th class="cart-description item">Image</th>
					<th class="cart-product-name item">Product Name</th>
					<th class="cart-qty item">Quantity</th>
					<th class="cart-sub-total item">Price</th>
					<th class="cart-total last-item">Grandtotal</th>
				</tr>
			</thead><!-- /thead -->
			<tfoot>
				<tr>
					<td colspan="7">
						<div class="shopping-cart-btn">
							<span class="">
								<a href="{{url('/')}}" class="btn btn-upper btn-primary outer-left-xs">Continue Shopping</a>
							</span>
						</div><!-- /.shopping-cart-btn -->
					</td>
				</tr>
			</tfoot>
			<tbody id="cartPage">
				
			</tbody><!-- /tbody -->
		</table><!-- /table -->
	</div>
</div><!-- /.shopping-cart-table -->				


<div class="col-md-4 col-sm-12 cart-shopping-total pull-right">
	<table class="table">
		<thead>
			<tr>
				<th>
					<div class="cart-sub-total">
						Subtotal<span class="inner-left-md" id="subtotal"></span> €
					</div>
					<div class="cart-grand-total">
						Grand Total<span class="inner-left-md" id="grandtotal"></span> €
					</div>
				</th>
			</tr>
		</thead><!-- /thead -->
		<tbody>
				<tr>
					<td>
						<div class="cart-checkout-btn pull-right">
							<a href="{{route('checkout')}}" type="submit" class="btn btn-primary checkout-btn">PROCCED TO CHEKOUT</a>
						</div>
					</td>
				</tr>
		</tbody><!-- /tbody -->
	</table><!-- /table -->
</div><!-- /.cart-shopping-total -->			


</div><!-- /.shopping-cart -->
		</div> <!-- /.row -->
	</div><!-- /.container -->
</div>

@endsection