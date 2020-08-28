@extends('client.layout.master')
@section('title', trans('custom.page_title.company_manage'))
@section('content')
<div class="basic-2" style="margin-top: 3.5rem">
    <div class="col-lg-4 mx-auto">
        <div class="form-container">
            <h1 style="text-align: center;margin-bottom: 40px;color: #868686;letter-spacing: 3px;">@lang('client.page.login.title')</h1>
            @if ( Session::has('error') )
                <div class="alert alert-danger alert-dismissible" role="alert">
                <strong>{{ Session::get('error') }}</strong>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    <span class="sr-only">Close</span>
                </button>
                </div>
            @endif
            <form action="{{route('client.postLogin')}}" method="post">
                @csrf
                <div class="form-group">
                    <label>@lang('client.page.login.email')</label>
                    <input type="email" class="form-control @error('email') has-error @enderror" name="email">
                    @error('email') 
                        <span class="help-block with-errors"> {{$message}} </span>
                    @enderror
                </div>
                <div class="form-group">
                    <label>@lang('client.page.login.password')</label>
                    <input type="password" class="form-control @error('password') has-error @enderror" name="password">
                    @error('password') 
                        <span class="help-block with-errors"> {{$message}} </span>
                    @enderror
                </div>
                <div class="form-group checkbox">
                    <input type="checkbox" name="remember"> @lang('client.page.login.remember')
                    <div class="help-block with-errors"></div>
                </div>
                <div class="form-group">
                    <button type="submit" class="form-control-submit-button">@lang('client.page.login.submit')</button>
                </div>
                <div class="form-group text-center">
                    <p>- @lang('client.page.login.or') -</p>
                </div>
                <div class="form-group">
                    <a href="{{ url('/auth/redirect/google') }}" class="form-control-social-login"><i class="fab fa-google fa-fw"></i> @lang('client.page.login.google_login')</a>
                </div>
            </form>
        </div>
</div>
@endsection
