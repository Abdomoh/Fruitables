   <!-- Spinner Start -->
   <div id="spinner"
       class="show w-100 vh-100 bg-white position-fixed translate-middle top-50 start-50  d-flex align-items-center justify-content-center">
       <div class="spinner-grow text-primary" role="status"></div>
   </div>
   <!-- Spinner End -->
   <!-- Navbar start -->
   <div class="container-fluid fixed-top">
       <div class="container topbar bg-primary d-none d-lg-block">
           <div class="d-flex justify-content-between">
               <div class="top-info ps-2">
                   <small class="me-3"><i class="fas fa-map-marker-alt me-2 text-secondary"></i> <a href="#"
                           class="text-white"> @if (App::getLocale()== 'ar') {{ $setting->location_ar }} @else {{ $setting->location }}@endif</a></small>
                   <small class="me-3"><i class="fas fa-envelope me-2 text-secondary"></i><a href="#"
                           class="text-white">{{ $setting->email }}</a></small>
               </div>
               <div class="top-link pe-2">
                   <a href="#" class="text-white"><small class="text-white mx-2">@if (App::getLocale()== 'ar') {{ $setting->name_projectar }} @else {{ $setting->name_project }}@endif</small>/</a>

               </div>
           </div>
       </div>
       <div class="container px-0">
           <nav class="navbar navbar-light bg-white navbar-expand-xl">
               <a href="index.html" class="navbar-brand">
                   <h1 class="text-primary display-6">{{ __('main.Fruitables') }}</h1>
               </a>
               <button class="navbar-toggler py-2 px-3" type="button" data-bs-toggle="collapse"
                   data-bs-target="#navbarCollapse">
                   <span class="fa fa-bars text-primary"></span>
               </button>
               <div class="collapse navbar-collapse bg-white" id="navbarCollapse">
                   <div class="navbar-nav mx-auto">
                       <a href="index.html" class="nav-item nav-link active">{{ __('main.Home') }}</a>
                       <a href="shop.html" class="nav-item nav-link">{{ __('main.Shope') }}</a>
                       <a href="shop-detail.html" class="nav-item nav-link">{{ __('main.Categories') }}</a>
                       <div class="nav-item dropdown">
                           <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">{{ __('main.Products') }}</a>
                           <div class="dropdown-menu m-0 bg-secondary rounded-0">
                               <a href="cart.html" class="dropdown-item">Cart</a>
                               <a href="chackout.html" class="dropdown-item">Chackout</a>
                               <a href="testimonial.html" class="dropdown-item">Testimonial</a>
                               <a href="404.html" class="dropdown-item">404 Page</a>
                           </div>
                       </div>
                       <a href="contact.html" class="nav-item nav-link">{{ __('main.Contact') }}</a>
                       <div class="nav-item dropdown">
                           <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">{{ __('main.Language') }} </a>
                           <div class="dropdown-menu m-0 bg-secondary rounded-0">
                               @foreach (Config::get('languages') as $lang => $language)
                                   @if ($lang != App::getLocale())
                                       <a class="dropdown-item" href="{{ route('lang.switch', $lang) }}">
                                           <img src="{{ asset($language['img']) }}" width="40px"><span
                                               class="text-dark mx-2 lang">{{ $language['display'] }}</span> </a>
                                   @endif
                               @endforeach
                           </div>
                       </div>
                   </div>
                   <div class="d-flex m-3 me-0">
                       <button class="btn-search btn border border-secondary btn-md-square rounded-circle bg-white me-4"
                           data-bs-toggle="modal" data-bs-target="#searchModal"><i
                               class="fas fa-search text-primary"></i></button>
                       <a href="#" class="position-relative me-4 my-auto">
                           <i class="fa fa-shopping-bag fa-2x"></i>
                           <span
                               class="position-absolute bg-secondary rounded-circle d-flex align-items-center justify-content-center text-dark px-1"
                               style="top: -5px; left: 15px; height: 20px; min-width: 20px;">3</span>
                       </a>
                       <div class="nav-item dropdown">
                           <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown"> <i
                                   class="fas fa-user fa-2x"></i></a>
                           <div class="dropdown-menu m-0 bg-secondary rounded-0">
                               <form method="POST" action="{{ route('logout') }}">
                                   @csrf
                                   <a class="dropdown-item" href="route('logout')"
                                       onclick="event.preventDefault();
                                     this.closest('form').submit();">
                                       <i class="fas fa-sign-out-alt"></i> تسجيل الخروج</a>
                               </form>
                               <a href="chackout.html" class="dropdown-item" ><i class="fas fa-tasks"></i> لوحة التحكم</a>
                           </div>
                       </div>
                   </div>
               </div>
           </nav>
       </div>
   </div>
   <!-- Navbar End -->
   <!-- Modal Search Start -->
   <div class="modal fade" id="searchModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
       <div class="modal-dialog modal-fullscreen">
           <div class="modal-content rounded-0">
               <div class="modal-header">
                   <h5 class="modal-title" id="exampleModalLabel">Search by keyword</h5>
                   <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
               </div>
               <div class="modal-body d-flex align-items-center">
                   <div class="input-group w-75 mx-auto d-flex">
                       <input type="search" class="form-control p-3" placeholder="keywords"
                           aria-describedby="search-icon-1">
                       <span id="search-icon-1" class="input-group-text p-3"><i class="fa fa-search"></i></span>
                   </div>
               </div>
           </div>
       </div>
   </div>
   <!-- Modal Search End -->
