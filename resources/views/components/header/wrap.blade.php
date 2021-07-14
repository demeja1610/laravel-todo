<header class="header">
    @include('components\logo\wrap')

    <ul class="header-menu">
        @foreach ($menu as $menuItem)
            @if(isset($menuItem['can']))
                @can($menuItem['can'])
                    @include('components\header\item', ['menuItem' => $menuItem])
                @endcan
            @else
                @include('components\header\item', ['menuItem' => $menuItem])
            @endif
        @endforeach
    </ul>
</header>
