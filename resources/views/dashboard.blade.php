@extends('frontend.layouts.master')

@section('content')
<div class="body-content">
    <div class="container">
        <div class="row">
            <div class="col-md-2">
                <br><img class="card-img-top" style="border-radius: 50%; height: 100%; width:100%;" src="{{ (!empty($user->profile_photo_path)) ? 
                    url('upload/user/'.$user->profile_photo_path) : url('upload/no_image.jpg') }}" alt="photo"><br><br>
                <ul class="list-group list-group-flush">
                    <a href="{{ url('/') }}" class="btn-sm btn-primary btn-block">Home</a>
                    <a href="{{ route('user.profile') }}" class="btn-sm btn-primary btn-block">Profile Update</a>
                    <a href="{{ route('user.change.password') }}" class="btn-sm btn-primary btn-block">Change Password</a>
                    <a href="{{ route('user.logout') }}" class="btn-sm btn-danger btn-block">Logout</a>
                </ul>
            </div>
            <div class="col-md-2">

            </div>
            <div class="col-md-6">
                <div class="card">
                    <h3 class="text-center">
                        <span class="text-danger">Hi, </span>
                        <strong>{{ Auth::user()->name }}</strong>
                        welcome to E-Shop
                    </h3>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection