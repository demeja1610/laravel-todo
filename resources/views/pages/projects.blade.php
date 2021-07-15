@extends('layouts.app')

@section('content')
    @if ($projects->isEmpty())
        <p class="hello-text">
            {!!__('Добро пожаловать в LaravelToDo. Создайте новый проект, чтобы наполнить его задачами.') !!}
        </p>
    @else
        @include('components.projects.wrap', [
            'projects' => $projects,
        ])

        @component('components.modal.wrap')
            @slot('dataModal', 'add-new-project')
            @slot('active', !$errors->isEmpty())
            @slot('modalContent')
                @include('components.projects.form', [
                    'method' => 'PUT',
                    'action' => route('projects.store'),
                ])
            @endslot
        @endcomponent
    @endif
@endsection
