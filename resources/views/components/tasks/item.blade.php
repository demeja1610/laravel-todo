<div class="tasks__item">
    <div class="tasks__item-header">
        <span class="tasks__item-status">{!! __('task-status.' . $task->status) !!}</span>
        <p class="tasks__item-name">
            {!! $task->name !!}
            @include('icons.arrow', ['iClasses' => 'tasks__item-name-icon'])
        </p>
    </div>
    <div class="tasks__item-content">
        {!! $task->content !!}
    </div>
</div>
