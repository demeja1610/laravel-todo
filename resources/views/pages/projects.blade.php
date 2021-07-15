@extends('layouts.app')

@section('content')

    @include('components.projects.wrap', [
        'projects' => $projects,
        'showAddNew' => true,
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

    <button class="button projects__add-new modal-trigger" data-modal="add-new-project">{!! __('Добавить новый проект') !!}</button>
@endsection
