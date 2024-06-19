@extends('partial.main2')
@section('body')
    <!-- ***** Preloader Start ***** -->
    <div id="js-preloader" class="js-preloader">
        <div class="preloader-inner">
            <span class="dot"></span>
            <div class="dots">
                <span></span>
                <span></span>
                <span></span>
            </div>
        </div>
    </div>
    <!-- ***** Preloader End ***** -->

    <!-- ***** Header Area Start ***** -->
    <header class="header-area header-sticky">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <nav class="main-nav">
                        <!-- ***** Logo Start ***** -->
                        <a href="index.html" class="logo">
                            <h1>Scholar</h1>
                        </a>
                        <!-- ***** Logo End ***** -->
                        <!-- ***** Menu Start ***** -->
                        <ul class="nav">
                            <li class="scroll-to-section"><a href="#top" class="active">Home</a></li>
                            <li class="scroll-to-section"><a href="#services" class="">Services</a></li>
                            <li class="scroll-to-section"><a href="#courses" class="">Books</a></li>
                            <li class="scroll-to-section"><a href="#team">Team</a></li>
                            @if (Auth::check())
                                <li class="scroll-to-section"><a href="/dashboard">{{ $user->name }}</a></li>
                            @else
                                <li class="scroll-to-section"><a href="/login">Login!</a></li>
                            @endif
                        </ul>
                        <a class="menu-trigger">
                            <span>Menu</span>
                        </a>
                        <!-- ***** Menu End ***** -->
                    </nav>
                </div>
            </div>
        </div>
    </header>
    <!-- ***** Header Area End ***** -->

    <div class="main-banner" id="top">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="owl-carousel owl-banner owl-loaded owl-drag">



                        <div class="owl-stage-outer">
                            <div class="owl-stage"
                                style="transition: all; width: 8022px; transform: translate3d(-2292px, 0px, 0px);">
                                <div class="owl-item cloned" style="width: 1116px; margin-right: 30px;">
                                    <div class="item item-2">
                                        <div class="header-text">
                                            <span class="category">Best Result</span>
                                            <h2>Get the best result out of your effort</h2>
                                            <p>You are allowed to use this template for any educational or commercial
                                                purpose. You are not allowed to re-distribute the template ZIP file on
                                                any other website.</p>
                                            <div class="buttons">
                                                <div class="main-button">
                                                    <a href="#">Request Demo</a>
                                                </div>
                                                <div class="icon-button">
                                                    <a href="#"><i class="fa fa-play"></i> What's the best
                                                        result?</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="owl-item cloned" style="width: 1116px; margin-right: 30px;">
                                    <div class="item item-3">
                                        <div class="header-text">
                                            <span class="category">Online Learning</span>
                                            <h2>Online Learning helps you save the time</h2>
                                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod
                                                temporious incididunt ut labore et dolore magna aliqua suspendisse.</p>
                                            <div class="buttons">
                                                <div class="main-button">
                                                    <a href="#">Request Demo</a>
                                                </div>
                                                <div class="icon-button">
                                                    <a href="#"><i class="fa fa-play"></i> What's Online
                                                        Course?</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="owl-item active center" style="width: 1116px; margin-right: 30px;">
                                    <div class="item item-1">
                                        <div class="header-text">
                                            <span class="category">Our Courses</span>
                                            <h2>With Scholar Teachers, Everything Is Easier</h2>
                                            <p>Scholar is free CSS template designed by TemplateMo for online
                                                educational related websites. This layout is based on the famous
                                                Bootstrap v5.3.0 framework.</p>
                                            <div class="buttons">
                                                <div class="main-button">
                                                    <a href="#">Request Demo</a>
                                                </div>
                                                <div class="icon-button">
                                                    <a href="#"><i class="fa fa-play"></i> What's Scholar?</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="owl-item" style="width: 1116px; margin-right: 30px;">
                                    <div class="item item-2">
                                        <div class="header-text">
                                            <span class="category">Best Result</span>
                                            <h2>Get the best result out of your effort</h2>
                                            <p>You are allowed to use this template for any educational or commercial
                                                purpose. You are not allowed to re-distribute the template ZIP file on
                                                any other website.</p>
                                            <div class="buttons">
                                                <div class="main-button">
                                                    <a href="#">Request Demo</a>
                                                </div>
                                                <div class="icon-button">
                                                    <a href="#"><i class="fa fa-play"></i> What's the best
                                                        result?</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="owl-item" style="width: 1116px; margin-right: 30px;">
                                    <div class="item item-3">
                                        <div class="header-text">
                                            <span class="category">Online Learning</span>
                                            <h2>Online Learning helps you save the time</h2>
                                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod
                                                temporious incididunt ut labore et dolore magna aliqua suspendisse.</p>
                                            <div class="buttons">
                                                <div class="main-button">
                                                    <a href="#">Request Demo</a>
                                                </div>
                                                <div class="icon-button">
                                                    <a href="#"><i class="fa fa-play"></i> What's Online
                                                        Course?</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="owl-item cloned" style="width: 1116px; margin-right: 30px;">
                                    <div class="item item-1">
                                        <div class="header-text">
                                            <span class="category">Our Courses</span>
                                            <h2>With Scholar Teachers, Everything Is Easier</h2>
                                            <p>Scholar is free CSS template designed by TemplateMo for online
                                                educational related websites. This layout is based on the famous
                                                Bootstrap v5.3.0 framework.</p>
                                            <div class="buttons">
                                                <div class="main-button">
                                                    <a href="#">Request Demo</a>
                                                </div>
                                                <div class="icon-button">
                                                    <a href="#"><i class="fa fa-play"></i> What's Scholar?</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="owl-item cloned" style="width: 1116px; margin-right: 30px;">
                                    <div class="item item-2">
                                        <div class="header-text">
                                            <span class="category">Best Result</span>
                                            <h2>Get the best result out of your effort</h2>
                                            <p>You are allowed to use this template for any educational or commercial
                                                purpose. You are not allowed to re-distribute the template ZIP file on
                                                any other website.</p>
                                            <div class="buttons">
                                                <div class="main-button">
                                                    <a href="#">Request Demo</a>
                                                </div>
                                                <div class="icon-button">
                                                    <a href="#"><i class="fa fa-play"></i> What's the best
                                                        result?</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="owl-nav"><button type="button" role="presentation" class="owl-prev"><i
                                    class="fa fa-angle-left" aria-hidden="true"></i></button><button type="button"
                                role="presentation" class="owl-next"><i class="fa fa-angle-right"
                                    aria-hidden="true"></i></button></div>
                        <div class="owl-dots"><button role="button" class="owl-dot active"><span></span></button><button
                                role="button" class="owl-dot"><span></span></button><button role="button"
                                class="owl-dot"><span></span></button></div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="services section" id="services">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-md-6">
                    <div class="service-item">
                        <div class="icon">
                            <img src="frontend/assets/images/service-01.png" alt="online degrees">
                        </div>
                        <div class="main-content">
                            <h4>Online Degrees</h4>
                            <p>Whenever you need free templates in HTML CSS, you just remember TemplateMo website.</p>
                            <div class="main-button">
                                <a href="#">Read More</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="service-item">
                        <div class="icon">
                            <img src="frontend/assets/images/service-02.png" alt="short courses">
                        </div>
                        <div class="main-content">
                            <h4>Short Courses</h4>
                            <p>You can browse free templates based on different tags such as digital marketing, etc.</p>
                            <div class="main-button">
                                <a href="#">Read More</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="service-item">
                        <div class="icon">
                            <img src="frontend/assets/images/service-03.png" alt="web experts">
                        </div>
                        <div class="main-content">
                            <h4>Web Experts</h4>
                            <p>You can start learning HTML CSS by modifying free templates from our website too.</p>
                            <div class="main-button">
                                <a href="#">Read More</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <section class="section courses" id="courses">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <div class="section-heading">
                        <h6>Books</h6>
                        <h2>Books</h2>
                    </div>
                </div>
            </div>
            <div class="row event_box" style="position: relative; height: 789.634px;">
                @foreach ($buku as $data)
                    <div class="col-lg-4 col-md-6 align-self-center mb-30 event_outer col-md-6 {{ $data->kategori }}"
                        style="position: absolute; left: 0px; top: 0px;">
                        <div class="events_item">
                            <div class="thumb">
                                <a href="/book"><img src="storage/{{ $data->foto }}" alt=""></a>
                                <span class="category">{{ $data->kategori->kategori }}</span>
                                {{-- <span class="price">
                                <h6><em>$</em>160</h6>
                            </span> --}}
                            </div>
                            <div class="down-content">
                                <span class="author">{{ $data->pengarang->nama_pengarang }}</span>
                                <h4>{{ $data->judul_buku }}</h4>
                            </div>
                        </div>
                    </div>
                @endforeach

            </div>
        </div>
    </section>

    <div class="team section" id="team">
        {{-- <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-6">
                    <div class="team-member">
                        <div class="main-content">
                            <img src="assets/images/member-01.jpg" alt="">
                            <span class="category">UX Teacher</span>
                            <h4>Sophia Rose</h4>
                            <ul class="social-icons">
                                <li><a href="#"><i class="fab fa-facebook"></i></a></li>
                                <li><a href="#"><i class="fab fa-twitter"></i></a></li>
                                <li><a href="#"><i class="fab fa-linkedin"></i></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="team-member">
                        <div class="main-content">
                            <img src="assets/images/member-02.jpg" alt="">
                            <span class="category">Graphic Teacher</span>
                            <h4>Cindy Walker</h4>
                            <ul class="social-icons">
                                <li><a href="#"><i class="fab fa-facebook"></i></a></li>
                                <li><a href="#"><i class="fab fa-twitter"></i></a></li>
                                <li><a href="#"><i class="fab fa-linkedin"></i></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="team-member">
                        <div class="main-content">
                            <img src="assets/images/member-03.jpg" alt="">
                            <span class="category">Full Stack Master</span>
                            <h4>David Hutson</h4>
                            <ul class="social-icons">
                                <li><a href="#"><i class="fab fa-facebook"></i></a></li>
                                <li><a href="#"><i class="fab fa-twitter"></i></a></li>
                                <li><a href="#"><i class="fab fa-linkedin"></i></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="team-member">
                        <div class="main-content">
                            <img src="assets/images/member-04.jpg" alt="">
                            <span class="category">Digital Animator</span>
                            <h4>Stella Blair</h4>
                            <ul class="social-icons">
                                <li><a href="#"><i class="fab fa-facebook"></i></a></li>
                                <li><a href="#"><i class="fab fa-twitter"></i></a></li>
                                <li><a href="#"><i class="fab fa-linkedin"></i></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div> --}}
    </div>
@endsection
