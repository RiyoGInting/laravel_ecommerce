@extends('admin.layouts.master')

@section('content')
<div class="container-full">
    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-8">

                <div class="box">
                    <div class="box-header with-border">
                        <h3 class="box-title">Category List</h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <div class="table-responsive">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>Name EN</th>
                                        <th>Name ID</th>
                                        <th>Icon</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($categories as $category)
                                    <tr>
                                        <td>{{ $category->name_en }}</td>
                                        <td>{{ $category->name_id }}</td>
                                        <td>
                                            <span><i class="{{ $category->icon }}"></i></span>
                                        </td>
                                        <td>
                                            <a href="{{ route('category.edit', $category->id) }}" class="btn btn-info"><i class="fa fa-edit" title="Edit Data"></i></a>
                                            <a href="{{ route('category.delete', $category->id) }}" class="btn btn-danger" id="delete"><i class="fa fa-trash-o" title="Delete Data"></i></a>
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

            <!-- Add Category -->
            <div class="col-4">

                <div class="box">
                    <div class="box-header with-border">
                        <h3 class="box-title">Add Category</h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <div class="table-responsive">
                            <form method="post" action="{{ route('category.store') }}">
                                @csrf
                                <div class="form-group">
                                    <h5>Name EN <span class="text-danger">*</span></h5>
                                    <div class="controls">
                                        <input type="text" name="name_en" class="form-control">
                                        @error('name_en')
                                        <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group">
                                    <h5>Name ID <span class="text-danger">*</span></h5>
                                    <div class="controls">
                                        <input type="text" name="name_id" class="form-control">
                                        @error('name_id')
                                        <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group">
                                    <h5>Icon <span class="text-danger">*</span></h5>
                                    <div class="controls">
                                        <input type="text" name="icon" class="form-control">
                                        @error('name_id')
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