@extends('client.layout.master')
@section('title', trans('client.page.auth.register.title'))
@section('content')
<div class="basic-2" style="margin-top: 3.5rem">
    <div class="col-lg-4 mx-auto" style="background-color: #fff; border-radius: 10px">
        <div class="form-container">
            <h1 style="text-align: center;margin-bottom: 40px;color: #868686;letter-spacing: 3px;">@lang('client.page.auth.register.title')</h1>
            @if ( Session::has('error') )
                <div class="alert alert-danger alert-dismissible" role="alert">
                <strong>{{ Session::get('error') }}</strong>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    <span class="sr-only">Close</span>
                </button>
                </div>
            @endif
            <form action="{{route('client.postRegister')}}" method="post">
                @csrf
                <div class="form-group">
                    <label class="label-required">@lang('client.page.auth.name')</label>
                    <input type="text" class="form-control" value="{{old('name')}}" name="name" placeholder="@lang('custom.placeholder.name')">
                    @error('name') 
                        <span class="help-block with-errors text-danger"> {{$message}} </span>
                    @enderror
                </div>
                <div class="form-group">
                    <label class="label-required">@lang('client.page.auth.email')</label>
                    <input type="email" class="form-control" value="{{old('email')}}" name="email" placeholder="@lang('custom.placeholder.email')">
                    @error('email') 
                        <span class="help-block with-errors text-danger"> {{$message}} </span>
                    @enderror
                </div>
                <div class="form-group">
                    <label class="label-required">@lang('client.page.auth.password')</label>
                    <input type="password" class="form-control" name="password" placeholder="@lang('custom.placeholder.password')">
                    @error('password') 
                        <span class="help-block with-errors text-danger"> {{$message}} </span>
                    @enderror
                </div>
                <div class="form-group">
                    <label class="label-required">@lang('client.page.auth.password_confirm')</label>
                    <input type="password" class="form-control" name="password_confirmation" placeholder="@lang('custom.placeholder.password')">
                </div>
                <div class="form-group">
                    <label class="label-required">@lang('client.page.auth.phone')</label>
                    <input type="text" class="form-control" value="{{old('phone')}}" name="phone" placeholder="@lang('custom.placeholder.phone')">
                    @error('phone') 
                        <span class="help-block with-errors text-danger"> {{$message}} </span>
                    @enderror
                </div>
                <div class="form-group">
                    <label class="label-required">@lang('client.page.auth.address')</label>
                    <input type="text" class="form-control" value="{{old('address')}}" name="address" placeholder="@lang('custom.placeholder.address')">
                    @error('address') 
                        <span class="help-block with-errors text-danger"> {{$message}} </span>
                    @enderror
                </div>
                <!-- <div class="form-group checkbox">
                    <input type="checkbox" name="remember"> @lang('client.page.auth.register.term')
                </div> -->
                <div class="form-group">
                    <button type="submit" class="form-control-submit-button">@lang('client.page.auth.register.submit')</button>
                </div>
                <div class="form-group text-center">
                    @lang('client.page.auth.register.has_account') <a href="{{route('client.login')}}">@lang('client.page.auth.login.title')</a>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
