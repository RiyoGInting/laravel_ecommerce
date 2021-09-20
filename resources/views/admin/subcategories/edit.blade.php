@extends('admin.layouts.master')

@section('content')
<div class="container-full">
    <!-- Main content -->
    <section class="content">
        <div class="row">

            <!-- Add Sub-Category -->
            <div class="col-12">

                <div class="box">
                    <div class="box-header with-border">
                        <h3 class="box-title">Edit Sub-Category</h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <div class="table-responsive">
                            <form method="post" action="{{ route('subcategory.update', $subcategory->id) }}">
                                @csrf
                                <div class="form-group">
                                    <h5>Select Category<span class="text-danger">*</span></h5>
                                    <div class="controls">
                                        <select name="category_id" class="form-control">
                                            <option value="" selected="" disabled="">Select Category</option>
                                            @foreach($categories as $category)
                                            <option value="{{ $category->id }}" {{ $category->id == $subcategory->category_id ? ' selected="selected"' : '' }}>{{ $category->name_en }}</option>
                                            @endforeach
                                        </select>
                                        @error('category_id')
                                        <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group">
                                    <h5>Name EN <span class="text-danger">*</span></h5>
                                    <div class="controls">
                                        <input type="text" name="name_en" class="form-control" value="{{ $subcategory->name_en }}">
                                        @error('name_en')
                                        <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group">
                                    <h5>Name ID <span class="text-danger">*</span></h5>
                                    <div class="controls">
                                        <input type="text" name="name_id" class="form-control" value="{{ $subcategory->name_id }}">
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