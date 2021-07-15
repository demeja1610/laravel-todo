<div class="tasks__item">
    <div class="tasks__item-header">
        <span class="tasks__item-status">{!! __('task-status.' . $task->status) !!}</span>

        @if ($task->trashed())
            <span class="tasks__item-status deleted">
                {!! __('Удалена') !!}
            </span>
        @endif

        <p class="tasks__item-name">
            {!! $task->name !!}
            @include('icons.arrow', ['iClasses' => 'tasks__item-name-icon'])
        </p>
        <div class="tasks__item-actions">
            @if (!$task->trashed())
                @include('components.tasks.status-form', ['task' => $task])
                @include('components.tasks.delete', ['task' => $task])
                <a href="{{ route('page.tasks.edit', $task->id) }}" class="tasks__item-action">
                    @include('icons.edit', [
                        'iClasses' => 'tasks__item-action-icon'
                    ])
                </a>
            @else
                @include('components.tasks.delete', ['task' => $task])
                @include('components.tasks.restore', ['task' => $task])
            @endif
        </div>
    </div>
    <div class="tasks__item-content">
        {!! $task->content !!}
    </div>
</div>
