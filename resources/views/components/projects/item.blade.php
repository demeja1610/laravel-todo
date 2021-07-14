@php
    $url = route('page.projects.tasks', $project->id);
@endphp

<a href="{{ $url }}" class="projects__item {{ Request::url() === $url ? 'current' : '' }}">
    <p class="projects__item-name">{!! $project->name !!}</p>
</a>
