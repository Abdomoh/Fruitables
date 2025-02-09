@extends('layouts.website.nav')

@section('content')




<main class="main">
    <div class="page-header text-center" style="background-image: url('assets/images/page-header-bg.jpg')">
        <div class="container">
            <h1 class="page-title">{{trans('main.order_detels')}}</span></h1>
        </div><!-- End .container -->
    </div><!-- End .page-header -->
    <nav aria-label="breadcrumb" class="breadcrumb-nav">
        <div class="container">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{url('/')}}">{{trans('main.Home')}} </a></li>
                <li class="breadcrumb-item"><a href="{{url('/orders')}}">{{trans('main.dashboard')}} </a></li>
                <li class="breadcrumb-item active" aria-current="page">{{trans('main.order_detels')}} </li>
            </ol>
        </div><!-- End .container -->
    </nav><!-- End .breadcrumb-nav -->
    <div id="printableArea">
<center>


            <div class="container ">
                    <div class="row">
                        <aside class="col-lg-12 ">
                            <div class="summary">
                                <h3 class="summary-title text-center">{{trans('main.order_detels')}} </h3>

                                <table class="table center-table">
                                    <thead>
                                        <tr>
                                            <th>{{__('main.order_no')}} </th>
                                            <td>{{$order->order_no}}</td>
                                        </tr>
                                        <tr>
                                            <th>{{trans('main.status')}}</th>
                                            <td>{{$order->status}}</td>
                                        </tr>
                                        <tr>
                                            <th>{{trans('main.payment_mothod')}}</th>
                                            @if($order->paid_way == 1)
                                            <td>{{trans('main.Direct_Bank_Transfer')}}</td>
                                            @else
                                            <td>{{trans('main.Cash_On_Delivery')}}</td>
                                            @endif
                                        </tr>
                                        <tr>
                                            <th>{{trans('main.total')}} </th>
                                            <td>{{$order->total}}
                                                @if(App::getlocale()=='ar')
                                                ج.س
                                                @else
                                                SDG
                                                @endif
                                            </td>
                                        </tr>
                                    </thead>
                                </table>

                                <h3 class="summary-title text-center">{{trans('main.order_detels')}} </h3>
                                        <tr >
                                            <table class="table mt-5">
                                                <tr>
                                                    <th>{{trans('main.product')}} </th><th></th><th></th>
                                                    <th>{{trans('main.price')}} </th><th></th>
                                                    <th class="text-center">{{trans('main.quantity')}} </th><th></th><th></th>
                                                    <th>{{trans('main.total')}} </th>
                                                </tr>
                                                @foreach($order->orderProducts as $order_product)
                                                <tr>
                                                    <td>
                                                        @if(App::getlocale()=='ar')
                                                        {{$order_product->product->name_ar??'none' }}
                                                            @else
                                                            {{$order_product->product->name??'none' }}
                                                            @endif
                                                        </td>
                                                    <td></td>
                                                    <td></td>
                                                    <td>{{$order_product->price??'none' }}
                                                        @if(App::getlocale()=='ar')
                                                        ج.س
                                                        @else
                                                        SDG
                                                        @endif
                                                    </td>
                                                    <td></td>
                                                    <td class="text-center">{{$order_product->quantity??'none' }}</td>
                                                    <td></td>
                                                    <td></td>
                                                    <td>{{$order_product->total??'none' }}
                                                        @if(App::getlocale()=='ar')
                                                        ج.س
                                                        @else
                                                        SDG
                                                        @endif
                                                    </td>
                                                </tr>
                                                @endforeach
                                            </table>
                                        </tr>
                                    </thead>
                                </table>
                            </div><!-- End .summary -->
                        </aside><!-- End .col-lg-3 -->
                    </div><!-- End .row -->


            </div><!-- End .container -->

</center>

    </div>
   <center> <div class=" fa fa-print" class="center-div" onclick="printDiv('printableArea')"></div></center>
</main><!-- End .main -->


    <script>
        function printDiv(divName) {
            var printContents = document.getElementById(divName).innerHTML;
            var originalContents = document.body.innerHTML;

            document.body.innerHTML = printContents;

            window.print();

            document.body.innerHTML = originalContents;
        }
    </script>

@endsection
