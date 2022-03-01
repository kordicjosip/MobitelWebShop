@extends('admin.admin_master')
@section('admin')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<div class="container-full">

    <!-- Main content -->
    <section class="content">
        <div class="row">
        

            <div class="box">
                <div class="box-header with-border">
                  <h4 class="box-title">Edit Profile</h4>
                  <h6 class="box-subtitle">Update your account's profile information and email address.</h6>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                  <div class="row">
                    <div class="col">
                        <form method="post" action="{{route('admin.profile.update')}}" enctype="multipart/form-data">
                            @csrf
                          <div class="row">
                            <div class="col-12">						
                                
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <h5>Admin Username <span class="text-danger">*</span></h5>
                                        <div class="controls">
                                            <input type="text" name="name" class="form-control" value="{{$editData->name}}" required="" data-validation-required-message="This field is required"> <div class="help-block"></div></div>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <h5>Admin Email <span class="text-danger">*</span></h5>
                                        <div class="controls">
                                            <input type="email" name="email" class="form-control" value="{{$editData->email}}" required="" data-validation-required-message="This field is required"> <div class="help-block"></div></div>
                                    </div>
                                </div>

                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <h5>Profile Image <span class="text-danger">*</span></h5>
                                        <div class="controls">
                                            <input type="file" name="profile_photo_path" class="form-group" id="image">
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <img id="showImage" style="width: 150px; height: 150px;" src="{{(!empty($editData->profile_photo_path)) ? url('upload/admin_images/' .$editData->profile_photo_path) : url('upload/no_image.jpg') }}">
                                </div>
                            </div>
            
                            <div class="text-xs-right">
                                <input type="submit" class="btn btn-rounded btn-info" value="Update">
                            </div>
                        </form>
    
                    </div>
                    <!-- /.col -->
                  </div>
                  <!-- /.row -->
                </div>
                <!-- /.box-body -->
              </div>







        </div>
    </section>
    <!-- /.content -->
  </div>


 <script type="text/javascript">
     $(document).ready(function(){
        $('#image').change(function(e){
            var reader = new FileReader();
            reader.onload = function(e){
                $('#showImage').attr('src', e.target.result);
            }
            reader.readAsDataURL(e.target.files['0']);
        });
     });
 </script> 

  @endsection