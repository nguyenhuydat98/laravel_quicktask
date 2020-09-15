@extends('layouts.app')

@section('content')
<div class="wrap-list-user-page">
    <h2 class="text-center">{{ trans('user.title_list') }}</h2>
    <a href="{{ route('users.create') }}" class="btn btn-primary">{{ trans('user.create') }}</a>
    <table class="table table-striped table-bordered">
        <thead>
            <tr>
                <th>#</th>
                <th>{{ trans('user.name') }}</th>
                <th>{{ trans('user.address') }}</th>
                <th>{{ trans('user.phone') }}</th>
                <th>{{ trans('user.email') }}</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            @php
                $count = 1;
            @endphp

            @foreach ($users as $user)
            <tr>
                <td>{{ $count++ }}</td>
                <td>{{ $user->name }}</td>
                <td>{{ $user->address }}</td>
                <td>{{ $user->phone }}</td>
                <td>{{ $user->email }}</td>
                <td>
                    <a href="{!! route('users.edit', [$user->id]) !!}" class="btn btn-primary">{{ trans('user.edit') }}</a>
                    <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#delete-{{ $user->id }}">{{ trans('user.delete') }}</button>
                    <div class="modal fade" id="delete-{{ $user->id }}" tabindex="-1" aria-labelledby="deleteModal" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title">{{ trans('user.popup.title_delete')}}</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    {{ trans('user.popup.comfirm_delete') }}
                                </div>
                                <div class="modal-footer">
                                    <form method="POST" action="{{ route('users.destroy', [$user->id]) }}">
                                        @method('DELETE')
                                        @csrf
                                        <input type="submit" class="btn btn-danger" value="{{ trans('user.popup.yes') }}">
                                        <button type="button" class="btn btn-primary" data-dismiss="modal">{{ trans('user.popup.no') }}</button>
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
    {{ $users->links() }}
</div>
@endsection
