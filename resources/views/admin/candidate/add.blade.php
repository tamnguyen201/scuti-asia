@extends('admin.layout.layout')
@section('title', trans('custom.page_title.candidate_manage'))
@section('content')
<div class="row">
    <ol class="breadcrumb">
        <li><a href="{{route('admin.home')}}">
            <em class="fa fa-home"></em>
        </a></li>
        <li class="active">@lang('custom.page_title.candidate_manage')</li>
    </ol>
</div>
<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">@lang('custom.page_title.candidate_manage')</h1>
    </div>
</div>
<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-default">
            <div class="panel-heading">@lang('custom.page_title.form')</div>
            <div class="panel-body">
                <div class="col-md-12">
                    <form role="form" action="{{route('candidates.store')}}" method="POST" enctype="multipart/form-data">
						@csrf
						<input type="hidden" name="job_id"  value="{{request()->get('job_id')}}">
                        <div class="col-md-6">
                            <div class="form-group @error('name') has-error @enderror">
                                <label class="label-required">@lang('custom.name')</label>
                                <input type="text" name="name" value="{{old('name')}}" placeholder="@lang('custom.placeholder.name')" class="form-control">
                                @error('name') 
                                <span class="help-block"> {{$message}} </span>
                                @enderror
                            </div>
                            <div class="form-group @error('phone') has-error @enderror">
                                <label>{{trans('custom.phone')}}</label>
                                <input name="phone" type="text" class="form-control" value="{{ old('phone') }}" placeholder="@lang('custom.placeholder.phone')">
                                @error('phone')
                                <span class="help-block"> {{$message}} </span>
                                @enderror
                            </div>
                            <div class="form-group @error('address') has-error @enderror">
                                <label>{{trans('custom.address')}}</label>
                                <input name="address" type="text" class="form-control" value="{{ old('address') }}" placeholder="@lang('custom.placeholder.address')">
                                @error('address')
                                <span class="help-block"> {{$message}} </span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group @error('email') has-error @enderror">
                                <label class="label-required">@lang('custom.email')</label>
                                <input type="email" name="email" value="{{old('email')}}" class="form-control" placeholder="@lang('custom.placeholder.email')">
                                @error('email') 
                                <span class="help-block"> {{$message}} </span>
                                @enderror
                            </div>
							<div class="form-group @error('cv_name') has-error @enderror">
                                <label class="label-required">@lang('custom.name_cv')</label>
                                <input type="text" name="cv_name" value="{{old('cv_name')}}" placeholder="@lang('custom.placeholder.name')" class="form-control">
                                @error('cv_name') 
                                <span class="help-block"> {{$message}} </span>
                                @enderror
							</div>
							<div class="form-group @error('cv_url') has-error @enderror">
                                <label class="label-required">@lang('custom.cv_url')</label>
                                <input type="file" name="cv_url" accept="application/pdf,.doc,.docx,.xlsx,.xls,.csv,application/msword,application/vnd.ms-excel">
                                @error('cv_url') 
                                <span class="help-block"> {{$message}} </span>
                                @enderror
                            </div>
                        </div>
                        
                        <div class="col-md-12 text-center">
                            <button type="submit" class="btn btn-primary"> @lang('custom.button.submit') <em class="fa fa-check"></em></button>
                            <a href="{{route('job.detail', request()->get('job_id'))}}" class="btn btn-danger">@lang('custom.button.cancel') <em class="fa fa-times"></em></a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('script')
    
@endsection