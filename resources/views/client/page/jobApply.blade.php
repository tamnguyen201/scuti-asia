@extends('client.layout.master')
@section('title', trans('client.page.job.title'))
@section('css')
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" >
<style>
    * {
        margin: 0;
        padding: 0
    }

    html {
        height: 100%
    }

    p {
        color: grey
    }

    #heading {
        text-transform: uppercase;
        color: #5cb85c;;
        font-weight: normal
    }

    #msform {
        text-align: center;
        position: relative;
        margin-top: 20px
    }

    #msform fieldset {
        background: white;
        border: 0 none;
        border-radius: 0.5rem;
        box-sizing: border-box;
        width: 100%;
        margin: 0;
        padding-bottom: 20px;
        position: relative
    }

    .form-card {
        text-align: left
    }

    #msform fieldset:not(:first-of-type) {
        display: none
    }

    #msform input,
    #msform textarea {
        padding: 8px 15px 8px 15px;
        border: 1px solid #ccc;
        border-radius: 0px;
        margin-bottom: 25px;
        margin-top: 2px;
        width: 100%;
        box-sizing: border-box;
        font-family: montserrat;
        color: #2C3E50;
        background-color: #ECEFF1;
        font-size: 16px;
        letter-spacing: 1px
    }

    #msform input:focus,
    #msform textarea:focus {
        -moz-box-shadow: none !important;
        -webkit-box-shadow: none !important;
        box-shadow: none !important;
        border: 1px solid #5cb85c;;
        outline-width: 0
    }

    #msform .action-button {
        width: 100px;
        background: #5cb85c;;
        font-weight: bold;
        color: white;
        border: 0 none;
        border-radius: 0px;
        cursor: pointer;
        padding: 10px 5px;
        margin: 10px 0px 10px 5px;
        float: right
    }

    #msform .action-button:hover,
    #msform .action-button:focus {
        background-color: #311B92
    }

    #msform .action-button-previous {
        width: 100px;
        background: #616161;
        font-weight: bold;
        color: white;
        border: 0 none;
        border-radius: 0px;
        cursor: pointer;
        padding: 10px 5px;
        margin: 10px 5px 10px 0px;
        float: right
    }

    #msform .action-button-previous:hover,
    #msform .action-button-previous:focus {
        background-color: #000000
    }

    .card {
        z-index: 0;
        border: none;
        position: relative
    }

    .fs-title {
        font-size: 25px;
        color: #5cb85c;;
        margin-bottom: 15px;
        font-weight: normal;
        text-align: left
    }

    .purple-text {
        color: #5cb85c;;
        font-weight: normal
    }

    .steps {
        font-size: 25px;
        color: gray;
        margin-bottom: 10px;
        font-weight: normal;
        text-align: right
    }

    .fieldlabels {
        color: gray;
        text-align: left
    }

    #progressbar {
        margin-bottom: 30px;
        overflow: hidden;
        color: lightgrey
    }

    #progressbar .active {
        color: #5cb85c;
    }

    #progressbar li {
        list-style-type: none;
        font-size: 15px;
        width: 25%;
        float: left;
        position: relative;
        font-weight: 400
    }

    #progressbar #account:before {
        font-family: FontAwesome;
        content: "\f13e"
    }

    #progressbar #personal:before {
        font-family: FontAwesome;
        content: "\f007"
    }

    #progressbar #payment:before {
        font-family: FontAwesome;
        content: "\f030"
    }

    #progressbar #confirm:before {
        font-family: FontAwesome;
        content: "\f00c"
    }

    #progressbar li:before {
        width: 50px;
        height: 50px;
        line-height: 45px;
        display: block;
        font-size: 20px;
        color: #ffffff;
        background: lightgray;
        border-radius: 50%;
        margin: 0 auto 10px auto;
        padding: 2px
    }

    #progressbar li:after {
        content: '';
        width: 100%;
        height: 2px;
        background: lightgray;
        position: absolute;
        left: 0;
        top: 25px;
        z-index: -1
    }

    #progressbar li.active:before,
    #progressbar li.active:after {
        background: #5cb85c;
    }

    .progress {
        height: 20px
    }

    .progress-bar {
        background-color: #5cb85c;
    }

    .fit-image {
        width: 100%;
        object-fit: cover
    }
