@if ($paginator->hasPages())
    <ul class="pagination justify-content-center">
        {{-- Previous Page Link --}}
        @if ($paginator->onFirstPage())
            <li class="page-item disabled" aria-current="page"></li>
        @else
            <li class="page-item" aria-current="page"><a class="page-link" href="{{ $paginator->previousPageUrl() }}"
                    rel="prev">&laquo;</a> </li>
        @endif

        {{-- Pagination Elements --}}
        @foreach ($elements as $element)
            {{-- "Three Dots" Separator --}}
            @if (is_string($element))
                <button class="disabled"><span>{{ $element }}</span></button>
            @endif

            {{-- Array Of Links --}}
            @if (is_array($element))
                @foreach ($element as $page => $url)
                    @if ($page == $paginator->currentPage())
                        <li class="page-item active" aria-current="page">
                            <a class="page-link">{{ $page }}</a>
                        </li>
                    @else
                        <li class="page-item" aria-current="page">
                            <a href="{{ $url }}" class="page-link">{{ $page }}</a>
                        </li>
                    @endif
                @endforeach
            @endif
        @endforeach

        {{-- Next Page Link --}}
        @if ($paginator->hasMorePages())
            <li class="page-item" aria-current="page"><a class="page-link" href="{{ $paginator->nextPageUrl() }}"
                    rel="next">&raquo;</a> </li>
        @else
            <li class="page-item disabled" aria-current="page"></li>
        @endif
    </ul>
@endif
