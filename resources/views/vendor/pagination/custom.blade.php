@if ($paginator->hasPages())
<nav aria-label="Page navigation example">
    <ul class="pagination-area hospital-pagination">
        @if ($paginator->onFirstPage())
            <li class="prev page-numbers disabled">
                <a class="page-link" href="#" tabindex="-1"><i class='flaticon-left-arrow'></i></a>
            </li>
        @else
            <li class="page-numbers"><a class="page-link" href="{{ $paginator->previousPageUrl() }}"><i class='flaticon-left-arrow'></i></a></li>
        @endif

        @foreach ($elements as $element)
            @if (is_string($element))
                <li class="page-numbers disabled">{{ $element }}</li>
            @endif
            @if (is_array($element))
                @foreach ($element as $page => $url)
                    @if ($page == $paginator->currentPage())
                        <li class="page-numbers current">
                            <a class="page-link">{{ $page }}</a>
                        </li>
                    @else
                        <li class="page-numbers">
                            <a class="page-link" href="{{ $url }}">{{ $page }}</a>
                        </li>
                    @endif
                @endforeach
            @endif
        @endforeach

        @if ($paginator->hasMorePages())
            <li class="page-numbers">
                <a class="page-link" href="{{ $paginator->nextPageUrl() }}" rel="next"><i class='flaticon-right-arrow'></i></a>
            </li>
        @else
            <li class="page-numbers disabled">
                <a class="page-link" href="#"><i class='flaticon-right-arrow'></i></a>
            </li>
        @endif
    </ul>
@endif
