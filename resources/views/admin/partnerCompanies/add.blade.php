
@extends('admin.layout.layout')
@section('title', trans('custom.page_title.partner_companies_manage'))
@section('content')
<div class="row">
    <ol class="breadcrumb">
        <li><a href="#">
            <em class="fa fa-home"></em>
        </a></li>
        <li class="active">@lang('custom.page_title.partner_companies_manage')</li>
    </ol>
</div>
<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">@lang('custom.page_title.partner_companies_manage')</h1>
    </div>
</div>
<div class="col-lg-12">
    <div class="panel panel-default">
        <div class="panel-heading">Forms</div>
        <div class="panel-body">
            <div class="col-md-12">
                <form role="form" action="{{route('companies.store')}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="col-md-6">
                        <div class="form-group @error('name') has-error @enderror">
                            <label>@lang('custom.name')</label>
                            <input type="text" name="name" class="form-control" placeholder="Please enter full name">
                            @error('name') 
                            <span class="help-block"> {{$message}} </span>
                            @enderror
                        </div>
                        <div class="form-group @error('description') has-error @enderror">
                            <label>@lang('custom.description')</label>
                            <textarea name="description" cols="30" rows="10" class="form-control" placeholder="Please enter description"> </textarea>
                            @error('description') 
                            <span class="help-block"> {{$message}} </span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group @error('logo') has-error @enderror">
                            <label>@lang('custom.logo')</label>
                            <input type="file" onchange="encodeImageFileAsURL(this)" name="logo">
                            @error('logo') 
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
                        <a href="{{route('companies.index')}}" class="btn btn-danger">@lang('custom.button.cancel')</a>
                    </div>
                </form>
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
                $(".preview-img").html(<img src="default-img.png" alt="your image" class="img-responsive" />);
                $(".preview-img img").attr('src', "default-img.png");
            } else if(file.type.indexOf('image/') == -1){
                $(".preview-img").html(<span class="text-danger">Vui lòng chọn file đúng định dạng ảnh</span>);
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
