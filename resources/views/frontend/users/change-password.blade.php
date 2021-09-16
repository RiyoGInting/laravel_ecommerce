@extends('frontend.layouts.master')

@section('content')
<div class="body-content">
    <div class="container">
        <div class="row">
            <div class="col-md-2">
                @php
                $user = DB::table('users')->where('id', Auth::user()->id)->first();
                @endphp
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
                        Update Password
                    </h3>
                    <span>
                        Ensure your account is using a long, random password to stay secure.
                    </span>
                    <br><br>
                    <div class="card-body">
                        <form method="post" action="{{ route('user.update.password') }}">
                            @csrf
                            <div class="form-group">
                                <label class="info-title" for="current_password">Current Password <span>*</span></label>
                                <input type="password" class="form-control" name="current_password" id="current_password">
                            </div>
                            <div class="form-group">
                                <label class="info-title" for="password">New Password <span>*</span></label>
                                <input type="password" class="form-control" name="password" id="password">
                            </div>
                            <div class="form-group">
                                <label class="info-title" for="password_confirmation">Confirmation Password <span>*</span></label>
                                <input type="password" class="form-control" name="password_confirmation" id="password_confirmation">
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-primary">Change Password</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection