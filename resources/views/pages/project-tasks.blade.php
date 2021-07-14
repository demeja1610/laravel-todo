@extends('layouts.app')

@section('content')
    @component('components.sidebar.wrap')
        @slot('sidebarContent')
            @include('components.projects.wrap', ['projects' => $projects])
        @endslot
    @endcomponent
    @include('components.tasks.wrap', ['tasks' => $tasks, 'project' => $project])
@endsection
