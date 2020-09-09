
@extends('admin.layout.layout')
@section('title', trans('custom.page_title.section_manage'))
@section('content')
<div class="row">
    <ol class="breadcrumb">
        <li><a href="{{route('admin.home')}}">
            <em class="fa fa-home"></em>
        </a></li>
        <li class="active">@lang('custom.page_title.section_manage')</li>
    </ol>
</div>
<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">@lang('custom.page_title.section_manage')</h1>
    </div>
</div>
<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-default">
            <div class="panel-heading">@lang('custom.page_title.form')</div>
            <div class="panel-body">
                <div class="col-md-12">
                    <form role="form" action="{{route('sections.store')}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="col-md-6">
                            <div class="form-group @error('name') has-error @enderror">
                                <label>@lang('custom.name')</label>
                                <input type="text" name="name" class="form-control" value="{{old('name')}}" placeholder="Please enter full name">
                                @error('name') 
                                <span class="help-block"> {{$message}} </span>
                                @enderror
                            </div>
                            <div class="form-group @error('map_url') has-error @enderror">
                                <label>@lang('custom.map_url')</label>
                                <input type="text" name="map_url" class="form-control" value="{{old('map_url')}}" placeholder="Please enter map_url">
                                @error('map_url') 
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
                        <div class="col-md-12">
                            <div class="form-group @error('content') has-error @enderror">
                                <label>@lang('custom.content')</label>
                                <textarea name="content" class="form-control" @error('description') is-invalid @enderror id="exampleFormControlTextarea1" rows="4">{{old('content')}} </textarea>
                                @error('content') 
                                <span class="help-block"> {{$message}} </span>
                                @enderror
                            </div>
                        </div>
                        
                        <div class="col-md-12 text-center">
                            <button type="submit" class="btn btn-primary">@lang('custom.button.submit')</button>
                            <button type="reset" class="btn btn-default">@lang('custom.button.reset')</button>
                            <a href="{{route('sections.index')}}" class="btn btn-danger">@lang('custom.button.cancel')</a>
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
    <script src="{{ asset('ckeditor/ckeditor.js') }}"></script>
    <script>
    CKEDITOR.replace( 'content', {
        filebrowserBrowseUrl: '{{ route('sections.create') }}',

    } );
    </script>
    @include('ckfinder::setup')
@endsection