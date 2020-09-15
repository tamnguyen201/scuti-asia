@extends('admin.layout.layout')
@section('title', trans('custom.page_title.employee_manage'))
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
                            <a href="{{route('main-member.create')}}" class="btn btn-primary"><span class="fa fa-plus"></span> @lang('custom.button.add')</a>
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
                                                <div class="th-inner">@lang('custom.image_url')</div>
                                            </th>
                                            <th>
                                                <div class="th-inner">@lang('custom.role')</div>
                                            </th>
                                            <th>
                                                <div class="th-inner text-center">@lang('custom.action')</div>
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php $stt = 1; @endphp
                                        @foreach($members as $item)
                                        <tr>
                                            <td>{{$stt++}}</td>
                                            <td>{{$item->name}}</td>
                                            <td><img class="img-responsive" src="{{$item->avatar}}" alt="" style="width: 100px"></td>
                                            <td>{{$item->position}}</td>
                                            <td class="text-center">
                                                <a href="{{route('main-member.show', $item->id)}}" class="btn btn-primary text-light view-profile"><em class="fa fa-eye"></em></a>
                                                @if(Auth::guard('admin')->user()->role == config('common.role.Admin'))
                                                <a href="{{route('main-member.edit', $item->id)}}" class="btn btn-primary text-light"><em class="far fa-edit"></em></a> 
                                                <form action="{{route('main-member.destroy', $item->id)}}" method="post" class="form-delete-{{$item->id}}" style="display: inline">
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
                                        {{$members->links()}}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                <div class="clearfix"></div>
                <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLongTitle">@lang('custom.page_title.profile')</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                        </div>
                        <div class="modal-body"></div>
                        <div class="modal-footer" style="border-top: none">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">@lang('custom.button.close')</button>
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
    <script>
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
    </script>
@endsection