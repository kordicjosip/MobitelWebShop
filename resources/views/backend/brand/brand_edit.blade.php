@extends('admin.admin_master')
@section('admin')

    <div class="container-full">
      <!-- Content Header (Page header) -->
      <div class="content-header">
          <div class="d-flex align-items-center">
              <div class="mr-auto">
                  <h3>Brand Edit</h3>
              </div>
          </div>
      </div>

      <!-- Main content -->
      <section class="content">
        <div class="row"> 
          <!-- Add brand -->
          <div class="col-5">

            <div class="box">
               <div class="box-header with-border">
                 <h3 class="box-title">Edit</h3>
               </div>
               <!-- /.box-header -->
               <div class="box-body">
                   <div class="table-responsive">
                    <form method="post" action="{{route('brand.update')}}">
                        @csrf
                        <input type="hidden" name="id" value="{{$brand->id}}">
                        <div class="form-group">
                            <h5>Brand Name <span class="text-danger">*</span></h5>
                            <div class="controls">
                                <input type="text" id="brand_name" name="brand_name" class="form-control" value="{{$brand->brand_name}}">
                                @error('brand_name')
                    				<span>
                        				<strong style="color:red !important;">{{$message}}</strong>
                    				</span>
                				@enderror
                            </div>
                        </div>
                        <div class="text-xs-right">
                            <input type="submit" class="btn btn-md btn-info" value="Update">
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