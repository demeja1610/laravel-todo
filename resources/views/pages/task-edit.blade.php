@extends('layouts.app')

@section('content')
    <div class="tasks-edit">
        @include('components.tasks.status-form', ['task' => $task])
        @include('components.tasks.form', [
            'task' => $task,
            'action' => route('tasks.update', $task->id),
            'method' => 'patch',
        ])
    </div>
@endsection
