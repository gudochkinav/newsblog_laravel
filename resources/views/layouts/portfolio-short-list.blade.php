@if (count($portfolio_short_list))

<section class="container-fluid full-banner">
    <div class="layer">
        <div class="container">
            <div class="layer-content">
                <h3>recent design works</h3>
                <a href="/portfolio">view all works
                    <i class="fa fa-long-arrow-right" aria-hidden="true"></i>
                </a>
            </div>
            <div class="row">
                @foreach($portfolio_short_list as $item)
                    <div class="col-12 col-sm-4" data-aos-easing="ease-out-cubic" data-aos="fade-up" data-aos-duration="500">
                        <div class="overlay">
                            <a href="/portfolio">
                                <figure>
                                    <img src="{{ asset($item->getImageURL()) }}" alt="{{ $item['name'] }}" class="img-fluid">
                                </figure>
                            </a>
                            <div class="overlay-inner">
                                <a href="/portfolio">more</a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</section>

@endif
