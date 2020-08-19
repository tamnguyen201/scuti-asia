@extends('admin.layout.layout')
@section('css')
    <link rel="stylesheet" href="{{ asset('adminAsset/css/profile_user.css') }}">
@endsection
@section('content')
<div class="row">
    <ol class="breadcrumb">
        <li><a href="#">
            <em class="fa fa-home"></em>
        </a></li>
        <li class="active">@lang('custom.page_title.user_update_profile')</li>
    </ol>
</div>
<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">@lang('custom.page_title.update_manager')</h1>
    </div>
</div>
<div class="col-lg-12">
    <div class="panel panel-default">
       <div class="panel-heading">@lang('custom.page_title.profile')</div>
       <div class="panel-body">
            @foreach ($data as $item)
            <div class="row">
                <div class="col-md-4"><img class="avatar" src="{{ $item->avatar }}" alt=""></div>
                <div class="col-md-8">
                    <ul>
                        <li>
                            <div class="form-group">
                                <label>{{trans('custom.name')}} :</label>
                                <p>{{ auth()->user()->name }}</p>
                            </div>
                        </li>
                        <li>
                            <div class="form-group">
                                <label>{{trans('custom.phone')}} :</label>
                                <p>{{ $item->phone }}</p>
                            </div>
                        </li>
                        <li>
                            <div class="form-group">
                                <label>{{trans('custom.address')}} :</label>
                                <p>{{ $item->address }}</p>
                            </div>
                        </li>
                    </ul>
                    <div class="buttons row">
                        <div class="col-md-4">
                            <a href="{{ route('admin.information.edit', ['id'=> $item->id]) }}" class="btn btn-primary btn-add-form"><i class="fa fa-edit"> @lang('custom.button.update_information')</i></a>
                        </div>
                        <div class="col-md-4">
                            <a href="{{ route('change.password') }}" class="btn btn-primary btn-add-form"><i class="fa fa-unlock"> @lang('custom.button.change_password')</i></a>
                        </div>
                    </div>
                </div>
              </div>
            @endforeach
        </div>
    </div>
</div>
@endsection
