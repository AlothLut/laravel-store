@extends('master')
@section('title', isset($productLoc)? 
    Lang::get('messages.edit') . ' ' . $productLoc['locale']['name'] :
    Lang::get('messages.create')
)
@section('content')
<div class="container mt-5">
    <h1>
        @if (isset($product))
            @lang('messages.edit'): {{ $productLoc['locale']['name'] }}
        @else
            @lang('messages.create'):
        @endif
    </h1>
    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif
    <form method="POST" 
        @if(isset($product))
            action="{{ route('admin.update.product', $product) }}" 
        @else
            action="{{ route('admin.create.product.post') }}" 
        @endif
        enctype="multipart/form-data"
    >
        @csrf

        @isset($product)
            @method('PUT')
        @endisset

        <div class="form-group">
            <label for="name">Name</label>
            <input type="text" class="form-control" name="name" placeholder="Name"
                value="{{ isset($product)? $product->name : null }}"
            >
        </div>
        <div class="form-group">
            <label for="name">slug</label>
            <input type="text" class="form-control" name="slug" placeholder="slug"
                value="{{ isset($product)? $product->slug : null }}"
            >
        </div>
        <div class="form-group">
            <label for="name">name_ru</label>
            <input type="text" class="form-control" name="name_ru" placeholder="name_ru"
                value="{{ isset($product)? $product->name_ru : null }}"
            >
        </div>
        <div class="form-group">
            <label for="name">name_en</label>
            <input type="text" class="form-control" name="name_en" placeholder="name_en"
                value="{{ isset($product)? $product->name_en : null }}"
            >
        </div>
        <div class="form-group">
            <label for="name">status</label>
            <input type="text" class="form-control" name="status" placeholder="status"
                value="{{ isset($product)? $product->status : null }}"
            >
        </div>
        <div class="form-group">
            <label for="description_ru">description_ru</label>
            <textarea class="form-control" 
                name="description_ru" 
                placeholder="description_ru"
            >{{ isset($product)? $product->description_ru : null }}</textarea>
        </div>
        <div class="form-group">
            <label for="description_ru">description_en</label>
            <textarea class="form-control" 
                name="description_en" 
                placeholder="description_en"
            >{{ isset($product)? $product->description_en : null }}</textarea>
        </div>
        <div class="form-group">
            <label for="name">brand</label>
            <input type="text" class="form-control" name="brand" placeholder="brand"
                value="{{ isset($product)? $product->brand : null }}"
            >
        </div>
        <div class="form-group">
            <label for="name">quantity</label>
            <input type="text" class="form-control" name="quantity" placeholder="quantity"
                value="{{ isset($product)? $product->quantity : null }}"
            >
        </div>
        <div class="form-group">
            <label for="name">price</label>
            <input type="text" class="form-control" name="price" placeholder="price"
                value="{{ isset($product)? $product->price : null }}"
            >
        </div>

        @if(!$category->isEmpty())
            <div class="form-group">
                <label for="category_id_select">category_id</label>
                <select class="form-control" id="category_id_select" name="category_id">
                    <option value>Select category</option>
                    @foreach ($category as $item)
                        @if(isset($product))
                        <option value={{$item['id']}}
                            {{ ($item['id'] == $product->category_id)? 'selected': null }}
                        >
                            {{ $item['name'] }}
                        </option>
                        @else
                        <option value={{$item['id']}}>
                            {{ $item['name'] }}
                        </option>
                        @endif
                    @endforeach
                </select>
            </div>
        @endif

        <div class="form-group">
            <label>Images:</label>
            <div class="col-sm-12">
                @if(isset($images))
                    @foreach($images as $image)
                        <div class="form-check">
                            <input type="checkbox" 
                                class="form-check-input" 
                                value="{{ $image['id'] }}" 
                                name="remove_image[]" 
                                id="removeImg"
                            >
                            <label class="form-check-label" for="removeImg">Remove</label>
                        </div>
                        <div class="pb-3">
                            <img height="200px" width="300px" src="{{ asset('storage/' . $image['image_src']) }}">
                        </div>
                    @endforeach
                @endif
                <div class="js-images-block pb-3">
                    <button class="close float-left">X</button>
                    <input type="file" name="images[]" class="file form-control-file">
                </div>
            </div>
        </div>
        

        <div class="form-group form-check">
            <input type="checkbox" class="form-check-input" value="1" name="active" id="checkActive">
            <label class="form-check-label" for="checkActive">Active</label>
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>
@stop
