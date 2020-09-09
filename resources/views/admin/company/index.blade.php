@extends('admin.layout.layout')
@section('title', trans('custom.page_title.company_manage'))
@section('content')
<div class="row">
    <ol class="breadcrumb">
        <li><a href="{{route('admin.home')}}">
            <em class="fa fa-home"></em>
        </a></li>
        <li class="active">@lang('custom.page_title.company_manage')</li>
    </ol>
</div>
<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">@lang('custom.page_title.company_manage')</h1>
    </div>
</div>
<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-default">
            <div class="panel-heading">@lang('custom.page_title.data_table')</div>
            <div class="panel-body">
                <div class="bootstrap-table">
                    <div class="fixed-table-toolbar">
                        <a href="{{route('companies.create')}}" class="btn btn-primary"><span class="fa fa-plus"></span> @lang('custom.button.add')</a>
                    </div>
                    <div class="fixed-table-container">
                        <div class="fixed-table-body">
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th>
                                            <div class="th-inner sortable">@lang('custom.page_title.company_manage')</div>
                                            <div class="fht-cell"></div>
                                        </th>
                                        <th>
                                            <div class="th-inner sortable text-center"><a href="{{route('companies.edit', $company['id'])}}" class="btn btn-primary text-light btn-edit-form"><em class="far fa-edit"></em> Edit</a> </div>
                                            <div class="fht-cell"></div>
                                        </th>
                                    </tr>
                                </thead>
                                <tbody class="table-list-role">
                                    <tr>
                                        <td>@lang('custom.name')</td>
                                        <td colspan="2">{{$company->name}}</td>
                                    </tr>
                                    <tr>
                                        <td>@lang('custom.logo')</td>
                                        <td colspan="2"><img src="{{$company->logo}}" alt="" style="width: 150px" /></td>
                                    </tr>
                                    <tr>
                                        <td>@lang('custom.description')</td>
                                        <td colspan="2">{{$company->description}}</td>
                                    </tr>
                                    <tr>
                                        <td>@lang('custom.phone')</td>
                                        <td colspan="2">{{$company->email}}</td>
                                    </tr>
                                    <tr>
                                        <td>@lang('custom.phone')</td>
                                        <td colspan="2">{{$company->phone}}</td>
                                    </tr>
                                    <tr>
                                        <td>@lang('custom.address')</td>
                                        <td colspan="2">{{$company->address}}</td>
                                    </tr>
                                    <tr>
                                        <td>@lang('custom.address')</td>
                                        <td colspan="2">{{$company->facebook_page}}</td>
                                    </tr>
                                    <tr>
                                        <td>@lang('custom.address')</td>
                                        <td colspan="2">{{$company->youtube_page}}</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="clearfix"></div>
            </div>
        </div>
    </div>
</div>
@endsection
