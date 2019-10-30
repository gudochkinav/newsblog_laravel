@if (count($photos_list))
<style>
    body {
        margin: 0;
    }

    * {
        box-sizing: border-box;
    }

    /* The Modal (background) */

    .modal {
        display: none;
        position: fixed;
        z-index: 1;
        padding-top: 100px;
        left: 0;
        top: 0;
        width: 100%;
        height: 100%;
        overflow: auto;
        background-color: black;
        transition: all 1s;
    }

    /* Modal Content */

    .modal-content {
        position: relative;
        background-color: #fefefe;
        margin: auto;
        padding: 0;
        width: 50%;
        max-width: 1200px;
    }

    /* The Close Button */

    .close {
        color: white;
        position: absolute;
        top: 10px;
        right: 25px;
        font-size: 35px;
        font-weight: bold;
    }

    .close:hover,
    .close:focus {
        color: #999;
        text-decoration: none;
        cursor: pointer;
    }

    .mySlides {
        display: none;
    }

    .cursor {
        cursor: pointer;
    }

    /* Next & previous buttons */

    .prev,
    .next {
        cursor: pointer;
        position: absolute;
        top: 50%;
        width: auto;
        padding: 16px;
        margin-top: -50px;
        color: white !important;
        font-weight: bold;
        font-size: 20px;
        transition: 0.6s ease;
        border-radius: 0 3px 3px 0;
        user-select: none;
        -webkit-user-select: none;
    }

    /* Position the "next button" to the right */

    .next {
        right: 0;
        border-radius: 3px 0 0 3px;
    }

    /* On hover, add a black background color with a little bit see-through */

    .prev:hover,
    .next:hover {
        background-color: rgba(0, 0, 0, 0.8);
    }

    /* Number text (1/3 etc) */

    .numbertext {
        color: #f2f2f2;
        font-size: 12px;
        padding: 8px 12px;
        position: absolute;
        top: 0;
    }

    img {
        margin-bottom: -4px;
    }

    .caption-container {
        text-align: center;
        background-color: black;
        padding: 2px 16px;
        color: white;
    }

    .demo {
        opacity: 0.6;
    }

    .active,
    .demo:hover {
        opacity: 1;
    }

    img.hover-shadow {
        transition: 0.3s;
    }

    .hover-shadow:hover {
        box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
    }

    .pic-overlay{
        cursor: pointer;
    }
    
    a:not([href]):not([tabindex]) {
        color: #ffffff;
    }
    
    .loadmore {
        margin-left: 15px;
    }
</style>

<section class="blog blog-page">
    <div class="container">
        <div class="blog-text">
            <div class="blog-inner" data-aos-easing="ease-out-cubic" data-aos="fade-up" data-aos-duration="800">
                <h5>Read our interesting articles about design, art and fashion</h5>
                <p>yes we write beautiful articles for your inspiration on any topics...</p>
            </div>
        </div>
            <div class="row" id="portfolio-elements">
                @include('layouts.photos-list', ['photos_list' => $photos_list])
            </div>
            <div class="row">
                <div class="md-12">
                    <a style="" class="loadmore" id="loadmore" onclick="loadMore()">load more</a>
                </div>
            </div>

            <div id="myModal" class="modal">
                <span class="close cursor" onclick="closeModal()">&times;</span>
                <div class="modal-content" id="modal-content">
                    @include('layouts.modal-photos-list', ['photos_list' => $photos_list])

                    <a class="prev" onclick="plusSlides(-1)">&#10094;</a>
                    <a class="next" onclick="plusSlides(1)">&#10095;</a>

                    <div class="caption-container">
                        <p id="caption"></p>
                    </div>
                </div>
            </div>
    </div>
</section>

<script>
    page = 2;

    function loadMore() {
        var data = {'page' : page, _token : $('meta[name="csrf-token"]').attr('content')};

        $.ajax({
            url : "{{ route('portfolio') }}"+'?page='+page,
            method : 'GET',
            data : data,
            dataType : 'json',
            success : function (content) {
                $('#portfolio-elements').append(content.photos_list);
                $('#modal-content').append(content.modal_photos_list);

                page++;
            },
            error : function (result) {
                if (result.status == 422) {
                    console.log(result.responseJSON.message);
                }
            }
        });
    }

    function openModal() {
        document.getElementById('myModal').style.display = "block";
    }

    function closeModal() {
        document.getElementById('myModal').style.display = "none";
    }

    var slideIndex = 1;
    showSlides(slideIndex);

    function plusSlides(n) {
        showSlides(slideIndex += n);
    }

    function currentSlide(n) {
        showSlides(slideIndex = n);
    }

    function showSlides(n) {
        var i;
        var slides = document.getElementsByClassName("mySlides");
        var dots = document.getElementsByClassName("demo");
        var captionText = document.getElementById("caption");
        if (n > slides.length) {
            slideIndex = 1
        }
        if (n < 1) {
            slideIndex = slides.length
        }
        for (i = 0; i < slides.length; i++) {
            slides[i].style.display = "none";
        }
        for (i = 0; i < dots.length; i++) {
            dots[i].className = dots[i].className.replace(" active", "");
        }
        slides[slideIndex - 1].style.display = "block";
        dots[slideIndex - 1].className += " active";
        captionText.innerHTML = dots[slideIndex - 1].alt;
    }
</script>
@endif
