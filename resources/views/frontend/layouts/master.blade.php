<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Meta -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no">
    <meta name="description" content="">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="author" content="">
    <meta name="keywords" content="MediaCenter, Template, eCommerce">
    <meta name="robots" content="all">

    @yield('title')

    <!-- Bootstrap Core CSS -->
    <link rel="stylesheet" href="{{ asset('frontend/assets/css/bootstrap.min.css') }}">

    <!-- Customizable CSS -->
    <link rel="stylesheet" href="{{ asset('frontend/assets/css/main.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/assets/css/blue.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/assets/css/owl.carousel.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/assets/css/owl.transitions.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/assets/css/animate.min.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/assets/css/rateit.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/assets/css/bootstrap-select.min.css') }}">

    <!-- Icons/Glyphs -->
    <link rel="stylesheet" href="{{ asset('frontend/assets/css/font-awesome.css') }}">

    <!-- Fonts -->
    <link href='http://fonts.googleapis.com/css?family=Roboto:300,400,500,700' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,300,400italic,600,600italic,700,700italic,800' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'>

    <!-- TOASTR CSS -->
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css">

    <!-- Sweetalert -->
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>

<body class="cnt-home">
    <!-- ============================================== HEADER ============================================== -->
    @include('frontend.layouts.header')

    <!-- ============================================== HEADER : END ============================================== -->
    @yield('content')
    <!-- /#top-banner-and-menu -->

    <!-- ============================================================= FOOTER ============================================================= -->
    @include('frontend.layouts.footer')
    <!-- ============================================================= FOOTER : END============================================================= -->

    <!-- For demo purposes – can be removed on production -->

    <!-- For demo purposes – can be removed on production : End -->

    <!-- JavaScripts placed at the end of the document so the pages load faster -->
    <script src="{{ asset('frontend/assets/js/jquery-1.11.1.min.js') }}"></script>
    <script src="{{ asset('frontend/assets/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('frontend/assets/js/bootstrap-hover-dropdown.min.js') }}"></script>
    <script src="{{ asset('frontend/assets/js/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('frontend/assets/js/echo.min.js') }}"></script>
    <script src="{{ asset('frontend/assets/js/jquery.easing-1.3.min.js') }}"></script>
    <script src="{{ asset('frontend/assets/js/bootstrap-slider.min.js') }}"></script>
    <script src="{{ asset('frontend/assets/js/jquery.rateit.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('frontend/assets/js/lightbox.min.js') }}"></script>
    <script src="{{ asset('frontend/assets/js/bootstrap-select.min.js') }}"></script>
    <script src="{{ asset('frontend/assets/js/wow.min.js') }}"></script>
    <script src="{{ asset('frontend/assets/js/scripts.js') }}"></script>

    <!-- TOASTR SCRIPT -->
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
    <script>
        @if(Session::has('message'))
        var type = "{{ Session::get('alert-type', 'info') }}"
        switch (type) {
            case 'info':
                toastr.info("{{ Session::get('message') }}");
                break;

            case 'success':
                toastr.success("{{ Session::get('message') }}");
                break;

            case 'warning':
                toastr.warning("{{ Session::get('message') }}");
                break;

            case 'error':
                toastr.error("{{ Session::get('message') }}");
                break;
        }
        @endif
    </script>

    <!-- Add to Chart Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel"><strong><span id="productName"></span></strong></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close" id="closeModal">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="card" style="width: 18rem;">
                                <img id="productImage" src="" class="card-img-top" alt="..." style="height: 200px; width: 200px;">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <ul class="list-group">
                                <li class="list-group-item">Price: <strong>$</strong><strong id="productPrice"></strong></li>
                                <li class="list-group-item">Code: <strong id="productCode"></strong></li>
                                <li class="list-group-item">Brand: <strong id="productBrand"></strong></li>
                                <li class="list-group-item">Category: <strong id="productCategory"></strong></li>
                                <li class="list-group-item">Stock:
                                    <span id="avialabe" class="badge badge-pill badge-success" style="background: green; color: white;"></span>
                                    <span id="stockouts" class="badge badge-pill badge-danger" style="background: red; color: white;"></span>
                                </li>
                            </ul>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="exampleFormControlSelect1">Color</label>
                                <select class="form-control" id="color" name="color"></select>
                            </div>
                            <div class="form-group" id="sizeDropDown">
                                <label for="exampleFormControlSelect1">Size</label>
                                <select class="form-control" id="size" name="size"></select>
                            </div>
                            <div class="form-group">
                                <label for="exampleFormControlInput1">Quantity</label>
                                <input type="number" class="form-control" id="qty" value="1" min="1">
                            </div>
                            <input type="hidden" id="productId">
                            <button type="submit" class="btn btn-primary mb-2" onclick="addToCart()">Add cart</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script type="text/javascript">
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        //product modal
        function productView(id) {
            $.ajax({
                type: 'GET',
                url: '/product/getOne/' + id,
                dataType: 'json',
                success: function(data) {
                    var language = "{{ Session::get('language');}}";

                    $('#productId').val(id);
                    $('#quantity').val(1);
                    $('#productImage').attr('src', '/' + data.product.thumbnail);
                    $('#productCode').text(data.product.code);
                    $('select[name="color"]').empty();
                    $('select[name="size"]').empty();

                    if (data.product.discount) {
                        var price = data.product.price - data.product.discount;
                        $('#productPrice').text(price)
                    } else {
                        $('#productPrice').text(data.product.price);
                    }

                    if (data.product.quantity > 0) {
                        $('#stockouts').text('');
                        $('#avialabe').text('avialabe');
                    } else {
                        $('#avialabe').text('');
                        $('#stockouts').text('out of stock');
                    }

                    if (language == 'english') {
                        $('#productName').text(data.product.name_en);
                        $('#productCategory').text(data.product.category.name_en);
                        $('#productBrand').text(data.product.brand.name_en);

                        $.each(data.color_en, function(key, value) {
                            $('select[name="color"]').append('<option value="' + value + '">' + value + '</option>');
                        })

                        $.each(data.size_en, function(key, value) {
                            $('select[name="size"]').append('<option value="' + value + '">' + value + '</option>');
                            if (data.size_en == "") {
                                $('#sizeDropDown').hide();
                            } else {
                                $('#sizeDropDown').show();
                            }
                        })
                    } else {
                        $('#productName').text(data.product.name_id);
                        $('#productCategory').text(data.product.category.name_id);
                        $('#productBrand').text(data.product.brand.name_id);

                        $.each(data.color_id, function(key, value) {
                            $('select[name="color"]').append('<option value="' + value + '">' + value + '</option>');
                        })

                        $.each(data.size_id, function(key, value) {
                            $('select[name="size"]').append('<option value="' + value + '">' + value + '</option>');
                            if (data.size_id == "") {
                                $('#sizeDropDown').hide();
                            } else {
                                $('#sizeDropDown').show();
                            }
                        })
                    }
                }
            })
        }

        // add to cart
        function addToCart() {
            var id = $('#productId').val();
            var productName = $('#productName').text();
            var color = $('#color option:selected').text();
            var size = $('#size option:selected').text();
            var quantity = $('#qty').val();

            $.ajax({
                type: "POST",
                dataType: "json",
                data: {
                    productName: productName,
                    color: color,
                    size: size,
                    quantity: quantity
                },
                url: "/cart/store/product/" + id,
                success: function(data) {
                    miniCart();
                    $('#closeModal').click();

                    // sweetalert
                    const Toast = Swal.mixin({
                        toast: true,
                        position: 'top-end',
                        icon: 'success',
                        showConfirmButton: false,
                        timer: 3000
                    })

                    if ($.isEmptyObject(data.error)) {
                        Toast.fire({
                            type: 'success',
                            title: data.success
                        });
                    } else {
                        Toast.fire({
                            type: 'error',
                            title: data.error
                        });
                    }
                }
            })
        }
    </script>

    <script type="text/javascript">
        function miniCart() {
            $.ajax({
                type: 'GET',
                url: '/product/mini/cart',
                dataType: 'json',
                success: function(response) {
                    $('span[id="cartTotal"]').text(response.cartTotal);
                    $('#cartQty').text(response.cartQty);
                    var miniCart = "";

                    $.each(response.carts, function(key, value) {
                        miniCart += `<div class="cart-item product-summary">
                                     <div class="row">
                                        <div class="col-xs-4">
                                            <div class="image"> <a href="detail.html"><img src="/${value.options.image}" alt=""></a> </div>
                                        </div>
                                        <div class="col-xs-7">
                                            <h3 class="name"><a href="index.php?page-detail">${value.name}</a></h3>
                                            <div class="price">$${value.price} * ${value.qty} pcs</div>
                                        </div>
                                        <div class="col-xs-1 action"> <button type="submit" id="${value.rowId}" onclick="deleteMiniCart(this.id)"><i class="fa fa-trash"></i></button> </div>
                                    </div>
                                    </div>
                                     <!-- /.cart-item -->
                                     <div class="clearfix"></div>
                                    <hr>`;
                    })

                    $('#miniCart').html(miniCart);
                }
            })
        }

        miniCart();

        // delete product from miniCart
        function deleteMiniCart(rowId) {
            $.ajax({
                type: 'GET',
                url: '/product/mini/cart/delete/' + rowId,
                dataType: 'json',
                success: function(data) {
                    miniCart();
                    // message 
                    const Toast = Swal.mixin({
                        toast: true,
                        position: 'top-end',
                        icon: 'success',
                        showConfirmButton: false,
                        timer: 3000
                    })
                    if ($.isEmptyObject(data.error)) {
                        Toast.fire({
                            type: 'success',
                            title: data.success
                        })
                    } else {
                        Toast.fire({
                            type: 'error',
                            title: data.error
                        })
                    }
                }
            });
        }
    </script>

    <!-- add product to wishlist -->
    <script type="text/javascript">
        function addWishlist(productId) {
            $.ajax({
                type: "POST",
                url: '/user/add/wishlist/' + productId,
                dataType: 'json',
                success: function(data) {
                    // message 
                    const Toast = Swal.mixin({
                        toast: true,
                        position: 'top-end',
                        showConfirmButton: false,
                        timer: 3000
                    })
                    if ($.isEmptyObject(data.error)) {
                        Toast.fire({
                            type: 'success',
                            icon: 'success',
                            title: data.success
                        })
                    } else {
                        Toast.fire({
                            type: 'error',
                            icon: 'error',
                            title: data.error
                        })
                    }
                }
            })
        }
    </script>

    <!-- wishlist -->
    <script type="text/javascript">
        function wishlist() {
            $.ajax({
                type: 'GET',
                url: '/user/get/wishlist',
                dataType: 'json',
                success: function(data) {
                    var rows = "";

                    $.each(data, function(key, value) {
                        var language = "{{ Session::get('language');}}";
                        var name = value.product.name_id;
                        var price = value.product.price;

                        if (value.product.discount != null) {
                            price = value.product.price - value.product.discount;
                        }

                        if (language == 'english') {
                            name = value.product.name_en;
                        }

                        rows += `<tr>
                                    <td class="col-md-2">
                                        <img src="/${value.product.thumbnail}" alt="imga" />
                                    </td>
                                    <td class="col-md-7">
                                        <div class="product-name">
                                            <a href="#">${name}</a>
                                        </div>
                                        <div class="price">
                                        ${value.product.discount == null ? `${price}` : `${price} <span>${value.product.discount}</span>`}
                                        </div>
                                    </td>
                                    <td class="col-md-2">
                                        <button data-toggle="modal" data-target="#exampleModal" class="btn btn-primary icon" type="button" title="Add Cart" id="${value.product.id}" onclick="productView(this.id)">Add to Cart</button>
                                    </td>
                                    <td class="col-md-1 close-btn">
                                        <button type="submit" id="${value.id}" class="" onclick="deleteWishlist(this.id)"><i class="fa fa-times"></i></button>
                                    </td>
                                </tr>`;
                    })

                    $('#wishlist').html(rows);
                }
            })
        }

        wishlist();

        // delete product from wishlist
        function deleteWishlist(id) {
            $.ajax({
                type: 'GET',
                url: '/user/wishlist/delete/' + id,
                dataType: 'json',
                success: function(data) {
                    wishlist();
                    // message 
                    const Toast = Swal.mixin({
                        toast: true,
                        position: 'top-end',
                        showConfirmButton: false,
                        timer: 3000
                    })
                    if ($.isEmptyObject(data.error)) {
                        Toast.fire({
                            type: 'success',
                            icon: 'success',
                            title: data.success
                        })
                    } else {
                        Toast.fire({
                            type: 'error',
                            icon: 'error',
                            title: data.error
                        })
                    }
                }
            });
        }
    </script>

    <!-- mycart -->
    <script type="text/javascript">
        function mycart() {
            $.ajax({
                type: 'GET',
                url: '/user/get/mycart',
                dataType: 'json',
                success: function(data) {
                    var rows = "";

                    $.each(data.carts, function(key, value) {
                        rows += `<tr>
                                    <td class="col-md-2">
                                        <img src="/${value.options.image}" alt="imga" style="width:60px; height:60px;"/>
                                    </td>
                                    <td class="col-md-2">
                                        <div class="product-name">
                                            <a href="#">${value.name}</a>
                                        </div>
                                    </td>
                                    <td class="col-md-2">
                                        <strong>${value.options.color}</strong>
                                    </td>
                                    <td class="col-md-2">
                                        ${value.options.size == null ? `<strong></strong>` : `<strong>${value.options.size}</strong>`}                                        
                                    </td>
                                    <td class="col-md-2">
                                        ${value.qty > 1 ? `<button type="submit" class="btn btn-danger" id="${value.rowId}" onclick="cartDecrement(this.id)">-</button>` : `<button type="submit" class="btn btn-danger" disabled="">-</button>`}                                     
                                        <input type="text" value="${value.qty}" min="1" max="100" disabled="" style="width:25px;">
                                        <button type="button" class="btn-sm btn-success" id="${value.rowId}" onclick="cartIncrement(this.id)">+</button>
                                    </td>
                                    <td class="col-md-2">
                                        <strong>$${value.subtotal}</strong>
                                    </td>                                     
                                    <td class="col-md-1 close-btn">
                                        <button type="submit" id="${value.rowId}" class="" onclick="deleteCart(this.id)"><i class="fa fa-times"></i></button>
                                    </td>
                                </tr>`;
                    })

                    $('#mycart').html(rows);
                }
            })
        }

        mycart();

        // delete product from cart
        function deleteCart(id) {
            $.ajax({
                type: 'GET',
                url: '/user/cart/delete/' + id,
                dataType: 'json',
                success: function(data) {
                    mycart();
                    miniCart();
                    // message 
                    const Toast = Swal.mixin({
                        toast: true,
                        position: 'top-end',
                        showConfirmButton: false,
                        timer: 3000
                    })
                    if ($.isEmptyObject(data.error)) {
                        Toast.fire({
                            type: 'success',
                            icon: 'success',
                            title: data.success
                        })
                    } else {
                        Toast.fire({
                            type: 'error',
                            icon: 'error',
                            title: data.error
                        })
                    }
                }
            });
        }

        // cart increment
        function cartIncrement(id) {
            $.ajax({
                type: "GET",
                url: "/cart/increment/" + id,
                dataType: "json",
                success: function(data) {
                    mycart();
                    miniCart();
                }
            })
        }

        // cart decrement
        function cartDecrement(id) {
            $.ajax({
                type: "GET",
                url: "/cart/decrement/" + id,
                dataType: "json",
                success: function(data) {
                    mycart();
                    miniCart();
                }
            })
        }
    </script>
</body>

</html>