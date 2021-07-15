<form action="{{ $action }}" class="projects__search" method="{{ $method ?? 'GET' }}">
    @include('components.input-text.wrap', [
        'name' => 'q',
        'placeholder' => __('Поиск...'),
        'value' => Request::input('q'),
    ])
    <button class="button button--light projects__search-submit">
        @include('icons.search', ['iClasses' => 'projects__search-submit-icon'])
    </button>
</form>
