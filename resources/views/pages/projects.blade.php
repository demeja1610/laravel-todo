@extends('layouts.app')

@section('content')
    @if ($projects->isEmpty())
        <p class="hello-text">
            {!!__('Добро пожаловать в LaravelToDo. Создайте новый проект, чтобы наполнить его задачами.') !!}
        </p>
    @else
        @include('components.projects.wrap', [
            'projects' => $projects,
            'showAddNew' => true,
        ])
    @endif

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

    <button class="button projects__add-new modal-trigger" data-modal="add-new-project">{!! __('Добавить новый проект') !!}</button>
@endsection
