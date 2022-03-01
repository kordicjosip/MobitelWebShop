@extends('frontend.main_master')
@section('content')

<div class="body-content">
    <div class="container" style="margin-top: 4rem; margin-bottom: 4rem;">
        <div class="row">
            @include('user_sidebar')
            
            <div class="col-md-10">
                <div class="table-responsive">
                    <table class="table">
                        <tbody>
                            <tr style="background: #e9e05f;">
                                <td class="col-md-2">
                                    <label for="">Order Date </label>
                                </td>
                                <td class="col-md-1">
                                    <label for="">Total Amount </label>
                                </td>
                                <td class="col-md-2">
                                    <label for="">Payment Method </label>
                                </td>
                                <td class="col-md-3">
                                    <label for="">Invoice Number</label>
                                </td>
                                <td class="col-md-2">
                                    <label for="">Order Status </label>
                                </td>
                                <td class="col-md-1">
                                    <label for="">Actions</label>
                                </td>
                            </tr>
                            @foreach($orders as $order)
                            <tr style="background: #e2e2e2;">
                                <td class="col-md-1">
                                    <label for="">{{$order->order_date}} </label>
                                </td>
                                <td class="col-md-1">
                                    <label for="">{{$order->amount}} €</label>
                                </td>
                                <td class="col-md-1">
                                    <label for="">{{$order->payment_method}} </label>
                                </td>
                                <td class="col-md-2">
                                    <label for="">{{$order->invoice_no}} </label>
                                </td>
                                <td class="col-md-1">
                                    <label for="">
                                        <span class="badge badge-pill badge-warning" style="background:#418DB9;">{{$order->status}}</span>
                                    </label>
                                </td>
                                <td class="col-md-3">
                                     <a href="{{url('user/order_details/'.$order->id)}}" class="btn btn-sm btn-info" title="View"><i class="fa fa-eye"></i></a>
                                     <a href="{{url('user/invoice_download/'.$order->id)}}" class="btn btn-sm btn-danger" title="Download"><i class="fa fa-download"></i></a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>



        </div> <!-- end row -->
    </div> <!-- end container -->
</div> <!-- end body-content -->



@endsection
