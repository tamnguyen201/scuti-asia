<form enctype="multipart/form-data">
    <div class="form-group">
        <label>@lang('custom.name')</label>
        <input type="text" class="form-control" name="name">
        <span class="help-block text-danger"> </span>
    </div>
    <div class="form-group">
        <label>@lang('custom.image_url')</label>
        <input type="file" name="cv_url" accept="*">
        <p class="help-block text-danger"> </p>
    </div>
    
    <div class="col-md-12 text-center">
        <button class="btn btn-primary btn-upload-cv">@lang('custom.button.submit')</button>
        <button type="reset" class="btn btn-warning">@lang('custom.button.reset')</button>
    </div>
</form>
