@extends('admin.layouts.master')

@section('content')
<div class="container-full">
    <!-- Main content -->
    <section class="content">
        <div class="row">

            <!-- Add Category -->
            <div class="col-12">

                <div class="box">
                    <div class="box-header with-border">
                        <h3 class="box-title">Edit Category</h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <div class="table-responsive">
                            <form method="post" action="{{ route('category.update', $category->id) }}">
                                @csrf
                                <div class="form-group">
                                    <h5>Name EN <span class="text-danger">*</span></h5>
                                    <div class="controls">
                                        <input type="text" name="name_en" class="form-control" value="{{ $category->name_en }}">
                                        @error('name_en')
                                        <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group">
                                    <h5>Name ID <span class="text-danger">*</span></h5>
                                    <div class="controls">
                                        <input type="text" name="name_id" class="form-control" value="{{ $category->name_id }}">
                                        @error('name_id')
                                        <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group">
                                    <h5>Icon <span class="text-danger">*</span></h5>
                                    <div class="controls">
                                        <input type="text" name="icon" class="form-control" value="{{ $category->icon }}">
                                        @error('name_id')
                                        <span class="text-danger">{{ $message }}</span>
                                        @enderror
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