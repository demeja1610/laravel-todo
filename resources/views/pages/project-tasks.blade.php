@extends('layouts.app', [
    'overlayActive' => !$errors->isEmpty(),
])

@section('content')
    @include('components.tasks.wrap', ['tasks' => $tasks, 'project' => $project])
    @component('components.modal.wrap')
        @slot('dataModal', 'add-new-task')
        @slot('active', !$errors->isEmpty())
        @slot('modalContent')
            @include('components.tasks.form', [
                'method' => 'PUT',
                'action' => route('tasks.store', $project->id),
            ])
        @endslot
    @endcomponent
@endsection
