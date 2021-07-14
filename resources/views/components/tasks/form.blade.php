<form action="{{ $action }}" class="tasks-form" method="{{ 'POST' }}">
    @csrf
    @isset($method)
        @method($method)
    @endisset
    @include('components\input-text\wrap', [
        'name' => 'name',
        'placeholder' => 'Название задачи',
        'error' => 'name',
        'value' => old('name')
    ])
    @include('components\textarea\wrap', [
        'name' => 'content',
        'placeholder' => 'Описание задачи',
        'error' => 'content',
        'value' => old('content')
    ])

    <button type="submit" class="button tasks-form__submit">{!! __('Добавить') !!}</button>
</form>
