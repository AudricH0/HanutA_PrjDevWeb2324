<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        @foreach($items as $key => $item)
            @if($loop->last)
                <li class="breadcrumb-item active fs-3" aria-current="page">{{ $item['label'] }}</li>
            @else
                <li class="breadcrumb-item fs-3">
                    <a href="{{ $item['url'] }}">{{ $item['label'] }}</a>
                </li>
            @endif
        @endforeach
    </ol>
</nav>
