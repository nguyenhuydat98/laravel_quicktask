@extends('layouts.app')

@section('content')
<div class="wrap-edit-user-page">
    <h2 class="text-center">{{ trans('user.title_edit') }}</h2>
    <form action="{{ route('users.update', [$user->id]) }}" method="POST">
        @method('PUT')
        @csrf
        <div class="form-group">
            <label>{{ trans('user.id') }}</label>
            <input type="text" name="id" class="form-control" value="{{ $user->id }}" readonly>
        </div>
        <div class="form-group">
            <label>{{ trans('user.name') }}</label>
            <input type="text" name="name" class="form-control" value="{{ $user->name }}" required>
            @if ($errors->has('name'))
                <div class="text text-danger">
                    {{ trans($errors->first('name')) }}
                </div>
            @endif
        </div>
        <div class="form-group">
            <label>{{ trans('user.address') }}</label>
            <input type="text" name="address" class="form-control" value="{{ $user->address }}" required>
            @if ($errors->has('address'))
                <div class="text text-danger">
                    {{ trans($errors->first('address')) }}
                </div>
            @endif
        </div>
        <div class="form-group">
            <label>{{ trans('user.phone') }}</label>
            <input type="text" name="phone" class="form-control" value="{{ $user->phone }}" required>
            @if ($errors->has('phone'))
                <div class="text text-danger">
                    {{ trans($errors->first('phone')) }}
                </div>
            @endif
        </div>
        <div class="form-group">
            <label>{{ trans('user.email') }}</label>
            <input type="text" name="email" class="form-control" value="{{ $user->email }}" required>
            @if ($errors->has('email'))
                <div class="text text-danger">
                    {{ trans($errors->first('email')) }}
                </div>
            @endif
        </div>
        <input type="submit" class="btn btn-primary" value={{ trans('user.btn_save') }}>
    </form>
</div>
@endsection
