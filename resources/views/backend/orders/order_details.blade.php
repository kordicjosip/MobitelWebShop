@extends('admin.admin_master')
@section('admin')

    <div class="container-full">

      <!-- Main content -->
      <section class="content">
        <div class="row"> 
         
            <div class="col-md-6 col-12">
				<div class="box box-bordered border-primary">
				  <div class="box-header with-border">
					<h4 class="box-title"><strong>Shipping Details</strong></h4>
				  </div>
				  <div class="box-body">
					<table class="table">
                        <tr>
                            <th>Name: </th>
                            <th>{{$order->name}} </th>
                        </tr>
                        <tr>
                            <th>Phone: </th>
                            <th>{{$order->phone}} </th>
                        </tr>
                        <tr>
                            <th>Email: </th>
                            <th>{{$order->email}} </th>
                        </tr>
                        <tr>
                            <th>Address: </th>
                            <th>{{$order->address}} </th>
                        </tr>
                        <tr>
                            <th>Post Code: </th>
                            <th>{{$order->post_code}} </th>
                        </tr>
                        <tr>
                            <th>Order Date: </th>
                            <th>{{$order->order_date}} </th>
                        </tr>
                    </table>
				  </div>
				</div>
			</div>

            <div class="col-md-6 col-12">
				<div class="box box-bordered border-primary">
				  <div class="box-header with-border">
					<h4 class="box-title"><strong>Order Details</strong> <span class="text-danger"> Invoice: {{$order->invoice_no}}</span></h4></h4>
				  </div>
				  <div class="box-body">
					<table class="table">
                        <tr>
                            <th>Name: </th>
                            <th>{{$order->name}} </th>
                        </tr>
                        <tr>
                            <th>Phone: </th>
                            <th>{{$order->phone}} </th>
                        </tr>
                        <tr>
                            <th>Payment Type: </th>
                            <th>{{$order->payment_method}} </th>
                        </tr>
                        <tr>
                            <th>Transaction ID: </th>
                            <th>{{$order->transaction_id}} </th>
                        </tr>
                        <tr>
                            <th>Order Total: </th>
                            <th>{{$order->amount}} €</th>
                        </tr>
                        <tr>
                            <th>Order Status: </th>
                            <th> <span class="badge badge-pill badge-warning" style="background:#418DB9;">{{$order->status}}</span> </th>
                        </tr>
                        <tr>
                            <th>
                                @if($order->status == 'Pending')
                                <a href="{{route('pending-confirm', $order->id)}}" class="btn btn-block btn-success" id="confirm">Confirm Order</a>
                                @elseif($order->status == 'confirmed')
                                <a href="{{route('confirm-processing', $order->id)}}" class="btn btn-block btn-success" id="processing">Processing Order</a>
                                @elseif($order->status == 'processing')
                                <a href="{{route('processing-shipped', $order->id)}}" class="btn btn-block btn-success" id="shipped">Ship Order</a>
                                @elseif($order->status == 'shipped')
                                <a href="{{route('shipped-delivered', $order->id)}}" class="btn btn-block btn-success" id="delivered">Delivered Order</a>
                                @endif
                            </th>
                        </tr>
                    </table>
				  </div>
				</div>
			</div>

            <div class="col-md-12 col-12">
				<div class="box box-bordered border-primary">
                    <div class="box-body">
                    <table class="table">
                        <tbody>
                            <tr style="background:#052e46">
                                <td class="col-md-2">
                                    <label for=""><strong>Image </strong></label>
                                </td>
                                <td class="col-md-3">
                                    <label for=""><strong>Product Name </strong></label>
                                </td>
                                <td class="col-md-3">
                                    <label for=""><strong>Product Code </strong></label>
                                </td>
                                <td class="col-md-2">
                                    <label for=""><strong>Color </strong></label>
                                </td>
                                <td class="col-md-1">
                                    <label for=""><strong>Quantity </strong></label>
                                </td>
                                <td class="col-md-2">
                                    <label for=""><strong>Price </strong></label>
                                </td>
                                <td class="col-md-2">
                                    <label for=""><strong>Total </strong></label>
                                </td>
                            </tr>
                            @foreach($orderItem as $item)
                            <tr>
                                <td class="col-md-2">
                                    <label for=""><img src="{{asset($item->product->product_thambnail)}}" style="height:100px; width:100px;" > </label>
                                </td>
                                <td class="col-md-3">
                                    <label for="">{{$item->product->product_name}} </label>
                                </td>
                                <td class="col-md-3">
                                    <label for="">{{$item->product->product_code}} </label>
                                </td>
                                <td class="col-md-2">
                                    <label for="">{{$item->color}} </label>
                                </td>
                                <td class="col-md-1">
                                    <label for="">{{$item->qty}} </label>
                                </td>
                                <td class="col-md-2">
                                    <label for="">{{$item->price}}€</label>
                                </td>
                                <td class="col-md-2">
                                    <label for="">{{$item->price*$item->qty}}€</label>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    </div>
				</div>
			</div>


        </div>
        <!-- /.row -->
      </section>
      <!-- /.content -->
    
    </div>



@endsection