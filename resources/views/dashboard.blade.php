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
                    <h3 class="text-center">Hi <strong>{{ Auth::user()->name }}</strong>, welcome to WebShop!</h3>
                </div>
            </div>
        </div> <!-- end row -->
    </div> <!-- end container -->
</div> <!-- end body-content -->



@endsection
