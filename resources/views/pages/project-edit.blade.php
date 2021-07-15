@extends('layouts.app')

@section('content')
    <div class="projects-edit">
        @include('components.projects.form', [
            'project' => $project,
            'action' => route('projects.update', $project->id),
            'method' => 'patch',
        ])
    </div>
@endsection
