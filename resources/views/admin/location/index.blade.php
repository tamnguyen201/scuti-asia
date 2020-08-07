@extends('admin.layout.layout')

@section('content')
<div class="col-lg-12">
    <div class="panel panel-default">
       <div class="panel-heading">Locations</div>

       <div class="container">
           <div class="col-md-4">
            <form>
                <div class="form-group">
                  <label>Location</label>
                  <input type="text" class="form-control">
                </div>
                
                <button type="submit" class="btn btn-primary" style="margin-bottom: 10px">Submit</button>
              </form>
           </div>

           <div class="col-md-7">
            <table class="table">
                <thead>
                  <tr>
                    <th scope="col" class="text-center">Name</th>
                    <th scope="col" class="text-center">Status</th>
                    <th scope="col" class="text-center">Action</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <td>No. 68 Nguyen Co Thach, Nam Tu Liem, Ha Noi</td>
                    <td>Enable</td>
                    <td>
                        <a class="btn btn-primary" href="#">Update</a>
                        <a class="btn btn-warning" href="#">Delete</a>
                    </td>
                  </tr>
                </tbody>
              </table>
           </div>
       </div>
    </div>
</div>
@endsection