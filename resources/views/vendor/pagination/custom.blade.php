@if ($paginator->hasPages())
<nav class="shop-pagination">
    <ul class="pagination-list">
        {{-- Previous Page Link --}}
        @if ($paginator->onFirstPage())
            <li class="disabled"><span><i class="bi bi-chevron-left"></i></span></li>
        @else
            <li><a href="{{ $paginator->previousPageUrl() }}" class="shop-pagi-btn"><i class="bi bi-chevron-left"></i></a></li>
        @endif

        {{-- Pagination Elements --}}
        @foreach ($elements as $element)
            {{-- "Three Dots" Separator --}}
            @if (is_string($element))
                <li class="disabled"><span>{{ $element }}</span></li>
            @endif

            {{-- Array Of Links --}}
            @if (is_array($element))
                @foreach ($element as $page => $url)
                    @if ($page == $paginator->currentPage())
                        <li><a class="active">{{ $page }}</a></li>
                    @else
                        <li><a href="{{ $url }}">{{ $page }}</a></li>
                    @endif
                @endforeach
            @endif
        @endforeach

        {{-- Next Page Link --}}
        @if ($paginator->hasMorePages())
            <li><a href="{{ $paginator->nextPageUrl() }}" class="shop-pagi-btn"><i class="bi bi-chevron-right"></i></a></li>
        @else
            <li class="disabled"><span><i class="bi bi-chevron-right"></i></span></li>
        @endif
    </ul>
</nav>

@endif
