@extends('layouts.website.nav')
@section('content')
    <!-- Single Page Header start -->
    <div class="container-fluid page-header py-5"
        style="    background: linear-gradient(rgba(0, 0, 0, 0.3), rgba(0, 0, 0, 0.3)), url(website/img/cart-page-header-img.jpg);
    background-position: center center;
background-repeat: no-repeat;
background-size: cover;">
        <h1 class="text-center text-white display-6">{{ __('main.cart') }}</h1>
        <ol class="breadcrumb justify-content-center mb-0">
            <li class="breadcrumb-item"><a href="{{ url('/') }}">{{ __('main.Home') }}</a></li>
            <li class="breadcrumb-item"><a href="{{ url('cart-product') }}">{{ __('main.cart') }}</a></li>
            <li class="breadcrumb-item active text-white">{{ __('main.cart') }}</li>
        </ol>
    </div>
    <!-- Single Page Header End -->
    <!-- Cart Page Start -->
    @if ($cartProducts->count() > 0)
        <div class="container-fluid py-5">
            <div class="container py-5">
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">{{ __('main.image') }}</th>
                                <th scope="col">{{ __('main.product') }}</th>
                                <th scope="col">{{ __('main.price') }}</th>
                                <th scope="col">{{ __('main.quantity') }}</th>
                                <th scope="col">{{ __('main.total') }}</th>

                                <th scope="col">{{ __('main.handel') }} </th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($cartProducts as $cart)
                                <tr>
                                    <th scope="row">
                                        <div class="d-flex align-items-center">
                                            <img src="../uploads/products/{{ $cart->product->image }}"
                                                class="img-fluid me-5 rounded-circle" style="width: 80px; height: 80px;"
                                                alt="" alt="">
                                        </div>
                                    </th>
                                    <td>

                                        <p class="mb-0 mt-4">
                                            @if (App::getLocale() == 'ar')
                                                {{ $cart->product->name_ar }}
                                            @else
                                                {{ $cart->product->name }}
                                            @endif
                                        </p>
                                    </td>
                                    <td>
                                        <p class="mb-0 mt-4">{{ $cart->product->price }} $</p>
                                    </td>

                                    <td>
                                        <form action="{{ url('cart-update', $cart->id) }}" method="POST"
                                            class='form-group'>
                                            @csrf


                                            <div class="input-group quantity mt-4" style="width: 100px;">
                                                <input type="number" name="quantity"
                                                    class="form-control form-control-sm text-center border-0"
                                                    value="{{ $cart->quantity }}">
                                                <input type="hidden" value="{{ $cart->id }}" name="id">
                                                <div class="input-group-btn">
                                                    <button type="submit"
                                                        class="btn btn-sm btn-minus rounded-circle bg-light border  "
                                                        name="submit">
                                                        <i class="fa fa-edit"></i>
                                                    </button>
                                                </div>

                                            </div>
                                        </form>
                                    </td>

                                    <td>
                                        <p class="mb-0 mt-4">{{ number_format($cart->total, 2) }}
                                            @if (App::getlocale() == 'ar')
                                                ج.س
                                            @else
                                                SDG
                                            @endif
                                        </p>
                                    </td>
                                    <td>
                                        <form action="{{ route('cart.remove', $cart->product_id) }}" method="POST">
                                            @csrf
                                            <input type="hidden" value="{{ $cart->id }}" name="id">
                                            <button class="btn btn-md rounded-circle bg-light border mt-4">
                                                <i class="fa fa-times text-danger"></i>
                                            </button>
                                        </form>
                                    </td>

                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                {{-- <div class="mt-5">
                    <input type="text" class="border-0 border-bottom rounded me-5 py-3 mb-4" placeholder="Coupon Code">
                    <button class="btn border-secondary rounded-pill px-4 py-3 text-primary" type="button">Apply
                        Coupon</button>
                </div> --}}
                <div class="row g-4 justify-content-end">
                    <div class="col-8"></div>
                    <div class="col-sm-8 col-md-7 col-lg-6 col-xl-4">
                        <div class="bg-light rounded">
                            <div class="p-4">
                                <h3 class="display-6 mb-4"> <span class="fw-normal"
                                        style=" font-family: Cairo, sans-serif;">{{ __('main.cart_total') }}</span></h3>
                                <div class="d-flex justify-content-between mb-4">
                                    <h5 class="mb-0 me-4" style=" font-family: Cairo, sans-serif;">
                                        {{ __('main.subtotal') }}:</h5>
                                    <p class="mb-0">${{ number_format($total, 2) }}
                                        @if (App::getlocale() == 'ar')
                                            ج.س
                                        @else
                                            SDG
                                        @endif
                                    </p>
                                </div>
                                <p class="mb-0 text-end">{{ __('main.Domestic_shipping_only') }}.</p>
                            </div>
                            <div class="py-4 mb-4 border-top border-bottom d-flex justify-content-between">
                                <h5 class="mb-0 ps-4 me-4">{{ __('main.total') }}</h5>
                                <p class="mb-0 pe-4">{{ number_format($total, 2) }}
                                    @if (App::getlocale() == 'ar')
                                        ج.س
                                    @else
                                        SDG
                                    @endif
                                </p>
                            </div>
                            <a href="{{ route('checkout') }}">
                                <button
                                    class="btn border-secondary rounded-pill px-4 py-3 text-primary text-uppercase mb-4 ms-4"
                                    type="button">{{ __('main.Proceed_Checkout') }}</button>
                            </a>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    @else
        <center>
            <div class="row">
                <div class="col-lg-12">
                    <div class="shoping__checkout">
                        <br><br>
                        <h5>{{ __('main.cart_emtpy') }}</h5>
                        <p><a href="{{ url('orders') }}"> {{ __('main.go_to') }}
                                {{ trans('main.dashboard') }}</a></p>
                        <p class="mb-0 mt-4  text-bold"> {{ number_format($total, 2) }}
                            @if (App::getlocale() == 'ar')
                                ج.س
                            @else
                                SDG
                            @endif
                            {{ __('main.total') }}
                        </p>
                    </div>
                </div>
            </div>
        </center>
    @endif
    <!-- Cart Page End -->
@endsection
