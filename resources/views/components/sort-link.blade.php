<th>
    @if (request()->get('sort-type') == 'desc' && request()->get('sort-by') == $sortBy)
        <a href="?sort-by={{ $sortBy }}&sort-type=asc">
            @if ($sortType == 'alphabet')
                <i class="fa-solid fa-arrow-down-z-a"></i>
            @else
                <i class="fa-solid fa-arrow-down-9-1"></i>
            @endif

        </a>{{ $colName }}
    @elseif(request()->get('sort-type') == 'asc' && request()->get('sort-by') == $sortBy)
        <a href="?sort-by={{ $sortBy }}&sort-type=desc">
            @if ($sortType == 'alphabet')
                <i class="fa-solid fa-arrow-down-a-z"></i>
            @else
                <i class="fa-solid fa-arrow-down-1-9"></i>
            @endif
        </a>{{ $colName }}
    @else
        <a href="?sort-by={{ $sortBy }}&sort-type=desc"> <i class="fa-solid fa-sort"></i>
        </a>{{ $colName }}
    @endif
</th>
