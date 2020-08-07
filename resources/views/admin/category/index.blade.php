@extends('admin.layout.layout')

@section('content')
<div class="col-lg-12">
    <div class="panel panel-default">
       <div class="panel-heading">Categories</div>

       <div class="container">
            <div class="d-flex flex-row-reverse">
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal" data-whatever="@mdo">Create</button>

                <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h5 class="modal-title" id="exampleModalLabel">Create new Category</h5>
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                          </button>
                        </div>
                        <div class="modal-body">
                          <form>
                            <div class="form-group">
                              <label for="recipient-name" class="col-form-label">Name: </label>
                              <input type="text" class="form-control" id="recipient-name">
                            </div>
                          </form>
                        </div>
                        <div class="modal-footer">
                          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                          <a class="btn btn-primary" href="#">Create</a>
                        </div>
                      </div>
                    </div>
                  </div>
            </div>
           <div class="col-md-8">
            <table class="table">
                <thead>
                  <tr>
                    <th scope="col">Name</th>
                    <th scope="col">Status</th>
                    <th scope="col">Action</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <td>Internship Backend PHP Laravel</td>
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