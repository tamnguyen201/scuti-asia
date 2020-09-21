@extends('admin.layout.layout')
@section('title', trans('custom.page_title.employee_manage'))
@section('css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/switchery/0.8.2/switchery.min.css">
@endsection
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
                        <div class="col-md-3">
                            <img src="{{asset($manager->avatar)}}" class="img-responsive" alt="">
                        </div>
                        <div class="col-md-9">
                            <div class="col-md-6">
                                <div class="form-group @error('name') has-error @enderror">
                                    <label class="label-required">@lang('custom.name')</label>
                                    <input type="text" name="name" value="{{$manager->name}}" placeholder="@lang('custom.placeholder.name')" class="form-control">
                                    @error('name') 
                                    <span class="help-block"> {{$message}} </span>
                                    @enderror
                                </div>
                                <div class="form-group @error('phone') has-error @enderror">
                                    <label>{{trans('custom.phone')}}</label>
                                    <input name="phone" type="text" class="form-control" value="{{$manager->phone}}" placeholder="@lang('custom.placeholder.phone')">
                                    @error('phone')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-group @error('address') has-error @enderror">
                                    <label>{{trans('custom.address')}}</label>
                                    <input name="address" type="text" class="form-control" value="{{$manager->address}}" placeholder="@lang('custom.placeholder.address')">
                                    @error('address')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group @error('email') has-error @enderror">
                                    <label class="label-required">@lang('custom.email')</label>
                                    <input type="email" name="email" value="{{$manager->email}}" class="form-control" placeholder="@lang('custom.placeholder.email')">
                                    @error('email') 
                                    <span class="help-block"> {{$message}} </span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label class="label-required">@lang('custom.role')</label>
                                    <select name="role" class="form-control">
                                        @foreach (config('common.role') as $key => $item)
                                            @if($item != config('common.role.User'))
                                                <option value="{{$item}}" @if($manager->role == $item) selected @endif>{{$key}}</option>
                                            @endif
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group @error('email') has-error @enderror">
                                    <label class="label-required">@lang('custom.status')</label> <br>
                                    <input type="checkbox" data-id="1" name="status" class="js-switch" @if($manager->status == 1) checked @endif>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12 text-center">
                            <button type="submit" class="btn btn-primary">@lang('custom.button.submit') <em class="fa fa-check"></em></button>
                            <a href="{{route('employees.index')}}" class="btn btn-danger">@lang('custom.button.cancel')  <em class="fa fa-times"></em></a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('script')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/switchery/0.8.2/switchery.min.js"></script>
    <script>
        let elems = Array.prototype.slice.call(document.querySelectorAll('.js-switch'));
        elems.forEach(function(html) {
            let switchery = new Switchery(html,  { size: 'small' });
        });
    </script>
@endsection
