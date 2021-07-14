<div class="tasks">
    <div class="tasks__wrapper">
        @include('components.tasks.header', ['project' => $project])
        <div class="tasks__items">
            @forelse ($tasks as $task)
                @include('components.tasks.item', ['task' => $task])
            @empty
                <p class="tasks__empty">{!! __('Задач не найдено') !!}</p>
            @endforelse
        </div>
    </div>
    <button class="button tasks__add-new modal-trigger" data-modal="add-new-task">{!! __('Добавить новую задачу') !!}</button>
</div>
