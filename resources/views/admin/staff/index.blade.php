@extends('admin.layout.layout')
@section('title', 'Roles Manage')
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
                    <button class="btn btn-success" style="float: right">Add New</button>
                </div>
                <div class="fixed-table-container">
                    <div class="fixed-table-header">
                    <table></table>
                    </div>
                    <div class="fixed-table-body">
                    <div class="fixed-table-loading" style="top: 37px; display: none;">Loading, please wait…</div>
                    <table data-toggle="table" data-url="tables/data1.json" data-show-refresh="true" data-show-toggle="true" data-show-columns="true" data-search="true" data-select-item-name="toolbar1" data-pagination="true" data-sort-name="name" data-sort-order="desc" class="table table-hover">
                        <thead>
                            <tr>
                                <th class="bs-checkbox " style="width: 36px; ">
                                <div class="th-inner "><input name="btSelectAll" type="checkbox"></div>
                                <div class="fht-cell"></div>
                                </th>
                                <th style="">
                                <div class="th-inner sortable">Item ID</div>
                                <div class="fht-cell"></div>
                                </th>
                                <th style="">
                                <div class="th-inner sortable">Employee Name<span class="order"><span class="caret" style="margin: 10px 5px;"></span></span></div>
                                <div class="fht-cell"></div>
                                </th>
                                <th style="">
                                <div class="th-inner sortable text-center">Action</div>
                                <div class="fht-cell"></div>
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($employees as $item)
                            <tr data-index="0">
                                <td class="bs-checkbox"><input data-index="0" name="toolbar1" type="checkbox"></td>
                                <td>{{$item->id}}</td>
                                <td>{{$item->name}}</td>
                                <td class="text-center">
                                    <a href="{!! URL::route('admin.roles.edit', $item['id']) !!}" class="btn btn-primary text-light"><em class="far fa-edit"></em></a> 
                                    <form action="{!! URL::route('admin.roles.delete', $item['id']) !!}" method="post">
                                        @csrf
                                        <button class="btn btn-danger text-light" onclick="return confirm('Bạn có muốn xóa không?')"><em class="fas fa-trash-alt"></em></button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    </div>
                    <div class="fixed-table-pagination">
                    <div class="pull-right pagination">
                        {{$employees->links()}}
                    </div>
                    </div>
                </div>
            </div>
          <div class="clearfix"></div>
       </div>
    </div>
 </div>
@endsection