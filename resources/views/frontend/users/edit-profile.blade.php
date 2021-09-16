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
                        here you can update your profile
                    </h3>

                    <div class="card-body">
                        <form method="post" action="{{ route('user.profile.update') }}" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label class="info-title" for="name">Name <span>*</span></label>
                                <input type="text" class="form-control" name="name" value="{{ $user->name }}">
                            </div>
                            <div class="form-group">
                                <label class="info-title" for="email">Email <span>*</span></label>
                                <input type="email" class="form-control" name="email" value="{{ $user->email }}">
                            </div>
                            <div class="form-group">
                                <label class="info-title" for="phone">Phone <span>*</span></label>
                                <input type="text" class="form-control" name="phone" value="{{ $user->phone }}">
                            </div>
                            <div class="form-group">
                                <label class="info-title" for="profile_photo_path">Image <span>*</span></label>
                                <input type="file" class="form-control" name="profile_photo_path">
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-primary">Update</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection