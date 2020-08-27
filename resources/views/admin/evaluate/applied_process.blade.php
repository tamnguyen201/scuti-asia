@extends('admin.layout.layout')
@section('css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/switchery/0.8.2/switchery.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
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
                <form id="msform">
                    <ul id="progressbar">
                        <li id="account" class="active"><strong>Applied</strong></li>
                        <li id="personal" class="active"><strong>Checking</strong></li>
                        <li id="payment"><strong>Interview</strong></li>
                        <li id="confirm"><strong>Finish</strong></li>
                    </ul>
                    <fieldset>
                        <div class="form-card">
                            <div class="col-md-6">
                                <h3>Quy trình đánh giá :</h3>
                            </div>
                            <div class="col-md-6">
                                <h3 class="steps">Step 2 - 4</h3>
                            </div>
                            
                            <div class="col-md-12">
                                <div class="col-lg-3">
                                    <img src="" class="img-responsive" alt="">
                                </div>
                                <div class="col-lg-9">
                                    <table class="table table-hover">
                                        <tbody>
                                            <tr>
                                                <td>@lang('custom.name')</td>
                                                <td></td>
                                            </tr>
                                            <tr>
                                                <td>@lang('custom.email')</td>
                                                <td></td>
                                            </tr>
                                            <tr>
                                                <td>@lang('custom.phone')</td>
                                                <td></td>
                                            </tr>
                                            <tr>
                                                <td>@lang('custom.address')</td>
                                                <td></td>
                                            </tr>
                                            <tr>
                                                <td>@lang('custom.CV_status')</td>
                                                <td></td>
                                            </tr>
                                            <tr>
                                                <td>@lang('custom.applied_job')</td>
                                                <td></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div> 
                            <input type="button" name="next" class="next action-button" value="Next" />
                    </fieldset>
                    <fieldset>
                        <div class="form-card">
                            <div class="col-md-6">
                                <h3>Đánh giá ứng viên :</h3>
                            </div>
                            <div class="col-md-5">
                                <h3 class="steps">Step 3 - 4</h3>
                            </div>
                        </div> 
                            <input type="button" name="next" class="next action-button" value="Next" />
                            <input type="button" name="next" class="previous action-button" value="Back" />
                    </fieldset>
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
                </form>
            </div>   
        </div>
        </div>
</div>

@endsection
@section('script')
    <script src="{{ asset('adminAsset/js/evaluate.js') }}"></script>
@endsection