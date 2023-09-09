<form action="{{ route('tasks.store') }}" class="create-task-form" method="POST">
    @csrf

    @include('components.input.text', [
        'name' => 'title',
        'id' => 'title',
        'placeholder' => __('task.create_title_placeholder'),
        'error' => 'title',
        'value' => old('title'),
        'classes' => 'create-task-form__input',
    ])

    @include('components.button.primary', [
        'text' => __('task.create_submit'),
        'classes' => 'create-task-form__submit',
    ])
</form>
