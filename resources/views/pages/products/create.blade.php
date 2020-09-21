@extends('layouts.app')

@section('content')
<div class="wrap-create-product-page">
    <h2 class="text-center">{{ trans('product.title_create') }}</h2>
    <form action="{{ route('products.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label>{{ trans('product.name') }}</label>
            <input type="text" class="form-control" name="name" required>
            @if ($errors->has('name'))
                <div class="text text-danger">
                    {{ trans($errors->first('name')) }}
                </div>
            @endif
        </div>
        <div class="form-group">
            <label>{{ trans('product.brand') }}</label>
            <input type="text" class="form-control" name="brand" required>
            @if ($errors->has('brand'))
                <div class="text text-danger">
                    {{ trans($errors->first('brand')) }}
                </div>
            @endif
        </div>
        <div class="form-group">
            <label>{{ trans('product.description') }}</label>
            <input type="text" class="form-control" name="description" required>
            @if ($errors->has('description'))
                <div class="text text-danger">
                    {{ trans($errors->first('description')) }}
                </div>
            @endif
        </div>
        <div class="form-group">
            <label>{{ trans('product.image') }}</label>
            <input type="file" class="form-control" name="image_link" required>
            @if ($errors->has('image_link'))
                <div class="text text-danger">
                    {{ trans($errors->first('image_link')) }}
                </div>
            @endif
        </div>
        <div class="form-group">
            <label>{{ trans('product.original_price') }}</label>
            <input type="text" class="form-control" name="original_price" required>
            @if ($errors->has('original_price'))
                <div class="text text-danger">
                    {{ trans($errors->first('original_price')) }}
                </div>
            @endif
        </div>
        <div class="form-group">
            <label>{{ trans('product.current_price') }}</label>
            <input type="text" class="form-control" name="current_price" required>
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
