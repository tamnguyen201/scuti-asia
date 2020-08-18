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
        <li class="active">User Profile</li>
    </ol>
</div>
<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">User Profile Manage</h1>
    </div>
</div>
<div class="col-lg-12">
    <div class="panel panel-default">
       <div class="panel-heading">Information</div>
       <div class="panel-body">
            <form action="{{ route('admin.information.update', ['id'=>$informations->id]) }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="form-row">
                    <div class="col-md-6 mb-3">
                        <label for="exampleFormControlFile1">{{trans('custom.avatar')}}</label>
                        <input name="avatar" type="file" class="form-control-file">
                    </div>
                </div>
                <div class="form-row">
                    <div class="col-md-6 mb-3">
                        <label for="validationTooltip01">{{trans('custom.name')}} :</label>
                        <input name="name" type="text" class="form-control" @error('name') is-invalid @enderror id="validationTooltip01" value="{{ $user_name }}" required>
                        <input name="user_id"" type="hidden" class="form-control" id="validationTooltip01" value="{{ $user_id }}">
                        @error('name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                <div class="form-row">
                    <div class="col-md-6 mb-3">
                        <label for="validationTooltip03">{{trans('custom.address')}} :</label>
                        <input name="address" type="text" class="form-control" @error('address') is-invalid @enderror id="validationTooltip03" value="{{ $informations->address }}">
                        @error('address')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                <div class="form-row">
                    <div class="col-md-6 mb-3">
                        <label for="validationTooltip03">{{trans('custom.phone')}} :</label>
                        <input name="phone" type="text" class="form-control" @error('phone') is-invalid @enderror id="validationTooltip03" value="{{ $informations->phone }}">
                        @error('phone')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                <div class="col-md-12">
                    <button class="btn-editInfor btn btn-primary ml-4" type="submit">{{trans('custom.submit')}}</button>
                </div> 
            </form>
        </div>
    </div>
</div>
@endsection
