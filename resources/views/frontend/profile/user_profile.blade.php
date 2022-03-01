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
                    <h3 class="text-center">Edit Profile</h3>
                    <div class="card-body">
                        <form method="post" action="{{route('user.profile.update')}}" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label class="info-title" for="exampleInputEmail1">Name </label>
                                <input type="text" name="name" class="form-control" value="{{$user->name;}}">
                            </div>
                            <div class="form-group">
                                <label class="info-title" for="exampleInputEmail1">Email Address </label>
                                <input type="email" name="email" class="form-control" value="{{$user->email;}}">
                            </div>
                            <div class="form-group">
                                <label class="info-title" for="exampleInputEmail1">Phone Number </label>
                                <input type="text" name="phone" class="form-control" value="{{$user->phone;}}">
                            </div>
                            <div class="form-group">
                                <label class="info-title" for="exampleInputEmail1">User Image </label>
                                <input type="file" name="profile_photo_path">
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
