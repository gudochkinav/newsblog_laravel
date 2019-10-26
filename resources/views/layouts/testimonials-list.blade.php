@if (count($testimonials_list))
<section class="container-fluid testimonials" data-aos-easing="ease-out-cubic" data-aos="fade-up" data-aos-duration="1300">
    <div class="row">
        <div class="col-12 col-md-6 img p-0" style="background: url(images/img.jpg)">

        </div>
        <div class="col-12 col-md-6 testimonials-content p-0">
            <div class="testimonials-inner">
                <h3>Client Testimonials</h3>
                <h6>See what our clients have to say about our services</h6>

                <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
                    <div class="carousel-inner">
                        @foreach($testimonials_list as $key => $item)
                        <div class="carousel-item {{ ($key == 0) ? 'active' : ''}}">
                            <figure class="float-md-left carousel-0">
                                <img src="{{ asset($item['image_url']) }}" alt="First slide" class="img-fluid">
                            </figure>

                            <div class="inner-content">
                                <p>{!! $item['description'] !!}</p>
                                <span>{{ $item['author_name'] }}</span>
                            </div>

                        </div>
                        @endforeach
                    </div>

                </div>

            </div>
            <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
                <i class="left fa fa-arrow-circle-o-left left-indicator" aria-hidden="true"></i>
            </a>
            <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
                <i class="right fa fa-arrow-circle-o-right right-indicator" aria-hidden="true"></i>
            </a>
        </div>
    </div>
</section>
@endif
