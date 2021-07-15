<form action="{{ route('users.destroy', $user->id) }}" class="users__item-delete" method="POST">
    @method('delete')
    @csrf
    <button class="users__item-action users__item-delete">
        {!! __('Удалить') !!}
        @include('icons.trash', ['iClasses' => 'users__item-action-icon'])
    </button>
</form>
