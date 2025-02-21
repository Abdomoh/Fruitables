@extends('layouts.website.nav')
@section('content')
    <!-- Single Page Header start -->
    <div class="container-fluid page-header py-5"
        style="    background: linear-gradient(rgba(0, 0, 0, 0.3), rgba(0, 0, 0, 0.3)), url(../website/img/cart-page-header-img.jpg);">
        <h1 class="text-center text-white display-6">{{ __('main.product_detels') }}</h1>
        <ol class="breadcrumb justify-content-center mb-0" style="">
            <li class="breadcrumb-item"><a href="#">{{ __('main.Home') }}</a></li>
            <li class="breadcrumb-item"><a href="#">{{ __('main.product_detels') }}</a></li>
            <li class="breadcrumb-item active text-white">
                @if (App::getLocale() == 'ar')
                    {{ $product->name_ar }}
                @else
                    {{ $product->name }}
                @endif
            </li>
        </ol>
    </div>
    <!-- Single Page Header End -->
    <!-- Single Product Start -->
    <div class="container-fluid py-5 mt-5">
        <div class="container py-5">
            <div class="row g-4 mb-5">
                <div class="col-lg-8 col-xl-9">
                    <div class="row g-4">
                        <div class="col-lg-6">
                            <div class="border rounded">
                                <a href="#">
                                    <img src="../uploads/products/{{ $product->image }}" class="img-fluid rounded"
                                        alt="Image">
                                </a>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <h4 class="fw-bold mb-3" style="font-family: cairo;">
                                @if (App::getlocale() == 'ar')
                                    {{ $product->name_ar }}
                                @else
                                    {{ $product->name }}
                                @endif
                            </h4>
                            <p class="mb-3">
                                @if (App::getlocale() == 'ar')
                                    {{ $product->category->name_ar ?? '' }}
                                @else
                                    {{ $product->category->name ?? '' }}
                                @endif
                            </p>
                            <h5 class="fw-bold mb-3" style="font-family: cairo;"> {{ $product->price }} @if (App::getlocale() == 'ar')
                                    ج.س
                                @else
                                    SDG
                                @endif
                            </h5>
                            <div class="d-flex mb-4">
                                <i class="fa fa-star text-secondary"></i>
                                <i class="fa fa-star text-secondary"></i>
                                <i class="fa fa-star text-secondary"></i>
                                <i class="fa fa-star text-secondary"></i>
                                <i class="fa fa-star"></i>
                            </div>
                            <p class="mb-4">
                                @if (App::getlocale() == 'ar')
                                    {{ $product->description_ar }}
                                @else
                                    {{ $product->description }}.
                                @endif
                            </p>
                            <form action="{{ route('cart.store') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <input type="hidden" value="{{ $product->id }}" name="product_id">
                                <input type="hidden" value="{{ $product->price }}" name="price">
                                <input type="hidden" value="1" name="quantity">
                                <a href="" class="btn border border-secondary rounded-pill px-3 text-primary"><i
                                        class="fa fa-shopping-bag me-2 text-primary"></i><button
                                        class="btn btn-sm text-primary">
                                        {{ __('main.add_to_cart') }}</button> </a>
                            </form>
                        </div>
                        <div class="col-lg-12">
                            <nav>
                                <div class="nav nav-tabs mb-3">
                                    <button class="nav-link active border-white border-bottom-0" type="button"
                                        role="tab" id="nav-about-tab" data-bs-toggle="tab" data-bs-target="#nav-about"
                                        aria-controls="nav-about" aria-selected="true">Description</button>
                                </div>
                            </nav>
                            <div class="tab-content mb-5">
                                <div class="tab-pane active" id="nav-about" role="tabpanel" aria-labelledby="nav-about-tab">
                                    <p>
                                        @if (App::getlocale() == 'ar')
                                            {{ $product->description_ar }}
                                        @else
                                            {{ $product->description }}.
                                        @endif
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-xl-3">
                    <div class="row g-4 fruite">
                        <div class="col-lg-12">
                            <div class="mb-4">
                                <h4 style="font-family: cairo;">{{ __('main.Categories') }}</h4>
                                <ul class="list-unstyled fruite-categorie">
                                    @foreach ($categories as $category)
                                        <li>
                                            <div class="d-flex justify-content-between fruite-name">
                                                <a href="#"><i class="fas fa-apple-alt me-2"></i>
                                                    @if (App::getlocale() == 'ar')
                                                </a>
                                                <span> ({{ $category->products->count() }})</span>
                                            </div>
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <h4 class="mb-4">{{ __('main.Featured_products') }}</h4>
                            @foreach ($featuredProduct as $product)
                                <div class="d-flex align-items-center justify-content-start">
                                    <div class="rounded me-4" style="width: 100px; height: 100px;">
                                        <img src="../uploads/products/{{ $product->image }}" class="img-fluid rounded"
                                            alt="">
                                    </div>
                                    <div>
                                        <h6 class="mb-2" style="font-family: cairo;">
                                            @if (App::getlocale() == 'ar')
                                                {{ $product->name_ar }}
                                            @else
                                                {{ $product->name }}
                                            @endif
                                        </h6>
                                        <div class="d-flex mb-2">
                                            <i class="fa fa-star text-secondary"></i>
                                            <i class="fa fa-star text-secondary"></i>
                                            <i class="fa fa-star text-secondary"></i>
                                            <i class="fa fa-star text-secondary"></i>
                                            <i class="fa fa-star"></i>
                                        </div>
                                        <div class="d-flex mb-2">
                                            <h5 class="fw-bold me-2" style="font-family: cairo;">{{ $product->price }}
                                                @if (App::getlocale() == 'ar')
                                                    ج.س
                                                @else
                                                    SDG
                                                @endif
                                            </h5>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
            <h1 class="fw-bold mb-0" style="font-family: cairo;">{{ __('main.latest_products') }}</h1><br>

            <!-- Bestsaler Product Start -->
            <div class="container-fluid ">
                <div class="container ">
                    <div class="row g-4">
                        @foreach ($latestProduct as $product)
                            <div class="col-lg-6 col-xl-4">
                                <div class="p-4 rounded bg-light">
                                    <div class="row align-items-center">
                                        <div class="col-6">
                                            <img src="../uploads/products/{{ $product->image }}"
                                                class="img-fluid rounded-circle w-100" alt="">
                                        </div>
                                        <div class="col-6">
                                            <a href="#" class="h5" style="font-family: cairo;">
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
                        <h4 class="mb-3" style="font-family: cairo;">{{ $product->price }} @if (App::getlocale() == 'ar')
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
                            <a href="" class="btn border border-secondary rounded-pill  text-primary"><i
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

    <div class="col-12">

        <div class="pagination d-flex justify-content-center mt-5">
            @if ($products->lastPage() > 1)
                {{-- Previous Page Link --}}
                <a href="{{ $products->previousPageUrl() }}"
                    class="rounded {{ $products->onFirstPage() ? 'disabled' : '' }}">&laquo;</a>

                {{-- Pagination Numbers --}}
                @for ($i = 1; $i <= $products->lastPage(); $i++)
                    <a href="{{ $products->url($i) }}"
                        class="rounded {{ $products->currentPage() == $i ? 'active' : '' }}">{{ $i }}</a>
                @endfor

                {{-- Next Page Link --}}
                <a href="{{ $products->nextPageUrl() }}"
                    class="rounded {{ $products->hasMorePages() ? '' : 'disabled' }}">&raquo;</a>
            @endif
        </div>

    </div>
    </div>

    </div>


    <!-- Single Product End -->
@endsection
