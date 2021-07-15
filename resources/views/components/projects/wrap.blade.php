<div class="projects">
    <div class="projects__wrapper">
        @include('components.projects.header')
        <div class="projects__items">
            @forelse ($projects as $project)
                @include('components.projects.item', ['project' => $project])
            @empty
                <p class="projects__empty">{!! __('Проектов не найдено') !!}</p>
            @endforelse
        </div>
        @if ($projects->hasPages())
            {!! $projects->links('pagination::default') !!}
        @endif
    </div>
</div>
