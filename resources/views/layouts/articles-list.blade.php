@if (count($articles_list))
<section class="blog blog-page">
    <div class="container">
        <div class="blog-text">
            <div class="blog-inner">
                <h5>Read our interesting articles about design, art and fashion</h5>
                <p>yes we write beautiful articles for your inspiration on any topics...</p>
            </div>

        </div>
        <div class="row">
            @for($i = 0; $i < ceil(count($articles_list) / 3); $i++)
                @for($j = 0; $j < 3; $j++)
                    @if (isset($articles_list[($i * 3) + $j]))
                    <div class="col-12 col-sm-6 {{ (!($i % 2) && ($j != 2)) || (($i % 2) && ($j > 0)) ? 'col-lg-3 ' : ''}} m-40" data-aos="fade-up" data-aos-easing="ease-out-cubic" data-aos-duration="1000">
                        <div class="pic-overlay">
                            <a href="{{ route('article', $articles_list[($i * 3) + $j]['slug']) }}">
                                <figure style="background-image: url({{ $articles_list[($i * 3) + $j]['preview_image_url'] }});">

                                </figure>
                                <div class="pic-text">
                                    <span>CATEGORY</span>
                                    <p>{{ $articles_list[($i * 3) + $j]['name'] }}</p>
                                </div>
                            </a>
                        </div>
                    </div>
                    @endif
                @endfor
            @endfor
        </div>
    </div>
</section>
@endif
