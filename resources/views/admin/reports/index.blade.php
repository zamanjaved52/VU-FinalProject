@extends('layouts.app')
@section('title','Add Report')
@section('user_nav', 'active')
@section('style')
    <link href="{{ asset(env('ASSET_URL') .'css/toastr.min.css')}}" rel="stylesheet" />
    <link rel="stylesheet" href="{{ asset(env('ASSET_URL') .'plugins/summernote/summernote-bs4.css')}}">
    <link rel="stylesheet" href="{{ asset(env('ASSET_URL') .'plugins/summernote/summernote-bs4.css')}}">
    <link href="{{ asset(env('ASSET_URL') .'assets/plugins/datatable/css/jquery.dataTables.min.css')}}" rel="stylesheet">
    <link href="{{ asset(env('ASSET_URL') .'assets/plugins/datatable/css/responsive.dataTables.min.css')}}" rel="stylesheet">
@endsection
@section('content')
    <div class="container-fluid">
        <!-- breadcrumb -->
        <div class="breadcrumb-header justify-content-between">
            <div class="my-auto">
                <div class="d-flex">
                    <h4 class="content-title mb-0 my-auto">Dashboard</h4><span class="text-muted mt-1 tx-13 ml-2 mb-0">/ Report</span>
                </div>
            </div>
        </div>
        <!-- breadcrumb -->
        <!-- row -->
        <div class="row row-sm">
            <div class="col-lg-12 col-xl-12 col-md-12 col-sm-12">
                <div class="card  box-shadow-0">
                    <div class="card-header">
                        <h4 class="card-title mb-1">ADD Report</h4>
                    </div>
                    <div class="card-body pt-0">
                        <form class="form-horizontal needs-validation" method="post" action="{{ isset($report) ? route('reports.update',$report->id) : route('reports.store') }}" enctype="multipart/form-data">
                            @csrf
                            @if (isset($report))
                                @method('PUT')
                            @endif
                            <div class="row">
                                <div class="col-4">
                                    <div class="form-group">
                                        <p class="mg-b-10">Name</p>
                                        <input type="text" class="form-control {{ $errors->has('title') ? ' is-invalid' : '' }}" name="title" value="{{ isset($report) ? $report->title : '' }}" id="title" placeholder="Title">
                                        @if($errors->has('title'))
                                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('title') }}</strong>
                                    </span>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="form-group mb-0 justify-content-end mt-2">
                                <p class="mg-b-10">Detail</p>
                                <textarea class="form-control textarea1 {{ $errors->has('detail') ? ' is-invalid' : '' }}" name="detail">{{ isset($report) ? $report->detail : '' }}</textarea>
                                @if($errors->has('detail'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('detail') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <div class="form-group mb-0 mt-3 justify-content-end">
                                <div>
                                    <button type="submit" class="btn btn-danger">{{ isset($report) ? 'Update Now' : 'Save Now' }}</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-lg-12 col-xl-12 col-md-12 col-sm-12">
                <div class="col-xl-12">
                    <div class="card">
                        <div class="card-header pb-0">
                            <div class="d-flex justify-content-between">
                                <h4 class="card-title mg-b-0">Report LIST</h4>
                                <i class="mdi mdi-dots-horizontal text-gray"></i>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table mg-b-0 text-md-nowrap  myTable">
                                    <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>NAME</th>
                                        <th>DETAIL</th>
                                        <th>ACTION</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($reports as $index => $report)
                                        <tr>
                                            <th scope="row">{{++$index}}</th>
                                            <td>{{$report->title}}</td>
                                            <td>{{$report->detail}}</td>
                                            <td><a class="btn btn-sm btn-info" href="{{route('reports.edit',$report->id)}}"><i class="fa fa-edit"></i></a>
                                                <a class="btn btn-sm btn-warning"  href="javascript:void(0);" onclick="$(this).find('form').submit();"><i class="fa fa-trash"></i>
                                                    <form action="{{ route('reports.destroy', $report->id) }}"
                                                          method="post"
                                                          onsubmit="return confirm('Do you really want to delete this?');">
                                                        @csrf
                                                        @method('delete')
                                                    </form>
                                                </a></td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('script')

    <!-- Internal form-elements js -->
    <script src="{{ asset(env('ASSET_URL') .'assets/plugins/datatable/js/jquery.dataTables.min.js')}}"></script>
    <script src="{{ asset(env('ASSET_URL') .'assets/plugins/datatable/js/dataTables.dataTables.min.js')}}"></script>
    <script src="{{ asset(env('ASSET_URL') .'assets/plugins/datatable/js/dataTables.responsive.min.js')}}"></script>
    <script src="{{ asset(env('ASSET_URL') .'assets/plugins/datatable/js/responsive.dataTables.min.js')}}"></script>
    <script src="{{ asset(env('ASSET_URL') .'assets/plugins/datatable/js/jquery.dataTables.js')}}"></script>
    <script src="{{ asset(env('ASSET_URL') .'assets/plugins/datatable/js/dataTables.bootstrap4.js')}}"></script>
    <script src="{{ asset(env('ASSET_URL') .'assets/plugins/datatable/js/dataTables.buttons.min.js')}}"></script>
    <script src="{{ asset(env('ASSET_URL') .'assets/plugins/datatable/js/buttons.bootstrap4.min.js')}}"></script>
    <script src="{{ asset(env('ASSET_URL') .'assets/plugins/datatable/js/jszip.min.js')}}"></script>
    <script src="{{ asset(env('ASSET_URL') .'assets/plugins/datatable/js/pdfmake.min.js')}}"></script>
    <script src="{{ asset(env('ASSET_URL') .'assets/plugins/datatable/js/vfs_fonts.js')}}"></script>
    <script src="{{ asset(env('ASSET_URL') .'assets/plugins/datatable/js/buttons.html5.min.js')}}"></script>
    <script src="{{ asset(env('ASSET_URL') .'assets/plugins/datatable/js/buttons.print.min.js')}}"></script>
    <script src="{{ asset(env('ASSET_URL') .'assets/plugins/datatable/js/buttons.colVis.min.js')}}"></script>
    <script src="{{ asset(env('ASSET_URL') .'assets/plugins/datatable/js/dataTables.responsive.min.js')}}"></script>
    <script src="{{ asset(env('ASSET_URL') .'assets/plugins/datatable/js/responsive.bootstrap4.min.js')}}"></script>
    <script src="{{ asset(env('ASSET_URL') .'assets/js/form-elements.js')}}"></script>
    <script src="{{ asset(env('ASSET_URL') .'js/toastr.min.js')}}"></script>
    <script type="text/javascript">
        @if (Session::has('success'))
        toastr.success("{{Session::get('success')}}");
        @endif
    </script>
    <script src="{{ asset(env('ASSET_URL') .'plugins/summernote/summernote-bs4.min.js')}}"></script>
    <script>
        $(function () {
            // Summernote
            $('.textarea1').summernote({
                placeholder: 'Description',
                tabsize: 4,
                height: 150,
                toolbar: [
                    ['style', ['style']],
                    ['font', ['bold', 'underline', 'clear']],
                    ['color', ['color']],
                    ['para', ['ul', 'ol', 'paragraph']],
                    ['table', ['table']],
                    ['insert', ['link']],
                    ['view', ['fullscreen', 'codeview']]
                ]
            });
            $('.textarea2').summernote({
                placeholder: 'CONTACT US',
                tabsize: 4,
                height: 150,
                toolbar: [
                    ['style', ['style']],
                    ['font', ['bold', 'underline', 'clear']],
                    ['color', ['color']],
                    ['para', ['ul', 'ol', 'paragraph']],
                    ['table', ['table']],
                    ['insert', ['link']],
                    ['view', ['fullscreen', 'codeview']]
                ]
            });
            $('.textarea3').summernote({
                placeholder: 'PRIVACY POLICY ',
                tabsize: 4,
                height: 150,
                toolbar: [
                    ['style', ['style']],
                    ['font', ['bold', 'underline', 'clear']],
                    ['color', ['color']],
                    ['para', ['ul', 'ol', 'paragraph']],
                    ['table', ['table']],
                    ['insert', ['link']],
                    ['view', ['fullscreen', 'codeview']]
                ]
            });
        });
    </script>
    <script>
        $(document).ready( function () {
            $('.myTable').DataTable();
        } );
    </script>
@endsection
