@extends('admin.layout.layout')
@section('title', trans('custom.page_title.company_manage'))
@section('content')
<div class="row">
    <ol class="breadcrumb">
        <li><a href="{{route('admin.home')}}">
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
<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-default">
            <div class="panel-heading">@lang('custom.page_title.form')</div>
            <div class="panel-body">
                <div class="col-md-12">
                    <form role="form" action="{{route('companies.update', $company->id)}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="col-md-6">
                            <div class="form-group @error('name') has-error @enderror">
                                <label class="label-required">@lang('custom.name')</label>
                                <input type="text" name="name" value="{{$company->name}}" class="form-control" placeholder="@lang('custom.placeholder.name')">
                                @error('name') 
                                <span class="help-block"> {{$message}} </span>
                                @enderror
                            </div>
                            <div class="form-group @error('email') has-error @enderror">
                                <label class="label-required">@lang('custom.email')</label>
                                <input type="email" name="email" value="{{$company->email}}" class="form-control" placeholder="@lang('custom.placeholder.email')">
                                @error('email') 
                                <span class="help-block"> {{$message}} </span>
                                @enderror
                            </div>
                            <div class="form-group @error('phone') has-error @enderror">
                                <label class="label-required">@lang('custom.phone')</label>
                                <input type="text" name="phone" value="{{$company->phone}}" class="form-control" placeholder="@lang('custom.placeholder.phone')">
                                @error('phone') 
                                <span class="help-block"> {{$message}} </span>
                                @enderror
                            </div>
                            <div class="form-group @error('address') has-error @enderror">
                                <label class="label-required">@lang('custom.address')</label>
                                <input type="text" name="address" value="{{$company->address}}" class="form-control" placeholder="@lang('custom.placeholder.address')">
                                @error('address') 
                                <span class="help-block"> {{$message}} </span>
                                @enderror
                            </div>
                            <div class="form-group @error('facebook_page') has-error @enderror">
                                <label class="label-required">@lang('custom.facebook')</label>
                                <input type="text" name="facebook_page" value="{{$company->facebook_page}}" class="form-control" placeholder="@lang('custom.placeholder.address')">
                                @error('facebook_page') 
                                <span class="help-block"> {{$message}} </span>
                                @enderror
                            </div>
                            <div class="form-group @error('youtube_page') has-error @enderror">
                                <label class="label-required">@lang('custom.youtube')</label>
                                <input type="text" name="youtube_page" value="{{$company->youtube_page}}" class="form-control" placeholder="@lang('custom.placeholder.address')">
                                @error('youtube_page') 
                                <span class="help-block"> {{$message}} </span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group @error('logo') has-error @enderror">
                                <label class="label-required">@lang('custom.logo')</label>
                                <input type="file" onchange="encodeImageFileAsURL(this)" name="logo" accept="image/*">
                                @error('logo') 
                                <span class="help-block"> {{$message}} </span>
                                @enderror
                            </div>
                            <div class="form-group preview-img">
                                <img src="{{$company->logo}}" alt="your image" class="img-responsive" style="max-height:26rem" />
                            </div>
                            <div class="form-group @error('description') has-error @enderror">
                                <label class="label-required">@lang('custom.description')</label>
                                <textarea name="description" class="form-control" cols="30" rows="6" placeholder="@lang('custom.placeholder.description')">{{$company->description}}</textarea>
                                @error('description') 
                                <span class="help-block"> {{$message}} </span>
                                @enderror
                            </div>
                        </div>
                        
                        <div class="col-md-12 text-center">
                            <button type="submit" class="btn btn-primary">@lang('custom.button.submit') <em class="fa fa-check"></em></button>
                            <a href="{{route('companies.index')}}" class="btn btn-danger">@lang('custom.button.cancel') <em class="fa fa-times"></em></a>
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
            $(".preview-img img").attr('src', "{{$company->logo}}");
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
