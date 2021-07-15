@extends('layouts.app')

@section('content')
    @if ($users->isEmpty())
        <p class="hello-text">
            {!!__('Пользователей не найдено') !!}
        </p>
    @else
        @include('components.users.wrap', [
            'users' => $users,
            'showAddNew' => true,
        ])
    @endif
@endsection
