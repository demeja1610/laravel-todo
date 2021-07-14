@extends('layouts.app')

@section('content')
    @component('components.sidebar.wrap')
        @slot('sidebarContent')
            @include('components.projects.wrap', ['projects' => $projects])
        @endslot
    @endcomponent
    <p class="hello-text">
        {!! __('Добро пожаловать в LaravelToDo.') !!}

        @if ($projects->isEmpty())
            {!!__('Создайте новый проект, чтобы наполнить его задачами.') !!}
        @else
            {!! __('Выберите один из ваших проектов, чтобы посмотреть текущие задачи.') !!}
        @endif
    </p>
@endsection
