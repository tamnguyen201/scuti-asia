@extends('admin.layout.layout')
@section('content')
<div class="row">
    <ol class="breadcrumb">
        <li><a href="#">
            <em class="fa fa-home"></em>
        </a></li>
        <li class="active">Roles</li>
    </ol>
</div>
<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">Roles Manage</h1>
    </div>
</div>
<div class="col-lg-12">
    <div class="panel panel-default">
       <div class="panel-heading">Data Table</div>
       <div class="panel-body">
            <div class="bootstrap-table">
                <div class="fixed-table-toolbar">
                    <div class="columns btn-group pull-right">
                    <button class="btn btn-default" type="button" name="refresh" title="Refresh"><i class="glyphicon glyphicon-refresh icon-refresh"></i></button><button class="btn btn-default" type="button" name="toggle" title="Toggle"><i class="glyphicon glyphicon glyphicon-list-alt icon-list-alt"></i></button>
                    <div class="keep-open btn-group" title="Columns">
                        <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown"><i class="glyphicon glyphicon-th icon-th"></i> <span class="caret"></span></button>
                        <ul class="dropdown-menu" role="menu">
                            <li><label><input type="checkbox" data-field="id" value="1" checked="checked"> Item ID</label></li>
                            <li><label><input type="checkbox" data-field="name" value="2" checked="checked"> Item Name</label></li>
                            <li><label><input type="checkbox" data-field="price" value="3" checked="checked"> Item Price</label></li>
                        </ul>
                    </div>
                    </div>
                    <div class="pull-right search"><input class="form-control" type="text" placeholder="Search"></div>
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
                                <div class="th-inner sortable">Item Name<span class="order"><span class="caret" style="margin: 10px 5px;"></span></span></div>
                                <div class="fht-cell"></div>
                                </th>
                                <th style="">
                                <div class="th-inner sortable">Item Price</div>
                                <div class="fht-cell"></div>
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($roles as $item)
                            <tr data-index="0">
                                <td class="bs-checkbox"><input data-index="0" name="toolbar1" type="checkbox"></td>
                                <td>{{$item->id}}</td>
                                <td>{{$item->name}}</td>
                                <td class="text-center">
                                    <a href="{!! URL::route('admin.users.edit', $item['id']) !!}" class="btn btn-primary text-light"><em class="far fa-edit"></em></a> 
                                    <form action="{!! URL::route('admin.users.delete', $item['id']) !!}" method="post">
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
                        {{$roles->links()}}
                    </div>
                    </div>
                </div>
            </div>
          <div class="clearfix"></div>
       </div>
    </div>
 </div>
@endsection