@extends('layouts.app')

@section('content')
<div class="wrap-list-product-page">
    <h2 class="text-center">{{ trans('product.title_list') }}</h2>
    <h2 class="text-center">
        {{ trans('product.title_created_by') }} {{ $user_name }}
    </h2>
    <table class="table table-striped table-bordered">
        <thead>
            <tr>
                <th>#</th>
                <th>{{ trans('product.name') }}</th>
                <th>{{ trans('product.brand') }}</th>
                <th>{{ trans('product.description') }}</th>
                <th>{{ trans('product.image') }}</th>
                <th>{{ trans('product.price') }}</th>
            </tr>
        </thead>
        <tbody>
            @php
                $count = 1;
            @endphp

            @foreach ($products as $product)
            <tr>
                <td>{{ $count++ }}</td>
                <td>{{ $product->name }}</td>
                <td>{{ $product->brand }}</td>
                <td>{{ $product->description }}</td>
                <td>
                    <img src="{{ asset($product->image_link) }}" alt="{{ trans('product.img_product')}}" class="img-product">
                </td>
                <td>
                    <div class="original-price">{{ $product->original_price }}</div>
                    {{ $product->current_price }}
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    {{ $products->links() }}
</div>
@endsection
