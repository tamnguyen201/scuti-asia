@extends('admin.layout.layout')
@section('title', trans('custom.page_title.dashboard'))
@section('content')
<div class="row">
    <ol class="breadcrumb">
        <li><a href="#">
            <em class="fa fa-home"></em>
        </a></li>
        <li class="active">@lang('custom.page_title.dashboard')</li>
    </ol>
</div>
<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">@lang('custom.page_title.dashboard')</h1>
    </div>
</div>
<div class="panel panel-container">
    <div class="row">
        <div class="col-xs-6 col-md-3 col-lg-3 no-padding">
            <div class="panel panel-orange panel-widget border-right">
                <div class="row no-padding"><em class="fa fa-xl fa-users color-teal"></em>
                    <div class="large">{{$data['candidates']}}</div>
                    <div class="text-muted">@lang('custom.candidate_total')</div>
                </div>
            </div>
        </div>
        <div class="col-xs-6 col-md-3 col-lg-3 no-padding">
            <div class="panel panel-teal panel-widget border-right">
                <div class="row no-padding"><em class="fa-xl fas fa-user-check color-blue"></em>
                    <div class="large">{{$data['candidate_evaluated']}}</div>
                    <div class="text-muted">@lang('custom.candidate_evaluated')</div>
                </div>
            </div>
        </div>
        <div class="col-xs-6 col-md-3 col-lg-3 no-padding">
            <div class="panel panel-blue panel-widget border-right">
                <div class="row no-padding"><em class="fa fa-xl fa-user-plus color-orange"></em>
                    <div class="large">{{$data['candidate_accept']}}</div>
                    <div class="text-muted">@lang('custom.candidate_accept')</div>
                </div>
            </div>
        </div>
        <div class="col-xs-6 col-md-3 col-lg-3 no-padding">
            <div class="panel panel-red panel-widget ">
                <div class="row no-padding"><em class="fa fa-xl fa-user-times color-red"></em>
                    <div class="large">{{$data['candidate_failed']}}</div>
                    <div class="text-muted">@lang('custom.candidate_failed')</div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                @lang('custom.statistical')
            </div>
            <div class="panel-body">
                <div class="canvas-wrapper">
                    <canvas class="chart" id="line-chart" height="336" width="1010" style="width: 1010px; height: 336px;"></canvas>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-12">
        <div class="panel panel-default">
            <div class="panel-body">
                
                <div class="search-result-item col-md-12">
                    <div class="col-sm-2"><a href="#">
                        <img class="search-result-image img-responsive" src="http://via.placeholder.com/150x150">
                        </a></div>
                    <div class="search-result-item-body col-sm-10">
                        <div class="row">
                            <div class="col-sm-9">
                                <h3 class="search-result-title"><a href="#">Search Result 3</a></h3>
                                <p class="text-muted">Category</p>
                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut maximus, odio a imperdiet rhoncus, nunc metus luctus mi, at dignissim sem orci ut massa. Morbi a magna risus. Nunc vestibulum, nibh sit amet dictum pharetra, augue quam faucibus neque, et ultrices dui arcu ac ligula.</p>
                            </div>
                            <div class="col-sm-3 text-center">
                                <h4>$499</h4>
                                <a class="btn btn-primary btn-info btn-md" href="#">View Details</a>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
        <div class="text-center">
            
        </div>
    </div>
</div>
@endsection
@section('script')
<script>
	window.onload = function () {
        let labels = [];
        let data1 = [];
        let data2 = [];
        <?php foreach($data['listMonth'] as $item){ ?>
            labels.push('<?php echo $item ?>')
        <?php
        }
        foreach($data['userByMonth'] as $userByMonth){ ?>
            data1.push(<?php echo $userByMonth ?>)
        <?php }
            foreach($data['candidateByMonth'] as $candidateByMonth){ ?>
            data2.push(<?php echo $candidateByMonth ?>)
        <?php
        }
        ?>
        var lineChartData = {
            labels : labels,
            datasets : [
                {
                    label: "My First dataset",
                    fillColor : "rgba(220,220,220,0.2)",
                    strokeColor : "rgba(220,220,220,1)",
                    pointColor : "rgba(220,220,220,1)",
                    pointStrokeColor : "#fff",
                    pointHighlightFill : "#fff",
                    pointHighlightStroke : "rgba(220,220,220,1)",
                    data : data1
                },
                {
                    label: "My Second dataset",
                    fillColor : "rgba(48, 164, 255, 0.2)",
                    strokeColor : "rgba(48, 164, 255, 1)",
                    pointColor : "rgba(48, 164, 255, 1)",
                    pointStrokeColor : "#fff",
                    pointHighlightFill : "#fff",
                    pointHighlightStroke : "rgba(48, 164, 255, 1)",
                    data : data2
                }
            ]

        }
        var chart1 = document.getElementById("line-chart").getContext("2d");
        window.myLine = new Chart(chart1).Line(lineChartData, {
            responsive: true,
            scaleLineColor: "rgba(0,0,0,.2)",
            scaleGridLineColor: "rgba(0,0,0,.05)",
            scaleFontColor: "#c5c7cc"
        });
        
    };
</script>
@endsection
