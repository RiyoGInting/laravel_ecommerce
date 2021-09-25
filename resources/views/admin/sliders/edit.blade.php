@extends('admin.layouts.master')

@section('content')
<div class="container-full">
    <!-- Main content -->
    <section class="content">
        <div class="row">

            <!-- Edit Slider -->
            <div class="col-12">

                <div class="box">
                    <div class="box-header with-border">
                        <h3 class="box-title">Edit Slider</h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <div class="table-responsive">
                            <form method="post" action="{{ route('slider.update', $slider->id) }}" enctype="multipart/form-data">
                                @csrf
                                <input type="hidden" name="existing_image" value="{{ $slider->image }}">
                                <div class="form-group">
                                    <h5>Title EN <span class="text-danger">*</span></h5>
                                    <div class="controls">
                                        <input type="text" name="title_en" class="form-control" value="{{ $slider->title_en }}">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <h5>Title ID <span class="text-danger">*</span></h5>
                                    <div class="controls">
                                        <input type="text" name="title_id" class="form-control" value="{{ $slider->title_id }}">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <h5>Description EN</h5>
                                    <div class="controls">
                                        <input type="text" name="description_en" class="form-control" value="{{ $slider->description_en }}">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <h5>Description ID</h5>
                                    <div class="controls">
                                        <input type="text" name="description_id" class="form-control" value="{{ $slider->description_id }}">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <h5>Image</h5>
                                    <div class="controls">
                                        <input type="file" name="image" class="form-control">
                                    </div>
                                </div>
                                <div class="text-xs-right">
                                    <input type="submit" class="btn btn-rounded btn-dark mb-5" value="Update">
                                </div>
                            </form>
                        </div>
                    </div>
                    <!-- /.box-body -->
                </div>
                <!-- /.box -->
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->
    </section>
    <!-- /.content -->

</div>
@endsection