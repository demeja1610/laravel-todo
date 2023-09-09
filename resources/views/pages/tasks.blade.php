@extends('layouts.app')

@section('content')
    <div class="page page--tasks">
        @include('components.form.create-task')

        @include('components.task.list', ['tasks' => $tasks])

        @if ($tasks->hasPages())
            {!! $tasks->links() !!}
        @endif
    </div>
@endsection
