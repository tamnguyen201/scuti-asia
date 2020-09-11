@extends('admin.layout.layout')
@section('css')
    <link rel="stylesheet" href="{{ asset('adminAsset/css/profile_user.css') }}">
@endsection
@section('content')
<div class="row">
    <ol class="breadcrumb">
        <li><a href="{{route('admin.home')}}">
            <em class="fa fa-home"></em>
        </a></li>
        <li class="active">@lang('custom.page_title.change_password')</li>
    </ol>
</div>
<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">@lang('custom.page_title.change_password')</h1>
    </div>
</div>
<div class="col-lg-12">
    <div class="panel panel-default">
       <div class="panel-heading">@lang('custom.page_title.form')</div>
       <div class="panel-body">
            <form method="POST" action="{{ route('change.password') }}">
                @csrf 
                <div class="form-group row">
                    <label for="password" class="col-md-4 col-form-label text-md-right">@lang('custom.old_pass')</label>

                    <div class="col-md-6">
                        <input id="password" type="password" class="form-control" @error('current_password') is-invalid @enderror name="current_password" autocomplete="current-password">
                        @error('current_password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="form-group row">
                    <label for="password" class="col-md-4 col-form-label text-md-right">@lang('custom.new_pass')</label>

                    <div class="col-md-6">
                        <input id="new_password" type="password" class="form-control" @error('new_password') is-invalid @enderror name="new_password" autocomplete="new-password">
                        @error('new_password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="form-group row">
                    <label for="password" class="col-md-4 col-form-label text-md-right">@lang('custom.confirm_pass')</label>

                    <div class="col-md-6">
                        <input id="new_confirm_password" type="password" class="form-control" @error('confirm_password') is-invalid @enderror name="new_confirm_password" autocomplete="current-password">
                        @error('confirm_password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="form-group row mb-0">
                    <div class="col-md-8 offset-md-4">
                        <button type="submit" class="btn btn-primary">
                            @lang('custom.button.change_password')
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
