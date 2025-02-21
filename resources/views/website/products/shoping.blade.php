@extends('layouts.website.nav')
@section('content')
    <!-- Single Page Header start -->
    <div class="container-fluid page-header py-5"
        style="    background: linear-gradient(rgba(0, 0, 0, 0.3), rgba(0, 0, 0, 0.3)), url(../website/img/cart-page-header-img.jpg);">
        <h1 class="text-center text-white display-6">{{ __('main.Shope') }}</h1>
        <ol class="breadcrumb justify-content-center mb-0">
            <li class="breadcrumb-item"><a href="{{ url('/') }}">{{ __('main.Home') }}</a></li>
            <li class="breadcrumb-item"><a href="{{ url('shope') }}">{{ __('main.Shope') }}</a></li>
            <li class="breadcrumb-item active text-white">{{ __('main.Shope') }}</li>
        </ol>
    </div>
    <!-- Single Page Header End -->
    <!-- Fruits Shop Start-->
    <div class="container-fluid fruite py-5">
        <div class="container py-5">
            <h1 class="mb-4">{{ __('main.shoping') }}</h1>
            <div class="row g-4">
                <div class="col-lg-12">
                    <div class="row g-4">
                        <div class="col-xl-3">
                            <form action="{{ route('shope') }}" method="GET">
                                <div class="input-group w-100 mx-auto d-flex">
                                    <input type="text" name="search" class="form-control p-3"
                                        placeholder="search products..."
                                        value="{{ request('search') }}">
                                        <button type="submit" class="input-group-text p-3"><i
                                            class="fa fa-search"></i></button>
                                </div>
                            </form>
                        </div>
                        <div class="col-6"></div>
                        <div class="col-xl-3">
                            <div class="bg-light ps-3 py-3 rounded d-flex justify-content-between mb-4">
                                <form action="{{ route('shope') }}" method="GET">
                                    <select id="" name="category_id" class="border-0 form-select-sm bg-light me-3">
                                        <option value="">{{ __('main.All') }} {{ __('main.Categories') }}</option>
                                        @foreach ($categories as $category)
                                            <option value="{{ $category->id }}"
                                                {{ request('category_id') == $category->id ? 'selected' : '' }}>
                                                {{ $category->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                    <button type="submit" name="submit" class="btn btn-defualt">{{ __('main.filter') }}</button>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="row g-4">
                        <div class="col-lg-3">
                            <div class="row g-4">
                                <div class="col-lg-12">
                                    <div class="mb-3">
                                        <h4>{{ __('main.Categories') }}</h4>
                                        <ul class="list-unstyled fruite-categorie">
                                            @foreach ($categories as $category)
                                                <li>
                                                    <div class="d-flex justify-content-between fruite-name">
                                                        <a href="#"><i class="fas fa-apple-alt me-2"></i>
                                                            @if (App::getlocale() == 'ar')
                                                                {{ $category->name_ar ?? '' }}
                                                            @else
                                                                {{ $category->name ?? '' }}
                                                            @endif
                                                        </a>
                                                        <span>( {{ $category->products->count() }})</span>
                                                    </div>
                                                </li>
                                            @endforeach
                                        </ul>
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="mb-3">
                                        <h4 class="mb-2">{{ __('main.price') }}</h4>
                                        <input type="range" class="form-range w-100" id="rangeInput" name="rangeInput"
                                            min="0" max="500" value="0"
                                            oninput="amount.value=rangeInput.value">
                                        <output id="amount" name="amount" min-velue="0" max-value="500"
                                            for="rangeInput">0</output>
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <form action="{{ route('shope') }}" method="GET">
                                        <h4>{{ __('main.Categories') }}</h4>
                                        @foreach ($categories as $category)
                                            <div class="mb-2">
                                                <input type="radio" class="me-2" id="category-{{ $category->id }}"
                                                    name="category_id" value="{{ $category->id }}"
                                                    {{ request('category_id') == $category->id ? 'checked' : '' }}>
                                                <label for="category-{{ $category->id }}">{{ $category->name }}</label>
                                            </div>
                                        @endforeach
                                        <button type="submit" class="input-group-text p-3"><i
                                                class="fa fa-search"></i></button></span>
                                    </form>
                                </div>
                                <div class="col-lg-12">
                                    <h4 class="mb-3">{{ __('main.Featured_products') }}</h4>
                                    @foreach ($featuredProduct as $product)
                                        <div class="d-flex align-items-center justify-content-start">
                                            <div class="rounded me-4" style="width: 100px; height: 100px;">
                                                <img src="uploads/products/{{ $product->image }}" class="img-fluid rounded"
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
                                                    <h5 class="fw-bold me-2" style="font-family: cairo;">
                                                        {{ $product->price }} @if (App::getlocale() == 'ar')
                                                            ج.س
                                                        @else
                                                            SDG
                                                        @endif
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                                <div class="col-lg-12">
                                    <div class="position-relative">
                                        <img src="../website/img/banner-fruits.jpg" class="img-fluid w-100 rounded"
                                            alt="">
                                        <div class="position-absolute"
                                            style="top: 50%; right: 10px; transform: translateY(-50%);">
                                            <h3 class="text-secondary fw-bold">Fresh <br> Fruits <br> Banner</h3>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-9">
                            <div class="row g-4 justify-content-center">
                                @if ($products->count() > 0)
                                @foreach ($products as $product)
                                    <div class="col-md-6 col-lg-6 col-xl-4">
                                        <div class="rounded position-relative fruite-item">
                                            <div class="fruite-img">
                                                <img src="../uploads/products/{{ $product->image }}"
                                                    class="img-fluid w-100 rounded-top" alt="">
                                            </div>
                                            <div class="text-white bg-secondary px-3 py-1 rounded position-absolute"
                                                style="top: 10px; left: 10px;">
                                                @if (App::getlocale() == 'ar')
                                                    {{ $product->category->name_ar }}
                                                @else
                                                    {{ $product->category->name }}
                                                @endif
                                            </div>
                                            <div class="p-4 border border-secondary border-top-0 rounded-bottom">
                                                <h4 style="font-family: cairo;">
                                                    @if (App::getLocale() == 'ar')
                                                        {{ $product->name_ar }}
                                                    @else
                                                        {{ $product->name }}
                                                    @endif
                                                </h4>
                                                <p>
                                                    @if (App::getlocale() == 'ar')
                                                        {{ $product->description_ar }}
                                                    @else
                                                        {{ $product->description }}.
                                                    @endif
                                                </p>
                                                <div class="d-flex justify-content-between flex-lg-wrap">
                                                    <p class="text-dark fs-5 fw-bold mb-0" style="font-family: cairo;">
                                                        {{ $product->price }} @if (App::getlocale() == 'ar')
                                                            ج.س
                                                        @else
                                                            SDG
                                                        @endif
                                                    </p>
                                                    <form action="{{ route('cart.store') }}" method="POST"
                                                        enctype="multipart/form-data">
                                                        @csrf
                                                        <input type="hidden" value="{{ $product->id }}"
                                                            name="product_id">
                                                        <input type="hidden" value="{{ $product->price }}"
                                                            name="price">
                                                        <input type="hidden" value="1" name="quantity">
                                                        <a href=""
                                                            class="btn border border-secondary rounded-pill  text-primary"><i
                                                                class="fa fa-shopping-bag  text-primary"></i><button
                                                                class="btn btn-sm text-primary">
                                                                {{ __('main.add_to_cart') }}</button> </a>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                                @else
                                <div class="text-center">  <h3 style="font-family: Cairo;" >{{ __('main.not_found_match') }}</h3></div>
                                @endif
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
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Fruits Shop End-->
@endsection
