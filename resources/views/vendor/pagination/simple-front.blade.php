<section class="" id="">

    <style>
        .box-pagination {
            /* list-style-type: none; */
            display: flex;
            justify-content: center;
            align-items: center;
            align-content: center;
            overflow: auto;
            flex-direction: row;
            font-size: 15px;

        }
      

        .pagination {
            display: flex;
            justify-content: center;
            align-items: center;
            align-content: center;
            width: 40px;
            height: 40px;
            margin: 5px;
            background-color: white;
            color: #5965e0;
        }

        .active {
            background-color: #5965e0 ;
            color: white;
        }
    </style>

    @if ($paginator->hasPages())
        <nav class="">
            <ul class="box-pagination">
                {{-- Previous Page Link --}}
                @if ($paginator->onFirstPage())
                    <li class="disabled pagination" aria-disabled="true" aria-label="@lang('pagination.previous')">
                        <span aria-hidden="true">&lsaquo;</span>
                    </li>
                @else
                    <li class="pagination">
                        <a href="{{ $paginator->previousPageUrl() }}" rel="prev"
                            aria-label="@lang('pagination.previous')">&lsaquo;</a>
                    </li>
                @endif

                {{-- Pagination Elements --}}
                @foreach ($elements as $element)
                    {{-- "Three Dots" Separator --}}
                    @if (is_string($element))
                        <li class="disabled pagination" aria-disabled="true"><span>{{ $element }}</span></li>
                    @endif

                    {{-- Array Of Links --}}
                    @if (is_array($element))
                        @foreach ($element as $page => $url)
                            @if ($page == $paginator->currentPage())
                                <li class="active pagination" aria-current="page"><span>{{ $page }}</span></li>
                            @else
                                <li class="pagination"><a href="{{ $url }}">{{ $page }}</a></li>
                            @endif
                        @endforeach
                    @endif
                @endforeach

                {{-- Next Page Link --}}
                @if ($paginator->hasMorePages())
                    <li class="pagination">
                        <a href="{{ $paginator->nextPageUrl() }}" rel="next"
                            aria-label="@lang('pagination.next')">&rsaquo;</a>
                    </li>
                @else
                    <li class="disabled pagination" aria-disabled="true" aria-label="@lang('pagination.next')">
                        <span aria-hidden="true">&rsaquo;</span>
                    </li>
                @endif
            </ul>
        </nav>
    @endif
</section>
