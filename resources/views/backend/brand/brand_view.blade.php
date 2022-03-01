@extends('admin.admin_master')
@section('admin')

    <div class="container-full">
      <!-- Content Header (Page header) -->
      <div class="content-header">
          <div class="d-flex align-items-center">
              <div class="mr-auto">
                  <h3>All Brands</h3>
              </div>
          </div>
      </div>

      <!-- Main content -->
      <section class="content">
        <div class="row"> 
          <div class="col-7">

           <div class="box">
              <div class="box-header with-border">
                <h3 class="box-title">Brand List</h3>
              </div>
              <!-- /.box-header -->
              <div class="box-body">
                  <div class="table-responsive">
                    <table id="example1" class="table table-bordered table-striped">
                      <thead>
                          <tr>
                              <th>ID</th>
                              <th>Brand Name</th>
                              <th>Action</th>
                          </tr>
                      </thead>
                      <tbody>
                          @foreach($brands as $item)
                          <tr>
                              <td>{{ $item->id; }}</td>
                              <td>{{ $item->brand_name; }}</td>
                              <td>
                                  <a href="{{ route('brand.edit', $item->id) }}" class="btn btn-warning btn-sm">Edit</a>
                                  <a href="{{ route('brand.delete', $item->id) }}" id="delete" class="btn btn-danger btn-sm">Delete</a>
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

          <!-- Add brand -->
          <div class="col-5">

            <div class="box">
               <div class="box-header with-border">
                 <h3 class="box-title">Add Brand </h3>
               </div>
               <!-- /.box-header -->
               <div class="box-body">
                   <div class="table-responsive">
                    <form method="post" action="{{route('brand.store')}}">
                        @csrf
                        <div class="form-group">
                            <h5>Brand Name <span class="text-danger">*</span></h5>
                            <div class="controls">
                                <input type="text" id="brand_name" name="brand_name" class="form-control">
                                @error('brand_name')
                    				<span>
                        				<strong style="color:red !important;">{{$message}}</strong>
                    				</span>
                				@enderror
                            </div>
                        </div>
                        <div class="text-xs-right">
                            <input type="submit" class="btn btn-md btn-info" value="Add New">
                        </div>
                    </form>
                   </div>
               </div>
               <!-- /.box-body -->
             </div>        
           </div>




        </div>
        <!-- /.row -->
      </section>
      <!-- /.content -->
    
    </div>



@endsection