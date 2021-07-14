<form action="{{ route('tasks.destroy', $task->id) }}" class="tasks__item-delete" method="POST">
    @method('delete')
    @csrf
    <button class="tasks__item-action tasks__item-delete">
        {!! __('Удалить') !!}
        @include('icons\trash', ['iClasses' => 'tasks__item-action-icon'])
    </button>
</form>
