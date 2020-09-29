@extends('admin.layout.layout')
@section('title', trans('custom.page_title.company_image_manage'))
@section('content')
<div class="row">
    <ol class="breadcrumb">
        <li><a href="{{route('admin.home')}}">
            <em class="fa fa-home"></em>
        </a></li>
        <li class="active">@lang('custom.page_title.company_image_manage')</li>
    </ol>
</div>
<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">@lang('custom.page_title.company_image_manage')</h1>
    </div>
</div>
<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-default">
            <div class="panel-heading">@lang('custom.page_title.form')</div>
            <div class="panel-body">
                <div class="col-md-12">
                    <form role="form" action="{{route('company_images.update', $image->id)}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="col-md-6">
                            <div class="form-group @error('name') has-error @enderror">
                                <label class="label-required">@lang('custom.name')</label>
                                <input type="text" name="name" value="{{$image->name}}" class="form-control" placeholder="@lang('custom.placeholder.name')">
                                @error('name') 
                                <span class="help-block"> {{$message}} </span>
                                @enderror
                            </div>
                            <div class="form-group @error('description') has-error @enderror">
                                <label class="label-required">@lang('custom.description')</label>
                                <textarea name="description" cols="30" rows="9" class="form-control" placeholder="@lang('custom.placeholder.description')"> {{$image->description}} </textarea>
                                @error('description') 
                                <span class="help-block"> {{$message}} </span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group @error('image_url') has-error @enderror">
                                <label class="label-required">@lang('custom.image_url')</label>
                                <input type="file" onchange="encodeImageFileAsURL(this)" name="image_url" accept="image/*">
                                @error('image_url') 
                                <span class="help-block"> {{$message}} </span>
                                @enderror
                            </div>
                            <div class="form-group preview-img">
                                <img src="{{$image->image_url}}" alt="your image" class="img-responsive" style="max-height:24rem" />
                            </div>
                        </div>
                        
                        <div class="col-md-12 text-center">
                            <button type="submit" class="btn btn-primary">@lang('custom.button.submit') <em class="fa fa-check"></em></button>
                            <a href="{{route('company_images.index')}}" class="btn btn-danger">@lang('custom.button.cancel') <em class="fa fa-times"></em></a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('script')
<script>
    function encodeImageFileAsURL(element) {
        var file = element.files[0];
        if(file === undefined){
            $(".preview-img img").attr('src', "{{$image->image_url}}");
        } else {
            var reader = new FileReader();
            reader.onloadend = function() {
                if(reader.result){
                    $(".preview-img img").attr('src', reader.result);
                }
            }
            reader.readAsDataURL(file);
        }
    }
</script>
@endsection
