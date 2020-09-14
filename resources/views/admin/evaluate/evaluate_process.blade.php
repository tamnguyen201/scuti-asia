@extends('admin.layout.layout')
@section('css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/switchery/0.8.2/switchery.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
    <link rel="stylesheet" href="{{ asset('adminAsset/css/calendar.css') }}">
    <link rel="stylesheet" href="{{ asset('adminAsset/css/evaluate.css') }}">
    <link href="{{ asset('fullcalendar/fullcalendar.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('fullcalendar/fullcalendar.print.min.css') }}" rel="stylesheet" media="print" />
@endsection
@section('content')
<div class="row">
    <ol class="breadcrumb">
        <li><a href="#">
            <em class="fa fa-home"></em>
        </a></li>
        <li class="active">@lang('custom.evaluate.evaluate_process')</li>
    </ol>
</div>
<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">@lang('custom.evaluate.evaluate_cvs')</h1>
    </div>
        <div class="col-lg-12">
            <div class="panel-body">
                <div id="msform">
                    @switch($processById->step)
                        @case(1)
                            <ul id="progressbar">
                                <li id="account" class="active"><strong>@lang('custom.evaluate.process_1')</strong></li>
                                <li id="personal" class="active"><strong>@lang('custom.evaluate.process_2')</strong></li>
                                <li id="payment"><strong>@lang('custom.evaluate.process_3')</strong></li>
                                <li id="confirm"><strong>@lang('custom.evaluate.process_4')</strong></li>
                            </ul>
                            <fieldset class="process1">
                                @include('admin.evaluate.review')
                            </fieldset>
                            @break
                        @case(2)
                            <ul id="progressbar">
                                <li id="account" class="active"><strong>@lang('custom.evaluate.process_1')</strong></li>
                                <li id="personal" class="active"><strong>@lang('custom.evaluate.process_2')</strong></li>
                                <li id="payment" class="active"><strong>@lang('custom.evaluate.process_3')</strong></li>
                                <li id="confirm"><strong>@lang('custom.evaluate.process_4')</strong></li>
                            </ul>
                            <fieldset>
                                <div class="form-card">
                                    <div class="col-md-6">
                                        <h3>@lang('custom.evaluate.candidate_evaluate') :</h3>
                                    </div>
                                    <div class="col-md-5">
                                        <h3 class="steps">@lang('custom.evaluate.step') 3 - 4</h3>
                                    </div>
                                </div>
                                    @include('admin.evaluate.calendar')
                            </fieldset>
                            @break
                        @case(3)
                            <fieldset>
                                <div class="form-card">
                                    <div class="col-md-6">
                                        <h3>Đánh giá ứng viên :</h3>
                                    </div>
                                    <div class="col-md-5">
                                        <h3 class="steps">Step 4 - 4</h3>
                                    </div>
                                </div> 
                                <input type="button" name="next" class="previous action-button" value="Finish" />
                            </fieldset>
                            @break
                        @default      
                    @endswitch
                </div>
            </div>   
        </div>
        </div>
</div>

@endsection
@section('script')
    <script src="{{ asset('adminAsset/js/evaluate.js') }}"></script>
    <script src="{{ asset('fullcalendar/lib/moment.min.js') }}"></script>
    <script src="{{ asset('fullcalendar/fullcalendar.min.js') }}"></script>
    <script src="{{ asset('fullcalendar/locale/vi.js') }}"></script>

      {!! $calendar->script() !!}
      <script>
        $(document).ready(function() {
            $('#calendar').fullCalendar({
                themeSystem: 'bootstrap'
            });
        });
    </script>
    
      <script type="text/javascript">
        $('.btn-send-email').click(function (e) {
            e.preventDefault();
            let url = $(this).attr('href');
            $.get(url)
            .done(function (results) {
            $(".modal-body").html(results);
            $("#myModal").modal('show');
            }).fail(function (data) {
            });
        });
    </script>

@endsection