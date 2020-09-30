@extends('admin.layout.layout')
@section('title', trans('custom.page_title.employee_manage'))
@section('css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/switchery/0.8.2/switchery.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
    <link rel="stylesheet" href="{{ asset('adminAsset/css/job.css') }}">
@endsection
@section('content')
<div class="row">
    <ol class="breadcrumb">
        <li><a href="{{route('admin.home')}}">
            <em class="fa fa-home"></em>
        </a></li>
        <li class="active">@lang('custom.page_title.employee_manage')</li>
    </ol>
</div>
<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">@lang('custom.page_title.employee_manage')</h1>
    </div>
</div>
<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-default">
            <div class="panel-heading">@lang('custom.page_title.data_table')</div>
            <div class="panel-body">
                    <div class="bootstrap-table">
                        @if(Auth::guard('admin')->user()->role == config('common.role.Admin'))
                        <div class="fixed-table-toolbar">
                            <a href="{{route('employees.create')}}" class="btn btn-primary"><span class="fa fa-plus"></span> @lang('custom.button.add')</a>
                        </div>
                        @endif
                        <div class="fixed-table-container">
                            <div class="fixed-table-body">
                                <table class="table table-hover">
                                    <thead>
                                        <tr>
                                            <th>
                                                <div class="th-inner">@lang('custom.stt')</div>
                                            </th>
                                            <th>
                                                <div class="th-inner">@lang('custom.name')</div>
                                            </th>
                                            <th>
                                                <div class="th-inner">@lang('custom.email')</div>
                                            </th>
                                            <th>
                                                <div class="th-inner">@lang('custom.role')</div>
                                            </th>
                                            @if(Auth::guard('admin')->user()->role == config('common.role.Admin'))
                                            <th>
                                                <div class="th-inner">@lang('custom.status') </div>
                                            </th>
                                            @endif
                                            <th>
                                                <div class="th-inner text-center">@lang('custom.action')</div>
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php $stt = 1; @endphp
                                        @foreach($employees as $item)
                                        <tr>
                                            <td>{{$stt++}}</td>
                                            <td>{{$item->name}}</td>
                                            <td>{{$item->email}}</td>
                                            <td>
                                                <span @if ($item->role)
                                                @switch($item->role)
                                                    @case(0)
                                                    class="label label-primary"
                                                    @break
                                                    @case(1)
                                                    class="label label-success"
                                                    @break
                                                    @case(2)
                                                    class="label label-warning"
                                                    @break
                                                    @case(3)
                                                    class="label label-info"
                                                    @break
                                                @endswitch
                                                @endif>
                                                {{ $item->roleName() }}

                                                </span>
                                            </td>
                                            @if(Auth::guard('admin')->user()->role == config('common.role.Admin'))
                                            <td>
                                                <input type="checkbox" data-id="{{ $item->id }}" name="status" class="js-switch" {{ $item->status == 1 ? 'checked' : '' }}>
                                            </td>
                                            @endif
                                            <td class="text-center">
                                                <a href="{{route('employees.show', $item->id)}}" class="btn btn-primary text-light view-profile"><em class="fa fa-eye"></em></a>
                                                @if(Auth::guard('admin')->user()->role == config('common.role.Admin'))
                                                <a href="{{route('employees.edit', $item->id)}}" class="btn btn-primary text-light"><em class="far fa-edit"></em></a> 
                                                <form action="{{route('employees.destroy', $item->id)}}" method="post" class="form-delete-{{$item->id}}" style="display: inline">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button class="btn btn-danger text-light delete-confirm" idDelete={{$item->id}}><em class="fas fa-trash-alt"></em></button>
                                                </form>
                                                @endif
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                                <div class="fixed-table-pagination">
                                    <div class="pull-right pagination">
                                        {{$employees->links()}}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                <div class="clearfix"></div>
                <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered" style="max-width: 40rem;" role="document">
                    <div class="modal-content">
                        <div class="modal-header" style="display: flex">
                        <h3 class="modal-title" id="exampleModalLongTitle" style="margin: auto;width: 22rem;">@lang('custom.page_title.profile')</h3>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                        </div>
                        <div class="modal-body"></div>
                        <div class="modal-footer" style="border-top: none">
                        </div>
                    </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('script')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/switchery/0.8.2/switchery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
    <script>
        let elems = Array.prototype.slice.call(document.querySelectorAll('.js-switch'));
        elems.forEach(function(html) {
            let switchery = new Switchery(html,  { size: 'small' });
        });

        $('.view-profile').on('click', function (event) {
            event.preventDefault();
            let url = $(this).attr('href');
            $.get(url).
            done(function (results) {
                $(".modal-body").html(results);
                $("#exampleModalCenter").modal('show');
            }).fail(function (data) {
            });
        });

        @if(Auth::guard('admin')->user()->role == config('common.role.Admin'))
        $(document).ready(function(){
            $('.js-switch').change(function () {
                let status = $(this).prop('checked') === true ? 1 : 0;
                let admin_id = $(this).data('id');
                $.ajax({
                    type: "GET",
                    dataType: "json",
                    url: "{{ route('admin.update.status') }}",
                    data: {'status': status, 'admin_id': admin_id},
                    success: function (data) {
                        toastr.options.closeButton = true;
                        toastr.options.closeMethod = 'fadeOut';
                        toastr.options.closeDuration = 100;
                        toastr.success(data.success);
                    }
                });
            });
        });
        
        $('.delete-confirm').on('click', function (event) {
            event.preventDefault();
            let id = $(this).attr('idDelete');
            let form = $('.form-delete-'+id);
            swal({
                title: "Xác nhận xóa?",
                text: "Bản ghi này sẽ không thể khôi phục!",
                type: "warning",
                showCancelButton: true,
                confirmButtonColor: '#DD6B55',
                confirmButtonText: 'Đồng Ý!',
                cancelButtonText: "Hủy!",
                closeOnConfirm: false,
                closeOnCancel: false
            }).then(function(value) {
                if (value.value == true) {
                    form.submit();
                }
            });
        });
        @endif
    </script>
@endsection