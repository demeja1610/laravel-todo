<form action="{{ $action }}" class="tasks__search" method="{{ $method ?? 'GET' }}">
    @include('components.input-text.wrap', [
        'name' => 'q',
        'placeholder' => __('Поиск...'),
        'value' => Request::input('q'),
    ])
    <div class="select-wrapper">
        <select name="filter" class="select tasks__filter">
            <option value="" @if(!Request::input('filter')) selected @endif>{!! __('Все') !!}</option>
            @foreach ($taskStatuses as $taskStatus)
                <option
                    value="{!! $taskStatus !!}"
                    @if (Request::input('filter') === $taskStatus)
                        selected
                    @endif
                >
                    {!! __('task-status.' . $taskStatus) !!}
                </option>
            @endforeach
            <option value="deleted" @if(Request::input('filter') === 'deleted') selected @endif>{!! __('Удаленные') !!}</option>
        </select>
    </div>
    <button class="button button--light tasks__search-submit">
        @include('icons.search', ['iClasses' => 'tasks__search-submit-icon'])
    </button>
</form>
