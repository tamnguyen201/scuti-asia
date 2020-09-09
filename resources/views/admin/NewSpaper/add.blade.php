
@extends('admin.layout.layout')
@section('title', trans('custom.page_title.new_spaper_manage'))
@section('content')
<div class="row">
    <ol class="breadcrumb">
        <li><a href="#">
            <em class="fa fa-home"></em>
        </a></li>
        <li class="active">@lang('custom.page_title.new_spaper_manage')</li>
    </ol>
</div>
<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">@lang('custom.page_title.new_spaper_manage')</h1>
    </div>
</div>
<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-default">
            <div class="panel-heading">@lang('custom.page_title.form')</div>
            <div class="panel-body">
                <div class="col-md-12">
                    <form role="form" action="{{route('new_spaper.store')}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="col-md-6">
                            <div class="form-group @error('title') has-error @enderror">
                                <label>@lang('custom.title')</label>
                                <input type="text" name="title" class="form-control" value="{{old('title')}}">
                                @error('title') 
                                <span class="help-block"> {{$message}} </span>
                                @enderror
                            </div>
                            <div class="form-group @error('url') has-error @enderror">
                                <label>@lang('custom.url')</label>
                                <input type="text" name="url" class="form-control" value="{{old('url')}}">
                                @error('url') 
                                <span class="help-block"> {{$message}} </span>
                                @enderror
                            </div>
                            <div class="form-group @error('description') has-error @enderror">
                                <label>@lang('custom.description')</label>
                                <textarea name="description" cols="30" rows="10" class="form-control"> {{old('description')}} </textarea>
                                @error('description') 
                                <span class="help-block"> {{$message}} </span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group @error('image') has-error @enderror">
                                <label>@lang('custom.image_url')</label>
                                <input type="file" onchange="encodeImageFileAsURL(this)" name="image" accept="image/*">
                                @error('image') 
                                <span class="help-block"> {{$message}} </span>
                                @enderror
                            </div>
                            <div class="form-group preview-img">
                                <img src="default-img.png" alt="your image" class="img-responsive" />
                            </div>
                        </div>
                        
                        <div class="col-md-12 text-center">
                            <button type="submit" class="btn btn-primary">@lang('custom.button.submit')</button>
                            <button type="reset" class="btn btn-default">@lang('custom.button.reset')</button>
                            <a href="{{route('new_spaper.index')}}" class="btn btn-danger">@lang('custom.button.cancel')</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('script')
    @include('admin.preview-img')
@endsection