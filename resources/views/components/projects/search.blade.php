<form action="{{ $action }}" class="projects__search" method="{{ $method ?? 'GET' }}">
    @include('components.input-text.wrap', [
        'name' => 'q',
        'placeholder' => __('Поиск...'),
        'value' => Request::input('q'),
    ])
    <div class="select-wrapper">
        <select name="filter" class="select projects__filter">
            <option value="" @if(!Request::input('filter')) selected @endif>{!! __('Все') !!}</option>
            <option value="deleted" @if(Request::input('filter') === 'deleted') selected @endif>{!! __('Удаленные') !!}</option>
        </select>
    </div>
    <button class="button button--light projects__search-submit">
        @include('icons.search', ['iClasses' => 'projects__search-submit-icon'])
    </button>
</form>