</style>
@endsection
@section('content')
    <div class="ex-basic-1">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumbs">
                        <a href="{{route('home')}}">@lang('client.page.home.title')</a><i class="fa fa-angle-double-right"></i><a href="{{route('client.jobs')}}">@lang('client.page.job.title')</a><i class="fa fa-angle-double-right"></i><span>{{$data['job']->name}}</span>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="ex-basic-2">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="text-container col-lg-8 mx-auto">
                        @if($data['apply'] == null)
                        <h3 class="text-center">@lang('client.page.apply.form_title')</h3>
                        <form action="{{route('client.apply.job')}}" class="row mt-4" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="col-md-6">
                                <div class="form-group @error('name') has-error @enderror">
                                    <label>@lang('custom.name')</label>
                                    <input type="text" name="name" class="form-control" value="{{auth()->user()->name}}" readonly placeholder="Please enter full name">
                                    @error('name') 
                                    <span class="text-danger"> {{$message}} </span>
                                    @enderror
                                </div>
                                <div class="form-group @error('email') has-error @enderror">
                                    <label>@lang('custom.email')</label>
                                    <input type="email" name="email" class="form-control" value="{{auth()->user()->email}}" readonly placeholder="Please enter email">
                                    @error('email') 
                                    <span class="text-danger"> {{$message}} </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <input type="hidden" name="job_id" value="{{$data['job']->id}}">
                                @if(auth()->user()->cv->count() > 0)
                                <div class="form-group">
                                    <label>@lang('custom.choose_cv')</label>
                                    @foreach(auth()->user()->cv as $key => $value)
                                    <div class="form-check">
                                        <label class="form-check-label">
                                            <input type="radio" class="form-check-input" @if($key == 0) checked @endif name="cv_id" value="{{$value->id}}">{{$value->cv_name}}
                                        </label>
                                    </div>
                                    @endforeach
                                    @error('cv_id') 
                                    <span class="text-danger"> {{$message}} </span>
                                    @enderror
                                </div>
                                @else
                                <div class="form-group">
                                    <label>@lang('custom.name_cv')</label>
                                    <input type="text" class="form-control" value="{{old('cv_name')}}" name="cv_name">
                                    @error('cv_name') 
                                    <span class="text-danger"> {{$message}} </span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label>@lang('custom.cv_url')</label>
                                    <input type="file" name="cv_url" accept="application/pdf,.doc,.docx,application/msword">
                                    @error('cv_url') 
                                    <p class="text-danger"> {{$message}} </p>
                                    @enderror
                                </div>
                                @endif
                            </div>
                            <div class="col-md-12 text-center">
                                <div class="form-group @error('letter') has-error @enderror">
                                    <label>@lang('custom.letter')</label>
                                    <textarea name="letter" class="form-control" cols="30" rows="10"> {{old('letter')}}</textarea>
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
                        @else
                        <h3 id="heading">@lang('client.page.apply.process.title')</h3>
                        <p>@lang('client.page.apply.process.description')</p>
                        <form id="msform">
                            <ul id="progressbar">
                                <li class="active" id="account"><strong>Checking</strong></li>
                                <li id="personal"><strong>Review</strong></li>
                                <li id="payment"><strong>Interviewer</strong></li>
                                <li id="confirm"><strong>Finish</strong></li>
                            </ul>
                            <fieldset>
                                <div class="form-card">
                                    <div class="row">
                                        <div class="col-7">
                                            <h2 class="fs-title">Account Information:</h2>
                                        </div>
                                        <div class="col-5">
                                            <h2 class="steps">Step 1 - 4</h2>
                                        </div>
                                    </div> 

                                </div> 
                                <input type="button" name="next" class="next action-button" value="Next" />
                            </fieldset>
                            <fieldset>
                                <div class="form-card">
                                    <div class="row">
                                        <div class="col-7">
                                            <h2 class="fs-title">Personal Information:</h2>
                                        </div>
                                        <div class="col-5">
                                            <h2 class="steps">Step 2 - 4</h2>
                                        </div>
                                    </div>

                                </div> 
                                <input type="button" name="next" class="next action-button" value="Next" /> <input type="button" name="previous" class="previous action-button-previous" value="Previous" />
                            </fieldset>
                            <fieldset>
                                <div class="form-card">
                                    <div class="row">
                                        <div class="col-7">
                                            <h2 class="fs-title">Image Upload:</h2>
                                        </div>
                                        <div class="col-5">
                                            <h2 class="steps">Step 3 - 4</h2>
                                        </div>
                                    </div> 
                                    
                                </div> 
                                <input type="button" name="next" class="next action-button" value="Submit" /> <input type="button" name="previous" class="previous action-button-previous" value="Previous" />
                            </fieldset>
                            <fieldset>
                                <div class="form-card">
                                    <div class="row">
                                        <div class="col-7">
                                            <h2 class="fs-title">Finish:</h2>
                                        </div>
                                        <div class="col-5">
                                            <h2 class="steps">Step 4 - 4</h2>
                                        </div>
                                    </div> <br><br>
                                    <h2 class="purple-text text-center"><strong>SUCCESS !</strong></h2> <br>
                                    <div class="row justify-content-center">
                                        <div class="col-3"> <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn%3AANd9GcSMudI9BnTi2ZnfY_I_E5V4zOagiLTVSZPfgA&usqp=CAU" class="fit-image"> </div>
                                    </div> <br><br>
                                    <div class="row justify-content-center">
                                        <div class="col-7 text-center">
                                            <h5 class="purple-text text-center">You Have Successfully Signed Up</h5>
                                        </div>
                                    </div>
                                </div>
                            </fieldset>
                        </form>
                        @endif
                    </div>
                </div>
                <div class="row col-lg-12">
                    <div class="col-lg-9 col-md-8">
                        <div class="text-container">
                            <h3>{{$data['job']->name}}</h3>
                            <div class="">
                            {{$data['job']->description}}
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-4">
                        <h4>@lang('client.page.apply.sidebar.title')</h4>
                        <ul class="pl-0">
                            <li class="row justify-content-between mx-0 mb-2">
                                <b>@lang('client.page.apply.sidebar.level')</b>
                                <div class="value">Nhân viên</div>
                            </li>
                            <li class="row justify-content-between mx-0 mb-2">
                                <b>@lang('client.page.apply.sidebar.job')</b>
                                <div class="value">Tự động hóa</div>
                            </li>
                            <li class="row justify-content-between mx-0 mb-2">
                                <b>@lang('client.page.apply.sidebar.exp')</b>
                                <div class="value">2 - 10 Năm</div>
                            </li>
                            <li class="row justify-content-between mx-0 mb-2">
                                <b>@lang('client.page.apply.sidebar.salary')</b>
                                <div class="value">Cạnh tranh</div>
                            </li>
                            <li class="row justify-content-between mx-0 mb-2">
                                <b>@lang('client.page.apply.sidebar.work_place')</b>
                                <div class="value">Bình Dương </div>
                            </li>
                            <li class="row justify-content-between mx-0 mb-2">
                                <b>@lang('client.page.apply.sidebar.end_time')</b>
                                <div class="value">30/09/2020</div>
                            </li>
                        </ul>
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
@section('script')
    <script>
        $(document).ready(function(){
            var current_fs, next_fs, previous_fs; //fieldsets
            var opacity;
            var current = 1;
            var steps = $("fieldset").length;

            setProgressBar(current);

            $(".next").click(function(){

            current_fs = $(this).parent();
            next_fs = $(this).parent().next();

            //Add Class Active
            $("#progressbar li").eq($("fieldset").index(next_fs)).addClass("active");

            //show the next fieldset
            next_fs.show();
            //hide the current fieldset with style
            current_fs.animate({opacity: 0}, {
            step: function(now) {
            // for making fielset appear animation
            opacity = 1 - now;

            current_fs.css({
            'display': 'none',
            'position': 'relative'
            });
            next_fs.css({'opacity': opacity});
            },
            duration: 500
            });
            setProgressBar(++current);
        });

        $(".previous").click(function(){

            current_fs = $(this).parent();
            previous_fs = $(this).parent().prev();

            //Remove class active
            $("#progressbar li").eq($("fieldset").index(current_fs)).removeClass("active");

            //show the previous fieldset
            previous_fs.show();

            //hide the current fieldset with style
            current_fs.animate({opacity: 0}, {
            step: function(now) {
                // for making fielset appear animation
                opacity = 1 - now;

                current_fs.css({
                'display': 'none',
                'position': 'relative'
                });
                previous_fs.css({'opacity': opacity});
                },
                duration: 500
            });
            setProgressBar(--current);
        });

        function setProgressBar(curStep){
            var percent = parseFloat(100 / steps) * curStep;
            percent = percent.toFixed();
            $(".progress-bar")
            .css("width",percent+"%")
            }

            $(".submit").click(function(){
            return false;
            })
        });
    </script>
@endsection
