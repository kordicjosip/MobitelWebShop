@extends('frontend.main_master')
@section('content')

<div class="body-content">
    <div class="container" style="margin-top: 4rem; margin-bottom: 4rem;">
        <div class="row">
            @include('user_sidebar')
            
            <div class="col-md-5">
                <div class="card">
                    <div class="card-header"><h4>Shipping Details</h4></div>
                    <hr>
                    <div class="card-body" style="background: #E9EBEC">
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


            <div class="col-md-5">
                <div class="card">
                    <div class="card-header"><h4>Order Details
                        <span class="text-danger"> Invoice: {{$order->invoice_no}}</span></h4>
                    </div>
                   
                    <hr>
                    <div class="card-body" style="background: #E9EBEC">
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
                        </table>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-2"></div>
                <div class="col-md-10">
                    <div class="table-responsive">
                        <table class="table">
                            <tbody>
                                <tr style="background: #e9e05f;">
                                    <td class="col-md-2">
                                        <label for="">Image </label>
                                    </td>
                                    <td class="col-md-3">
                                        <label for="">Product Name </label>
                                    </td>
                                    <td class="col-md-3">
                                        <label for="">Product Code </label>
                                    </td>
                                    <td class="col-md-2">
                                        <label for="">Color </label>
                                    </td>
                                    <td class="col-md-1">
                                        <label for="">Quantity </label>
                                    </td>
                                    <td class="col-md-2">
                                        <label for="">Price </label>
                                    </td>
                                    <td class="col-md-2">
                                        <label for="">Total </label>
                                    </td>
                                </tr>
                                @foreach($orderItem as $item)
                                <tr style="background: #e2e2e2;">
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

        </div> <!-- end row -->
    </div> <!-- end container -->
</div> <!-- end body-content -->



@endsection
