@extends('admin.layout.layout')
@section('css')
@endsection
@section('content')
<div class="row">
    <ol class="breadcrumb">
        <li><a href="#">
            <em class="fa fa-home"></em>
        </a></li>
        <li class="active">Jobs</li>
        <li class="active">Create Job</li>
    </ol>
</div>
<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">Create Job</h1>
    </div>
</div>
<div class="col-lg-12">
    <div class="panel panel-default">
       <div class="panel-heading">Add</div>
       <div class="panel-body">
           <div class="col-md-8">
                <form action="{{ route('jobs.store') }}" method="post">
                    @csrf
                    <div class="form-group">
                        <label>Title : </label>
                        <input name="name" type="text" class="form-control" placeholder="Enter title">
                    </div>
                    <div class="category form-group row">
                        <div class="col-md-8">
                            <label for="inputCategory">Category :</label>
                            <select name="category_id" id="inputCategory" class="form-control">
                                <option value="null" disabled="disabled" selected>Choose...</option>
                                {!! $htmlOptionCategory !!}
                            </select>
                        </div>
                    </div>
                    <div class="location form-group row">
                        <div class="col-md-8">
                            <label for="inputLocation">Location :</label>
                            <select name="location_id" id="inputLocation" class="form-control">
                                <option value="null" disabled="disabled" selected>Choose Location...</option>
                                {!! $htmlOptionLocation !!}
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-md-4">
                            <label>Expire At : </label>
                            <input name="expire_date" type="date" class="form-control" placeholder="Enter expire date">
                        </div>
                    </div>
                    <div class="form-group">
                        <label>Description : </label>
                        <textarea name="description" class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
           </div>
       </div>
    </div>
 </div>
@endsection
@section('script')

@endsection