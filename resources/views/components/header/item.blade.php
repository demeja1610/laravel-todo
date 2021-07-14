<li class="header-menu__item {{ $menuItem['classes'] ?? '' }}">
    <a
        href="{{ route($menuItem['route']) }}"
        class="header-menu__link {{ Route::currentRouteName() === $menuItem['route'] ? 'current' : '' }}"
    >
        {!! __($menuItem['name']) !!}
    </a>
</li>
