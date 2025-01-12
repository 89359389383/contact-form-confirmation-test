@if ($paginator->hasPages())
<div class="pagination">
    {{-- Previous Page Link --}}
    @if ($paginator->onFirstPage())
    <a href="#" class="arrow disabled">&lt;</a>
    @else
    <a href="{{ $paginator->previousPageUrl() }}" class="arrow">&lt;</a>
    @endif

    {{-- Pagination Elements --}}
    @foreach ($elements as $element)
    @if (is_array($element))
    @foreach ($element as $page => $url)
    @if ($page == $paginator->currentPage())
    <a href="#" class="page-number active">{{ $page }}</a>
    @else
    <a href="{{ $url }}" class="page-number">{{ $page }}</a>
    @endif
    @endforeach
    @endif
    @endforeach

    {{-- Next Page Link --}}
    @if ($paginator->hasMorePages())
    <a href="{{ $paginator->nextPageUrl() }}" class="arrow">&gt;</a>
    @else
    <a href="#" class="arrow disabled">&gt;</a>
    @endif
</div>
@endif