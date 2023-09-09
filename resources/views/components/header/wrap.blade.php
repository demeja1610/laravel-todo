<header class="header">
    <a href="{{ route('page.tasks') }}" class="header__logo">
        {{ config('app.name') }}
    </a>


    <form class="header__logout" action="{{ route('logout') }}" method="POST">
        @csrf

        @method('DELETE')

        @include('components.button.primary', [
            'text' => __('auth_form.logout'),
        ])
    </form>
</header>
