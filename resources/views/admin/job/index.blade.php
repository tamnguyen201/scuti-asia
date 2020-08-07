@extends('admin.layout.layout')

@section('content')
<div class="col-lg-12">
    <div class="panel panel-default">
       <div class="panel-heading">Jobs</div>

       <div class="container">
           <div class="col-md-3">
            <a class="btn btn-warning" href="#">Create</a>
           </div>
           <div class="col-md-10">
            <table class="table">
                <thead>
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">Title</th>
                    <th scope="col">Category</th>
                    <th scope="col">Location</th>
                    <th scope="col">Applicants</th>
                    <th scope="col">Action</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <th scope="row">1</th>
                    <td>Internship PHP Laravel</td>
                    <td>Developer</td>
                    <td>Ha Noi</td>
                    <td>3</td>
                    <td>
                        <a class="btn btn-success" href="#">View</a>
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