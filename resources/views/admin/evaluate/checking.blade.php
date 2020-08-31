@extends('admin.layout.layout')
@section('css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/switchery/0.8.2/switchery.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
@endsection
@section('content')
<div class="row">
    <ol class="breadcrumb">
        <li><a href="#">
            <em class="fa fa-home"></em>
        </a></li>
        <li class="active">Danh gia ung vien</li>
    </ol>
</div>
<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">Danh gia ho so</h1>
    </div>
</div>
<div class="select_process">
    <form action="">
        <div class="form-group" style="">
            <label for="exampleFormControlSelect1">Example select</label>
            <select class="form-select h-9 mr-2" id="exampleFormControlSelect1">
              <option>Checking</option>
              <option>Interview </option>
              <option>Hired</option>
              <option>Rejected</option>
            </select>
          </div>
    </form>
    <button style="submit">Submit</button>
</div>
<div class="row">
<div class="col-lg-12">
    <table class="table">
        <tbody>
            <tr>
                <td>@lang('custom.name')</td>
                <td></td>
            </tr>
            <tr>
                <td>@lang('custom.email')</td>
                <td></td>
            </tr>
            <tr>
                <td>@lang('custom.phone')</td>
                <td></td>
            </tr>
            <tr>
                <td>@lang('custom.address')</td>
                <td></td>
            </tr>
            <tr>
                <td>Trang thai</td>
                <td>Applied</td>
            </tr>
            <tr>
                <td>So yeu ly lich</td>
                <td>
                    Xem CV
                </td>
            </tr>
            <tr>
                <td>Cover Letter</td>
                <td>
                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Quam ipsa eaque sequi alias pariatur, vitae fugit eveniet cupiditate molestias. Quia, rerum ipsum. Necessitatibus accusamus cupiditate minus earum odit cumque eum.
                </td>
            </tr>
        </tbody>
    </table>    
</div>

<div class="col-lg-8">
    <form action="">
        <div class="form-group">
            <label for="exampleFormControlTextarea1">Example textarea</label>
            <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
          </div>
          <button>ADD NOTE</button>
    </form>
</div>
</div>
@endsection
@section('script')
   
@endsection