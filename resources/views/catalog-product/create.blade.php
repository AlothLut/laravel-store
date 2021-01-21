@extends('master')
@section('content')
<div class="container">
    <h1>Создание товара:</h1>
    <form method="POST" action="{{ route('create.product.post', [], false) }}" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="name">Name</label>
            <input type="text" class="form-control" name="name" placeholder="Enter Name">
        </div>
        <div class="form-group">
            <label for="name">Code</label>
            <input type="text" class="form-control" name="code" placeholder="Enter Code">
            <small class="form-text text-muted">Unique code</small>
        </div>
        <div class="form-group">
            <label for="name">Name_ru</label>
            <input type="text" class="form-control" name="name_ru" placeholder="Enter Name_ru">
        </div>
        <div class="form-group">
            <label for="name">Name_en</label>
            <input type="text" class="form-control" name="name_en" placeholder="Enter Name_en">
        </div>
        <div class="form-group">
            <label for="name">Description_ru</label>
            <textarea class="form-control" name="description_ru" placeholder="Enter description_ru"></textarea>
        </div>
        <div class="form-group">
            <label for="name">Description_en</label>
            <textarea class="form-control" name="description_en" placeholder="Enter description_en"></textarea>
        </div>
        <div class="form-group">
            <label for="name">Brand</label>
            <input type="text" class="form-control" name="brand" placeholder="Enter brand">
        </div>
        <div class="form-group">
            <label for="name">country_producing_ru</label>
            <input type="text" class="form-control" name="country_producing_ru" placeholder="Enter country_producing_ru">
        </div>
        <div class="form-group">
            <label for="name">country_producing_en</label>
            <input type="text" class="form-control" name="country_producing_en" placeholder="Enter country_producing_ru">
        </div>
        <div class="form-group">
            <label for="name">display_resolution</label>
            <input type="text" class="form-control" name="display_resolution" placeholder="Enter display_resolution">
        </div>
        <div class="form-group">
            <label for="name">display_type</label>
            <input type="text" class="form-control" name="display_type" placeholder="Enter display_type">
        </div>
        <div class="form-group">
            <label for="name">display_size</label>
            <input type="text" class="form-control" name="display_size" placeholder="Enter display_size">
        </div>
        <div class="form-group">
            <label for="name">weight</label>
            <input type="text" class="form-control" name="weight" placeholder="Enter weight">
        </div>
        <div class="form-group">
            <label for="name">cpu</label>
            <input type="text" class="form-control" name="cpu" placeholder="Enter cpu">
        </div>
        <div class="form-group">
            <label for="name">gpu</label>
            <input type="text" class="form-control" name="gpu" placeholder="Enter gpu">
        </div>
        <div class="form-group">
            <label for="name">ram_size</label>
            <input type="text" class="form-control" name="ram_size" placeholder="Enter ram_size">
        </div>
        <div class="form-group">
            <label for="name">price</label>
            <input type="text" class="form-control" name="price" placeholder="Enter price">
        </div>
        @if(!$category->isEmpty())
        <div class="form-group">
            <label for="category_id_select">category_id</label>
            <select class="form-control" id="category_id_select" name="category_id">
                @foreach ($category as $item)
                    <option value={{$item['id']}}>{{$item['name']}}</option>
                @endforeach
            </select>
        </div>
        @endif
        <div class="form-group">
            <label>Images:</label>
            <input type="file" name="images[]" class="form-control-file" multiple>
        </div>
        <div class="form-group form-check">
            <input type="checkbox" class="form-check-input" name="active" id="checkActive">
            <label class="form-check-label" for="checkActive">Active</label>
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>
@stop
