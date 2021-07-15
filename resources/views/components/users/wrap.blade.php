<div class="users">
    <div class="users__wrapper">
        @include('components.users.header')
        <div class="users__items">
            @forelse ($users as $user)
                @include('components.users.item', ['user' => $user])
            @empty
                <p class="users__empty">{!! __('Пользователей не найдено') !!}</p>
            @endforelse
        </div>
        @if ($users->hasPages())
            {!! $users->links('pagination::default') !!}
        @endif
    </div>
</div>
