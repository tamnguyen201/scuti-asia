@extends('client.layout.master')
@section('title', trans('custom.page_title.company_manage'))
@section('content')
<div class="basic-2" style="margin-top: 3.5rem">
    <div class="col-lg-4 mx-auto">
        <div class="form-container">
            <h1 style="text-align: center;margin-bottom: 40px;color: #868686;letter-spacing: 3px;">@lang('client.page.auth.login.title')</h1>
            @if ( Session::has('error') )
                <div class="text-danger">
                    <strong>{{ Session::get('error') }}</strong>
                </div>
            @endif
            <form action="{{route('client.postLogin')}}" method="post">
                @csrf
                <div class="form-group">
                    <label>@lang('client.page.auth.email')</label>
                    <input type="email" class="form-control @error('email') has-error @enderror" name="email">
                    @error('email') 
                        <span class="help-block with-errors text-danger"> {{$message}} </span>
                    @enderror
                </div>
                <div class="form-group">
                    <label>@lang('client.page.auth.password')</label>
                    <input type="password" class="form-control @error('password') has-error @enderror" name="password">
                    @error('password') 
                        <span class="help-block with-errors text-danger"> {{$message}} </span>
                    @enderror
                </div>
                <div class="row justify-content-between col-lg-11 mx-auto px-0">
                    <div class="form-group checkbox">
                        <input type="checkbox" name="remember"> @lang('client.page.auth.login.remember')
                    </div>
                    <div class="form-group">
                        <a href="{{route('client.register')}}">@lang('client.page.auth.login.forgot_password')</a>
                    </div>
                </div>
                <div class="form-group">
                    <button type="submit" class="form-control-submit-button">@lang('client.page.auth.login.submit')</button>
                </div>
            </form>
        </div>
</div>
@endsection
