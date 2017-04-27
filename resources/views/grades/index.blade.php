{{--{{ dump($grades) }}--}}

<ul>
    @foreach ($grades as $grade)
        <li>This is grade {{ $grade->id }}</li>
    @endforeach
</ul>