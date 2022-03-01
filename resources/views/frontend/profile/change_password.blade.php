@extends('frontend.main_master')
@section('content')

<div class="body-content">
    <div class="container" style="margin-top: 4rem; margin-bottom: 4rem;">
        <div class="row">
            @include('user_sidebar')
            <div class="col-md-2">

            </div>
            <div class="col-md-6">
                <div class="card">
                    <h3 class="text-center">Change Password</h3>
                    <div class="card-body">
                        <form method="post" action="{{route('user.update_password')}}">
                            @csrf
                            <div class="form-group">
                                <label class="info-title" for="exampleInputEmail1">Current Password </label>
                                <input type="password" name="oldpassword" id="current_password" class="form-control">
                            </div>
                            <div class="form-group">
                                <label class="info-title" for="exampleInputEmail1">New Password </label>
                                <input type="password" name="password" id="password" class="form-control">
                            </div>
                            <div class="form-group">
                                <label class="info-title" for="exampleInputEmail1">Confirm Password </label>
                                <input type="password" name="password_confirmation" id="password_confirmation" class="form-control">
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-danger pull-right">Update</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div> <!-- end row -->
    </div> <!-- end container -->
</div> <!-- end body-content -->



@endsection
