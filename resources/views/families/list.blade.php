<li>
    <a href="{{ route('families.show', $family->id) }}">{{ $family->name }}</a>

    @if ($family->allChilds->count() > 0)
        <ul>
            @foreach ($family->allChilds as $family)
                @include('families.list', ['family' => $family])
            @endforeach
        </ul>
    @endif
</li>
