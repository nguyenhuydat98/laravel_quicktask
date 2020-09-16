@extends('layouts.app')

@section('content')
    <h2 class="text-center">{{ trans('user.title_create') }}</h2>
    <form action="{{ route('users.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label>{{ trans('user.name') }}</label>
            <input type="text" name="name" class="form-control" required>
            @if ($errors->has('name'))
                <div class="text text-danger">
                    {{ trans($errors->first('name')) }}
                </div>
            @endif
        </div>
        <div class="form-group">
            <label>{{ trans('user.address') }}</label>
            <input type="text" name="address" class="form-control" required>
            @if ($errors->has('address'))
                <div class="text text-danger">
                    {{ trans($errors->first('address')) }}
                </div>
            @endif
        </div>
        <div class="form-group">
            <label>{{ trans('user.phone') }}</label>
            <input type="text" name="phone" class="form-control" required>
            @if ($errors->has('phone'))
                <div class="text text-danger">
                    {{ trans($errors->first('phone')) }}
                </div>
            @endif
        </div>
        <div class="form-group">
            <label>{{ trans('user.email') }}</label>
            <input type="text" name="email" class="form-control" required>
            @if ($errors->has('email'))
                <div class="text text-danger">
                    {{ trans($errors->first('email')) }}
                </div>
            @endif
        </div>
        <input type="submit" class="btn btn-primary" value={{ trans('user.btn_save') }}>
    </form>
@endsection
