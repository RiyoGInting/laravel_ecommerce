@php
$categories = App\Models\Category::orderBy('name_en', 'ASC')->get();
@endphp

<div class="side-menu animate-dropdown outer-bottom-xs">
    <div class="head"><i class="icon fa fa-align-justify fa-fw"></i> Categories</div>
    <nav class="yamm megamenu-horizontal">
        <ul class="nav">

            @foreach($categories as $category)
            <li class="dropdown menu-item">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="icon {{ $category->icon }}" aria-hidden="true"></i>
                    @if(session()->get('language') == 'english')
                    {{ $category->name_en }}
                    @else
                    {{ $category->name_id }}
                    @endif
                </a>
                <ul class="dropdown-menu mega-menu">
                    <li class="yamm-content">
                        <div class="row">
                            @php
                            $subcategories = App\Models\SubCategory::where('category_id', $category->id)->orderBy('name_en', 'ASC')->get();
                            @endphp

                            @foreach($subcategories as $subcategory)
                            <div class="col-sm-12 col-md-3">
                                @if(session()->get('language') == 'english')
                                <a href="{{ url('/product/subcategory/'.$subcategory->id.'/'.$subcategory->slug_en) }}">
                                    <h2 class="title">
                                        {{ $subcategory->name_en }}
                                    </h2>
                                </a>
                                @else
                                <a href="{{ url('/product/subcategory/'.$subcategory->id.'/'.$subcategory->slug_id) }}">
                                    <h2 class="title">
                                        {{ $subcategory->name_id }}
                                    </h2>
                                </a>
                                @endif

                                @php
                                $sublevels = App\Models\SubLevel::where('subcategory_id', $subcategory->id)->orderBy('name_en', 'ASC')->get();
                                @endphp
                                <ul class="links list-unstyled">
                                    @foreach ($sublevels as $sublevel)
                                    @if(session()->get('language') == 'english')
                                    <li><a href="{{ url('/product/sublevel/'.$sublevel->id.'/'.$sublevel->slug_en) }}">{{ $sublevel->name_en }}</a></li>
                                    @else
                                    <li><a href="{{ url('/product/subcategory/'.$sublevel->id.'/'.$sublevel->slug_id) }}">{{ $sublevel->name_id }}</a></li>
                                    @endif
                                    @endforeach
                                </ul>
                            </div>
                            @endforeach
                            <!-- /.col -->
                        </div>
                        <!-- /.row -->
                    </li>
                    <!-- /.yamm-content -->
                </ul>
                <!-- /.dropdown-menu -->
            </li>
            @endforeach
            <!-- /.menu-item -->

            <li class="dropdown menu-item"> <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="icon fa fa-paper-plane"></i>Kids and Babies</a>
                <!-- /.dropdown-menu -->
            </li>
            <!-- /.menu-item -->

            <li class="dropdown menu-item"> <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="icon fa fa-futbol-o"></i>Sports</a>
                <!-- ================================== MEGAMENU VERTICAL ================================== -->
                <!-- /.dropdown-menu -->
                <!-- ================================== MEGAMENU VERTICAL ================================== -->
            </li>
            <!-- /.menu-item -->

            <li class="dropdown menu-item"> <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="icon fa fa-envira"></i>Home and Garden</a>
                <!-- /.dropdown-menu -->
            </li>
            <!-- /.menu-item -->

        </ul>
        <!-- /.nav -->
    </nav>
    <!-- /.megamenu-horizontal -->
</div>