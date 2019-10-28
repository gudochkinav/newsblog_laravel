@if (count($services_short_list))
<section class="content">
    <div class="container">
        <div class="row">
            @foreach($services_short_list as $item)
                <div class="col-12 col-sm-6 m-61" data-aos-easing="ease-out-cubic" data-aos="fade-up" data-aos-duration="800">
                    <div class="content-inner">
                        <a href="/services" class="web-development">
                            <i class="fa fa-black-tie" aria-hidden="true"></i>
                        </a>
                        <a href="/services">
                            <h3>{{ $item['name'] }}</h3>
                        </a>
                    </div>
                    {!! $item->getDescription() !!}
                </div>
            @endforeach
                       
            <div class="col-12 col-md-8 col-lg-9 content-para" data-aos-easing="ease-out-cubic" data-aos="fade-right" data-aos-duration="1000">
                <p>See how whitey helps you, creating worlds wonderful theme</p>
                <p>specialized in webdesign, wordpress development and much much more</p>
            </div>
            <div class="col-12 col-md-4 col-lg-3" data-aos="fade-left" data-aos-easing="ease-out-cubic" data-aos-duration="1000">
                <a href="/services" class="service-btn f-r">find our more services</a>
            </div>
        </div>
    </div>
</section>
@endif