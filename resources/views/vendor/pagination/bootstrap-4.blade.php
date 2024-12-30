@if ($paginator->hasPages())
    <div class="pagination-area orange-color text-center mt-30 md-mt-0">
        <ul class="pagination-part">
            {{-- Previous Page Link --}}
            @if (!$paginator->onFirstPage())
                <li>
                    <a href="{{ $paginator->previousPageUrl() }}" rel="prev" aria-label="@lang('pagination.previous')">
                        <i class="fa fa-long-arrow-left px-2"></i> Previous
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
                            <li class="active" aria-current="page"><a href="#">{{ $page }}</a></li>
                        @else
                            <li><a href="{{ $url }}">{{ $page }}</a></li>
                        @endif
                    @endforeach
                @endif
            @endforeach

            {{-- Next Page Link --}}
            @if ($paginator->hasMorePages())
                <li>
                    <a href="{{ $paginator->nextPageUrl() }}" rel="next" aria-label="@lang('pagination.next')">
                        Next <i class="fa fa-long-arrow-right"></i>
                    </a>
                </li>
            @endif
        </ul>
    </div>
@endif
