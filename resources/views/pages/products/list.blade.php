@extends('layouts.app')

@section('content')
<div class="wrap-list-product-page">
    <h2 class="text-center">{{ trans('product.title_list') }}</h2>
    <h2 class="text-center">
        {{ trans('product.title_created_by') }} {{ $user_name }}
    </h2>
    <a href="{{ route('products.create') }}" class="btn btn-primary">{{ trans('product.create_new') }}</a>
    <table class="table table-striped table-bordered">
        <thead>
            <tr>
                <th>#</th>
                <th>{{ trans('product.name') }}</th>
                <th>{{ trans('product.brand') }}</th>
                <th>{{ trans('product.description') }}</th>
                <th>{{ trans('product.image') }}</th>
                <th>{{ trans('product.price') }}</th>
                <th></th>
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
                <td>
                    <a href="{{ route('products.edit', [$product->id]) }}" class="btn btn-primary">{{ trans('product.edit') }}</a>
                    <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#delete-{{ $product->id }}">{{ trans('product.delete') }}</button>
                    <div class="modal fade" id="delete-{{ $product->id }}" tabindex="-1" aria-labelledby="deleteModal" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title">{{ trans('product.popup.title_delete')}}</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    {{ trans('product.popup.comfirm_delete') }}
                                </div>
                                <div class="modal-footer">
                                    <form method="POST" action="{{ route('products.destroy', [$product->id]) }}">
                                        @method('DELETE')
                                        @csrf
                                        <input type="submit" class="btn btn-danger" value="{{ trans('product.popup.yes') }}">
                                        <button type="button" class="btn btn-primary" data-dismiss="modal">{{ trans('product.popup.no') }}</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    {{ $products->links() }}
</div>
@endsection
