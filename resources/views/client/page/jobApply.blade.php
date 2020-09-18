@extends('client.layout.master')
@section('title', trans('client.page.job.title'))
@section('css')
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" >
<style>
    p {
        color: gray;
        line-height: 1.2rem;
        font: 400 1.2rem/1.375rem "Arial", sans-serif;
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

    #progressbar li:hover {
        cursor: pointer;
    }

    #progressbar #account:before {
        font-family: FontAwesome;
        content: "\f2bb"
    }

    #progressbar #personal:before {
        font-family: FontAwesome;
        content: "\f24e"
    }

    #progressbar #payment:before {
        font-family: FontAwesome;
        content: "\f086"
    }

    #progressbar #confirm:before {
        font-family: FontAwesome;
        content: "\f2b5"
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

    #progressbar li.inactive:before,
    #progressbar li.inactive:after {
        background: #ec1d08;
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

    @if($data['apply'] != null)
    <div class="ex-basic-2" style="background-color: #eff3f6; padding-top:1rem; padding-bottom-1rem">
        <div class="container" style="background-color: #fff;">
            <div class="row">
                <div class="col-lg-12">
                    <div class="text-container" style="padding-top:1rem; padding-bottom-1rem">
                        <div class="container-fluid">
                            <div class="row justify-content-center">
                                <div class="col-11 text-center p-0 mt-3 mb-2">
                                    <div class="card px-0 pt-4 pb-0 mt-3 mb-3">
                                        <h3 id="heading">@lang('client.page.apply.process.title')</h3>
                                        <p><a href="{{route('home')}}/#recruitment-flow" target="_blank">@lang('client.page.apply.process.description')</a></p>
                                        <form id="msform">
                                            <ul id="progressbar">
                                                <li class="active" id="account"><strong> Ứng Tuyển </strong></li>
                                                @if(isset($data['apply']->process[0]->evaluate) && $data['apply']->process[0]->evaluate->status == 1)
                                                <li class="active" step="0" id="personal"><strong>{{$data['apply']->process[0]->name}}</strong></li>
                                                @elseif(isset($data['apply']->process[0]->evaluate) && $data['apply']->process[0]->evaluate->status == 0)
                                                <li class="inactive" step="0" id="personal"><strong>{{$data['apply']->process[0]->name}}</strong></li>
                                                @else
                                                <li step="0" id="personal"><strong>Đánh Giá</strong></li>
                                                @endif
                                                @if(isset($data['apply']->process[1]->evaluate) && $data['apply']->process[1]->evaluate->status == 1)
                                                <li class="active" step="1" id="payment"><strong>{{$data['apply']->process[1]->name}}</strong></li>
                                                @elseif(isset($data['apply']->process[1]->evaluate) && $data['apply']->process[1]->evaluate->status == 0)
                                                <li class="inactive" step="1" id="payment"><strong>{{$data['apply']->process[1]->name}}</strong></li>
                                                @else
                                                <li step="1" id="payment"><strong>Phỏng Vấn</strong></li>
                                                @endif
                                                @if(isset($data['apply']->process[2]->evaluate) && $data['apply']->process[2]->evaluate->status == 1)
                                                <li class="active" step="2" id="confirm"><strong>Hoàn Thành</strong></li>
                                                @elseif(isset($data['apply']->process[2]->evaluate) && $data['apply']->process[2]->evaluate->status == 0)
                                                <li class="inactive" step="2" id="confirm"><strong>Hoàn Thành</strong></li>
                                                @else
                                                <li step="2" id="confirm"><strong>Hoàn Thành</strong></li>
                                                @endif
                                            </ul>
                                            @foreach($data['apply']->process as $key => $process)
                                            @if($key != 2)
                                            <fieldset class="col-lg-10 mx-auto">
                                                <div class="form-card">
                                                    <div class="row">
                                                        <div class="col-7">
                                                            <h2 class="fs-title">@lang('client.page.apply.process.info')</h2>
                                                        </div>
                                                        <div class="col-5">
                                                            <h2 class="steps">@lang('client.page.apply.step') {{$process->step . ' - ' . $process->name}}</h2>
                                                        </div>
                                                    </div> 
                                                    <div class="row col-lg-11 mx-auto">
                                                        <p>{{$process->evaluate->reason}}</p>
                                                    </div>
                                                </div> 
                                                @if($key < $data['apply']->process->count() - 1)
                                                <input type="button" name="next" class="next action-button" value="@lang('custom.button.next')" />
                                                @endif
                                                @if($key > 0)
                                                <input type="button" name="previous" class="previous action-button-previous" value="@lang('custom.button.previous')" />
                                                @endif
                                            </fieldset>
                                            @else
                                            <fieldset class="col-lg-10 mx-auto">
                                                <div class="form-card">
                                                    <div class="row">
                                                        <div class="col-7">
                                                            <h2 class="fs-title">{{$process->name}}:</h2>
                                                        </div>
                                                        <div class="col-5">
                                                            <h2 class="steps">@lang('client.page.apply.step') {{$process->step}} - {{$process->name}}</h2>
                                                        </div>
                                                    </div> <br><br>
                                                    <h2 class="purple-text text-center"><strong>@lang('client.page.apply.process.finish')</strong></h2> <br>
                                                    <div class="row justify-content-center">
                                                        <div class="col-3"> <img src="https://www.suunto.com/contentassets/1fda3e7d222d45e49282f7d13439c7db/icon-success.png" class="fit-image"> </div>
                                                    </div> <br><br>
                                                    <div class="row justify-content-center">
                                                        <div class="col-7 text-center">
                                                            <h5 class="purple-text text-center">{{($process->reason) ? $process->reason : trans('client.page.apply.finish')}}</h5>
                                                        </div>
                                                    </div>
                                                </div>
                                            </fieldset>
                                            @endif
                                            @endforeach
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endif

    <div class="ex-basic-2" style="background-color: #eff3f6; padding-top:1rem; padding-bottom-1rem">
        <div class="container">
            <div class="row">
                <div class="col-md-8 mb-4 p-0" style="background-color: #fff;">
                    <h2 class="py-2 px-4 border-bottom">{{$data['job']->name}}</h2>
                    <div class="text-container pt-3 px-4">
                        <div class="">
                        {!! $data['job']->content !!}
                        </div>
                    </div>
                    <a class="btn-outline-reg back ml-4 mb-5" href="{{route('client.jobs')}}">@lang('client.page.apply.job_another')</a>
                </div>
                <div class="col-md-4 pr-0">
                    <div class="col-lg-12 mb-2 p-0" style="background-color: #fff;">
                        <h3 class="p-2 border-bottom">@lang('client.page.apply.sidebar.title')</h3>
                        <div class="pb-2">
                            <ul class="px-3">
                                <li class="row justify-content-between mx-0 mb-2">
                                    <b>@lang('client.page.apply.sidebar.location')</b>
                                    <div class="value">{{$data['job']->location->name}} </div>
                                </li>
                                <li class="row justify-content-between mx-0 mb-2">
                                    <b>@lang('client.page.apply.sidebar.salary')</b>
                                    <div class="value">{{$data['job']->salary}}</div>
                                </li>
                                <li class="row justify-content-between mx-0 mb-2">
                                    <b>@lang('client.page.apply.sidebar.end_time')</b>
                                    <div class="value">{{$data['job']->formatExpireDay()}}</div>
                                </li>
                            </ul>
                            @if($data['apply'] == null)
                            <div class="form-group px-3">
                                <a href="{{route('client.applied', [$data['job']->id, $data['job']->slug])}}" class="form-control text-center btn-outline-reg mt-0" >@lang('client.section.recruitment.apply')</a>
                            </div>
                            @endif
                        </div>
                    </div>
                    <div class="col-lg-12 mb-2 p-0" style="background-color: #fff;">
                        <h3 class="p-2 border-bottom">@lang('client.page.job.related_job')</h3>
                        <div class="col-lg-12 p-0">
                            @foreach($data['related_job'] as $job )
                            <div class="col-md-12 list-group-item mt-2 border-top-0 border-left-0 border-right-0">
                                <div class="col-12 p-0">
                                    <div class="mb-block cell name-job">
                                        <h4 class="title-h4"><a style="font-weight: normal;color: #f4511e; text-decoration: none" href="{{route('job-detail', [$job->id, $job->slug])}}">[{{$job->location->name}}] {{$job->name}}</a></h4>
                                    </div>
                                    <div class="d-flex justify-content-between">
                                        <span><i class="far fa-money-bill-alt"></i> {{$job->salary}} </span>
                                        <span><i class="far fa-clock"></i> {{$job->formatExpireDay()}} </span>
                                    </div>
                                </div>
                                <div class="col-lg-12 mt-2 p-0 text-justify">
                                    {{$job->description}}
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-md">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title offset-md-3" id="exampleModalLabel">@lang('client.page.apply.form_title')</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p class="text-danger text-center errors"></p>
                    <form action="{{route('client.apply.job')}}" id="form-apply-job" class="col-11 mx-auto" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label class="label-required">@lang('custom.name')</label>
                            <input type="text" name="name" class="form-control" value="{{auth()->user()->name}}" readonly placeholder="Please enter full name">
                            <span class="text-danger"></span>
                        </div>
                        <div class="form-group">
                            <label class="label-required">@lang('custom.email')</label>
                            <input type="email" name="email" class="form-control" value="{{auth()->user()->email}}" readonly placeholder="Please enter email">
                            <span class="text-danger"></span>
                        </div>
                        <input type="hidden" name="job_id" value="{{$data['job']->id}}">
                        @if(auth()->user()->cv->count() > 0)
                        <div class="form-group">
                            <label class="label-required">@lang('custom.choose_cv')</label>
                            @foreach(auth()->user()->cv as $key => $value)
                            <div class="form-check">
                                <label class="form-check-label">
                                    <input type="radio" class="form-check-input" @if($key == 0) checked @endif name="cv_file" value="{{$value->cv_url}}">{{$value->cv_name}}
                                </label>
                            </div>
                            @endforeach
                            <span class="text-danger"></span>
                        </div>
                        @else
                        <div class="form-group">
                            <label class="label-required">@lang('custom.name_cv')</label>
                            <input type="text" class="form-control" value="{{old('cv_name')}}" name="cv_name" placeholder="@lang('custom.placeholder.cv_url')">
                            <span class="text-danger"></span>
                        </div>
                        <div class="form-group">
                            <label class="label-required">@lang('custom.cv_url')</label>
                            <input type="file" name="cv_url" accept="application/pdf,.doc,.docx,application/msword"> <br>
                            <span class="text-danger"></span>
                        </div>
                        @endif
                        <div class="col-md-12 px-0">
                            <div class="form-group">
                                <label>@lang('custom.letter')</label>
                                <textarea name="letter" class="form-control p-0" cols="30" rows="8" placeholder="@lang('custom.placeholder.message')"> {{old('letter')}}</textarea>
                                <span class="text-danger"></span>
                            </div>
                        </div>
                        <div class="col-md-12 text-center">
                            <button type="submit" class="btn-outline-reg back">@lang('custom.button.submit')</button>
                            <button class="btn-outline-reg back" data-dismiss="modal">@lang('custom.button.cancel')</button>
                        </div>
                    </form>
                </div>
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

            $("#progressbar > li").click(function(){
                if($(this)[0].className.indexOf('active') >= 0){
                $("fieldset").css({
                    'display': 'none',
                    'position': 'relative'
                });

                $("fieldset").eq($(this).attr('step')).css({
                    'opacity': 1, 'position': 'relative', 'display': 'block',
                    });
                }
            })
            $(".next").click(function(){

                current_fs = $(this).parent();
                next_fs = $(this).parent().next();
                next_fs.show();
                current_fs.animate({opacity: 0}, {
                step: function(now) {
                opacity = 1 - now;
                current_fs.css({
                'display': 'none',
                'position': 'relative'
                });
                next_fs.css({'opacity': opacity});
                },
                duration: 500
                });
            });

            $(".previous").click(function(){

                current_fs = $(this).parent();
                previous_fs = $(this).parent().prev();
                previous_fs.show();
                current_fs.animate({opacity: 0}, {
                step: function(now) {
                    opacity = 1 - now;
                    current_fs.css({
                    'display': 'none',
                    'position': 'relative'
                    });
                    previous_fs.css({'opacity': opacity});
                    },
                    duration: 500
                });
            });

            @if($data['apply'] == null) 
                $("#myModal").modal('show');

            $('#form-apply-job').on('submit', function(e) {
                e.preventDefault();
                let domForm = $(this);
                let url = $(this).attr('action');
                let inputFile = $('body').find('input[name=cv_url]')
                var postData = $(this).serialize();
                let cache = processData = true;
                let contentType = 'application/x-www-form-urlencoded; charset=UTF-8';
                if(inputFile.length > 0){
                    postData = new FormData(domForm.closest('form')[0]);
                    cache = processData = contentType = false;
                }

                $.ajax({
                    url: url,
                    data: postData,
                    dataType: 'json',
                    cache : cache,
                    processData: processData,
                    contentType: contentType,
                    method: "POST",
                }).done(function (results) {
                    $('.text-danger').text('');
                    if(results.status == true){
                        $("#myModal").modal('hide');
                        swal({
                            title: 'Thành công!',
                            text: "<?php echo trans('custom.alert_messages.contact_alert.text') ?>",
                            type: 'success',
                            icon: 'success'
                        }).then(result => {
                            location.reload();
                        });
                    } else {
                        $('.text-danger.text-center.errors').text(results.message);
                        console.log(results.status);
                    };
                }).fail(function (data) {
                    var errors = data.responseJSON;
                    $('.text-danger').text('');
                    $.each(errors.errors, function (i, val) {
                        $('input[name=' + i + ']').siblings('.text-danger').text(val[0]);
                    });
                });
            })

            @endif
        });
    </script>
@endsection
