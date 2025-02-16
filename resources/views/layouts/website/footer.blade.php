

        <!-- Footer Start -->
        <div class="container-fluid bg-dark text-white-50 footer pt-5 mt-5" dir="ltr">
            <div class="container py-5">
                <div class="pb-4 mb-4" style="border-bottom: 1px solid rgba(226, 175, 24, 0.5) ;">
                    <div class="row g-4">
                        <div class="col-lg-3">
                            <a href="#">
                                <h1 class="text-primary mb-0">@if (App::getLocale()== 'ar') {{ $setting->name_project_ar }} @else{{$setting->name_project  }} @endif</h1>

                            </a>
                        </div>
                        <div class="col-lg-6">
                            <div class="position-relative mx-auto" dir="ltr">
                                <input class="form-control border-0 w-100 py-3 px-4 rounded-pill" type="email" placeholder="Your Email">
                                <button type="submit" class="btn btn-primary border-0 border-secondary py-3 px-4 position-absolute rounded-pill text-white" style="top: 0; right: 0;">{{ __('main.Subscribe_Now') }}</button>
                            </div>
                        </div>
                        <div class="col-lg-3">
                            <div class="d-flex justify-content-end pt-3">
                                <a class="btn  btn-outline-secondary me-2 btn-md-square rounded-circle" href=""><i class="fab fa-twitter"></i></a>
                                <a class="btn btn-outline-secondary me-2 btn-md-square rounded-circle" href=""><i class="fab fa-facebook-f"></i></a>
                                <a class="btn btn-outline-secondary me-2 btn-md-square rounded-circle" href=""><i class="fab fa-youtube"></i></a>
                                <a class="btn btn-outline-secondary btn-md-square rounded-circle" href=""><i class="fab fa-linkedin-in"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row g-5">
                    <div class="col-lg-3 col-md-6">
                        <div class="footer-item">
                            <h4 class="text-light mb-3">{{ __('main.Support') }}</h4>
                            <p class="mb-4">{{ __('main.Support_every_time_fas') }}.</p>
                            <a href="" class="btn border-secondary py-2 px-4 rounded-pill text-primary">Read More</a>
                        </div>
                    </div>

                    <div class="col-lg-3 col-md-6">
                        <div class="d-flex flex-column text-start footer-item">
                            <h4 class="text-light mb-3">{{ __('main.Shop_Info') }}</h4>
                            <a class="btn-link" href="">{{ __('main.About_Us') }}</a>
                            <a class="btn-link" href="{{ url('contact-us')}}">{{ __('main.Contact_Us') }}</a>

                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <div class="d-flex flex-column text-start footer-item">
                            <h4 class="text-light mb-3">{{ __('main.account') }}</h4>
                            <a class="btn-link" href="{{ url('profile-user') }}">{{ __('main.My_Account') }}</a>
                            <a class="btn-link" href="{{ url('cart-product') }}">{{ __('main.Shopping_Cart') }}</a>
                            <a class="btn-link" href="{{ url('orders') }}">{{ __('main.Order_History') }}</a>

                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <div class="footer-item">
                            <h4 class="text-light mb-3">{{ __('main.Contact') }}</h4>
                            <p>Address: @if (App::getLocale()== 'ar') {{ $setting->location_ar ?? '' }} @else{{$setting->location  ?? '' }} @endif</p>
                            <p>Email: {{ $setting->email ?? '' }}</p>
                            <p>Phone: {{ $setting->phone ?? '' }}</p>

                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Footer End -->

        <!-- Copyright Start -->
        <div class="container-fluid copyright bg-dark py-4">
            <div class="container">
                <div class="row">
                    <div class="col-md-6 text-center text-md-start mb-3 mb-md-0">
                        <span class="text-light"><a href={{ url('/') }}  class="fas fa-copyright text-light me-2"></i>@if (App::getLocale()== 'ar') {{ $setting->name_project_ar }} @else{{$setting->name_project  }} @endif</a>, All right reserved.</span>
                    </div>
                    <div class="col-md-6 my-auto text-center text-md-end text-white">

                        Develop By <a class="border-bottom" href="https://abdosh.softteech.com/">Abdalmaged</a>
                    </div>
                </div>
            </div>
        </div>
        <!-- Copyright End -->



        <!-- Back to Top -->
        <a href="#" class="btn btn-primary border-3 border-primary rounded-circle back-to-top"><i class="fa fa-arrow-up"></i></a>


    <!-- JavaScript Libraries -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="{{ URL::asset('website/lib/easing/easing.min.js') }}"></script>
    <script src="{{ URL::asset('website/lib/waypoints/waypoints.min.js') }}"></script>
    <script src="{{ URL::asset('website/lib/lightbox/js/lightbox.min.js') }}"></script>
    <script src="website/lib/owlcarousel/owl.carousel.min.js"></script>

    <!-- Template Javascript -->
    <script src="{{ URL::asset('website/js/main.js') }}"></script>
    </body>

</html>