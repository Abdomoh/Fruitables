@extends('layouts.admin.master')
@section('css')
<!-- Internal Data table css -->
<link href="{{ URL::asset('admin/plugins/datatable/css/dataTables.bootstrap4.min.css') }}" rel="stylesheet" />
<link href="{{ URL::asset('admin/plugins/datatable/css/buttons.bootstrap4.min.css') }}" rel="stylesheet">
<link href="{{ URL::asset('admin/plugins/datatable/css/responsive.bootstrap4.min.css') }}" rel="stylesheet" />
<link href="{{ URL::asset('admin/plugins/datatable/css/jquery.dataTables.min.css') }}" rel="stylesheet">
<link href="{{ URL::asset('admin/plugins/datatable/css/responsive.dataTables.min.css') }}" rel="stylesheet">
<link href="{{ URL::asset('admin/plugins/select2/css/select2.min.css') }}" rel="stylesheet">
<link href="{{ URL::asset('admin/plugins/prism/prism.css') }}" rel="stylesheet">
<link href="{{ URL::asset('admin/plugins/notify/css/notifIt.css') }}" rel="stylesheet" />
@endsection
@section('page-header')
<br>
<!-- breadcrumb -->
<div class="breadcrumb-header justify-content-between">
    <div class="my-auto">
        <div class="d-flex">
            <h4 class="content-title mb-0 my-auto">العملاء </h4><span class="text-muted mt-1 tx-13 mr-2 mb-0">/ الادارة
                العملاء</span>
        </div>
    </div>

</div>
<!-- breadcrumb -->
@endsection
@section('content')

@include('errors._message')
@include('errors.deletedone')
<!-- row -->
<div class="row">

    <div class="col-xl-12">
        <div class="card mg-b-20">
            <div class="card-header pb-0">
                <div class="">
                    <button type="button" class="btn btn-success" data-toggle="modal" data-target="#exampleModal"><i class="fas fa-users"></i>&nbsp; ادارة العملاء </button><br><br>
                </div>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table id="example1" class="table key-buttons text-md-nowrap" data-page-length='5'>
                        <thead>
                            <tr>
                                <th class="border-bottom-0">#</th>
                                <th class="border-bottom-0">الاسم</th>
                                <th class="border-bottom-0"> الاسم الثاني</th>
                                <th class="border-bottom-0"> الهاتف </th>
                                <th class="border-bottom-0"> العنوان</th>
                                <th class="border-bottom-0"> الطلبات</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($clients as $client)
                            <tr>
                                <td>{{$client->id}}</td>
                                <td>{{$client->name}}</td>
                                <td>{{$client->last_name}}</td>
                                <td>{{$client->phone}}</td>
                                <td>{{$client->adress}}</td>
                                <td> <a href="{{url('dashboard/clients',$client->id)}}"> <label for="" class="badge badge-danger"><i class="fa fa-eye"></i>عرض</label></a> </td>
                            </tr>

                            @endforeach


                        </tbody>
                    </table>

                </div>
            </div>
        </div>

        @endsection
        @section('js')
        <!-- Internal Select2 js-->
        <script src="{{ URL::asset('admin/plugins/notify/js/notifIt.js') }}"></script>
        <script src="{{ URL::asset('admin/plugins/notify/js/notifit-custom.js') }}"></script>

        <script src="{{ URL::asset('admin/plugins/datatable/js/jquery.dataTables.min.js') }}"></script>
        <script src="{{ URL::asset('admin/plugins/datatable/js/dataTables.dataTables.min.js') }}"></script>
        <script src="{{ URL::asset('admin/plugins/datatable/js/dataTables.responsive.min.js') }}"></script>
        <script src="{{ URL::asset('admin/plugins/datatable/js/responsive.dataTables.min.js') }}"></script>
        <script src="{{ URL::asset('admin/plugins/datatable/js/jquery.dataTables.js') }}"></script>
        <script src="{{ URL::asset('admin/plugins/datatable/js/dataTables.bootstrap4.js') }}"></script>
        <script src="{{ URL::asset('admin/plugins/datatable/js/dataTables.buttons.min.js') }}"></script>
        <script src="{{ URL::asset('admin/plugins/datatable/js/buttons.bootstrap4.min.js') }}"></script>
        <script src="{{ URL::asset('admin/plugins/datatable/js/jszip.min.js') }}"></script>
        <script src="{{ URL::asset('admin/plugins/datatable/js/pdfmake.min.js') }}"></script>
        <script src="{{ URL::asset('admin/plugins/datatable/js/vfs_fonts.js') }}"></script>
        <script src="{{ URL::asset('admin/plugins/datatable/js/buttons.html5.min.js') }}"></script>
        <script src="{{ URL::asset('admin/plugins/datatable/js/buttons.print.min.js') }}"></script>
        <script src="{{ URL::asset('admin/plugins/datatable/js/buttons.colVis.min.js') }}"></script>
        <script src="{{ URL::asset('admin/plugins/datatable/js/dataTables.responsive.min.js') }}"></script>
        <script src="{{ URL::asset('admin/plugins/datatable/js/responsive.bootstrap4.min.js') }}"></script>
        <!--Internal  Datatable js -->
        <script src="{{ URL::asset('admin/js/table-data.js') }}"></script>
        @endsection