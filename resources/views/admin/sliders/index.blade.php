@extends('admin.layouts.master')

@section('content')
<div class="container-full">
    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-8">

                <div class="box">
                    <div class="box-header with-border">
                        <h3 class="box-title">Slider List</h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <div class="table-responsive">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>Title EN</th>
                                        <th>Image</th>
                                        <th>Description EN</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($sliders as $slider)
                                    <tr>
                                        <td>
                                            @if($slider->title_en == NULL)
                                            <span class="text-danger">no title</span>
                                            @else
                                            {{ $slider->title_en }}
                                            @endif
                                        </td>
                                        <td>
                                            <img src="{{ asset($slider->image) }}" style="width: 70px; height:40px;">
                                        </td>
                                        <td>
                                            @if($slider->description_en == NULL)
                                            <span class="text-danger">no description</span>
                                            @else
                                            {{ $slider->description_en }}
                                            @endif
                                        </td>
                                        <td>
                                            @if($slider->status == 1)
                                            <span class="badge badge-pill badge-success">Active</span>
                                            @else
                                            <span class="badge badge-pill badge-danger">Inactive</span>
                                            @endif
                                        </td>
                                        <td width="25%">
                                            <a href="{{ route('slider.edit', $slider->id) }}" class="btn-sm btn-info"><i class="fa fa-edit" title="Edit Data"></i></a>
                                            <a href="{{ route('slider.status', $slider->id) }}">
                                                @if ($slider->status == 1)
                                                <i class="fa fa-arrow-down btn-sm btn-danger" title="Inactive Now"></i>
                                                @else
                                                <i class="fa fa-arrow-up btn-sm btn-success" title="Active Now"></i>
                                                @endif
                                            </a>
                                            <a href="{{ route('slider.delete', $slider->id) }}" class="btn-sm btn-danger" id="delete"><i class="fa fa-trash-o" title="Delete Data"></i></a>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <!-- /.box-body -->
                </div>
                <!-- /.box -->
            </div>
            <!-- /.col -->

            <!-- Add Slider -->
            <div class="col-4">

                <div class="box">
                    <div class="box-header with-border">
                        <h3 class="box-title">Add Slider</h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <div class="table-responsive">
                            <form method="post" action="{{ route('slider.store') }}" enctype="multipart/form-data">
                                @csrf
                                <div class="form-group">
                                    <h5>Title EN</h5>
                                    <div class="controls">
                                        <input type="text" name="title_en" class="form-control">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <h5>Title ID</h5>
                                    <div class="controls">
                                        <input type="text" name="title_id" class="form-control">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <h5>Description EN</h5>
                                    <div class="controls">
                                        <input type="text" name="description_en" class="form-control">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <h5>Description ID</h5>
                                    <div class="controls">
                                        <input type="text" name="description_id" class="form-control">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <h5>Image <span class="text-danger">*</span></h5>
                                    <div class="controls">
                                        <input type="file" name="image" class="form-control">
                                        @error('image')
                                        <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="text-xs-right">
                                    <input type="submit" class="btn btn-rounded btn-dark mb-5" value="Submit">
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