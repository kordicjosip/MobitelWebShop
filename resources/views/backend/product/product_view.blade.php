@extends('admin.admin_master')
@section('admin')

<div class="container-full">
    <!-- Main content -->
    <section class="content">
      <div class="row"> 
        <div class="col-12">

         <div class="box">
            <div class="box-header with-border">
              <h3 class="box-title">Product List</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                <div class="table-responsive">
                  <table id="example1" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>Image</th>
                            <th>Product Name</th>
                            <th>Price</th>
                            <th>Quantity</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($products as $item)
                        <tr>
                            <td><img src="{{asset($item->product_thambnail)}}" style="widht: 70px; height: 60px;"></td>
                            <td>{{ $item->product_name; }}</td>
                            <td>{{ $item->product_price; }}<span> €</span></td>
                            <td>{{ $item->product_quantity; }}</td>
                            <td>
                                @if($item->status == 1)
                                    <span class="badge badge-pill badge-success"> Active </span>
                                @else
                                <span class="badge badge-pill badge-danger"> InActive </span>
                                @endif
                            </td>
                            <td>
                                <a href="{{route('product.edit', $item->id)}}" class="btn btn-info btn-md" title="Edit Data"><i class="fa fa-pencil"></i></a>
                                <a href="{{route('product.delete', $item->id)}}" id="delete" class="btn btn-danger btn-md" title="Delete Data"><i class="fa fa-trash"></i></a>
                                @if($item->status == 1)
                                    <a href="{{route('product.inactive', $item->id)}}" class="btn btn-warning btn-md" title="Set InActive"><i class="fa fa-arrow-down"></i></a>
                                @else
                                    <a href="{{route('product.active', $item->id)}}" class="btn btn-success btn-md" title="Set Active"><i class="fa fa-arrow-up"></i></a>
                                @endif
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