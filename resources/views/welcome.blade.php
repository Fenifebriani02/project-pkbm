<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <!-- Fonts -->
    <link rel="shortcut icon" href="{{ url('public/assets/image/logo1.svg') }}">
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
    <link rel="stylesheet" href="{{ url('public') }}/assets/plugins/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="{{ url('public') }}/assets/plugins/swiper/swiper-bundle.min.css">
    <link rel="stylesheet" href="{{ url('public') }}/assets/css/style-depan.css">
</head>

<body class="app-depan" id="beranda">

    <header class="nav-header">
        <div class="header-left">
            <a href="#" class="logo"><img src="{{ url('public/assets/image/logo2.svg') }}" height="50"
                    alt="logo"></a>
            <button class="btn-toggle">
                <span></span>
                <span></span>
                <span></span>
            </button>
        </div>
        <ul class="menu">
            <li>
                <a href="#beranda">Beranda</a>
            </li>
            <li>
                <a href="#team">team</a>
            </li>
            <li>
                <a href="#jelajah">Jelajah</a>
            </li>
            <li>
                <a href="#kontak">Kontak Kami</a>
            </li>
        </ul>
        <div class="header-right">
            <a href="{{ url('auth/login') }}" class="btn-sign-in">Masuk</a>
        </div>
    </header>

    <section class="content hero">
        <div class="left">
            <div class="caption" data-aos="fade-right" data-aos-duration="3000">
                <p>SELAMAT DATANG DI</p>
                <h2>PUSAT KEGIATAN BELAJAR MASYARAKAT</h2>
            </div>
        </div>
        <div class="right">
            <img src="{{ url('public') }}/assets/image/ilustrations.jpg" alt="..." data-aos="fade-left"
                data-aos-duration="3000">
        </div>
    </section>
    <section class="content-content" id="team">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h2 class="title-container">TEAM WORK</h2>
                </div>
                <div class="col-md-12">
                    <!-- Slider main container -->
                    <div class="swiper">
                        <!-- Additional required wrapper -->
                        <div class="swiper-wrapper">
                            <div class="swiper-slide" data-aos="fade-left" data-aos-duration="3000">
                                <div class="team-card">
                                    <div class="team-image">
                                        <img src="{{ url('public') }}/assets/image/Feni.jpg" alt="Image ...">
                                    </div>
                                    <div class="team-captions">
                                        <span class="name">Feni</span>
                                        <span class="potitions">Full Stack Developer</span>
                                        <p class="kuotes">"Emang Eak ...."</p>
                                    </div>
                                </div>
                            </div>
                            <div class="swiper-slide" data-aos="fade-left" data-aos-duration="3000">
                                <div class="team-card">
                                    <div class="team-image">
                                        <img src="{{ url('public') }}/assets/image/Feri.jpg" alt="Image ...">
                                    </div>
                                    <div class="team-captions">
                                        <span class="name">Feri Adrian Maulana</span>
                                        <span class="potitions">Full Stack Developer</span>
                                        <p class="kuotes">"Emang Eak ...."</p>
                                    </div>
                                </div>
                            </div>
                            <div class="swiper-slide" data-aos="fade-left" data-aos-duration="3000">
                                <div class="team-card">
                                    <div class="team-image">
                                        <img src="{{ url('public') }}/assets/image/Fadhilah.jpg" alt="Image ...">
                                    </div>
                                    <div class="team-captions">
                                        <span class="name">Fadhilah</span>
                                        <span class="potitions">Full Stack Developer</span>
                                        <p class="kuotes">"Emang Eak ...."</p>
                                    </div>
                                </div>
                            </div>
                            <div class="swiper-slide" data-aos="fade-left" data-aos-duration="3000">
                                <div class="team-card">
                                    <div class="team-image">
                                        <img src="{{ url('public') }}/assets/image/Desta.jpg" alt="Image ...">
                                    </div>
                                    <div class="team-captions">
                                        <span class="name">Desta</span>
                                        <span class="potitions">Full Stack Developer</span>
                                        <p class="kuotes">"Emang Eak ...."</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- If we need pagination -->
                        {{-- <div class="swiper-pagination"></div> --}}

                        <!-- If we need navigation buttons -->
                        {{-- <div class="swiper-button-prev"></div>
                        <div class="swiper-button-next"></div> --}}

                        <!-- If we need scrollbar -->
                        <div class="autoplay-progress">
                            <svg viewBox="0 0 48 48">
                                <circle cx="24" cy="24" r="20"></circle>
                            </svg>
                            <span></span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="content-content" id="jelajah" data-aos="fade-right" data-aos-duration="3000">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h2 class="title-container text-center my-5">JELAJAHI</h2>
                </div>
                <div class="col-md-4 mb-3">
                    <iframe width="100%" height="315"
                        src="https://www.youtube.com/embed/d9AEIWblTaA?si=I8jB1BZXvjrSQzOJ"
                        title="YouTube video player" frameborder="0"
                        allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                        allowfullscreen></iframe>
                </div>
                <div class="col-md-4 mb-3">
                    <iframe width="100%" height="315"
                        src="https://www.youtube.com/embed/d9AEIWblTaA?si=I8jB1BZXvjrSQzOJ"
                        title="YouTube video player" frameborder="0"
                        allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                        allowfullscreen></iframe>
                </div>
                <div class="col-md-4 mb-3">
                    <iframe width="100%" height="315"
                        src="https://www.youtube.com/embed/d9AEIWblTaA?si=I8jB1BZXvjrSQzOJ"
                        title="YouTube video player" frameborder="0"
                        allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                        allowfullscreen></iframe>
                </div>
                <div class="col-md-4 mb-3">
                    <iframe width="100%" height="315"
                        src="https://www.youtube.com/embed/d9AEIWblTaA?si=I8jB1BZXvjrSQzOJ"
                        title="YouTube video player" frameborder="0"
                        allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                        allowfullscreen></iframe>
                </div>
                <div class="col-md-4 mb-3">
                    <iframe width="100%" height="315"
                        src="https://www.youtube.com/embed/d9AEIWblTaA?si=I8jB1BZXvjrSQzOJ"
                        title="YouTube video player" frameborder="0"
                        allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                        allowfullscreen></iframe>
                </div>
                <div class="col-md-4 mb-3">
                    <iframe width="100%" height="315"
                        src="https://www.youtube.com/embed/d9AEIWblTaA?si=I8jB1BZXvjrSQzOJ"
                        title="YouTube video player" frameborder="0"
                        allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                        allowfullscreen></iframe>
                </div>


            </div>
        </div>
    </section>


    <footer class="footer" id="kontak">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <ul class="social-media" data-aos="fade-left" data-aos-duration="3000">
                        <li class="header">KONTAK KAMI</li>
                        <li>
                            <a href="#">
                                <i class="fa fa-instagram"></i>
                                <span class="instagram">Instagram</span>
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                <i class="fa fa-youtube"></i>
                                <span class="youtube">youtube</span>
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                <i class="fa fa-whatsapp"></i>
                                <span class="whatsapp">whatsapp</span>
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                <i class="fa fa-facebook"></i>
                                <span class="facebook">facebook</span>
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                <i class="fa fa-phone"></i>
                                <span class="phone">Telepon</span>
                            </a>
                        </li>
                    </ul>
                </div>
                <div class="col-md-6">
                    <iframe
                        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2064.219937986512!2d109.98715342656836!3d-1.8174372157985428!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e05191977368b0f%3A0x448e94c3451aa9fb!2sTeknik%20Informatika%20-%20Politeknik%20Negeri%20Ketapang!5e0!3m2!1sid!2sid!4v1702644416374!5m2!1sid!2sid" 
                        width="100%" height="450" style="border:0;" allowfullscreen="" loading="lazy"
                        referrerpolicy="no-referrer-when-downgrade" data-aos="fade-left"
                        data-aos-duration="3000"></iframe>
                </div>
            </div>
        </div>
    </footer>

    <script src="{{ url('public') }}/assets/js/jquery-3.7.1.min.js"></script>
    <script src="{{ url('public') }}/assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="{{ url('public') }}/assets/plugins/swiper/swiper-bundle.min.js"></script>
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script>
        $(document).scroll(function() {
            if ($(this).scrollTop() >= 100) {
                $(".app-depan").addClass("scrolled");
            } else {
                $(".app-depan").removeClass("scrolled");
            }

            const progressCircle = document.querySelector(".autoplay-progress svg");
            const progressContent = document.querySelector(".autoplay-progress span");
            var swiper = new Swiper(".mySwiper", {
                spaceBetween: 30,
                centeredSlides: true,
                autoplay: {
                    delay: 2500,
                    disableOnInteraction: false
                },
                pagination: {
                    el: ".swiper-pagination",
                    clickable: true
                },
                navigation: {
                    nextEl: ".swiper-button-next",
                    prevEl: ".swiper-button-prev"
                },
                on: {
                    autoplayTimeLeft(s, time, progress) {
                        progressCircle.style.setProperty("--progress", 1 - progress);
                        progressContent.textContent = `${Math.ceil(time / 1000)}s`;
                    }
                }
            });

            // Open menu
            $('.btn-toggle').on('click', function() {
                $('.nav-header').toggleClass('open')
            });
        });
    </script>
    <script>
        AOS.init();
    </script>
</body>

</html>
