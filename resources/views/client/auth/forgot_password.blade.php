@extends('client.layout.master')
@section('title', trans('client.page.auth.forgot_pw.title'))
@section('content')
<div class="basic-2" style="margin-top: 3.5rem">
    <div class="col-lg-4 mx-auto" style="background-color: #fff; border-radius: 10px">
        <div class="form-container">
            <h1 style="text-align: center;margin-bottom: 40px;color: #868686;letter-spacing: 3px;">@lang('client.page.auth.forgot_pw.title')</h1>
            @if ( Session::has('error') )
                <div class="text-danger">
                    <strong>{{ Session::get('error') }}</strong>
                </div>
            @endif
            @if ($errors->any())
                <ul>
                    @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                    @endforeach
                </ul>
            @endif
            <form action="{{route('client.confirm_forgot_password')}}" method="post">
                @csrf
                <div class="form-group">
                    <label class="label-required">@lang('client.page.auth.email')</label>
                    <input type="email" class="form-control @error('email') has-error @enderror" name="email" placeholder="@lang('custom.placeholder.email')">
                    @error('email') 
                        <span class="help-block with-errors text-danger"> {{$message}} </span>
                    @enderror
                </div>
                <div class="form-group">
                    <button type="submit" class="form-control-submit-button">@lang('client.page.auth.forgot_pw.submit')</button>
                </div>
                <div class="form-group text-center">
                    @lang('client.page.auth.register.has_account') <a href="{{route('client.login')}}">@lang('client.page.auth.login.title')</a>
                </div>
                <div class="form-group text-center">
                    @lang('client.page.auth.login.no_account') <a href="{{route('client.register')}}">@lang('client.page.auth.register.title')</a>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
