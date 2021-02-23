@extends('master')
@section('content')
<div class="container mt-5">
    <div class="py-3 d-grid gap-2 d-md-flex justify-content-md-end">
        <a href="{{ route('admin.create.product') }}" type="button" class="btn btn-primary">
            @lang('messages.create')
        </a>
    </div>
    <table class="table">
        <thead>
            <tr>
                <th scope="col">id</th>
                <th scope="col">@lang('messages.name')</th>
                <th scope="col">@lang('messages.price')</th>
                <th scope="col">@lang('messages.quantity')</th>
                <th scope="col">@lang('messages.created')</th>
                <th scope="col">@lang('messages.active')</th>
                <th scope="col">@lang('messages.action')</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($products as $product)
            <tr>
                <th scope="row">{{$product->id}}</th>
                <td>{{$product->name}}</td>
                <td>{{$product->price}}</td>
                <td>{{$product->quantity}}</td>
                <td>{{$product->created_at->format('d-m-Y H:i')}}</td>
                <td>{{($product->active)? 'Y' : 'N'}}</td>
                <td>
                    <form action="{{ route('admin.destroy.product', $product) }}" method="POST">

                        <a href="{{ route('admin.edit.product', $product) }}" type="button" class="btn btn-warning">
                            @lang('messages.edit')
                        </a>
                        <a href="{{ route('admin.show.product', $product) }}" type="button" class="btn btn-info">
                            @lang('messages.show')
                        </a>

                        @csrf
                        @method("DELETE")
                        <button class="btn btn-danger" type="submit">@lang('messages.delete')</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@stop
