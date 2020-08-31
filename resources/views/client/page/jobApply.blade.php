@extends('client.layout.master')
@section('title', trans('custom.page_title.company_manage'))
@section('content')
    @include('client.layout.header')
    <div class="ex-basic-1">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumbs">
                        <a href="/">Home</a><i class="fa fa-angle-double-right"></i><span>{{$data['job']->name}}</span>
                    </div> <!-- end of breadcrumbs -->
                </div> <!-- end of col -->
            </div> <!-- end of row -->
        </div> <!-- end of container -->
    </div>

    <div class="ex-basic-2">
        <div class="container">
            <div class="row">
                <div class="col-lg-10 offset-lg-1">
                    <div class="text-container col-lg-10 mx-auto">
                        <form action="{{route('client.apply.job')}}" class="row" method="post">
                            @csrf
                            <div class="col-md-6">
                                <div class="form-group @error('name') has-error @enderror">
                                    <label>@lang('custom.name')</label>
                                    <input type="text" name="name" class="form-control" value="{{old('name')}}" placeholder="Please enter full name">
                                    @error('name') 
                                    <span class="text-danger"> {{$message}} </span>
                                    @enderror
                                </div>
                                <div class="form-group @error('phone') has-error @enderror">
                                    <label>@lang('custom.phone')</label>
                                    <input type="text" name="phone" class="form-control" value="{{old('phone')}}" placeholder="Please enter phone">
                                    @error('phone') 
                                    <span class="text-danger"> {{$message}} </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group @error('email') has-error @enderror">
                                    <label>@lang('custom.email')</label>
                                    <input type="email" name="email" class="form-control" value="{{old('email')}}" placeholder="Please enter email">
                                    @error('email') 
                                    <span class="text-danger"> {{$message}} </span>
                                    @enderror
                                </div>
                                <div class="form-group @error('address') has-error @enderror">
                                    <label>@lang('custom.address')</label>
                                    <input type="text" name="address" class="form-control" value="{{old('address')}}" placeholder="Please enter address">
                                    @error('address') 
                                    <span class="text-danger"> {{$message}} </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-12 text-center">
                                <div class="form-group @error('letter') has-error @enderror">
                                    <label>@lang('custom.letter')</label>
                                    <textarea name="letter" class="form-control" cols="30" rows="10">{{old('letter')}} </textarea>
                                    @error('letter') 
                                    <span class="text-danger"> {{$message}} </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-12 text-center">
                                <button type="submit" class="btn-outline-reg back">@lang('custom.button.submit')</button>
                                <button type="reset" class="btn-outline-reg back">@lang('custom.button.reset')</button>
                                <a class="btn-outline-reg back" href="{{route('client.jobs')}}">BACK</a>
                            </div>
                        </form>
                    </div>
                    <div class="text-container">
                        <h3>{{$data['job']->name}}</h3>
                        <p>When you first register for a Juno account, and when you use the Services, we collect some <a class="orange" href="#your-link">Personal Information</a> about you such as:</p>
                        <div class="row">
                        {{$data['job']->description}}
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>

    <div id="services" class="basic-2">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <h2>@lang('client.section.recruitment_flow.title')</h2>
                    <p class="p-heading p-large">@lang('client.section.recruitment_flow.description')</p>
                    <hr class="line-heading">
                </div>
            </div>
            <div class="row">
                {!! $data['recruitment_flow']->content !!}
            </div>
        </div>
    </div>
@endsection
