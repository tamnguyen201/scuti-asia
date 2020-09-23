@extends('admin.layout.layout')
@section('title', trans('custom.page_title.member_manage'))
@section('content')
<div class="row">
    <ol class="breadcrumb">
        <li><a href="{{route('admin.home')}}">
            <em class="fa fa-home"></em>
        </a></li>
        <li class="active">@lang('custom.page_title.member_manage')</li>
    </ol>
</div>
<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">@lang('custom.page_title.member_manage')</h1>
    </div>
</div>
<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-default">
            <div class="panel-heading">@lang('custom.page_title.form')</div>
            <div class="panel-body">
                <div class="col-md-12">
                    <form role="form" action="{{route('main-member.update', $member->id)}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="col-md-6">
                            <div class="form-group @error('name') has-error @enderror">
                                <label class="label-required">@lang('custom.name')</label>
                                <input type="text" name="name" class="form-control" value="{{$member->name}}" placeholder="@lang('custom.placeholder.name')">
                                @error('name') 
                                <span class="help-block"> {{$message}} </span>
                                @enderror
                            </div>
                            <div class="form-group @error('position') has-error @enderror">
                                <label class="label-required">@lang('custom.role')</label>
                                <input type="text" name="position" class="form-control" value="{{$member->position}}" placeholder="@lang('custom.placeholder.position')">
                                @error('position') 
                                <span class="help-block"> {{$message}} </span>
                                @enderror
                            </div>
                            <div class="form-group @error('quote') has-error @enderror">
                                <label class="label-required">@lang('custom.description')</label>
                                <textarea name="quote" cols="30" rows="10" class="form-control"> {{$member->quote}} </textarea>
                                @error('quote') 
                                <span class="help-block"> {{$message}} </span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="label-required">@lang('custom.member_type')</label>
                                <select name="member_type" class="form-control">
                                    <option value="0" @if($member->member_type == 0) 'checked' @endif>Leader</option>
                                    <option value="1" @if($member->member_type == 1) 'checked' @endif>Manager</option>
                                </select>
                            </div>
                            <div class="form-group @error('avatar') has-error @enderror">
                                <label class="label-required">@lang('custom.image_url')</label>
                                <input type="file" onchange="encodeImageFileAsURL(this)" name="avatar" accept="image/*">
                                @error('avatar') 
                                <span class="help-block"> {{$message}} </span>
                                @enderror
                            </div>
                            <div class="form-group preview-img">
                                <img src="{{$member->avatar}}" alt="your image" class="img-responsive" style="max-height: 27rem;" />
                            </div>
                        </div>
                        
                        <div class="col-md-12 text-center">
                            <button type="submit" class="btn btn-primary">@lang('custom.button.submit') <em class="fa fa-check"></em></button>
                            <a href="{{route('main-member.index')}}" class="btn btn-danger">@lang('custom.button.cancel') <em class="fa fa-times"></em></a>
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
            $(".preview-img img").attr('src', "{{$member->avatar}}");
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
