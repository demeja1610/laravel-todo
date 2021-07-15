<form action="{{ route('tasks.restore', $task->id) }}" method="POST">
    @method('put')
    @csrf
    <button class="tasks__item-action tasks__item-delete">
        @include('icons.restore', ['iClasses' => 'tasks__item-action-icon'])
    </button>
</form>
