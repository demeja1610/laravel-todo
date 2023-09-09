<ul class="task-list">
    @forelse ($tasks as $task)
        @include('components.task.list-item.list-item', ['task' => $task])
    @empty
        <li class="task-list__empty">{!! __('task.empty') !!}</li>
    @endforelse
</ul>
