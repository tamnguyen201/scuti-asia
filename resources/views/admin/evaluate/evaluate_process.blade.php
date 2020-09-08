@extends('admin.layout.layout')
@section('css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/switchery/0.8.2/switchery.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.9.0/fullcalendar.css" />
    <link rel="stylesheet" href="{{ asset('adminAsset/css/calendar.css') }}">
    <link rel="stylesheet" href="{{ asset('adminAsset/css/evaluate.css') }}">
@endsection
@section('content')
<div class="row">
    <ol class="breadcrumb">
        <li><a href="#">
            <em class="fa fa-home"></em>
        </a></li>
        <li class="active">Evaluate CVs</li>
    </ol>
</div>
<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">Đánh giá CV</h1>
    </div>
        <div class="col-lg-12">
            <div class="panel-body">
                <div id="msform">
                    {{-- <ul id="progressbar">
                        <li id="account" class="active"><strong>Applied</strong></li>
                        <li id="personal" class="active"><strong>Checking</strong></li>
                        <li id="payment"><strong>Interview</strong></li>
                        <li id="confirm"><strong>Finish</strong></li>
                    </ul> --}}
                    @switch($processById->step)
                        @case(1)
                            <ul id="progressbar">
                                <li id="account" class="active"><strong>Checking</strong></li>
                                <li id="personal" class="active"><strong>Reviewing</strong></li>
                                <li id="payment"><strong>Interview</strong></li>
                                <li id="confirm"><strong>Finish</strong></li>
                            </ul>
                            <fieldset class="process1">
                                @include('admin.evaluate.review')
                            </fieldset>
                            @break
                        @case(2)
                            <ul id="progressbar">
                                <li id="account" class="active"><strong>Applied</strong></li>
                                <li id="personal" class="active"><strong>Checking</strong></li>
                                <li id="payment" class="active"><strong>Interview</strong></li>
                                <li id="confirm"><strong>Finish</strong></li>
                            </ul>
                            <fieldset>
                                <div class="form-card">
                                    <div class="col-md-6">
                                        <h3>Đánh giá ứng viên :</h3>
                                    </div>
                                    <div class="col-md-5">
                                        <h3 class="steps">Step 3 - 4</h3>
                                    </div>
                                </div>
                                    @include('admin.evaluate.calendar')
                                    {{-- <input type="button" name="next" class="next action-button" value="Next" /> --}}
                                    {{-- <input type="button" name="next" class="previous action-button" value="Back" /> --}}
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
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.24.0/moment.min.js" integrity="sha256-4iQZ6BVL4qNKlQ27TExEhBN1HFPvAvAMbFavKKosSWQ=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.9.0/fullcalendar.js"></script>

      {!! $calendar->script() !!}
@endsection