<style>
.subscribe ul li {
    vertical-align: top;
}
</style>

<section class="container-fluid subscribe">
    <div class="gradient">
        <img src="images/gradient.jpg" alt="gradient" class="img-fluid">
    </div>
    <div class="layer"></div>
    <div class="container" style="text-align: center">

        <div class="subscribe-content" data-aos-easing="ease-out-cubic" data-aos="fade-up" data-aos-duration="1000">
            <h5>Subscribe to Our Awesome Monthly Newsletter</h5>
            <p>we usually dont spam, but sent you interesting...</p>
        </div>

        <form method="POST" action="{{ route('subscribe') }}" id="subscribe">
            @csrf
            <ul data-aos-easing="ease-out-cubic" data-aos="fade-up" data-aos-duration="1200">
                <li class="m-20">
                    <input name="name" type="text" placeholder="Your Name" value="{{ old('name') }}" required>
                    @if ($errors->has('name'))
                        <label style="display: block; color: #ff0000">{{ $errors->first('name') }}</label>
                    @endif
                </li>
                <li class="m-20">
                    <input name="email" type="text" placeholder="Your Email Address" value="{{ old('email') }}" required>
                    @if ($errors->has('email'))
                        <label style="display: block; color: #ff0000">{{ $errors->first('email') }}</label>
                    @endif
                </li>
                <li>
                    <button form="subscribe" type="submit">subscribe to Newsletter</button>
                </li>
            </ul>
        </form>
    </div>

</div>
<div class="gradient">
    <img src="{{ asset('/images/gradient.jpg') }}" alt="gradient" class="img-fluid">
</div>
</section>