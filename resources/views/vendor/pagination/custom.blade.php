@if ($paginator->hasPages())
    <nav role="navigation" aria-label="Pagination Navigation">
        <ul class="pagination">
            {{-- Previous Page Link --}}
            @if ($paginator->onFirstPage())
                <li class="page-item disabled" aria-disabled="true">
                    <button type="button" class="btn btn-outline-primary fw-bold"><span class="me-2"><i class="fal fa-chevron-double-left"></i></span>PREV</button>
                </li>
            @else
                <li class="page-item">
                    <a class="btn btn-outline-primary fw-bold" href="{{ $paginator->previousPageUrl() }}" rel="prev">
                        <span class="me-2"><i class="fal fa-chevron-double-left"></i></span>PREV
                    </a>
                </li>
            @endif

            {{-- Next Page Link --}}
            @if ($paginator->hasMorePages())
                <li class="page-item">
                    <a class="btn btn-outline-primary fw-bold" href="{{ $paginator->nextPageUrl() }}" rel="next">Next<span class="ms-2"><i class="fal fa-chevron-double-right"></i></span></a>
                </li>
            @else
                <li class="page-item disabled" aria-disabled="true">
                    <button type="button" class="btn btn-outline-primary fw-bold">NEXT<span class="ms-2"><i class="fal fa-chevron-double-right"></i></span></button>
                </li>
            @endif
        </ul>
    </nav>
@endif
