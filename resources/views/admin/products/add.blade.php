@extends('admin.layouts.master')

@section('content')

<div class="container-full">

    <!-- Main content -->
    <section class="content">

        <!-- Basic Forms -->
        <div class="box">
            <div class="box-header with-border">
                <h4 class="box-title">Add Product</h4>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                <div class="row">
                    <div class="col">
                        <form method="post" action="{{ route('product.store') }}" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="col-12">
                                    <div class="row">
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <h5>Brand<span class="text-danger">*</span></h5>
                                                <div class="controls">
                                                    <select name="brand_id" class="form-control">
                                                        <option value="" selected="" disabled="">Select Brand</option>
                                                        @foreach($brands as $brand)
                                                        <option value="{{ $brand->id }}">{{ $brand->name_en }}</option>
                                                        @endforeach
                                                    </select>
                                                    @error('brand_id')
                                                    <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <h5>Category<span class="text-danger">*</span></h5>
                                                <div class="controls">
                                                    <select name="category_id" class="form-control">
                                                        <option value="" selected="" disabled="">Select Sub Category</option>
                                                        @foreach($categories as $category)
                                                        <option value="{{ $category->id }}">{{ $category->name_en }}</option>
                                                        @endforeach
                                                    </select>
                                                    @error('category_id')
                                                    <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <h5>Sub Category<span class="text-danger">*</span></h5>
                                                <div class="controls">
                                                    <select name="subcategory_id" class="form-control">
                                                        <option value="" selected="" disabled="">Select Sub Category</option>

                                                    </select>
                                                    @error('subcategory_id')
                                                    <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <h5>Sub Level<span class="text-danger">*</span></h5>
                                                <div class="controls">
                                                    <select name="sublevel_id" class="form-control">
                                                        <option value="" selected="" disabled="">Select Sub Level</option>

                                                    </select>
                                                    @error('sublevel_id')
                                                    <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <h5>Name EN <span class="text-danger">*</span></h5>
                                                <div class="controls">
                                                    <input type="text" name="name_en" class="form-control">
                                                    @error('name_en')
                                                    <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <h5>Name ID <span class="text-danger">*</span></h5>
                                                <div class="controls">
                                                    <input type="text" name="name_id" class="form-control">
                                                    @error('name_id')
                                                    <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <h5>Code <span class="text-danger">*</span></h5>
                                                <div class="controls">
                                                    <input type="text" name="code" class="form-control">
                                                    @error('code')
                                                    <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <h5>Quantity <span class="text-danger">*</span></h5>
                                                <div class="controls">
                                                    <input type="text" name="quantity" class="form-control">
                                                    @error('quantity')
                                                    <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <h5>Price <span class="text-danger">*</span></h5>
                                                <div class="controls">
                                                    <input type="text" name="price" class="form-control">
                                                    @error('price')
                                                    <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <h5>Dicount</h5>
                                                <div class="controls">
                                                    <input type="text" name="discount" class="form-control">
                                                    @error('discount')
                                                    <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <h5>Thumbnail <span class="text-danger">*</span></h5>
                                                <div class="controls">
                                                    <img src="" id="thumbnail">
                                                    <input type="file" name="thumbnail" class="form-control" onChange="thumbnailUrl(this)">
                                                    @error('thumbnail')
                                                    <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <h5>Size EN</h5>
                                                <div class="controls">
                                                    <input type="text" name="size_en" class="form-control" value="Small,Medium,Large" data-role="tagsinput">
                                                    @error('size_en')
                                                    <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <h5>Size ID</h5>
                                                <div class="controls">
                                                    <input type="text" name="size_id" class="form-control" value="Kecil,Sedang,Besar" data-role="tagsinput">
                                                    @error('size_id')
                                                    <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <h5>Multi Image</h5>
                                                <div class="controls">
                                                    <div class="row" id="previewImage">

                                                    </div>
                                                    <input type="file" name="multi-image[]" class="form-control" id="multiImage" multiple="" required>
                                                    @error('image')
                                                    <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <h5>Color EN <span class="text-danger">*</span></h5>
                                                <div class="controls">
                                                    <input type="text" name="color_en" class="form-control" value="Black,White" data-role="tagsinput" required="">
                                                    @error('color_en')
                                                    <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <h5>Color ID <span class="text-danger">*</span></h5>
                                                <div class="controls">
                                                    <input type="text" name="color_id" class="form-control" value="Hitam,Putih" data-role="tagsinput" required="">
                                                    @error('color_id')
                                                    <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <h5>Short Description EN <span class="text-danger">*</span></h5>
                                                <div class="controls">
                                                    <textarea name="short_description_en" id="textarea" class="form-control" required></textarea>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <h5>Short Description ID <span class="text-danger">*</span></h5>
                                                <div class="controls">
                                                    <textarea name="short_description_id" id="textarea" class="form-control" required></textarea>
                                                </div>
                                            </div>
                                        </div>

                                    </div>

                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <h5>Long Description EN <span class="text-danger">*</span></h5>
                                                <div class="controls">
                                                    <textarea id="editor1" name="long_description_en" rows="10" cols="80">
                                                        Product Description.
                                                    </textarea>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <h5>Long Description ID <span class="text-danger">*</span></h5>
                                                <div class="controls">
                                                    <textarea id="editor2" name="long_description_id" rows="10" cols="80">
                                                    Product Description.
                                                    </textarea>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <h5>Tags EN <span class="text-danger">*</span></h5>
                                                <div class="controls">
                                                    <input type="text" name="tags_en" class="form-control" value="#tags" data-role="tagsinput">
                                                    @error('tags_en')
                                                    <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <h5>Tags ID <span class="text-danger">*</span></h5>
                                                <div class="controls">
                                                    <input type="text" name="tags_id" class="form-control" value="#tags" data-role="tagsinput">
                                                    @error('tags_id')
                                                    <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">

                                        <div class="controls">
                                            <fieldset>
                                                <input type="checkbox" id="checkbox_1" value="1" name="hot_deals">
                                                <label for="checkbox_1">Hot Deals</label>
                                            </fieldset>
                                            <fieldset>
                                                <input type="checkbox" id="checkbox_2" value="1" name="featured">
                                                <label for="checkbox_2">Featured</label>
                                            </fieldset>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">

                                        <div class="controls">
                                            <fieldset>
                                                <input type="checkbox" id="checkbox_3" value="1" name="special_offer">
                                                <label for="checkbox_3">Special Offer</label>
                                            </fieldset>
                                            <fieldset>
                                                <input type="checkbox" id="checkbox_4" value="1" name="special_deals">
                                                <label for="checkbox_4">Special Deals</label>
                                            </fieldset>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="text-xs-right">
                                <input type="submit" class="btn btn-rounded btn-dark mb-5" value="Submit">
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
    <!-- /.content -->
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script type="text/javascript">
    $(document).ready(function() {
        // dynamic sub category dropdown script
        $('select[name="category_id"]').on('change', function() {
            var category_id = $(this).val();
            if (category_id) {
                $.ajax({
                    url: "{{  url('/category/subcategory/getByCategoryId') }}/" + category_id,
                    type: "GET",
                    dataType: "json",
                    success: function(data) {
                        $('select[name="sublevel_id"]').html('');
                        var d = $('select[name="subcategory_id"]').empty();
                        $.each(data, function(key, value) {
                            $('select[name="subcategory_id"]').append('<option value="' + value.id + '">' + value.name_en + '</option>');
                        });
                    },
                });
            } else {
                alert('danger');
            }
        });

        // dynamic sub level dropdown script
        $('select[name="subcategory_id"]').on('click', function() {
            var subcategory_id = $(this).val();
            if (subcategory_id) {
                $.ajax({
                    url: "{{  url('/category/subcategory/sublevel/getBySubCategoryId') }}/" + subcategory_id,
                    type: "GET",
                    dataType: "json",
                    success: function(data) {
                        var d = $('select[name="sublevel_id"]').empty();
                        $.each(data, function(key, value) {
                            $('select[name="sublevel_id"]').append('<option value="' + value.id + '">' + value.name_en + '</option>');
                        });
                    },
                });
            } else {
                alert('danger');
            }
        });
    });
