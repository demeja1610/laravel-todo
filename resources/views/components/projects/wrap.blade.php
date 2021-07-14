<div class="projects">
    @forelse ($projects as $project)
        @include('components.projects.item')
    @empty
        <p class="projects__empty">{!! __('Проектов не найдено') !!}</p>
    @endforelse
</div>
