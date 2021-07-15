<form action="{{ $action }}" class="users__search" method="{{ $method ?? 'GET' }}">
    @include('components.input-text.wrap', [
        'name' => 'q',
        'placeholder' => __('Поиск...'),
        'value' => Request::input('q'),
    ])
    <button class="button button--light users__search-submit">
        @include('icons.search', ['iClasses' => 'users__search-submit-icon'])
    </button>
</form>
