<div class="users__item">
    <div class="users__item-header">
        <p class="users__item-name {{ $user->is_banned ? 'banned' : '' }}">
            {!! $user->name !!}
        </p>
        <div class="users__item-actions">
            @include('components.users.delete', ['user' => $user])
            <a href="{{ route($user->is_banned ? 'users.unblock' : 'users.block', $user->id) }}" class="users__item-action">
                @if ($user->is_banned)
                    @include('icons.approve', [
                        'iClasses' => 'users__item-action-icon'
                    ])
                @else
                    @include('icons.block', [
                        'iClasses' => 'users__item-action-icon'
                    ])
                @endif
            </a>
        </div>
    </div>
</div>
