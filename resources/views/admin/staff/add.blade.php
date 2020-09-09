@extends('admin.layout.layout')
@section('title', trans('custom.page_title.employee_manage'))
@section('content')
<div class="row">
    <ol class="breadcrumb">
        <li><a href="#">
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
                    <form role="form" action="{{route('employees.store')}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="col-md-6">
                            <div class="form-group @error('name') has-error @enderror">
                                <label>@lang('custom.name')</label>
                                <input type="text" name="name" value="{{old('name')}}" class="form-control">
                                @error('name') 
                                <span class="help-block"> {{$message}} </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label>{{trans('custom.phone')}} :</label>
                                <input name="phone" type="text" class="form-control" @error('phone') is-invalid @enderror value="{{ old('phone') }}">
                                @error('phone')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label>{{trans('custom.address')}} :</label>
                                <input name="address" type="text" class="form-control" @error('address') is-invalid @enderror value="{{ old('address') }}">
                                @error('address')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group @error('email') has-error @enderror">
                                <label>@lang('custom.email')</label>
                                <input type="email" name="email" value="{{old('email')}}" class="form-control">
                                @error('email') 
                                <span class="help-block"> {{$message}} </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label>@lang('custom.role')</label>
                                <select name="role" class="form-control">
                                    @foreach (config('common.role') as $key => $item)
                                        @if($item != config('common.role.User'))
                                            <option value="{{$item}}">{{$key}}</option>
                                        @endif
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
</div>
@endsection
