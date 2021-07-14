@extends('layouts.app')

@section('content')
    @component('components.sidebar.wrap')
        @slot('sidebarContent')
            @include('components.projects.sidebar', ['projects' => $projects])
        @endslot
    @endcomponent
    <div class="tasks-edit">
        @include('components.tasks.status-form', ['task' => $task])
        @include('components.tasks.form', [
            'task' => $task,
            'action' => route('tasks.update', $task->id),
            'method' => 'patch',
        ])
    </div>
@endsection
