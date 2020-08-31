<form>
    <div class="form-group">
        <label>@lang('custom.old_pass')</label>
        <input type="password" name="password" class="form-control">
        <span class="help-block text-danger"></span>
    </div>
    <div class="form-group">
        <label>@lang('custom.new_pass')</label>
        <input type="password" name="new_password" class="form-control">
        <span class="help-block text-danger"></span>
    </div>
    <div class="form-group">
        <label>@lang('custom.confirm_pass')</label>
        <input type="password" name="new_password_confirmation" class="form-control">
        <span class="help-block text-danger"></span>
    </div>
    
    <div class="col-md-12 text-center">
        <button type="submit" class="btn btn-outline-reg btn-reset-pw">@lang('custom.button.submit')</button>
        <button type="reset" class="btn btn-outline-reg">@lang('custom.button.reset')</button>
    </div>
</form>
