@extends('client.layout.master')
@section('title', trans('custom.page_title.company_manage'))
@section('content')
<div class="basic-2" style="margin-top: 3.5rem">
    <div class="col-lg-4 mx-auto">
        <div class="form-container">
            <h1 style="text-align: center;margin-bottom: 40px;color: #868686;letter-spacing: 3px;">@lang('client.page.login.title')</h1>
            <form action="{{route('login')}}" method="post">
                @csrf
                <div class="form-group">
                    <label>Email</label>
                    <input type="email" class="form-control @error('email') has-error @enderror" name="email">
                    @error('email') 
                        <span class="help-block with-errors"> {{$message}} </span>
                    @enderror
                </div>
                <div class="form-group">
                    <label>Mật Khẩu</label>
                    <input type="password" class="form-control @error('password') has-error @enderror" name="password">
                    @error('password') 
                        <span class="help-block with-errors"> {{$message}} </span>
                    @enderror
                </div>
                <div class="form-group checkbox">
                    <input type="checkbox" name="remember"> Remember Me
                    <div class="help-block with-errors"></div>
                </div>
                <div class="form-group">
                    <button type="submit" class="form-control-submit-button">Submit</button>
                </div>
                <div class="form-group text-center">
                    <p>- Hoặc -</p>
                </div>
                <div class="form-group">
                    <a href="{{ url('/auth/redirect/google') }}" class="form-control-social-login"><i class="fab fa-google fa-fw"></i> Đăng nhập với Google</a>
                </div>
            </form>
        </div>
</div>
@endsection
