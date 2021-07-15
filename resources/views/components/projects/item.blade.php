<div class="projects__item">
    <div class="projects__item-header">
        @if ($project->trashed())
            <span class="projects__item-status deleted">
                {!! __('Удален') !!}
            </span>
            <p class="projects__item-name deleted">
                {!! $project->name !!}
            </p>
        @else
            <a href="{{ route('page.projects.tasks', $project->id) }}" class="projects__item-name">
                {!! $project->name !!}
            </a>
        @endif
        <div class="projects__item-actions">
            @if ($project->trashed())
            @include('components.projects.delete', ['project' => $project])
            @include('components.projects.restore', ['project' => $project])
            @else
                @include('components.projects.delete', ['project' => $project])
                <a href="{{ route('page.projects.edit', $project->id) }}" class="projects__item-action">
                    @include('icons.edit', [
                        'iClasses' => 'projects__item-action-icon'
                    ])
                </a>
            @endif
        </div>
    </div>
</div>
