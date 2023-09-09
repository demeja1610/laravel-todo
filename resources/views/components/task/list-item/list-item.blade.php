<li class="task-list__item">
    <p class="task-list__item-title">
        {!! $task->title !!}
    </p>

    <div class="task-list__item-metas">
        <p class="task-list__item-date">
            {{ __('task.created') }}:
            {{ $task->created_at->format('d.m.Y H:i') }}
        </p>

        <x-task.list-item.actions :task="$task" />
    </div>
</li>
