@php
    if (!isset($offset)) {
        $offset = 0;
    }
@endphp

@foreach($photos_list as $key => $item)
<div class="mySlides">
    <div class="numbertext">{{ $offset + $key + 1 }} / {{ count($photos_list) + $offset }}</div>
    <img src="{{ $item['image_url'] }}" style="width:100%">
</div>
@endforeach