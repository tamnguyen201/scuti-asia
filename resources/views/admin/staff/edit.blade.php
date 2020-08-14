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
                <form role="form" action="{{route('employees.update',$data['manager_id'])}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <input type="hidden" name="user_id" value="{{$data['user']->id}}">
                    <div class="col-md-6">
                        <div class="form-group @error('name') has-error @enderror">
                            <label>Full Name</label>
                            <input type="text" name="name" value="{{$data['user']->name}}" class="form-control" placeholder="Please enter full name">
                            @error('name') 
                            <span class="help-block"> {{$message}} </span>
                            @enderror
                        </div>
                        <div class="form-group @error('email') has-error @enderror">
                            <label>Email</label>
                            <input type="email" name="email" value="{{$data['user']->email}}" class="form-control" placeholder="Please enter email">
                            @error('email') 
                            <span class="help-block"> {{$message}} </span>
                            @enderror
                        </div>
                        <div class="form-group @error('phone') has-error @enderror">
                            <label>Phone</label>
                            <input type="text" name="phone" value="{{$data['user']->phone}}" class="form-control" placeholder="Please enter phone">
                            @error('phone') 
                            <span class="help-block"> {{$message}} </span>
                            @enderror
                        </div>
                        <div class="form-group @error('address') has-error @enderror">
                            <label>Address</label>
                            <input type="text" name="address" value="{{$data['user']->address}}" class="form-control" placeholder="Please enter address">
                            @error('address') 
                            <span class="help-block"> {{$message}} </span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Role</label>
                            <select name="role_id" class="form-control">
                                @foreach ($data['roles'] as $item)
                                <option value="{{$item->id}}" @if($data['manager_id'] == $item->id) selected @endif>{{$item->name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Avatar</label>
                            <input type="file" onchange="encodeImageFileAsURL(this)">
                        </div>
                        <div class="form-group preview-img">
                            <img src="{{asset($data['user']->avatar)}}" alt="your image" class="img-responsive" />
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
@section('script')
    <script>
        function encodeImageFileAsURL(element) {
            var file = element.files[0];
            if(file === undefined){
                $(".preview-img").html(`<img src="default-img.png" alt="your image" class="img-responsive" />`);
                $(".preview-img img").attr('src', "default-img.png");
            } else if(file.type.indexOf('image/') == -1){
                $(".preview-img").html(`<span class="text-danger">Vui lòng chọn file đúng định dạng ảnh</span>`);
            } else {
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