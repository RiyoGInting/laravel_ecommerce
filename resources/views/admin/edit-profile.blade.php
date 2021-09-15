@extends('admin.layouts.master')

@section('content')
<div class="container-full">
    <section class="content">

        <!-- Basic Forms -->
        <div class="box">
            <div class="box-header with-border">
                <h4 class="box-title">Update Profile</h4>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                <div class="row">
                    <div class="col">
                        <form method="post" action="{{ route('admin.profile.update') }}" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="col-12">

                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <h5>Name <span class="text-danger">*</span></h5>
                                                <div class="controls">
                                                    <input type="text" name="name" class="form-control" value="{{ $admin->name }}" required="">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <h5>Email <span class="text-danger">*</span></h5>
                                            <div class="controls">
                                                <input type="email" name="email" class="form-control" value="{{ $admin->email }}" required="">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <h5>Profile Image</h5>
                                                <div class="controls">
                                                    <input type="file" name="profile_photo_path" id="image" class="form-control">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <img id="showImage" src="{{ (!empty($admin->profile_photo_path)) ? 
                    url('upload/admin/'.$admin->profile_photo_path) : url('upload/no_image.jpg') }}" alt="image" style="width:100px; height:100px;">
                                        </div>
                                    </div>

                                </div>
                            </div>
                            <div class="text-xs-right">
                                <input type="submit" class="btn btn-rounded btn-dark mb-5" value="Update">
                            </div>
                        </form>

                    </div>
                    <!-- /.col -->
                </div>
                <!-- /.row -->
            </div>
            <!-- /.box-body -->
        </div>
        <!-- /.box -->

    </section>
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<script type="text/javascript">
    $(document).ready(function() {
        $('#image').change(function(e) {
            let reader = new FileReader();

            reader.onload = function(e) {
                $('#showImage').attr('src', e.target.result);
            }

            reader.readAsDataURL(e.target.files[0]);
        })
    })
</script>
@endsection