@extends('layouts.website.nav')

@section('content')
    <!-- Hero Start -->
    <div class="container-fluid py-5 mb-5 hero-header">
        <div class="container py-5">
            <div class="row g-5 align-items-center">
                <div class="col-md-12 col-lg-7">
                    <h4 class="mb-3 text-secondary" style="font-family: cairo;">{{ __('main.Organic_Foods') }}</h4>
                    <h1 class="mb-5 display-3 text-primary" style="font-family: cairo;">
                        {{ __('main.Organic_Veggies_Fruits_Foods') }}</h1>
                    <div class="position-relative mx-auto">
                        <input class="form-control border-2 border-secondary w-75 py-3 px-4 rounded-pill" type="number"
                            placeholder="Search">
                        <button type="submit"
                            class="btn btn-primary border-2 border-secondary py-3 px-4 position-absolute rounded-pill text-white h-100"
                            style="top: 0; right: 25%;left: 25%;" id="btn-search">Submit Now</button>
                    </div>
                </div>

                <div class="col-md-12 col-lg-5">

                    <div id="carouselId" class="carousel slide position-relative" data-bs-ride="carousel">

                        <div class="carousel-inner" role="listbox">
                            @foreach ($categories as $category)
                                <div class="carousel-item active rounded">
                                    <img src="website/img/hero-img-1.png" class="img-fluid w-100 h-100 bg-secondary rounded"
                                        alt="First slide">
                                    <a href="#" class="btn px-4 py-2 text-white rounded">
                                        @if (App::getLocale() == 'ar')
                                            {{ $category->name_ar }}
                                        @else
                                            {{ $category->name }}
                                        @endif
                                    </a>
                                </div>
                            @endforeach


                        </div>

                        <button class="carousel-control-prev" type="button" data-bs-target="#carouselId"
                            data-bs-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Previous</span>
                        </button>
                        <button class="carousel-control-next" type="button" data-bs-target="#carouselId"
                            data-bs-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Next</span>
                        </button>

                    </div>

                </div>

            </div>
        </div>
    </div>
    <!-- Hero End -->

    <body>
        <!-- Featurs Section Start -->
        <div class="container-fluid featurs py-5">
            <div class="container py-5">
                <div class="row g-4">
                    <div class="col-md-6 col-lg-3">
                        <div class="featurs-item text-center rounded bg-light p-4">
                            <div class="featurs-icon btn-square rounded-circle bg-secondary mb-5 mx-auto">
                                <i class="fas fa-car-side fa-3x text-white"></i>
                            </div>
                            <div class="featurs-content text-center">
                                <h5>{{ __('main.Free_Shipping') }}</h5>
                                <p class="mb-0">{{ __('main.Free_on_order_over') }}</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-3">
                        <div class="featurs-item text-center rounded bg-light p-4">
                            <div class="featurs-icon btn-square rounded-circle bg-secondary mb-5 mx-auto">
                                <i class="fas fa-user-shield fa-3x text-white"></i>
                            </div>
                            <div class="featurs-content text-center">
                                <h5>{{ __('main.Security_Payment') }}</h5>
                                <p class="mb-0">{{ __('main.security_payment') }}</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-3">
                        <div class="featurs-item text-center rounded bg-light p-4">
                            <div class="featurs-icon btn-square rounded-circle bg-secondary mb-5 mx-auto">
                                <i class="fas fa-exchange-alt fa-3x text-white"></i>
                            </div>
                            <div class="featurs-content text-center">
                                <h5>{{ __('main.Day_Return') }}</h5>
                                <p class="mb-0">{{ __('main.day_money_guarantee') }}</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-3">
                        <div class="featurs-item text-center rounded bg-light p-4">
                            <div class="featurs-icon btn-square rounded-circle bg-secondary mb-5 mx-auto">
                                <i class="fa fa-phone-alt fa-3x text-white"></i>
                            </div>
                            <div class="featurs-content text-center">
                                <h5>{{ __('main.Support') }}</h5>
                                <p class="mb-0">{{ __('main.Support_every_time_fas') }}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Featurs Section End -->
        <!-- Fruits Shop Start-->
        <div class="container-fluid fruite py-1" id="products">
            <div class="container py-1">
                <div class="tab-class text-center">
                    <div class="testimonial-header text-center">
                        <h4 class=" text-dark mb-5" style=" font-family: Cairo, sans-serif;">{{ __('main.Products') }}</h4>
                    </div>
                    <div class="tab-content">
                        <div id="" class="tab-pane fade show p-0 active">
                            <div class="row g-4">
                                <div class="col-lg-12">
                                    <div class="row g-4">
                                        @foreach ($products as $product)
                                            <div class="col-md-6 col-lg-4 col-xl-3">
                                                <div class="rounded position-relative fruite-item">
                                                    <div class="fruite-img">
                                                        <img src="../uploads/products/{{ $product->image }}" loading="lazy"
                                                            class="img-fluid w-100 rounded-top" alt="">
                                                    </div>
                                                    <div class="text-white bg-secondary px-3 py-1 rounded position-absolute"
                                                        style="top: 10px; left: 10px;">


                                                        @if (App::getLocale() == 'ar')
                                                            {{ $product->category->name_ar }}
                                                        @else
                                                            {{ $product->category->name }}
                                                        @endif
                                                    </div>
                                                    <div class="p-4 border border-secondary border-top-0 rounded-bottom">
                                                        <a href="{{ url('product-detels',$product->id) }}" class="h5">
                                                        @if (App::getLocale() == 'ar')
                                                            <h4>{{ $product->name_ar }}</h4>
                                                        @else
                                                            <h4>{{ $product->name }}</h4>
                                                        @endif
                                                        </a>
                                                        @if (App::getLocale() == 'ar')
                                                            <p>{{ Str::of($product->description_ar)->limit(40) }}</p>
                                                        @else
                                                            <p>{{ Str::of($product->description)->limit(40) }}</p>
                                                        @endif
                                                        <div class="d-flex justify-content-between flex-lg-wrap">
                                                            <p class="text-dark fs-5 fw-bold mb-0">${{ $product->price }} /
                                                                kg</p>
                                                            {{-- <a href="{{ route('cart.store') }}"
                                                                class="btn border border-secondary rounded-pill px-3 text-primary"><i
                                                                    class="fa fa-shopping-bag me-2 text-primary"></i> Add to
                                                                cart</a> --}}

                                                            <form action="{{ route('cart.store') }}" method="POST"
                                                                enctype="multipart/form-data">
                                                                @csrf
                                                                <input type="hidden" value="{{ $product->id }}"
                                                                    name="product_id">
                                                                <input type="hidden" value="{{ $product->price }}"
                                                                    name="price">
                                                                <input type="hidden" value="1" name="quantity">
                                                                <a href=""
                                                                    class="btn border border-secondary rounded-pill px-3 text-primary"><i
                                                                        class="fa fa-shopping-bag me-2 text-primary"></i><button
                                                                        class="btn btn-sm text-primary">
                                                                        {{ __('main.add_to_cart') }}</button> </a>

                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Fruits Shop End-->
        <!-- Featurs Start -->
        <div class="container-fluid service py-1" id="category">
            <div class="container py-1">
                <div class="row g-4 justify-content-center">

                    @foreach ($categories as $category)
                        <div class="col-md-6 col-lg-4">
                            <a href="#">
                                <div class="service-item bg-primary rounded border border-primary">
                                    <img src="uploads/category/{{ $category->image }}" loading="lazy"
                                        class="img-fluid rounded-top w-100" alt="">
                                    <div class="px-4 rounded-bottom">
                                        <div class="service-content bg-secondary text-center p-4 rounded">
                                            <h5 class="text-white" style=" font-family: Cairo, sans-serif;">
                                                @if (App::getLocale() == 'ar')
                                                    {{ $category->name_ar }}
                                                @else
                                                    {{ $category->name }}
                                            </h5>
                    @endif
                </div>
            </div>
        </div>
        </a>
        </div>
        @endforeach
        </div>
        </div>
        </div>
        <!-- Featurs End -->
        <!-- Vesitable Shop Start-->
        <div class="container-fluid vesitable py-1">
            <div class="container py-1">
                <h1 class="mb-0" style=" font-family: Cairo, sans-serif;">{{ __('main.latest_products') }}</h1>
                <div class="owl-carousel vegetable-carousel justify-content-center" dir="ltr">
                    @foreach ($latestProduct as $product)
                        <div class="border border-primary rounded position-relative vesitable-item">
                            <div class="vesitable-img">
                                <img src="uploads/products/{{ $product->image }}" loading="lazy"
                                    class="img-fluid w-100 rounded-top" alt="">
                            </div>
                            <div class="text-white bg-primary px-3 py-1 rounded position-absolute"
                                style="top: 10px; right: 10px;">
                                @if (App::getLocale() == 'ar')
                                    {{ $product->category->name_ar }}
                                @else
                                    {{ $product->category->name }}
                                @endif
                            </div>
                            <div class="p-4 rounded-bottom">
                                @if (App::getLocale() == 'ar')
                                    <h4>{{ $product->name_ar }}</h4>
                                @else
                                    <h4>{{ $product->name }}</h4>
                                @endif
                                @if (App::getLocale() == 'ar')
                                    <p>{{ Str::of($product->description_ar)->limit(50) }}</p>
                                @else
                                    <p>{{ Str::of($product->description, 50)->limit(50) }}</p>
                                @endif
                                <div class="d-flex justify-content-between flex-lg-wrap">
                                    <p class="text-dark fs-5 fw-bold mb-0">$7.99 / kg</p>
                                    <a href="#"
                                        class="btn border border-secondary rounded-pill px-3 text-primary"><i
                                            class="fa fa-shopping-bag me-2 text-primary"></i> Add to cart</a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
        <!-- Vesitable Shop End -->

        <!-- Bestsaler Product Start -->
        <div class="container-fluid ">
            <div class="container ">
                <div class="text-center mx-auto mb-5" style="max-width: 700px;">
                    <h1 class="display-4">{{ __('main.Bestseller_Products') }}</h1>
                    <p>{{ __('main.Our_best_selling_products') }}</p>
                </div>
                <div class="row g-4">
                    @foreach ($bestsellerProducts as $product)
                        <div class="col-lg-6 col-xl-4">
                            <div class="p-4 rounded bg-light">
                                <div class="row align-items-center">
                                    <div class="col-6">
                                        <img src="uploads/products/{{ $product->image }}"
                                            class="img-fluid rounded-circle w-100" alt="">
                                    </div>
                                    <div class="col-6">
                                        <a href="#" class="h5">
                                            @if (App::getLocale() == 'ar')
                                                {{ $product->name_ar }}
                                            @else
                                                {{ $product->name }}
                                        </a>
                    @endif
                    <div class="d-flex my-3">
                        <i class="fas fa-star text-primary"></i>
                        <i class="fas fa-star text-primary"></i>
                        <i class="fas fa-star text-primary"></i>
                        <i class="fas fa-star text-primary"></i>
                        <i class="fas fa-star"></i>
                    </div>
                    <h4 class="mb-3">{{ $product->price }} @if (App::getlocale() == 'ar')
                            ج.س
                        @else
                            SDG
                        @endif
                    </h4>
                    <form action="{{ route('cart.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" value="{{ $product->id }}" name="product_id">
                        <input type="hidden" value="{{ $product->price }}" name="price">
                        <input type="hidden" value="1" name="quantity">
                        <a href="" class="btn border border-secondary rounded-pill px-3 text-primary"><i
                                class="fa fa-shopping-bag  text-primary"></i><button class="btn btn-sm text-primary">
                                {{ __('main.add_to_cart') }}</button> </a>

                    </form>
                </div>
            </div>
        </div>
        </div>
        @endforeach

        </div>
        </div>
        </div>
        <!-- Bestsaler Product End -->
        <!-- Fact Start -->
        <div class="container-fluid py-5">
            <div class="container">
                <div class="bg-light p-5 rounded">
                    <div class="row g-4 justify-content-center">
                        <div class="col-md-6 col-lg-6 col-xl-3">
                            <div class="counter bg-white rounded p-5">
                                <i class="fa fa-users text-secondary"></i>
                                <h4 style="font-family: cairo;">{{ __('main.satisfied_customers') }}</h4>
                                <h1>20</h1>
                            </div>
                        </div>
                        <div class="col-md-6 col-lg-6 col-xl-3">
                            <div class="counter bg-white rounded p-5">
                                <i class="fa fa-quote-left text-secondary"></i>
                                <h4 style="font-family: cairo;">{{ __('main.quality_of_service') }}</h4>
                                <h1>77%</h1>
                            </div>
                        </div>
                        <div class="col-md-6 col-lg-6 col-xl-3">
                            <div class="counter bg-white rounded p-5">
                                <i class="fa fa-bolt text-secondary"></i>
                                <h4 style="font-family: cairo;">{{ __('main.quality_certificates') }}</h4>
                                <h1>33</h1>
                            </div>
                        </div>
                        <div class="col-md-6 col-lg-6 col-xl-3">
                            <div class="counter bg-white rounded p-5">
                                <i class="fa fa-cart-plus text-secondary"></i>
                                <h4 style="font-family: cairo;">{{ __('main.Available_Products') }}</h4>
                                <h1>789</h1>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Fact Start -->
        <!-- Tastimonial Start -->
        <div class="container-fluid testimonial py-5">
            <div class="container py-5">
                <div class="testimonial-header text-center">
                    <h4 class="text-primary">Our Testimonial</h4>
                    <h1 class="display-5 mb-5 text-dark">Our Client Saying!</h1>
                </div>
                <div class="owl-carousel testimonial-carousel">
                    <div class="testimonial-item img-border-radius bg-light rounded p-4">
                        <div class="position-relative">
                            <i class="fa fa-quote-right fa-2x text-secondary position-absolute"
                                style="bottom: 30px; right: 0;"></i>
                            <div class="mb-4 pb-4 border-bottom border-secondary">
                                <p class="mb-0">Lorem Ipsum is simply dummy text of the printing Ipsum has been the
                                    industry's standard dummy text ever since the 1500s,
                                </p>
                            </div>
                            <div class="d-flex align-items-center flex-nowrap">
                                <div class="bg-secondary rounded">
                                    <img src="img/testimonial-1.jpg" class="img-fluid rounded"
                                        style="width: 100px; height: 100px;" alt="">
                                </div>
                                <div class="ms-4 d-block">
                                    <h4 class="text-dark">Client Name</h4>
                                    <p class="m-0 pb-3">Profession</p>
                                    <div class="d-flex pe-5">
                                        <i class="fas fa-star text-primary"></i>
                                        <i class="fas fa-star text-primary"></i>
                                        <i class="fas fa-star text-primary"></i>
                                        <i class="fas fa-star text-primary"></i>
                                        <i class="fas fa-star"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="testimonial-item img-border-radius bg-light rounded p-4">
                        <div class="position-relative">
                            <i class="fa fa-quote-right fa-2x text-secondary position-absolute"
                                style="bottom: 30px; right: 0;"></i>
                            <div class="mb-4 pb-4 border-bottom border-secondary">
                                <p class="mb-0">Lorem Ipsum is simply dummy text of the printing Ipsum has been the
                                    industry's standard dummy text ever since the 1500s,
                                </p>
                            </div>
                            <div class="d-flex align-items-center flex-nowrap">
                                <div class="bg-secondary rounded">
                                    <img src="img/testimonial-1.jpg" class="img-fluid rounded"
                                        style="width: 100px; height: 100px;" alt="">
                                </div>
                                <div class="ms-4 d-block">
                                    <h4 class="text-dark">Client Name</h4>
                                    <p class="m-0 pb-3">Profession</p>
                                    <div class="d-flex pe-5">
                                        <i class="fas fa-star text-primary"></i>
                                        <i class="fas fa-star text-primary"></i>
                                        <i class="fas fa-star text-primary"></i>
                                        <i class="fas fa-star text-primary"></i>
                                        <i class="fas fa-star text-primary"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="testimonial-item img-border-radius bg-light rounded p-4">
                        <div class="position-relative">
                            <i class="fa fa-quote-right fa-2x text-secondary position-absolute"
                                style="bottom: 30px; right: 0;"></i>
                            <div class="mb-4 pb-4 border-bottom border-secondary">
                                <p class="mb-0">Lorem Ipsum is simply dummy text of the printing Ipsum has been the
                                    industry's standard dummy text ever since the 1500s,
                                </p>
                            </div>
                            <div class="d-flex align-items-center flex-nowrap">
                                <div class="bg-secondary rounded">
                                    <img src="img/testimonial-1.jpg" class="img-fluid rounded"
                                        style="width: 100px; height: 100px;" alt="">
                                </div>
                                <div class="ms-4 d-block">
                                    <h4 class="text-dark">Client Name</h4>
                                    <p class="m-0 pb-3">Profession</p>
                                    <div class="d-flex pe-5">
                                        <i class="fas fa-star text-primary"></i>
                                        <i class="fas fa-star text-primary"></i>
                                        <i class="fas fa-star text-primary"></i>
                                        <i class="fas fa-star text-primary"></i>
                                        <i class="fas fa-star text-primary"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Tastimonial End -->
    @endsection
