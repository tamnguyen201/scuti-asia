@extends('admin.layout.layout')
@section('title', 'Add new employee')
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
        <div class="panel-heading">Forms</div>
        <div class="panel-body">
            <div class="col-md-12">
                <form role="form" action="{{route('employees.update',$manager->id)}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <input type="hidden" name="user_id" value="{{$manager->user_id}}">
                    <div class="col-md-9">
                        <div class="col-md-4">
                            <img src="{{asset($manager->avatar)}}" class="img-responsive" alt="">
                        </div>
                        <div class="col-md-8">
                            <table class="table table-hover">
                                <tbody>
                                    <tr>
                                        <td>@lang('custom.name')</td>
                                        <td>{{$manager->user->name}}</td>
                                    </tr>
                                    <tr>
                                        <td>@lang('custom.email')</td>
                                        <td>{{$manager->user->email}}</td>
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
                            <label>@lang('custom.role')</label>
                            <select name="role_id" class="form-control">
                                @foreach ($roles as $item)
                                <option value="{{$item->id}}" @if($manager->role_id == $item->id) selected @endif>{{$item->name}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-md-12 text-center">
                        <button type="submit" class="btn btn-primary">@lang('custom.button.submit')</button>
                        <button type="reset" class="btn btn-default">@lang('custom.button.reset')</button>
                        <a href="{{route('employees.index')}}" class="btn btn-danger">@lang('custom.button.cancel')</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
