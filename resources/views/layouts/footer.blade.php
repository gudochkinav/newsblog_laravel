<footer class="container-fluid">
    <div class="footernav">
        <div class="container">
            <div class="footer-logo" data-aos-easing="ease-out-cubic" data-aos="fade-right" data-aos-duration="1000">
                <a href="index.html">
                    <img src="images/footer-logo.jpg" alt="footer-logo" class="img-fluid">
                </a>
            </div>

            @include('layouts.footer-menu')

        </div>
    </div>

    <div class="footer-para container-fluid">
        <p>(C) {{ date('Y') }}, WebStudio</p>
        <img src="images/footer-gradient.jpg" alt="footer-gradient" class="img-fluid">
    </div>
</footer>