@php
    $url = route('page.projects.tasks', $project->id);
@endphp

<a href="{{ $url }}" class="sidebar-projects__item {{ Request::url() === $url ? 'current' : '' }}">
    <p class="sidebar-projects__item-name">{!! $project->name !!}</p>
</a>
