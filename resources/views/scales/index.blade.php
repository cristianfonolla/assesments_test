{{--{{ dump($scales) }}--}}

<ul>
    @foreach ($scales as $scale)
        <li>This is scale {{ $scale->id }}</li>
    @endforeach
</ul>