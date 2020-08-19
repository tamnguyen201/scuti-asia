
@extends('admin.layout.layout')
@section('title', trans('custom.page_title.company_manage'))
@section('content')
<div class="row">
    <ol class="breadcrumb">
        <li><a href="#">
            <em class="fa fa-home"></em>
        </a></li>
        <li class="active">@lang('custom.page_title.company_manage')</li>
    </ol>
</div>
<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">@lang('custom.page_title.company_manage')</h1>
    </div>
</div>
<div class="col-lg-12">
    <div class="panel panel-default">
        <div class="panel-heading">@lang('custom.page_title.form')</div>
        <div class="panel-body">
            <div class="col-md-12">
                <form role="form" action="{{route('companies.store')}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="col-md-6">
                        <div class="form-group @error('name') has-error @enderror">
                            <label>@lang('custom.name')</label>
                            <input type="text" name="name" class="form-control" value="{{old('name')}}" placeholder="Please enter full name">
                            @error('name') 
                            <span class="help-block"> {{$message}} </span>
                            @enderror
                        </div>
                        <div class="form-group @error('email') has-error @enderror">
                            <label>@lang('custom.email')</label>
                            <input type="email" name="email" class="form-control" value="{{old('email')}}" placeholder="Please enter email">
                            @error('email') 
                            <span class="help-block"> {{$message}} </span>
                            @enderror
                        </div>
                        <div class="form-group @error('phone') has-error @enderror">
                            <label>@lang('custom.phone')</label>
                            <input type="text" name="phone" class="form-control" value="{{old('phone')}}" placeholder="Please enter phone">
                            @error('phone') 
                            <span class="help-block"> {{$message}} </span>
                            @enderror
                        </div>
                        <div class="form-group @error('address') has-error @enderror">
                            <label>@lang('custom.address')</label>
                            <input type="text" name="address" class="form-control" value="{{old('address')}}" placeholder="Please enter address">
                            @error('address') 
                            <span class="help-block"> {{$message}} </span>
                            @enderror
                        </div>
                        <div class="form-group @error('facebook_page') has-error @enderror">
                            <label>@lang('custom.facebook')</label>
                            <input type="text" name="facebook_page" class="form-control" value="{{old('facebook_page')}}" placeholder="Please enter address">
                            @error('facebook_page') 
                            <span class="help-block"> {{$message}} </span>
                            @enderror
                        </div>
                        <div class="form-group @error('youtube_page') has-error @enderror">
                            <label>@lang('custom.youtube')</label>
                            <input type="text" name="youtube_page" class="form-control" value="{{old('youtube_page')}}" placeholder="Please enter address">
                            @error('youtube_page') 
                            <span class="help-block"> {{$message}} </span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group @error('logo') has-error @enderror">
                            <label>@lang('custom.logo')</label>
                            <input type="file" onchange="encodeImageFileAsURL(this)" name="logo" accept="image/*">
                            @error('logo') 
                            <span class="help-block"> {{$message}} </span>
                            @enderror
                        </div>
                        <div class="form-group preview-img">
                            <img src="default-img.png" alt="your image" class="img-responsive" />
                        </div>
                        <div class="form-group @error('description') has-error @enderror">
                            <label>@lang('custom.description')</label>
                            <textarea name="description" class="form-control" cols="30" rows="10">{{old('description')}} </textarea>
                            @error('description') 
                            <span class="help-block"> {{$message}} </span>
                            @enderror
                        </div>
                    </div>
                    
                    <div class="col-md-12 text-center">
                        <button type="submit" class="btn btn-primary">@lang('custom.button.submit')</button>
                        <button type="reset" class="btn btn-default">@lang('custom.button.reset')</button>
                        <a href="{{route('companies.index')}}" class="btn btn-danger">@lang('custom.button.cancel')</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
@section('script')
    @include('admin.preview-img')
@endsection
