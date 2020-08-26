<form>
    <div class="form-group">
        <label>@lang('custom.name')</label>
        <input type="password" name="password" class="form-control" placeholder="Please enter full name">
        <span class="help-block text-danger"></span>
    </div>
    <div class="form-group">
        <label>@lang('custom.email')</label>
        <input type="password" name="new_password" class="form-control" placeholder="Please enter email">
        <span class="help-block text-danger"></span>
    </div>
    <div class="form-group">
        <label>@lang('custom.phone')</label>
        <input type="password" name="new_password_confirmation" class="form-control" placeholder="Please enter phone">
        <span class="help-block text-danger"></span>
    </div>
    
    <div class="col-md-12 text-center">
        <button type="submit" class="btn btn-success btn-reset-pw">@lang('custom.button.submit')</button>
        <button type="reset" class="btn btn-primary">@lang('custom.button.reset')</button>
    </div>
</form>
