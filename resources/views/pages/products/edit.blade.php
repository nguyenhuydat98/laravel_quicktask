@extends('layouts.app')

@section('content')
<div class="wrap-edit-product-page">
    <h2 class="text-center">{{ trans('product.title_edit') }}</h2>
    <form action="{{ route('products.update', [$product->id]) }}" method="POST" enctype="multipart/form-data">
        @method('PUT')
        @csrf
        <div class="form-group">
            <label>{{ trans('product.id') }}</label>
            <input type="text" class="form-control" name="id" value="{{ $product->id }}" readonly>
        </div>
        <div class="form-group">
            <label>{{ trans('product.name') }}</label>
            <input type="text" class="form-control" name="name" value="{{ $product->name }}" required>
            @if ($errors->has('name'))
                <div class="text text-danger">
                    {{ trans($errors->first('name')) }}
                </div>
            @endif
        </div>
        <div class="form-group">
            <label>{{ trans('product.brand') }}</label>
            <input type="text" class="form-control" name="brand" value="{{ $product->brand }}" required>
            @if ($errors->has('brand'))
                <div class="text text-danger">
                    {{ trans($errors->first('brand')) }}
                </div>
            @endif
        </div>
        <div class="form-group">
            <label>{{ trans('product.description') }}</label>
            <input type="text" class="form-control" name="description" value="{{ $product->description }}" required>
            @if ($errors->has('description'))
                <div class="text text-danger">
                    {{ trans($errors->first('description')) }}
                </div>
            @endif
        </div>
        <div class="form-group">
            <label>{{ trans('product.image') }}</label>
            <input type="text" class="form-control" value="{{ $product->image_link }}" name="image_current" readonly>
            <img src="{{ $product->image_link }}" alt="{{ trans('product.img_product') }}" class="img-product">
            <input type="file" class="form-control" name="image_link">
            @if ($errors->has('image_link'))
                <div class="text text-danger">
                    {{ trans($errors->first('image_link')) }}
                </div>
            @endif
        </div>
        <div class="form-group">
            <label>{{ trans('product.original_price') }}</label>
            <input type="text" class="form-control" name="original_price" value="{{ $product->original_price }}" required>
            @if ($errors->has('original_price'))
                <div class="text text-danger">
                    {{ trans($errors->first('original_price')) }}
                </div>
            @endif
        </div>
        <div class="form-group">
            <label>{{ trans('product.current_price') }}</label>
            <input type="text" class="form-control" name="current_price" value="{{ $product->current_price }}" required>
            @if ($errors->has('current_price'))
                <div class="text text-danger">
                    {{ trans($errors->first('current_price')) }}
                </div>
            @endif
        </div>
        <input type="submit" class="btn btn-primary" value="{{ trans('product.save') }}">
    </form>
</div>
@endsection
