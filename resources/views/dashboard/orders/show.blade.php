@extends('layouts.admin.master')
@section('css')
@endsection
@section('title')
    فاتورة
@endsection
@section('content')
    <!-- row -->
    <style>
        @media print {
            #print_B {
                display: none;
            }
        }
    </style>
    <div class="row row-sm">
        <div class="col-md-12 col-xl-12">
            <div class=" main-content-body-invoice" id="print">
                <div class="card card-invoice">
                    <div class="card-body">
                        <div class="invoice-header">
                            <h1 class="invoice-title">فاتورة</h1>
                        </div><!-- invoice-header -->
                        <div class="row mg-t-20">
                            <div class="col-md">
                                <label class="tx-gray-600">الفاتورة</label>
                                <div class="billed-to">
                                    <h6>رقم الفاتورة :{{ $order->order_no }}</h6>
                                    <p>التاريخ :{{ date('Y/m/d', strtotime($order->created_at)) }}
                                    </p>
                                </div>
                            </div>
                            <div class="col-md">
                                <label class="tx-gray-600">بيانات العميل</label>
                                <p class="invoice-info-row"><span>اسم العميل</span> <span>{{ $order->user->name }}</span>
                                </p>
                                <p class="invoice-info-row"><span>هاتف العميل</span> <span>{{ $order->user->phone }}</span>
                                </p>
                                <p class="invoice-info-row"><span>عنوان العميل</span>
                                    <span>{{ $order->user->adress }}</span></p>
                                <p class="invoice-info-row"><span></span> <span></span></p>
                            </div>
                        </div>
                        <div class="table-responsive mg-t-40">
                            <table class="table table-invoice border text-md-nowrap mb-0">
                                <thead>
                                    <tr>
                                        <th class="wd-20p">#</th>
                                        <th class="wd-40p">اسم المنتح</th>
                                        <th class="tx-center">الكميه</th>
                                        <th class="tx-right">سعر الوحدة</th>
                                        <th class="tx-right">المبلغ</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($order->orderProducts as $item)
                                        <tr>
                                            <td>{{ $item->id }}</td>
                                            <td class="tx-12">{{ $item->product->name }}</td>
                                            <td class="tx-center">{{ $item->quantity }}</td>
                                            <td class="tx-right">${{ $item->price }}</td>
                                            <td class="tx-right">${{ number_format($item->quantity * $item->price, 2) }}
                                            </td>
                                        </tr>
                                    @endforeach
                                    <tr>
                                        <td class="valign-middle" colspan="0" rowspan="0">
                                        </td>
                                        <td class="tx-right">الصافي</td>
                                        <td class="tx-right" colspan="2">${{ $subtotal }}</td>
                                    </tr>
                                    <tr>
                                        <td class="tx-right tx-uppercase tx-bold tx-inverse">الاجمالي</td>
                                        <td class="tx-right" colspan="2">
                                            <h4 class="tx-primary tx-bold">${{ $subtotal }}</h4>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <hr class="mg-b-40">
                        <button class="btn btn-purple float-right mt-3 mr-2" id="print_B" onclick="printDiv()">
                            <i class="mdi mdi-printer ml-1"></i>طباعة</button>
                    </div>
                </div>
            </div>
        </div><!-- COL-END -->
    </div>
    <script type="text/javascript">
        function printDiv() {
            var printContents = document.getElementById('print').innerHTML;
            var originalContents = document.body.innerHTML;
            document.body.innerHTML = printContents;
            window.print();
            document.body.innerHTML = originalContents;
            location.reload();
        }
    </script>
@endsection
@section('js')
    <!--Internal  Chart.bundle js -->
    <script src="{{ URL::asset('assets/plugins/chart.js/Chart.bundle.min.js') }}"></script>
@endsection
