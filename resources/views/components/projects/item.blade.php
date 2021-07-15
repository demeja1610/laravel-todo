<div class="projects__item">
    <div class="projects__item-header">
        <a href="{{ route('page.projects.tasks', $project->id) }}" class="projects__item-name">
            {!! $project->name !!}
        </a>
        <div class="projects__item-actions">
            @include('components.projects.delete', ['project' => $project])
            <a href="{{ route('page.projects.edit', $project->id) }}" class="projects__item-action">
                @include('icons.edit', [
                    'iClasses' => 'projects__item-action-icon'
                ])
            </a>
        </div>
    </div>
</div>
