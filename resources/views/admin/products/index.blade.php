@extends('admin.layouts.master')

@section('content')
<div class="container-full">
    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-12">

                <div class="box">
                    <div class="box-header with-border">
                        <h3 class="box-title">Product List</h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <div class="table-responsive">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>Name EN</th>
                                        <th>Name ID</th>
                                        <th>Image</th>
                                        <th>Price</th>
                                        <th>Discount</th>
                                        <th>Quantity</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($products as $product)
                                    <tr>
                                        <td>{{ $product->name_en }}</td>
                                        <td>{{ $product->name_id }}</td>
                                        <td><img src="{{ asset($product->thumbnail) }}" style="width: 60px; height:50px"></td>
                                        <td>{{ $product->price }}</td>
                                        <td>
                                            @if ($product->discount == NULL)
                                            <span class="badge badge-pill badge-info">no discount</span>
                                            @else
                                            {{ $product->discount }}
                                            @endif
                                        </td>
                                        <td>{{ $product->quantity }}</td>
                                        <td>
                                            @if($product->status == 1)
                                            <span class="badge badge-pill badge-success">available</span>
                                            @else
                                            <span class="badge badge-pill badge-danger">not available</span>
                                            @endif
                                        </td>
                                        <td>
                                            <a href="{{ route('product.edit', $product->id) }}" class="btn-sm btn-info"><i class="fa fa-edit" title="Edit Product"></i></a>
                                            <a href="{{ route('product.status', $product->id) }}">
                                                @if ($product->status == 1)
                                                <i class="fa fa-arrow-down btn-sm btn-danger" title="Inactive Now"></i>
                                                @else
                                                <i class="fa fa-arrow-up btn-sm btn-success" title="Active Now"></i>
                                                @endif
                                            </a>
                                            <a href="{{ route('product.delete', $product->id) }}" class="btn-sm btn-danger" id="delete"><i class="fa fa-trash-o" title="Delete Product"></i></a>
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

        </div>
        <!-- /.row -->
    </section>
    <!-- /.content -->

</div>
@endsection