<div class="sidebar-widget wow fadeInUp">
    <h3 class="section-title">shop by</h3>
    <div class="widget-header">
        <h4 class="widget-title">Category</h4>
    </div>
    <div class="sidebar-widget-body">
        <div class="accordion">
            @foreach($categories as $category)
            <div class="accordion-group">
                <div class="accordion-heading">
                    <a href="#collapse{{$category->id}}" data-toggle="collapse" class="accordion-toggle collapsed">
                        @if(session()->get('language') == 'english')
                        {{ $category->name_en }}
                        @else
                        {{ $category->name_id }}
                        @endif
                    </a>
                </div>
                <!-- /.accordion-heading -->
                @php
                $subcategories = App\Models\SubCategory::where('category_id', $category->id)->orderBy('name_en', 'ASC')->get();
                @endphp
                <div class="accordion-body collapse" id="collapse{{$category->id}}" style="height: 0px;">
                    <div class="accordion-inner">
                        @foreach ($subcategories as $subcategory)
                        <ul>
                            <li>
                                @if(session()->get('language') == 'english')
                                <a href="{{ url('/product/subcategory/'.$subcategory->id.'/'.$subcategory->slug_en) }}">{{ $subcategory->name_en }}</a>
                                @else
                                <a href="{{ url('/product/subcategory/'.$subcategory->id.'/'.$subcategory->slug_en) }}">{{ $subcategory->name_id }}</a>
                                @endif
                            </li>
                        </ul>
                        @endforeach
                    </div>
                    <!-- /.accordion-inner -->
                </div>
                <!-- /.accordion-body -->
            </div>
            @endforeach
            <!-- /.accordion-group -->
        </div>
        <!-- /.accordion -->
    </div>
    <!-- /.sidebar-widget-body -->
</div>