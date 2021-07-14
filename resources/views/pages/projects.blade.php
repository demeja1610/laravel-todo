@extends('layouts.app')

@section('content')
    @component('components.sidebar.wrap')
        @slot('sidebarContent')
            @include('components.projects.sidebar', ['projects' => $projects])
        @endslot
    @endcomponent
    <p class="hello-text">
        @if ($projects->isEmpty())
            {!!__('Добро пожаловать в LaravelToDo. Создайте новый проект, чтобы наполнить его задачами.') !!}
        @else
            {{-- @include('components.projects.sidebar', [
                'projects' => $projects,
            ]) --}}
        @endif
    </p>
@endsection
