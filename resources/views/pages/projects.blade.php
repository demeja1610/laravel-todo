@extends('layouts.app')

@section('content')
    <p class="hello-text">
        @if ($projects->isEmpty())
            {!!__('Добро пожаловать в LaravelToDo. Создайте новый проект, чтобы наполнить его задачами.') !!}
        @else
            @include('components.projects.wrap', [
                'projects' => $projects,
            ])
        @endif
    </p>
@endsection
