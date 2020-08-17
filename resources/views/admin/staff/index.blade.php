@extends('admin.layout.layout')
@section('title', 'Employees Manage')
@section('content')
<div class="row">
    <ol class="breadcrumb">
        <li><a href="#">
            <em class="fa fa-home"></em>
        </a></li>
        <li class="active">Employees</li>
    </ol>
</div>
<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">Employees Manage</h1>
    </div>
</div>
<div class="col-lg-12">
    <div class="panel panel-default">
        <div class="panel-heading">Data Table</div>
        <div class="panel-body">
                <div class="bootstrap-table">
                    <div class="fixed-table-toolbar">
                        <a href="{{route('employees.create')}}" class="btn btn-primary" style="float: right"><span class="fa fa-plus"></span> Add New</a>
                    </div>
                    <div class="fixed-table-container">
                        <div class="fixed-table-body">
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th>
                                            <div class="th-inner sortable">{{trans('custom.stt')}}</div>
                                            <div class="fht-cell"></div>
                                        </th>
                                        <th>
                                            <div class="th-inner sortable">{{trans('custom.name')}}</div>
                                            <div class="fht-cell"></div>
                                        </th>
                                        <th>
                                            <div class="th-inner sortable">{{trans('custom.email')}}</div>
                                            <div class="fht-cell"></div>
                                        </th>
                                        <th>
                                            <div class="th-inner sortable">{{trans('custom.role')}}</div>
                                            <div class="fht-cell"></div>
                                        </th>
                                        <th>
                                            <div class="th-inner sortable text-center">{{trans('custom.action')}}</div>
                                            <div class="fht-cell"></div>
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php $stt = 1; @endphp
                                    @foreach($employees as $item)
                                    <tr>
                                        <td>{{$stt++}}</td>
                                        <td>{{$item->user->name}}</td>
                                        <td>{{$item->user->email}}</td>
                                        <td>{{$item->role->name}}</td>
                                        <td class="text-center">
                                            <a href="{{route('employees.show', $item->user->id)}}" class="btn btn-primary text-light view-profile"><em class="fa fa-eye"></em></a>
                                            <a href="{{route('employees.edit', $item->id)}}" class="btn btn-primary text-light"><em class="far fa-edit"></em></a> 
                                            <form action="{{route('employees.destroy', $item->user->id)}}" method="post" class="form-delete-{{$item->id}}" style="display: inline">
                                                @csrf
                                                @method('DELETE')
                                                <button class="btn btn-danger text-light delete-confirm" idDelete={{$item->id}}><em class="fas fa-trash-alt"></em></button>
                                            </form>
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
                <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">{{trans('custom.profile')}}</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    </div>
                    <div class="modal-body"></div>
                    <div class="modal-footer" style="border-top: none">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">{{trans('custom.cancel')}}</button>
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
                confirmButtonText: 'Yes, I am sure!',
                cancelButtonText: "Cancel!",
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