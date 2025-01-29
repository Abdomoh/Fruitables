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
                <h4 class="content-title mb-0 my-auto">المنتجات </h4><span class="text-muted mt-1 tx-13 mr-2 mb-0">/ ااضافة
                    منتج</span>
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
                        <button type="button" class="btn btn-success" data-toggle="modal" data-target="#exampleModal"><i
                                class="fas fa-plus"></i>&nbsp;اضافة صنف </button><br><br>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="example1" class="table key-buttons text-md-nowrap" data-page-length='5'>
                            <thead>
                                <tr>
                                    <th class="border-bottom-0">#</th>
                                    <th class="border-bottom-0">الاسم</th>
                                    <th class="border-bottom-0">الاسم بالعربي</th>
                                    <th class="border-bottom-0">الوصف </th>
                                    <th class="border-bottom-0">الوصف بالعربي</th>
                                    <th class="border-bottom-0">السعر </th>
                                    <th class="border-bottom-0">الكمية </th>
                                    <th class="border-bottom-0">الوصورة</th>
                                    <th class="border-bottom-0"></th>
                                    <th class="border-bottom-0"></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($products as $product)
                                    <tr>
                                        <td>{{ $product->id }}</td>
                                        <td>{{ $product->name }}</td>
                                        <td>{{ $product->name_ar }}</td>
                                        <td>{{ $product->description }}</td>
                                        <td>{{ $product->description_ar }}</td>
                                        <td>{{ $product->price }}</td>
                                        <td>{{ $product->quentity }}</td>
                                        <td data-toggle="modal" data-target="#img_show{{ $product->id }}"><img
                                                src="../uploads/products/{{ $product->image }}" width="40px"
                                                class="rounded-circle">
                                        </td>
                                        <td><button type="button" class="btn btn-primary btn-sm" data-toggle="modal"
                                                data-target="#edit{{ $product->id }}" title="">
                                                <i class="fa fa-edit"></i></button></td>
                                        <td>
                                            <button type="button" class="btn btn-danger btn-sm" data-toggle="modal"
                                                data-target="#delete{{ $product->id }}" title="">
                                                <i class="fa fa-trash"></i></button>
                                        </td>
                                    </tr>
                                    <!--  edit model -->
                                    <div class="modal fade" id="edit{{ $product->id }}" tabindex="-1" role="dialog"
                                        aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 style="font-family: 'Cairo', sans-serif;" class="modal-title"
                                                        id="exampleModalLabel">
                                                        تعديل البيانات
                                                    </h5>
                                                    <button type="button" class="close" data-dismiss="modal"
                                                        aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>

                                                <form action="{{ route('products.update', $product->id) }}"
                                                    method="POST" enctype="multipart/form-data">
                                                    @csrf
                                                    {{ method_field('PUT') }}
                                                    <div class="modal-body">
                                                        <div class="row">
                                                            <div class="form-group col-xl-6">
                                                                <label class="control-label">الاسم بالعربي</label>
                                                                <input type="text" name="name_ar"
                                                                    value="{{ $product->name_ar }}" class="form-control" />
                                                                <input id="id" type="hidden" name="id"
                                                                    class="form-control" value="{{ $product->id }}" />
                                                            </div>
                                                            <div class="form-group col-xl-6">
                                                                <label class="control-label">الاسم بالانجلزي</label>
                                                                <input type="text" name="name"
                                                                    value="{{ $product->name }}" class="form-control" />
                                                                <input id="id" type="hidden" name="id"
                                                                    class="form-control" value="{{ $product->id }}" />
                                                            </div>
                                                            <div class="form-group col-xl-6">
                                                                <select name="category_id" class="form-control">
                                                                    <option value="" selected disabled>اختر الصنف
                                                                    </option>
                                                                    @foreach ($categories as $category)
                                                                        <option value="{{ $category->id }}"
                                                                            {{ $product->category_id == $category->id ? 'selected' : '' }}>
                                                                            {{ $category->name }}
                                                                        </option>
                                                                    @endforeach
                                                                </select>
                                                            </div>
                                                            <div class="form-group col-xl-6">
                                                                <label class="control-label"> سعر المنتج </label>
                                                                <input type="number" name="price"
                                                                    value="{{ $product->price }}" class="form-control" />
                                                                <input id="id" type="hidden" name="id"
                                                                    class="form-control" value="{{ $product->id }}" />
                                                            </div>
                                                            <div class="form-group col-xl-6">
                                                                <label class="control-label"> الكمية </label>
                                                                <input type="number" name="quentity"
                                                                    value="{{ $product->quentity }}"
                                                                    class="form-control" />
                                                                <input id="id" type="hidden" name="id"
                                                                    class="form-control" value="{{ $product->id }}" />
                                                            </div>
                                                            <div class="form-group col-xl-6">
                                                                <label for="exampleFormControlTextarea1">صورة</label>
                                                                <input type="file" name="image"
                                                                    value="{{ $product->image }}" class="form-control" />
                                                                <input id="id" type="hidden" name="id"
                                                                    class="form-control" value="{{ $product->id }}" />
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="control-label"> الوصف بالعربي</label>
                                                            <textarea type="text" name="description_ar" class="form-control">{{ $product->description_ar }}</textarea>
                                                            <input id="id" type="hidden" name="id"
                                                                class="form-control" value="{{ $product->id }}" />
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="control-label"> الوصف بالانجليزي</label>
                                                            <textarea type="text" name="description" class="form-control">{{ $product->description }}</textarea>
                                                            <input id="id" type="hidden" name="id"
                                                                class="form-control" value="{{ $product->id }}" />
                                                        </div>


                                                    <div class="modal-footer "  dir="rtl">
                                                        <button type="submit" name="submit"
                                                            class="btn btn-success btn-sm ">تعديل</button>
                                                        <button type="button" class="btn btn-secondary btn-sm"
                                                            data-dismiss="modal">اغلاق</button>
                                                    </div>
                                                </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- end edit model -->
                                    <!--  img- show -->
                                    <div class="modal fade" id="img_show{{ $product->id }}" tabindex="-1"
                                        role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-body">
                                                    <center><img src="../uploads/product/{{ $product->image }}"
                                                            width="400px" class="rounded-circle"></center>
                                                </div>
                                            </div>
                                        </div>
                                    </div>



                                    <!-- img show -->
                                    <!-- Deleted -->
                                    <div class="modal fade" id="delete{{ $product->id }}" tabindex="-1"
                                        role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 style="font-family: 'Cairo', sans-serif;" class="modal-title"
                                                        id="exampleModalLabel">
                                                        حذف بيانات الصنف
                                                    </h5>
                                                    <button type="button" class="close" data-dismiss="modal"
                                                        aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <form action="{{ route('products.destroy', $product->id) }}"
                                                        method="post">
                                                        {{ method_field('Delete') }}
                                                        @csrf
                                                        هل تريد حذف بيانالمنتجات ؟!
                                                        <input id="id" type="hidden" name="id"
                                                            class="form-control" value="{{ $product->id }}">
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary"
                                                                data-dismiss="modal">اغلاق</button>
                                                            <button type="submit" class="btn btn-danger">حذف
                                                                البيانات</button>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <!-- add -->
            <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">اضافة منتج </h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <form action="{{ route('products.store') }}" method="post" enctype="multipart/form-data"
                            autocomplete="">
                            {{ csrf_field() }}
                            <div class="modal-body">
                                <div class="row">
                                    <div class="form-group col-xl-6">
                                        <label class="control-label">الاسم بالانجليزي</label>
                                        <input type="text" name="name" value="{{ old('name') }}"
                                            class="form-control" />
                                        @error('name')
                                            <span class="form-text text-danger">{{ $message }}</s>
                                            @enderror
                                    </div>

                                    <div class="form-group col-xl-6">
                                        <label class="control-label">الاسم بالعربي</label>
                                        <input type="text" name="name_ar" value="{{ old('name_ar') }}"
                                            class="form-control" />
                                        @error('name_ar')
                                            <span class="form-text text-danger">{{ $message }}</s>
                                            @enderror
                                    </div>



                                    <div class="form-group col-xl-6">
                                        <label class="control-label">الصنف </label>
                                        <select name="category_id" class="form-control">
                                            <option value="">اختر الصنف</option>
                                            @foreach ($categories as $category)
                                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                                            @endforeach


                                        </select>

                                    </div>
                                    <div class="form-group col-xl-6">
                                        <label class="control-label">السعر </label>
                                        <input type="" name="price" value="{{ old('price') }}"
                                            class="form-control" />
                                        @error('price')
                                            <span class="form-text text-danger">{{ $message }}</s>
                                            @enderror
                                    </div>
                                    <div class="form-group col-xl-6">
                                        <label class="control-label">الكمية </label>
                                        <input type="number" name="quentity" value="{{ old('quentity') }}"
                                            class="form-control" />
                                        @error('quentity')
                                            <span class="form-text text-danger">{{ $message }}</s>
                                            @enderror
                                    </div>
                                    <div class="form-group col-xl-6">
                                        <label for="exampleFormControlTextarea1">صورة المنتج</label>
                                        <input type="file" name="image" value="" class="form-control" />
                                        @error('image')
                                            <span class="form-text text-danger">{{ $message }}</s>
                                            @enderror
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="control-label"> الوصف بالعربي</label>
                                    <textarea type="text" name="description_ar" class="form-control">{{ old('description_ar') }}</textarea>
                                    @error('description_ar')
                                        <span class="from-text text-danger">{{ $message }}</span>
                                    @enderror

                                </div>
                                <div class="form-group">
                                    <label class="control-label"> الوصف بالانجليزي</label>
                                    <textarea type="text" name="description" class="form-control">{{ old('description') }}</textarea>
                                    @error('description')
                                        <span class="from-text text-danger">{{ $message }}</span>
                                    @enderror

                                </div>



                                <div class="modal-footer">
                                    <button type="submit" class="btn btn-success btn-sm">اضافة</button>
                                    <button type="button" class="btn btn-secondary btn-sm"
                                        data-dismiss="modal">اغلاق</button>
                                </div>
                            </div>

                        </form>
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
