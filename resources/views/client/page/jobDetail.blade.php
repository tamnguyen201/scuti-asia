@extends('client.layout.master')
@section('title', trans('custom.page_title.company_manage'))
@section('content')
    @include('client.layout.header')
    <div class="ex-basic-1">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumbs">
                        <a href="index.html">Home</a><i class="fa fa-angle-double-right"></i><span>{{$data['job']->name}}</span>
                    </div> <!-- end of breadcrumbs -->
                </div> <!-- end of col -->
            </div> <!-- end of row -->
        </div> <!-- end of container -->
    </div>

    <div class="ex-basic-2">
        <div class="container">
            <div class="row">
                <div class="col-lg-10 offset-lg-1">
                    <div class="image-container-large">
                        <img class="img-fluid" src="images/project-details-large.jpg" alt="alternative">
                    </div>
                    <div class="text-container">
                        <h3>{{$data['job']->name}}</h3>
                        <p>When you first register for a Juno account, and when you use the Services, we collect some <a class="orange" href="#your-link">Personal Information</a> about you such as:</p>
                        <div class="row">
                            
                        </div>
                    </div>

                    <a class="btn-outline-reg back" href="index.html">BACK</a>
                </div>
            </div>
        </div>
    </div>
@endsection
