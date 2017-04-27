{{--{{ dump($assesments) }}--}}

<ul>
    @foreach ($assesments as $assesment)
        <li>This is assesment {{ $assesment->id }}</li>
    @endforeach
</ul>