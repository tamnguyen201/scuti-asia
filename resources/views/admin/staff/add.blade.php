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
                <form role="form" action="{{route('admin.employees.store')}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="col-md-6">
                        <div class="form-group @error('name') has-error @enderror">
                            <label>Full Name</label>
                            <input type="text" name="name" value="{{old('name')}}" class="form-control" placeholder="Please enter full name">
                            @error('name') 
                            <span class="help-block"> {{$message}} </span>
                            @enderror
                        </div>
                        <div class="form-group @error('email') has-error @enderror">
                            <label>Email</label>
                            <input type="email" name="email" value="{{old('email')}}" class="form-control" placeholder="Please enter email">
                            @error('email') 
                            <span class="help-block"> {{$message}} </span>
                            @enderror
                        </div>
                        <div class="form-group @error('phone') has-error @enderror">
                            <label>Phone</label>
                            <input type="text" name="phone" value="{{old('phone')}}" class="form-control" placeholder="Please enter phone">
                            @error('phone') 
                            <span class="help-block"> {{$message}} </span>
                            @enderror
                        </div>
                        <div class="form-group @error('password') has-error @enderror">
                            <label>Password</label>
                            <input type="password" name="password" value="{{old('password')}}" class="form-control" placeholder="Please enter password">
                            @error('password') 
                            <span class="help-block"> {{$message}} </span>
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
                            <input type="file" onchange="encodeImageFileAsURL(this)" name="avatar">
                        </div>
                        <div class="form-group preview-img">
                            <img src="default-img.png" alt="your image" class="img-responsive" />
                        </div>
                    </div>
                    
                    <div class="col-md-12 text-center">
                        <button type="submit" class="btn btn-primary">Submit</button>
                        <button type="reset" class="btn btn-default">Reset</button>
                        <a href="{{route('admin.employees')}}" class="btn btn-danger">Cancel</a>
                    </div>
                </form>
            </div>
        </div>
     </div>
 </div>
@endsection
@section('script')
    <script>
        function encodeImageFileAsURL(element) {
        var file = element.files[0];
        if(file === undefined){
            $(".preview-img img").attr('src', "default-img.png");
        }else{
            var reader = new FileReader();
            reader.onloadend = function() {
                if(reader.result){
                    $(".preview-img img").attr('src', reader.result);
                }
            }
            reader.readAsDataURL(file);
        }
    }
    </script>
@endsection