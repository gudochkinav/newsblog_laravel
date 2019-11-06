@php
    if (!isset($offset)) {
        $offset = 0;
    }

    if (!isset($current_page)) {
        $current_page = 0;
    }
@endphp

@for($i = 0; $i < ceil(count($photos_list) / 3); $i++)
    @for($j = 0; $j < 3; $j++)
        @if (isset($photos_list[($i * 3) + $j]))
        <div class="col-12 col-sm-6 {{ (!(($current_page + $i) % 2) && ($j != 2)) || ((($current_page + $i) % 2) && ($j > 0)) ? 'col-lg-3 ' : ''}} m-40" data-aos="fade-up" data-aos-easing="ease-out-cubic" data-aos-duration="1000">
            <div class="pic-overlay img1" onclick="openModal();currentSlide({{ $offset + ($i * 3) + $j + 1 }})">
                <figure style="background-image: url({{ $photos_list[($i * 3) + $j]->getImageURL() }});">
                </figure>
                <div class="port-text">
                    <span>CATEGORY</span>
                </div>
            </div>
        </div>
        @endif
    @endfor
@endfor
