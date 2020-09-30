@extends('admin.layout.layout')
@section('title', 'Users Manage')
@section('content')
<div class="row">
    <ol class="breadcrumb">
        <li><a href="{{route('admin.home')}}">
            <em class="fa fa-home"></em>
        </a></li>
        <li class="active">@lang('custom.page_title.user')</li>
    </ol>
</div>
<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">@lang('custom.page_title.user_manager')</h1>
    </div>
</div>
<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-default">
            <div class="panel-heading">@lang('custom.page_title.data_table')</div>
            <div class="panel-body">
                <div class="bootstrap-table">
                    <div class="fixed-table-toolbar">
                        <div class="pull-right search" style="display: flex">
                            <input class="form-control" style="margin-right: 15px" type="text" id="input-search" placeholder="@lang('custom.placeholder.search')">
                            <button type="button" id="btn-search" class="btn btn-primary" style="margin: 0px"><span class="fa fa-search"></span> @lang('custom.button.search')</button>
                        </div>
                    </div>
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
                                        <div class="th-inner">@lang('custom.status')</div>
                                    </th>
                                    <th>
                                        <div class="th-inner text-center">@lang('custom.action')</div>
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
                                    <td><span class="label {{($item->user_job->count() > 0) ? 'label-info' : 'label-primary' }}">{{($item->user_job->count() > 0) ? trans('custom.apply') : trans('custom.no_apply')}}</span></td>
                                    <td class="text-center">
                                        <a href="{{route('users.show', $item['id'])}}" class="btn btn-primary text-light view-profile"><em class="fa fa-eye"></em></a>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <div class="fixed-table-pagination">
                            <div class="pull-right pagination">
                                {{$users->links()}}
                            </div>
                        </div>
                        </div>
                    </div>
                </div>
                <div class="clearfix"></div>
                <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered modal-md" role="document">
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
    <script>
        $("#btn-search").on('click', function() {
            let value = $('#input-search').val();
            let keyword = value.trim();
            $.ajax({
                url: "{{ route('user.search') }}",
                data: {
                    'keyword': keyword
                },
                method: "POST",
            }).done(function(results) {
                $(".fixed-table-body").html(results);
            });
        });

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