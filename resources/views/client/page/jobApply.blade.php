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
        color: #673AB7;
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
        border: 1px solid #673AB7;
        outline-width: 0
    }

    #msform .action-button {
        width: 100px;
        background: #673AB7;
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
        color: #673AB7;
        margin-bottom: 15px;
        font-weight: normal;
        text-align: left
    }

    .purple-text {
        color: #673AB7;
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
        color: #673AB7
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
        background: #673AB7
    }

    .progress {
        height: 20px
    }

    .progress-bar {
        background-color: #673AB7
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
                    <div class="text-container col-lg-10 mx-auto">
                        @if(auth()->user()->id > 3)
                        <h3 class="text-center">@lang('client.page.apply.form_title')</h3>
                        <form action="{{route('client.apply.job')}}" class="row" method="post">
                            @csrf
                            <div class="col-md-6">
                                <div class="form-group @error('name') has-error @enderror">
                                    <label>@lang('custom.name')</label>
                                    <input type="text" name="name" class="form-control" value="{{auth()->user()->name}}" readonly placeholder="Please enter full name">
                                    @error('name') 
                                    <span class="text-danger"> {{$message}} </span>
                                    @enderror
                                </div>
                                <div class="form-group @error('phone') has-error @enderror">
                                    <label>@lang('custom.phone')</label>
                                    <input type="text" name="phone" class="form-control" value="{{auth()->user()->phone}}" placeholder="Please enter phone">
                                    @error('phone') 
                                    <span class="text-danger"> {{$message}} </span>
                                    @enderror
                                </div>
                                <div class="form-group @error('address') has-error @enderror">
                                    <label>@lang('custom.address')</label>
                                    <input type="text" name="address" class="form-control" value="{{auth()->user()->address}}" placeholder="Please enter address">
                                    @error('address') 
                                    <span class="text-danger"> {{$message}} </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group @error('email') has-error @enderror">
                                    <label>@lang('custom.email')</label>
                                    <input type="email" name="email" class="form-control" value="{{auth()->user()->email}}" readonly placeholder="Please enter email">
                                    @error('email') 
                                    <span class="text-danger"> {{$message}} </span>
                                    @enderror
                                </div>
                                @if(auth()->user()->cv->count() > 0)
                                <div class="form-group">
                                    <label>@lang('custom.choose_cv')</label>
                                    @foreach(auth()->user()->cv as $item)
                                    <div class="form-check">
                                        <label class="form-check-label">
                                            <input type="radio" class="form-check-input" name="cv_id" value="{{$item->id}}">{{$item->name}}
                                        </label>
                                    </div>
                                    @endforeach
                                </div>
                                @else
                                <div class="form-group">
                                    <label>@lang('custom.name_cv')</label>
                                    <input type="text" class="form-control" name="name">
                                    <span class="help-block text-danger"> </span>
                                </div>
                                <div class="form-group">
                                    <label>@lang('custom.cv_url')</label>
                                    <input type="file" name="cv_url" accept="*">
                                    <p class="help-block text-danger"> </p>
                                </div>
                                @endif
                            </div>
                            <div class="col-md-12 text-center">
                                <div class="form-group @error('letter') has-error @enderror">
                                    <label>@lang('custom.letter')</label>
                                    <textarea name="letter" class="form-control" cols="30" rows="10"></textarea>
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
                        <h2 id="heading">Sign Up Your User Account</h2>
                        <p>Fill all form field to go to next step</p>
                        <form id="msform">
                            <ul id="progressbar">
                                <li class="active" id="account"><strong>Account</strong></li>
                                <li id="personal"><strong>Personal</strong></li>
                                <li id="payment"><strong>Image</strong></li>
                                <li id="confirm"><strong>Finish</strong></li>
                            </ul>
                            <div class="progress">
                                <div class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar" aria-valuemin="0" aria-valuemax="100"></div>
                            </div> <br> <!-- fieldsets -->
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
                                        <div class="col-3"> <img src="https://i.imgur.com/GwStPmg.png" class="fit-image"> </div>
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
                    <div class="text-container col-lg-10 mx-auto">
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
