<form action="{{ $action }}" class="projects-form" method="POST">
    @csrf
    @isset($method)
        @method($method)
    @endisset
    @include('components.input-text.wrap', [
        'name' => 'name',
        'placeholder' => 'Название проекта',
        'error' => 'name',
        'value' => isset($project) ? $project->name : old('name'),
    ])
    
    <button type="submit" class="button projects-form__submit">{!! isset($project) ? __('Сохранить') : __('Добавить') !!}</button>
</form>
