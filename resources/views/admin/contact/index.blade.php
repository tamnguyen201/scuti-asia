@extends('admin.layout.layout')
@section('title', trans('custom.page_title.contact_manage'))
@section('content')
<div class="row">
    <ol class="breadcrumb">
        <li><a href="{{route('admin.home')}}">
            <em class="fa fa-home"></em>
        </a></li>
        <li class="active">@lang('custom.page_title.contact_manage')</li>
    </ol>
</div>
<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">@lang('custom.page_title.contact_manage')</h1>
    </div>
</div>
<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-default">
            <div class="panel-heading">@lang('custom.page_title.data_table')</div>
            <div class="panel-body">
                <div class="bootstrap-table">
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
                                        <div class="th-inner">@lang('custom.visit_type')</div>
                                    </th>
                                    <th>
                                        <div class="th-inner">@lang('custom.status')</div>
                                    </th>
                                    <th>
                                        <div class="th-inner text-center">@lang('custom.action')</div>
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @php $stt = 1; @endphp
                                @foreach($contacts as $item)
                                <tr>
                                    <td>{{$stt++}}</td>
                                    <td>{{$item->name}}</td>
                                    <td>{{$item->email}}</td>
                                    <td>{{$item->type}}</td>
                                    <td><span class="label {{($item->status == 1) ? 'label-success' : 'label-primary'}}">{{($item->status == 1) ? 'Đã Xác Nhận' : 'Chưa Xác Nhận'}}</span></td>
                                    <td class="text-center">
                                        <a href="{{route('contacts.show', $item['id'])}}" class="btn btn-primary text-light view-profile"><em class="far fa-eye"></em></a>
                                        @if($item->status == 0)
                                        <form action="{{route('contacts.update', $item->id)}}" method="post" class="form-update-{{$item->id}}" style="display: inline">
                                            @csrf
                                            @method('PUT')
                                            <button class="btn btn-success text-light update-confirm" idUpdate={{$item->id}}>@lang('custom.button.confirm')</button>
                                        </form>
                                        @endif
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <div class="fixed-table-pagination">
                            <div class="pull-right pagination">
                                {{$contacts->links()}}
                            </div>
                        </div>
                        </div>
                    </div>
                </div>
                <div class="clearfix"></div>
                <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered modal-md" style="max-width: 40rem;" role="document">
                    <div class="modal-content">
                        <div class="modal-header" style="display: flex">
                        <h3 class="modal-title" id="exampleModalLongTitle" style="margin: auto;width: 22rem;">@lang('custom.page_title.contact_manage')</h3>
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
        $('.update-confirm').on('click', function (event) {
            event.preventDefault();
            let id = $(this).attr('idUpdate');
            let form = $('.form-update-'+id);
            swal({
                title: "Xác nhận cập nhật?",
                text: "Bản ghi này sẽ được thay đổi trạng thái!",
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
