@extends('client.layout.master')
@section('title', trans('custom.page_title.company_manage'))
@section('content')
<div class="ex-basic-1" style="padding-top: 7rem">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="breadcrumbs">
                    <a href="index.html">Home</a><i class="fa fa-angle-double-right"></i><span>Profile</span>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="basic-2">
    <div class="col-lg-8 mx-auto">
        <div class="form-container">
            <form action="" class="col-lg-12 row" method="post">
                @csrf
                <div class="col-md-7">
                    <div class="form-group @error('name') has-error @enderror">
                        <label>@lang('custom.name')</label>
                        <input type="text" name="name" value="{{Auth::user()->name}}" class="form-control" placeholder="Please enter full name">
                        @error('name') 
                        <span class="help-block"> {{$message}} </span>
                        @enderror
                    </div>
                    <div class="form-group @error('email') has-error @enderror">
                        <label>@lang('custom.email')</label>
                        <input type="text" name="email" value="{{Auth::user()->email}}" class="form-control" placeholder="Please enter email">
                        @error('email') 
                        <span class="help-block"> {{$message}} </span>
                        @enderror
                    </div>
                    <div class="form-group @error('phone') has-error @enderror">
                        <label>@lang('custom.phone')</label>
                        <input type="text" name="phone" value="{{Auth::user()->phone}}" class="form-control" placeholder="Please enter phone">
                        @error('phone') 
                        <span class="help-block"> {{$message}} </span>
                        @enderror
                    </div>
                    <div class="form-group @error('address') has-error @enderror">
                        <label>@lang('custom.address')</label>
                        <input type="text" name="address" value="{{Auth::user()->address}}" class="form-control" placeholder="Please enter address">
                        @error('address') 
                        <span class="help-block"> {{$message}} </span>
                        @enderror
                    </div>
                </div>
                <div class="col-md-5">
                    <div class="form-group @error('logo') has-error @enderror">
                        <label>@lang('custom.logo')</label>
                        <input type="file" onchange="encodeImageFileAsURL(this)" name="logo" accept="image/*">
                        @error('logo') 
                        <span class="help-block"> {{$message}} </span>
                        @enderror
                    </div>
                    <div class="form-group preview-img">
                        <img src="{{(Auth::user()->avatar) ? Auth::user()->avatar : 'default-img.png'}}" alt="your image" class="img-fluid" />
                    </div>
                </div>
                
                <div class="col-md-12 text-center">
                    <button type="submit" class="btn btn-success">@lang('custom.button.submit')</button>
                    <button type="reset" class="btn btn-primary">@lang('custom.button.reset')</button>
                    <a href="{{route('partner_companies.index')}}" class="btn btn-danger">@lang('custom.button.cancel')</a>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
@section('script')
    @include('admin.preview-img')
@endsection
