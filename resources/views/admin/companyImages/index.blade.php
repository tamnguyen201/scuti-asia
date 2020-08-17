@extends('admin.layout.layout')
@section('title', 'Employees Manage')
@section('content')
<div class="row">
    <ol class="breadcrumb">
        <li><a href="#">
            <em class="fa fa-home"></em>
        </a></li>
        <li class="active">Images</li>
    </ol>
</div>
<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">Images Manage</h1>
    </div>
</div>
<div class="col-lg-12">
    <div class="panel panel-default">
        <div class="panel-heading">@lang('custom.button.add')</div>
        <div class="panel-body">
            <form action="{{route('company_images.store')}}" method="POST" enctype="multipart/form-data">
                @csrf
                <p>Upload new files:</p>
                <label class="btn btn-default">
                    <input type="file" name="image_url">
                </label>
                <button class="btn btn-default">@lang('custom.button.submit')</button>
                @error('image_url') 
                <p class="text-danger"> {{$message}} </p>
                @enderror
            </form>
        </div>
    </div>
    <div class="panel panel-default">
        <div class="panel-heading">
            My Gallery
        </div>
        <div class="panel-body">
            <div class="row">
                @foreach($images as $item)
                <div class="col-xs-6 col-sm-4 col-md-3 portfolio-item">
                    <a href="#">
                    <img class="img-responsive" src="{{$item->image_url}}" alt="">
                    </a>
                    <p class="text-center"><a href="#">Gallery Item</a></p>
                </div>
                @endforeach
                
            </div>
        </div>
    </div>
    <div class="text-center">
        {{$images->links()}}
    </div>
</div>
@endsection
