<div class="rounded w-full object-cover object-center">
    @if (empty($filename))
        <img src="{{asset('images/no_image.jpg' . $filename)}}" alt="{{$filename}}">
    @else
        <img src="{{asset('storage/' . $type . '/' . $filename)}}" alt="{{$filename}}">
    @endif
</div>