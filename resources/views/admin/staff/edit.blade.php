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
            <div class="panel-heading">@lang('custom.page_title.form')</div>
            <div class="panel-body">
                <div class="col-md-12">
                    <form role="form" action="{{route('employees.update',$manager->id)}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <input type="hidden" name="user_id" value="{{$manager->id}}">
                        <div class="col-md-9">
                            <div class="col-md-4">
                                <img src="{{asset($manager->avatar)}}" class="img-responsive" alt="">
                            </div>
                            <div class="col-md-8">
                                <table class="table table-hover">
                                    <tbody>
                                        <tr>
                                            <td>@lang('custom.name')</td>
                                            <td>{{$manager->name}}</td>
                                        </tr>
                                        <tr>
                                            <td>@lang('custom.email')</td>
                                            <td>{{$manager->email}}</td>
                                        </tr>
                                        <tr>
                                            <td>@lang('custom.phone')</td>
                                            <td>{{($manager->phone) ? $manager->phone : 'null'}}</td>
                                        </tr>
                                        <tr>
                                            <td>@lang('custom.address')</td>
                                            <td>{{($manager->address) ? $manager->address : 'null'}}</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label class="lable-required">@lang('custom.role')</label>
                                <select name="role" class="form-control">
                                    @foreach (config('common.role') as $key => $item)
                                        @if($item != config('common.role.User'))
                                            <option value="{{$item}}" @if($manager->role == $item) selected @endif>{{$key}}</option>
                                        @endif
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-md-12 text-center">
                            <button type="submit" class="btn btn-primary">@lang('custom.button.submit') <em class="fa fa-plus"></em></button>
                            <a href="{{route('employees.index')}}" class="btn btn-danger">@lang('custom.button.cancel')  <em class="fa fa-times"></em></a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
