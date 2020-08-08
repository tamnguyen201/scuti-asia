@extends('admin.layout.layout')
@section('title', 'Add new employee')
@section('content')
<div class="row">
    <ol class="breadcrumb">
        <li><a href="#">
            <em class="fa fa-home"></em>
        </a></li>
        <li class="active">Employees</li>
    </ol>
</div>
<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">Employees Manage</h1>
    </div>
</div>
<div class="col-lg-12">
    <div class="panel panel-default">
        <div class="panel-heading">Forms</div>
        <div class="panel-body">
            <div class="col-md-12">
                <form role="form" action="">
                    @csrf
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Full Name</label>
                            <input class="form-control @error('name') has-error @enderror" placeholder="Please enter full name">
                            @error('title') 
                            <span> {{$message}} </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label>Email</label>
                            <input class="form-control @error('name') has-error @enderror" placeholder="Please enter email">
                            @error('title') 
                            <span> {{$message}} </span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Role</label>
                            <select class="form-control">
                                @foreach ($roles as $item)
                                <option value="{{$item->id}}">{{$item->name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Avatar</label>
                            <input type="file">
                            <p class="help-block">Example block-level help text here.</p>
                        </div>
                    </div>
                    
                    <div class="col-md-12 text-center">
                        <button type="submit" class="btn btn-primary">Submit</button>
                        <button type="reset" class="btn btn-default">Reset</button>
                    </div>
                </form>
            </div>
        </div>
     </div>
 </div>
@endsection