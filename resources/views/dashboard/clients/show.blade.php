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

                                        <h6>رقم الفاتورة: {{ $orders->first()->order_no ?? '' }}</h6>
                                        <p>التاريخ: {{ date('Y/m/d', strtotime($orders->first()->created_at ?? now())) }}</p>

                                </div>
                            </div>
                            <div class="col-md">
                                <label class="tx-gray-600">بيانات العميل</label>
                                <p class="invoice-info-row"><span>اسم العميل</span> <span>{{ $client->name }}</span></p>
                                <p class="invoice-info-row"><span>هاتف العميل</span> <span>{{ $client->phone }}</span></p>
                                <p class="invoice-info-row"><span>عنوان العميل</span> <span>{{ $client->adress }}</span></p>
                                <p class="invoice-info-row"><span></span> <span></span></p>
                            </div>
                        </div>
                        <div class="table-responsive mg-t-40">
                            <table class="table table-invoice border text-md-nowrap mb-0">
                                <thead>
                                    <tr>
                                        <th class="wd-20p">#</th>
                                        <th class="wd-40p"> حالة الطلب </th>
                                        <th class="tx-center">تاريخ انشاء الطلب</th>
                                        <th class="tx-right">المبلغ</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($orders as $item)
                                        <tr>
                                            <td>{{ $item->order_no }}</td>
                                            <td class="">{{ $item->status ?? '' }}</td>
                                            <td class="">{{ date('Y/m/d', strtotime($order->created_at ?? now())) }}
                                            </td>
                                            <td class="">${{ number_format($item->quantity * $item->price ?? '', 2) }}
                                            </td>
                                        </tr>
                                    @endforeach
                                    <tr>
                                        <td class="valign-middle" colspan="0" rowspan="0">
                                        </td>
                                        <td class="tx-right">الصافي</td>
                                        <td class="tx-right" colspan="2">${{ $orders->sum('total') }}</td>
                                    </tr>
                                    <tr>
                                        <td class="tx-right tx-uppercase tx-bold tx-inverse">الاجمالي</td>
                                        <td class="tx-right" colspan="2">
                                            <h4 class="tx-primary tx-bold">${{ $orders->sum('total') }}</h4>
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
