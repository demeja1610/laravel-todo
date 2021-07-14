<div class="sidebar-projects">
    @forelse ($projects as $project)
        @include('components.projects.sidebar-item')
    @empty
        <p class="sidebar-projects__empty">{!! __('Проектов не найдено') !!}</p>
    @endforelse
</div>
