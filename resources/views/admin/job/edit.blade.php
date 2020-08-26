@extends('admin.layout.layout')
@section('css')
@endsection
@section('content')
<div class="row">
    <ol class="breadcrumb">
        <li><a href="#">
            <em class="fa fa-home"></em>
        </a></li>
        <li class="active">@lang('custom.page_title.job')</li>
        <li class="active">@lang('custom.page_title.job_edit')</li>
    </ol>
</div>
<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">@lang('custom.page_title.job_edit')</h1>
    </div>
</div>
<div class="col-lg-12">
    <div class="panel panel-default">
       <div class="panel-heading">@lang('custom.page_title.job_edit')</div>
       <div class="panel-body">
           <div class="col-md-8">
                <form method="post" action="{{ route('jobs.update', $jobById->id) }}">
                    @method('PUT')
                    @csrf
                    <div class="form-group">
                        <label>@lang('custom.title') : </label>
                        <input value="{{ $jobById->name }}" name="name" type="text" class="form-control" @error('name') is-invalid @enderror placeholder="Enter title">
                        @error('name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="category form-group row">
                        <div class="col-md-8">
                            <label for="inputCategory">@lang('custom.category') :</label>
                            <select name="category_id" id="inputCategory" class="form-control" @error('category') is-invalid @enderror>
                                <option value="null" disabled="disabled" selected>Choose...</option>
                                @foreach ($dataCategory as $item)
                                    @if ($item->id == $jobById->category_id)
                                        <option value="{{ $item->id }}" selected>{{ $item->category_name }}</option>
                                    @else
                                        <option value="{{ $item->id }}">{{ $item->category_name }}</option>
                                    @endif
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="location form-group row">
                        <div class="col-md-8">
                            <label for="inputLocation">@lang('custom.location') :</label>
                            <select name="location_id" id="inputLocation" class="form-control" @error('location') is-invalid @enderror>
                                <option value="null" disabled="disabled" selected>Choose Location...</option>
                                @foreach ($dataLocation as $item)
                                    @if ($item->id == $jobById->location_id)
                                        <option value="{{ $item->id }}" selected>{{ $item->name }}</option>
                                    @else
                                        <option value="{{ $item->id }}">{{ $item->name }}</option>
                                    @endif
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-md-4">
                            <label>@lang('custom.expire_day') : </label>
                            <input value="{{ $jobById->expireDay }}" name="expire_date" type="date" class="form-control" @error('expire_date') is-invalid @enderror placeholder="Enter expire date">
                        </div>
                    </div>
                    <div class="form-group">
                        <label>@lang('custom.description') : </label>
                        <textarea name="description" class="form-control" @error('description') is-invalid @enderror id="exampleFormControlTextarea1" rows="3">
                            {{ $jobById->description }}
                        </textarea>
                        @error('description')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <button type="submit" class="btn btn-primary">@lang('custom.button.submit')</button>
                </form>
           </div>
       </div>
    </div>
 </div>
@endsection
@section('script')
    <script src={{ url('ckeditor/ckeditor.js') }}></script>
    <script>
    CKEDITOR.replace( 'description', {
        filebrowserBrowseUrl: '{{ route('jobs.edit', $jobById->id) }}',

    } );
    </script>
    @include('ckfinder::setup')
@endsection