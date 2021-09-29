@php
$tags_en = App\Models\Product::groupBy('tags_en')->select('tags_en')->limit(20)->get();
$tags_id = App\Models\Product::groupBy('tags_id')->select('tags_id')->limit(20)->get();
@endphp

<div class="sidebar-widget product-tag wow fadeInUp">
    <h3 class="section-title">Product tags</h3>
    <div class="sidebar-widget-body outer-top-xs">
        <div class="tag-list">
            @if(session()->get('language') == 'english')
            @forelse($tags_en as $data)
            <a class="item" title="Phone" href="{{ url('product/tags/en/'.$data->tags_en) }}">{{$data->tags_en}}</a>
            @empty
            <h5 class="text-info">No Tags Found</h5>
            @endforelse
            @else
            @forelse($tags_id as $data)
            <a class="item" title="Phone" href="{{ url('product/tags/id/'.$data->tags_id) }}">{{$data->tags_id}}</a>
            @empty
            <h5 class="text-info">Tidak Ada Tag</h5>
            @endforelse
            @endif
        </div>
        <!-- /.tag-list -->
    </div>
    <!-- /.sidebar-widget-body -->
</div>