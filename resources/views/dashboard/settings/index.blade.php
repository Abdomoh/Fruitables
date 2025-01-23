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
            <h4 class="content-title mb-0 my-auto">الاعدادات </h4><span class="text-muted mt-1 tx-13 mr-2 mb-0">/ ااضافة
                الاعدادات</span>
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
                    <button type="" class="btn btn-success" data-toggle="modal" data-target="#exampleModal"><i class="fas fa-plus"></i>&nbsp;  </button><br><br>
                </div>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table id="example1" class="table key-buttons text-md-nowrap" data-page-length='5'>
                        <thead>
                            <tr>
                                <th class="border-bottom-0">#</th>
                                <th class="border-bottom-0">الاسم بالانجليزي</th>
                                <th class="border-bottom-0">الاسم بالعربي</th>
                                <th class="border-bottom-0">العنوان بالانجليزي</th>
                                <th class="border-bottom-0">العنوان بالعربي</th>
                                <th class="border-bottom-0">الايميل</th>
                                <th class="border-bottom-0">الوصورة</th>
                                <th class="border-bottom-0"></th>


                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>{{$setting->id}}</td>
                                <td>{{$setting->name_project}}</td>
                                <td>{{$setting->name_project_ar}}</td>
                                <td>{{$setting->location}}</td>
                                <td>{{$setting->location_ar}}</td>
                                <td>{{$setting->email}}</td>

                                <td data-toggle="modal" data-target="#img_show{{$setting->id}}"><img src="uploads/logo/{{$setting->logo}}" width="40px" class="rounded-circle">
                                </td>
                                <td><button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#edit{{$setting->id}}" title="">
                                        <i class="fa fa-edit"></i></button></td>
                            </tr>
                            <!--  edit model -->
                            <div class="modal fade" id="edit{{$setting->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 style="font-family: 'Cairo', sans-serif;" class="modal-title" id="exampleModalLabel">
                                                تعديل البيانات
                                            </h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <form action="{{route('settings.update',$setting->id)}}" class="p-5 bg-white" method="POST" enctype="multipart/form-data">
                                                {{csrf_field()}}
                                                {{method_field('PUT')}}
                                                <div class="form-group">
                                                    <label class="control-label">الاسم بالعربي</label>
                                                    <input type="text" name="name_project_ar" value="{{$setting->name_project_ar}}" class="form-control" />
                                                    <input id="id" type="hidden" name="id" class="form-control" value="{{$setting->id}}">
                                                </div>
                                                <div class="form-group">
                                                    <label class="control-label">الاسم بالانجلزي</label>
                                                    <input type="text" name="name_project" value="{{$setting->name_project}}" class="form-control" />
                                                    <input id="id" type="hidden" name="id" class="form-control" value="{{$setting->id}}">
                                                </div>
                                                <div class="form-group">
                                                    <label class="control-label">العنوان بالعربي</label>
                                                    <input type="text" name="location_ar" value="{{$setting->location_ar}}" class="form-control" />
                                                    <input id="id" type="hidden" name="id" class="form-control" value="{{$setting->id}}">
                                                </div>
                                                <div class="form-group">
                                                    <label class="control-label">العنوان بالانجلزي</label>
                                                    <input type="text" name="location" value="{{$setting->location}}" class="form-control" />
                                                    <input id="id" type="hidden" name="id" class="form-control" value="{{$setting->id}}">
                                                </div>
                                                <div class="form-group">
                                                    <label class="control-label"> الايميل</label>
                                                    <input type="email" name="email" value="{{$setting->email}}" class="form-control" />
                                                    <input id="id" type="hidden" name="id" class="form-control" value="{{$setting->id}}">
                                                </div>
                                                <div class="form-group">
                                                    <label for="exampleFormControlTextarea1">صورة</label>
                                                    <input type="file" name="logo" value="{{$setting->logo}}" class="form-control" />
                                                    <input id="id" type="hidden" name="id" class="form-control" value="{{$setting->id}}">
                                                </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="submit" class="btn btn-success btn-sm">تاكيد</button>
                                            <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">اغلاق</button>
                                        </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <!-- end edit model -->
                            <!--  img- show -->
                            <div class="modal fade" id="img_show{{$setting->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-body">
                                            <center><img src="../uploads/logo/{{$setting->logo}}" width="400px" class="rounded-circle"></center>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- img show -->
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