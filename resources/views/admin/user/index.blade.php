@extends('admin.layout.layout')
@section('title', 'Users Manage')
@section('content')
<div class="row">
    <ol class="breadcrumb">
        <li><a href="#">
            <em class="fa fa-home"></em>
        </a></li>
        <li class="active">Users</li>
    </ol>
</div>
<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">Users Manage</h1>
    </div>
</div>
<div class="col-lg-12">
    <div class="panel panel-default">
        <div class="panel-heading">Data Table</div>
        <div class="panel-body">
            <div class="bootstrap-table">
                <div class="fixed-table-container">
                    <div class="fixed-table-header">
                    <table></table>
                    </div>
                    <div class="fixed-table-body">
                    <div class="fixed-table-loading" style="top: 37px; display: none;">Loading, please wait…</div>
                    <table data-toggle="table" data-url="tables/data1.json" data-show-refresh="true" data-show-toggle="true" data-show-columns="true" data-search="true" data-select-item-name="toolbar1" data-pagination="true" data-sort-name="name" data-sort-order="desc" class="table table-hover">
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
                                    <div class="th-inner sortable text-center">{{trans('custom.action')}}</div>
                                    <div class="fht-cell"></div>
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            @php $stt = 1; @endphp
                            @foreach($users as $item)
                            <tr>
                                <td>{{$stt++}}</td>
                                <td>{{$item->name}}</td>
                                <td>{{$item->email}}</td>
                                <td class="text-center">
                                    <a href="{{route('users.show', $item['id'])}}" class="btn btn-primary text-light view-profile"><em class="fa fa-eye"></em></a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    </div>
                    <div class="fixed-table-pagination">
                    <div class="pull-right pagination">
                        {{$users->links()}}
                    </div>
                    </div>
                </div>
            </div>
            <div class="clearfix"></div>
            <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered modal-md" role="document">
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
            $.get(url)
            .done(function (results) {
                $(".modal-body").html(results);
                $("#exampleModalCenter").modal('show');
            }).fail(function (data) {
                console.log(data);
            });
        });
    </script>
@endsection