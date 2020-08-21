@extends('admin.layout.layout')
@section('css')
    <link rel="stylesheet" href="{{ asset('adminAsset/css/job.css') }}">
@endsection
@section('content')
<div class="row">
    <ol class="breadcrumb">
        <li><a href="#">
            <em class="fa fa-home"></em>
        </a></li>
        <li class="active">Jobs</li>
    </ol>
</div>
<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">Jobs Manage</h1>
    </div>
</div>
<div class="col-lg-12">
    <div class="panel panel-default">
       <div class="panel-heading">Show information</div>
        <div class="panel-body">
            <div class="detail row">
                <div class="title col-md-3">
                    <h4>Title :</h4>
                </div>
                <div class="content col-md-8">
                    <p>{{ $jobById->name }}</p>
                </div>
            </div>
            <div class="detail row">
                <div class="title col-md-3">
                    <h4>Category :</h4>
                </div>
                <div class="content col-md-8">
                    <p>{{ $jobById->category->category_name }}</p>
                </div>
            </div>
            <div class="detail row">
                <div class="title col-md-3">
                    <h4>Location</h4>
                </div>
                <div class="content col-md-8">
                    <p>{{ $jobById->location->name }} </p>
                </div>
            </div>
            <div class="detail row">
                <div class="title col-md-3">
                    <h4>Expire At:</h4>
                </div>
                <div class="content col-md-8">
                    <p>{{ $jobById->expireDay }}</p>
                </div>
            </div>
            <div class="detail row">
                <div class="title col-md-3">
                    <h4>Description</h4>
                </div>
                <div class="content col-md-8" >
                    <p>{!! $jobById->description !!}</p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
