@if (isset($article))

<style>
    #st-1 .st-btn:last-child {
        display: inline-block !important;
    }
</style>

<section class="blog-single">
    <div class="container">
        <h1 data-aos-easing="ease-out-cubic" data-aos="fade-up" data-aos-duration="1000">{{ $article->name }}</h1>
        <span class="line" data-aos-easing="ease-out-cubic" data-aos="fade-up" data-aos-duration="1000"></span>
        <p data-aos-easing="ease-out-cubic" data-aos="fade-up" data-aos-duration="900">Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laaoreet
            dolore magna aliquam </p>
        <div class="social-icons" data-aos-easing="ease-out-cubic" data-aos="fade-up" data-aos-duration="1300">
            <p>{{ $article->getDate('M d, Y') }} Posted by {{ $article->author}} In :
                <span>Fashion</span>
            </p>
            <span class="float-md-right">
                <div class="sharethis-inline-share-buttons share-link-wrapper"></div>
            </span>
        </div>

        <div class="blog-singleimg">
            <figure style="background: url({{ $article->getImageURL() }});" data-aos-easing="ease-out-cubic" data-aos="fade-up" data-aos-duration="800">

            </figure>
            <p>{!! $article->getText() !!}</p>
        </div>

        @if($article->hasRelated())
        <div class="related-articles">
            <h3 data-aos-easing="ease-out-cubic" data-aos="fade-up" data-aos-duration="1000">related articles</h3>
            <span class="line" data-aos-easing="ease-out-cubic" data-aos="fade-up" data-aos-duration="1000"></span>
            <div class="row">
                @foreach($article->related() as $key => $item)
                <div class="col-12 col-sm-6 m-40 {{ ($key == 2) ? 'col-lg-6' : 'col-lg-3' }}" data-aos-easing="ease-out-cubic" data-aos="fade-up" data-aos-duration="1000">
                    <div class="pic-overlay img1">
                        <a href="{{ route('article', $item->slug) }}">
                            <figure style="background-image: url({{ $item->getImageURL() }});">
                            </figure>
                            <div class="pic-text">
                                <span>{{ $item->category->name }}</span>
                                <p>{{ $item->name }}</p>
                            </div>
                        </a>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
        @endif
        
    </div>
</section>

<script>
    function post() {
        var url = "{{ route('vk_auth', 'post') }}";
        var data = {link : "{{ route('article', $article->slug) }}" };
        
        $.ajax({
            url : url,
            method : 'GET',
            data : data,
            dataType : 'json',
            success : function (data) {
                window.open(data.redirect_url);
            },
            error : function (result) {
                
            }
        });
    }
</script>

@endif
