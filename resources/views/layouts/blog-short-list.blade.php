@if (count($articles_short_list))

<section class="blog">
    <div class="container">
        <div class="blog-text">
            <div class="blog-inner" data-aos-easing="ease-out-cubic" data-aos="fade-up" data-aos-duration="1000">
                <h5>Read our interesting articles about design, art and fashion</h5>
                <p>yes we write beautiful articles for your inspiration on any topics...</p>
            </div>

            <div class="blog-link" data-aos-easing="ease-out-cubic" data-aos="fade-up" data-aos-duration="1000">
                <a href="/blog">go to blog
                    <i class="fa fa-long-arrow-right" aria-hidden="true"></i>
                </a>
            </div>
        </div>

        <div class="row">
            @for($i = 0; $i < ceil(count($articles_short_list) / 3); $i++)
                @for($j = 0; $j < 3; $j++)
                    @if (isset($articles_short_list[($i * 3) + $j]))
                        <div class="col-12 col-sm-6 {{ (!($i % 2) && ($j != 2)) || (($i % 2) && ($j > 0)) ? 'col-lg-3 ' : ''}} m-40" data-aos="fade-up" data-aos-easing="ease-out-cubic" data-aos-duration="1000">
                            <div class="pic-overlay">
                                <a href="/blog/{{ $articles_short_list[($i * 3) + $j]->slug }}">
                                    <figure style="background-image: url({{ $articles_short_list[($i * 3) + $j]->getImageURL() }});">

                                    </figure>
                                    <div class="pic-text">
                                        <span>{{ $articles_short_list[($i * 3) + $j]->category->name }}</span>
                                        <p>{{ $articles_short_list[($i * 3) + $j]['name'] }}</p>
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
