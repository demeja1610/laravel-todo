<div class="tasks">
    @forelse ($tasks as $task)
        @include('components.tasks.item', ['task' => $task])
    @empty
        <p class="tasks__empty">{!! __('Задач не найдено') !!}</p>
    @endforelse
</div>
