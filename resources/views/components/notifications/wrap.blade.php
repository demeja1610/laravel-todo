@if (session()->has('success'))
    @include('components/notifications/item', [
        'text' => session()->get('success'),
        'class' => 'success'
    ])
@elseif(session()->has('error'))
    @include('components/notifications/item', [
        'text' => session()->get('error'),
        'class' => 'danger'
    ])
@endif
