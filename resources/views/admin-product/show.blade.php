@extends('master')
@section('content')
<div class="container mt-5">
    <div class="card" style="width: 18rem;">
        @if(isset($images))
        @foreach($images as $image)
        <img src="{{ asset('storage/' . $image['image_src']) }}" class="card-img-top">
        @endforeach
        @endif
        <div class="card-body">
            <h5 class="card-title">Product:</h5>
        </div>
        <ul class="list-group list-group-flush">
            @foreach($product->toArray() as $key => $value)
            @if($key == 'category_id')
            @foreach($category as $cat_item)
            @if($cat_item['id'] == $value)
            <li class="list-group-item">
                {{ 'category: ' . $cat_item['name'] }}
            </li>
            @endif
            @endforeach
            @else
            <li class="list-group-item">
                {{ $key . ': ' . $value}}
            </li>
            @endif
            @endforeach
        </ul>
    </div>
</div>
@stop
