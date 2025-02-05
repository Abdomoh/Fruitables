@extends('layouts.website.nav')
@section('content')
    <!-- Single Page Header start -->
    <div class="container-fluid page-header py-5"
        style="    background: linear-gradient(rgba(0, 0, 0, 0.3), rgba(0, 0, 0, 0.3)), url(website/img/cart-page-header-img.jpg);
         background-position: center center;
    background-repeat: no-repeat;
    background-size: cover;">
        <h1 class="text-center text-white display-6">{{ __('main.checkout') }}</h1>
        <ol class="breadcrumb justify-content-center mb-0">
            <li class="breadcrumb-item"><a href="{{ url('/') }}">{{ __('main.Home') }}</a></li>
            <li class="breadcrumb-item"><a href="{{ route('checkout') }}">{{ __('main.checkout') }}</a></li>
            <li class="breadcrumb-item active text-white">{{ __('main.checkout') }}</li>
        </ol>
    </div>
    <!-- Single Page Header End -->


    <!-- Checkout Page Start -->
    <div class="container-fluid py-5">

        <div class="container py-5">
            <div class="row">
                <div class="col-sm-12">
                    @include('errors._message')
                </div>
            </div>
            <h1 class="mb-4">{{ __('main.Billing_details') }}</h1>
            <form action="{{ route('checkout') }} " method="POST" enctype="multipart/form-data">
                @csrf
                <div class="row g-5">
                    <div class="col-md-12 col-lg-6 col-xl-7">
                        <div class="row">
                            <div class="col-md-12 col-lg-6">
                                <div class="form-item w-100">
                                    <label class="form-label my-3">{{ __('main.First_Name') }}<sup>*</sup></label>
                                    <input type="text" name="name" class="form-control"
                                        value="{{ Auth::user()->name ?? '' }}">
                                </div>
                            </div>
                            <div class="col-md-12 col-lg-6">
                                <div class="form-item w-100">
                                    <label class="form-label my-3">{{ __('main.Last_Name') }}<sup>*</sup></label>
                                    <input type="text" name="last_name" class="form-control"
                                        value="{{ old('last_name') }}">
                                    @error('last_name')
                                        <span class="form-text text-danger">{{ $message }}</s>
                                        @enderror

                                </div>
                            </div>
                        </div>

                        <div class="form-item">
                            <label class="form-label my-3">{{ __('main.address') }} <sup>*</sup></label>
                            <input type="text" name="address"
                                class="form-control  @error('address') is-invalid @enderror"
                                placeholder="{{ __('main.house_number') }}" value="{{ old('address') }}">
                            @error('address')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-item">
                            <label class="form-label my-3">{{ __('main.phone') }}<sup>*</sup></label>
                            <input type="tel" name="phone" class="form-control" value="{{ old('phone') }}">
                            @error('payment_method')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                        </div>
                        <div class="form-item">
                            <label class="form-label my-3">{{ __('email') }}<sup>*</sup></label>
                            <input type="email" name="email" class="form-control"
                                value="{{ Auth::user()->email ?? '' }}">
                        </div>

                        <hr>

                        <div class="form-item">
                            <textarea name="text" name="order_notes" class="form-control" spellcheck="false" cols="30" rows="11"
                                placeholder="{{ __('main.order_notes') }}">{{ old('order_notes') }}</textarea>

                        </div>
                    </div>
                    <div class="col-md-12 col-lg-6 col-xl-5">
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th scope="col">{{ __('main.image') }}</th>
                                        <th scope="col">{{ __('main.product') }}</th>
                                        <th scope="col">{{ __('main.price') }}</th>
                                        <th scope="col">{{ __('main.quantity') }}</th>
                                        <th scope="col">{{ __('main.total') }}</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        @foreach ($cartproducts as $item)
                                            <th scope="row">
                                                <div class="d-flex align-items-center mt-2">
                                                    <img src="../uploads/products/{{ $item->product->image }} "
                                                        class="img-fluid rounded-circle" style="width: 90px; height: 90px;"
                                                        alt="">
                                                </div>
                                            </th>
                                            <td class="py-5">{{ $item->product->name }}</td>
                                            <td class="py-5">${{ $item->price }}</td>
                                            <td class="py-5">{{ $item->quantity }}</td>
                                            <td class="py-5">${{ number_format($item->total, 2) }}</td>
                                        @endforeach

                                    </tr>

                                </tbody>
                            </table>
                        </div>
                        <div class="row g-4 text-center align-items-center justify-content-center border-bottom py-3">
                            <div class="col-12">
                                <div class="form-check text-start my-3">
                                    <input type="checkbox" name="payment_method"
                                        class="form-check-input bg-primary border-0" id="Transfer-1" value="0">
                                    <label class="form-check-label" for="Transfer-1">
                                        {{ __('main.Direct_Bank_Transfer') }}</label>
                                    @error('payment_method')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <p class="text-start text-dark">{{ __('main.detels_bank') }}.</p>
                            </div>
                        </div>

                        <div class="row g-4 text-center align-items-center justify-content-center border-bottom py-3">
                            <div class="col-12">
                                <div class="form-check text-start my-3">
                                    <input type="checkbox" class="form-check-input bg-primary border-0" id="Delivery-1"
                                        name="payment_method" value="1">
                                    <label class="form-check-label"
                                        for="Delivery-1">{{ __('main.Cash_On_Delivery') }}</label>
                                    @error('payment_method')
                                        <span class="form-text text-danger">{{ $message }}</s>
                                        @enderror
                                </div>
                            </div>
                        </div>

                        <div class="row g-4 text-center align-items-center justify-content-center pt-4">
                            <button type="submit"
                                class="btn border-secondary py-3 px-4 text-uppercase w-100 text-primary">
                                {{ __('main.Place_Order') }} </button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <!-- Checkout Page End -->
@endsection
