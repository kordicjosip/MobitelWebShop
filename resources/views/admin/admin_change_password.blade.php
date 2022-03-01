@extends('admin.admin_master')
@section('admin')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<div class="container-full">

    <!-- Main content -->
    <section class="content">
        <div class="row">
        

            <div class="box">
                <div class="box-header with-border">
                  <h4 class="box-title">Change Password</h4>
                  <h6 class="box-subtitle">Ensure your account is using a long, random password to stay secure.</h6>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                  <div class="row">
                    <div class="col">
                        <form method="post" action="{{route('admin.update.password')}}">
                            @csrf
                          <div class="row">
                            <div class="col-12">						
                                
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <h5>Current Password <span class="text-danger">*</span></h5>
                                        <div class="controls">
                                            <input type="password" id="current_password" name="oldpassword" class="form-control" required="" data-validation-required-message="This field is required"> <div class="help-block"></div></div>
                                    </div>
                                    <div class="form-group">
                                        <h5>New Password <span class="text-danger">*</span></h5>
                                        <div class="controls">
                                            <input type="password" id="password" name="password" class="form-control" required="" data-validation-required-message="This field is required"> <div class="help-block"></div></div>
                                    </div>
                                    <div class="form-group">
                                        <h5>Confirm Password <span class="text-danger">*</span></h5>
                                        <div class="controls">
                                            <input type="password" id="password_confirmation" name="password_confirmation" class="form-control" required="" data-validation-required-message="This field is required"> <div class="help-block"></div></div>
                                    </div>
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


    <section class="content">
        <div class="row">

              <div class="box">
                <div class="box-header with-border">
                  <h4 class="box-title">Delete Account</h4>
                  <h6 class="box-subtitle">Permanently delete your account.</h6>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                  <div class="row">
                    <div class="col">
                        <p>Once your account is deleted, all of its resources and data will be permanently deleted. Before deleting your account, please download any data or information that you wish to retain.</p>
                        <div class="text-xs-right">
                            <button type="button" class="btn btn-rounded btn-danger">DELETE ACCOUNT</button>
                        </div>
    
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