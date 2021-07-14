@if ($paginator->hasPages())
    <ul class="pagination">
        {{-- Previous Page Link --}}
        @if ($paginator->onFirstPage())
            <li class="pagination__item prev disabled" aria-disabled="true" aria-label="@lang('pagination.previous')">
                @include('icons\arrow', [
                    'iClasses' => 'pagination__item-icon'
                ])
            </li>
        @else
            <li>
                <a class="pagination__item prev" href="{{ $paginator->previousPageUrl() }}" rel="prev" aria-label="@lang('pagination.previous')">
                    @include('icons\arrow', [
                        'iClasses' => 'pagination__item-icon'
                    ])
                </a>
            </li>
        @endif

        {{-- Pagination Elements --}}
        @foreach ($elements as $element)
            {{-- "Three Dots" Separator --}}
            @if (is_string($element))
                <li class="disabled" aria-disabled="true"><span>{{ $element }}</span></li>
            @endif

            {{-- Array Of Links --}}
            @if (is_array($element))
                @foreach ($element as $page => $url)
                    @if ($page == $paginator->currentPage())
                        <li class="pagination__item active" aria-current="page"><span>{{ $page }}</span></li>
                    @else
                        <li class="pagination__item"><a href="{{ $url }}">{{ $page }}</a></li>
                    @endif
                @endforeach
            @endif
        @endforeach

        {{-- Next Page Link --}}
        @if ($paginator->hasMorePages())
            <li>
                <a class="pagination__item next" href="{{ $paginator->nextPageUrl() }}" rel="next" aria-label="@lang('pagination.next')">
                    @include('icons\arrow', [
                        'iClasses' => 'pagination__item-icon'
                    ])
                </a>
            </li>
        @else
            <li class="pagination__item next disabled" aria-disabled="true" aria-label="@lang('pagination.next')">
                @include('icons\arrow', [
                    'iClasses' => 'pagination__item-icon'
                ])
            </li>
        @endif
    </ul>
@endif
