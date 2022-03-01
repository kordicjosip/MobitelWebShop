@extends('admin.admin_master')
@section('admin')

    <div class="container-full">

      <!-- Main content -->
      <section class="content">
        <div class="row"> 
          <div class="col-12">

           <div class="box">
              <div class="box-header with-border">
                <h3 class="box-title">Shipped Orders</h3>
              </div>
              <!-- /.box-header -->
              <div class="box-body">
                  <div class="table-responsive">
                    <table id="example1" class="table table-bordered table-striped">
                      <thead>
                          <tr>
                              <th>Order Date</th>
                              <th>Total Amount</th>
                              <th>Payment Method</th>
                              <th>Invoice Number</th>
                              <th>Order Status</th>
                              <th>Actions</th>
                          </tr>
                      </thead>
                      <tbody>
                          @foreach($orders as $order)
                          <tr>
                              <td>{{ $order->order_date; }}</td>
                              <td>{{ $order->amount; }}€</td>
                              <td>{{ $order->payment_method; }}</td>
                              <td>{{ $order->invoice_no; }}</td>
                              <td>
                                <span class="badge badge-pill badge-warning" style="background:#418DB9;">{{$order->status}}</span>
                              </td>
                              <td>
                                <a href="{{route('pending.order.details',$order->id)}}" class="btn btn-sm btn-info" title="View"><i class="fa fa-eye"></i></a>
                                
                              </td>
                          </tr>
                          @endforeach
                      </tbody>
                    </table>
                  </div>
              </div>
              <!-- /.box-body -->
            </div>        
          </div>
          <!-- /.col -->



        </div>
        <!-- /.row -->
      </section>
      <!-- /.content -->
    
    </div>



@endsection