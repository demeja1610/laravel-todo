<form action="{{ route('tasks.changeStatus', $task->id) }}" class="tasks__item-change-status" method="POST">
    @method('patch')
    @csrf

    <div class="select-wrapper">
        <select name="status" class="select tasks__item-change-status-select" onchange="this.form.submit()">
            @foreach ($taskStatuses as $taskStatus)
                <option
                    value="{!! $taskStatus !!}"
                    @if ($task->status === $taskStatus)
                        selected
                    @endif
                >
                    {!! __('task-status.' . $taskStatus) !!}
                </option>
            @endforeach
        </select>
    </div>
</form>
