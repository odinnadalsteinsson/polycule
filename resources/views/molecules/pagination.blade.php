@if ($paginator->hasPages())
    <ul class="pagination">
        {{-- Previous Page Link --}}
        @if ($paginator->onFirstPage())
          <li>
            <button class="pagination__navigation pagination__navigation--disabled">
              <i class="icon material-icons" aria-hidden="true">chevron_left</i>
            </button>
          </li>
        @else
            <li>
                <a class="pagination__navigation" href="{{ $paginator->previousPageUrl() }}">
                  <i class="icon material-icons" aria-hidden="true">chevron_left</i>
                </a>
            </li>
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
                        <li class="active">
                          <button class="pagination__item pagination__item--active primary">
                            {{ $page }}
                          </button>
                        </li>
                    @else
                        <li>
                          <a class="pagination__item" href="{{ $url }}">
                            {{ $page }}
                          </a>
                        </li>
                    @endif
                @endforeach
            @endif
        @endforeach

        {{-- Next Page Link --}}
        @if ($paginator->hasMorePages())
            <li>
              <a class="pagination__navigation" href="{{ $paginator->nextPageUrl() }}" rel="next">
                <i class="icon material-icons" aria-hidden="true">chevron_right</i>
              </a>
            </li>
        @else
            <li>
              <button class="pagination__navigation pagination__navigation--disabled">
                <i class="icon material-icons" aria-hidden="true">chevron_right</i>
              </button>
            </li>
        @endif
    </ul>
@endif
