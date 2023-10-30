<footer class="footer-04 footergeneral mt-5 ">

    <div class="container-fluid ">

        <div class="footer-content pt-4 pb-4 d-flex justify-content-center">

            <div class="row">

                <div class="col-md-3 mb-50 px-5 ">
                    <div class="footer-widget">
                        <div class="footer-logo">
                            <a href="{{ route('homepage') }}"><img src="/media/logo.png" class="img-fluid" alt="logo"></a>
                        </div>
                        <div class="footer-text">
                            <p>Lorem ipsum dolor sit amet, consec tetur adipisicing elit, sed do eiusmod tempor
                                incididuntut consec tetur adipisicing
                                elit,Lorem ipsum dolor sit amet.</p>
                        </div>
                    </div>
                </div>

                <div class="col-md-3 mb-30 ps-5 ">
                    <h2 class="footer-heading text-sec">{{ __('ui.categories') }}</h2>
                    <ul class="list-unstyled">
                        @foreach ($categories as $category)
                            <li><a href="{{ route('article.categoryindex', $category) }}" class="py-1 d-block anchorfooter">{{ __("ui.$category->name") }}</a>
                            </li>
                        @endforeach
                    </ul>
                </div>

                <div class="col-12 col-md-3 ps-5 footer-tag">

                    <h2 class="footer-heading text-sec">BSB by Aulab</h2>

                    <div class="tagcloud">

                        <ul class="list-unstyled">
                            <li>
                                <a class="text-decoration-none" href="https://maps.app.goo.gl/6ZJKyZvJdr8A4ckg6"><i class="fa-solid fa-location-dot">
                                    </i>
                                    Strada S. Giorgio Martire, 2D
                                    70124 • Bari
                                </a>
                            </li>
                            <li>
                                <a class="text-decoration-none" href="tel:+393926024621"><i class="fa-solid fa-phone"></i>
                                Contattaci al :
                                +39 392 602 46 21
                                </a>
                            </li>
                            <li>
                                <a class="text-decoration-none" href="tel:800128626 "><i class="fa-solid fa-headset"></i>
                                Numero Verde: 800 128 626
                                </a>
                            </li>
                            
                        </ul>

                    </div>

                    <div class="footer-social-icon pt-5 ">

                        <span>{{__('ui.followus')}}</span>

                        <a href="https://www.facebook.com/aulab/?locale=it_IT"><i
                                class="fab fa-facebook-f facebook-bg text-white"></i></a>
                        <a href="https://twitter.com/auLAB_it"><i
                                class="fa-brands fa-square-x-twitter bg-black"></i></a>
                        <a href="https://www.instagram.com/aulab_it/?hl=it"><i
                                class="fab fa-instagram instagram-bg text-white"></i></a>
                        <a href="https://www.linkedin.com/school/aulab-srl/?originalSubdomain=it"><i
                                class="fab fa-linkedin-in linkedin-bg text-white"></i></i"></a>
                    </div>

                </div>

                <div class="col-12 col-md-3 ps-5 footer-work">

                    <div class="footer-widget">

                        <div class="footer-widget-heading">
                            <h3>{{ __('ui.workwithus') }}</h3>
                        </div>
                        <div class="footer-text mb-25">
                            <p>{{ __('ui.workwithus_text') }}</p>
                        </div>
                        <div class="subscribe-form">

                            <button class="btnWorkWus"><a class="text-decoration-none text-white"
                                    href="{{ route('revisor.workWithUs') }}">{{ __('ui.workwithus_button') }}</a></button>

                        </div>

                    </div>

                </div>

            </div>
        </div>

        <div class="copyright-area">

            <div class="container">

                <div class="row">

                    <div class="col-xl-12 col-lg-12 text-center text-lg-left">
                        <div class="copyright-text text-main">
                            <p>Copyright Copyright ©
                                All rights reserved® | This template is made with
                                <i class="ion-ios-heart" aria-hidden="true"></i> by
                                <a href="/" target="_blank">BackScriptBoys.com</a>
                            </p>
                        </div>
                    </div>
                    
                </div>
            </div>
        </div>

    </div>
</footer>
