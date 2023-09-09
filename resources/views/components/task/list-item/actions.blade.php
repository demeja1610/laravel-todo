<div class="task-list__item-actions">
    @foreach ($actions as $action)
        <form
            action="{{ $action['url'] }}"
            @class([
                'task-list__item-action',
                "task-list__item-action--{$action['action']}",
                'active' => $action['isPerformed']
            ])
            method="{{ strtoupper($action['method']) === 'GET' ? 'GET' : 'POST' }}"
        >
            @method($action['method'])

            @csrf

            <button class="task-list__item-action-submit" title="{{ $action['name'] }}">
                @include("icons.{$action['icon']}", ['classes' => 'task-list__item-action-submit-icon'])
            </button>
        </form>
    @endforeach
</div>
