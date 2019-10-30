<section class="contact-sec">
    <div class="container">
        @if (session()->has('message')) 
            <div class="alert alert-success" role="alert">
                {{ session()->get('message') }}
            </div>
        @endif
        <h3 data-aos-easing="ease-out-cubic" data-aos="fade-up" data-aos-duration="1000">contact us</h3>
        <span data-aos-easing="ease-out-cubic" data-aos="fade-up" data-aos-duration="1000"></span>
        <form action="{{ route('contact_feedback') }}" method="POST" id="contact-feedback">
            {{ @csrf_field() }}
            <div class="row">
                <div class="col-12 col-sm-6" data-aos-easing="ease-out-cubic" data-aos="fade-up" data-aos-duration="1000">
                    <input name="name" type="text" placeholder="Your Name" required>
                </div>
                <div class="col-12 col-sm-6" data-aos-easing="ease-out-cubic" data-aos="fade-up" data-aos-duration="1000">
                    <input name="email" type="text" placeholder="Your Email" required>
                </div>
                <div class="col-12" data-aos-easing="ease-out-cubic" data-aos="fade-up" data-aos-duration="1200">
                    <input name="phone" type="text" placeholder="Your Phone Number" required>
                </div>
                <div class="col-12" data-aos-easing="ease-out-cubic" data-aos="fade-up" data-aos-duration="1400">
                    <textarea name="text" placeholder="Your Message" required></textarea>
                </div>
                <button form="contact-feedback" type="submit">alright submit it</button>
            </div>
        </form>
    </div>
</section>