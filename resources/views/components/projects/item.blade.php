<div class="projects__item">
    <div class="projects__item-header">
        <p class="projects__item-name">
            {!! $project->name !!}
            @include('icons.arrow', ['iClasses' => 'projects__item-name-icon'])
        </p>
        <div class="projects__item-actions">
            {{-- @include('components.projects.delete', ['project' => $project])
            <a href="{{ route('projects.edit', $project->id) }}" class="projects__item-action">
                @include('icons.edit', [
                    'iClasses' => 'projects__item-action-icon'
                ])
            </a> --}}
        </div>
    </div>
</div>
