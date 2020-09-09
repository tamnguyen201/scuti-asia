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
                                    <div class="th-inner sortable">@lang('custom.stt')</div>
                                    <div class="fht-cell"></div>
                                    </th>
                                    <th>
                                        <div class="th-inner sortable">@lang('custom.name')</div>
                                        <div class="fht-cell"></div>
                                    </th>
                                    <th>
                                        <div class="th-inner sortable">@lang('custom.email')</div>
                                        <div class="fht-cell"></div>
                                    </th>
                                    <th>
                                        <div class="th-inner sortable">@lang('custom.visit_type')</div>
                                        <div class="fht-cell"></div>
                                    </th>
                                    <th>
                                        <div class="th-inner sortable text-center">@lang('custom.action')</div>
                                        <div class="fht-cell"></div>
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
                                    <td class="text-center">
                                        <a href="{{route('contacts.show', $item['id'])}}" class="btn btn-primary text-light btn-edit-form"><em class="far fa-eye"></em></a> 
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
            </div>
        </div>
    </div>
</div>
@endsection
