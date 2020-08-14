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
                <form role="form" action="{{route('employees.update',$data['manager_edit_id'])}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <input type="hidden" name="user_id" value="{{$data['user']->id}}">
                    <div class="col-md-9">
                        <div class="col-md-4">
                            <img src="{{asset($data['user']->avatar)}}" class="img-responsive" alt="">
                        </div>
                        <div class="col-md-8">
                            <table class="table table-hover">
                                <tbody>
                                    <tr>
                                        <td>Full Name</td>
                                        <td>{{$data['user']->name}}</td>
                                    </tr>
                                    <tr>
                                        <td>Email</td>
                                        <td>{{$data['user']->email}}</td>
                                    </tr>
                                    <tr>
                                        <td>Phone</td>
                                        <td>{{($data['user']->phone) ? $data['user']->phone : 'null'}}</td>
                                    </tr>
                                    <tr>
                                        <td>Address</td>
                                        <td>{{($data['user']->address) ? $data['user']->address : 'null'}}</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label>Role</label>
                            <select name="role_id" class="form-control">
                                @foreach ($data['roles'] as $item)
                                <option value="{{$item->id}}" @if($data['manager_id'] == $item->id) selected @endif>{{$item->name}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-md-12 text-center">
                        <button type="submit" class="btn btn-primary">Submit</button>
                        <button type="reset" class="btn btn-default">Reset</button>
                        <a href="{{route('employees.index')}}" class="btn btn-danger">Cancel</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