</script>

<!-- Script for showing the image after user select image for thumbnail -->
<script type="text/javascript">
    function thumbnailUrl(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function(e) {
                $('#thumbnail').attr('src', reader.result).width(80).height(80);
            }
            reader.readAsDataURL(input.files[0]);
        }
    }
</script>

<!-- Script for showing the image after user select image for multi-image -->
<script type="text/javascript">
    $(document).ready(function() {
        //on file input change
        $('#multiImage').on('change', function() {
            if (window.File && window.FileReader && window.FileList && window.Blob) //check File API supported browser
            {
                var data = $(this)[0].files; //this file data

                //loop though each file
                $.each(data, function(index, file) {
                    if (/(\.|\/)(gif|jpe?g|png)$/i.test(file.type)) {
                        //check supported file type
                        var fRead = new FileReader(); //new filereader
                        //trigger function on successful read
                        fRead.onload = (function(file) {
                            return function(e) {
                                var img = $('<img/>').addClass('thumb').attr('src', e.target.result).width(80)
                                    .height(80); //create image element 
                                $('#previewImage').append(img); //append image to output element
                            };
                        })(file);
                        fRead.readAsDataURL(file); //URL representing the file's data.
                    }
                });

            } else {
                alert("Your browser doesn't support File API!"); //if File API is absent
            }
        });
    });
</script>

@endsection