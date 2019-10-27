@if (count($services_list))
<section class="services">
    <div class="container">
        <h3>our services</h3>
        <span></span>
        @foreach($services_list as $item)
        <div class="row services-content">
            <div class="col-12 col-lg-6" data-aos-easing="ease-out-cubic" data-aos="fade-up" data-aos-duration="1000">
                <h3>{{ $item['name'] }}</h3>
                <img src="{{ asset($item['image_url']) }}" alt="webdesign">
            </div>
            <div class="col-12 col-lg-6 p-37" data-aos-easing="ease-out-cubic" data-aos="fade-up" data-aos-duration="1000">
                <p>{!! $item->getDescription() !!}</p>
            </div>
        </div>
        @endforeach
    </div>
</section>
@endif

<section class="content">
    <div class="container">
        <div class="row">
            <div class="col-12 col-md-8 col-lg-9 content-para about-para" data-aos-easing="ease-out-cubic" data-aos="fade-right" data-aos-duration="1000">
                <p>See how whitey helps you, creating worlds wonderful theme</p>
                <p>specialized in webdesign, wordpress development and much much more</p>
            </div>
            <div class="col-12 col-md-4 col-lg-3" data-aos-easing="ease-out-cubic" data-aos="fade-left" data-aos-duration="1000">
                <a href="/services" class="service-btn f-r about-btn">find our more services</a>
            </div>
        </div>
    </div>
</section>
