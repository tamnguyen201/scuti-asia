<form enctype="multipart/form-data">
    <div class="form-group">
        <label>@lang('custom.image_url')</label>
        <input type="text" value="{{$cv->cv_name}}" class="form-control" name="name">
        <span class="help-block text-danger"> </span>
    </div>
    <div class="form-group">
        <label>@lang('custom.image_url')</label>
        <input type="text" value="{{$cv->cv_url}}" class="form-control">
        <span class="help-block text-danger"> </span>
    </div>
    <div class="form-group">
        <label>@lang('custom.image_url')</label>
        <input type="file" name="cv_url" accept="*">
        <p class="help-block text-danger"> </p>
    </div>
    
    <div class="col-md-12 text-center">
        <button class="btn btn-outline-reg btn-upload-cv">@lang('custom.button.submit')</button>
    </div>
</form>
