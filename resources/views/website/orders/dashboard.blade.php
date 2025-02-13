@extends('layouts.website.nav')
<title>{{ __('main.orders') }}</title>
@section('content')
    <main class="main">
        <br><br><br><br><br><br>

        <div class="container ">

            <nav class="navbar navbar-expand-lg navbar-light bg-light">
                <div class="container-fluid">
                    <div class="container">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ url('orders') }}" style="color:#000000">
                                    {{ __('main.dashboard') }}</a></li>
                            <li class="breadcrumb-item active" aria-current="page" style="color:#000000">
                                {{ Auth::user()->name ?? '' }}</li>
                        </ol>
                    </div><!-- End .container -->
                </div>
            </nav><!-- End .breadcrumb-nav -->


            <div class="col-lg-12">
                <nav>
                    <div class="nav nav-tabs mb-3">
                        <button class="nav-link active border-white border-bottom-0" type="button" role="tab"
                            id="nav-about-tab" data-bs-toggle="tab" data-bs-target="#nav-about" aria-controls="nav-about"
                            aria-selected="true">{{ __('main.client') }}</button>
                        <button class="nav-link border-white border-bottom-0" type="button" role="tab"
                            id="nav-mission-tab" data-bs-toggle="tab" data-bs-target="#nav-mission"
                            aria-controls="nav-mission" aria-selected="false">{{ __('main.orders') }}</button>
                    </div>
                </nav>
                <div class="tab-content mb-5">
                    <div class="tab-pane active" id="nav-about" role="tabpanel" aria-labelledby="nav-about-tab">

                        <p> {{ Auth::user()->name }} {{ Auth::user()->last_name }}</p>
                        <div class="px-2">
                            <div class="row g-4">
                                <div class="col-6">
                                    <span class="text-success">🟢 {{ Auth::user()->created_at->diffForHumans() }}</span>


                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane" id="nav-mission" role="tabpanel" aria-labelledby="nav-mission-tab">

                        <div class="d-flex">

                            <div class="">
                                <p class="mb-2" style="font-size: 14px;">{{ __('main.orders') }} {{ __('main.client') }}
                                </p>
                                <div class="d-flex justify-content-between">

                                    @if ($orders->count() == 0)
                                        <p> {{ __('main.order_not_found') }}.
                                            <a href="{{ url('shoping') }}"
                                                class="btn btn-outline-primary-2"><span>{{ __('main.go_to') }}
                                                    {{ __('main.shoping') }}</span><i
                                                    class="icon-long-arrow-right"></i></a>
                                        </p>
                                    @else
                                        <div class="col-md-12 ">
                                            <div class="table-responsive">
                                                <table class="table ">
                                                    <thead>
                                                        <tr>
                                                            <th scope="col">{{ __('main.order_no') }}</th>
                                                            <th scope="col">{{ __('main.total') }}</th>
                                                            <th scope="col">{{ __('main.status') }}</th>
                                                            <th scope="col">{{ __('main.created_at') }}</th>
                                                            <th scope="col">{{ __('main.order_detels') }}</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        @foreach ($orders as $order)
                                                            <tr>

                                                                <td>{{ $order->order_no }}</td>
                                                                <td>{{ $order->total }}
                                                                    @if (App::getlocale() == 'ar')
                                                                        ج.س
                                                                    @else
                                                                        SDG
                                                                    @endif
                                                                </td>
                                                                @if ($order->status == 'panding')
                                                                    <td class="badge bg-danger"> {{ $order->status }}</td>
                                                                @else
                                                                    <td class="badge bg-success"> {{ $order->status }}</td>
                                                                @endif
                                                                <td>{{ $order->formatted_created_at }}</td>
                                                                <td><a href="../orders/{{ $order->id }}"><i
                                                                            class="fa fa-eye" title="  Show Order Details "
                                                                            style="color:#81c408 ;">{{ __('main.view') }}</i></a>

                                                                </td>
                                                            </tr>
                                                        @endforeach
                                                    </tbody>
                                                </table><!-- End .table table-summary -->
                                            </div>
                                        </div>
                                    @endif

                                </div>
                                <p class="text-dark">{{ __('main.total') }}
                                    {{ number_format($orders->sum('total', 2)) }}
                                    @if (App::getlocale() == 'ar')
                                        ج.س
                                    @else
                                        SDG
                                    @endif
                                </p>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </main>
@endsection
