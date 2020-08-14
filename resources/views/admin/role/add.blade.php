<form>
    <div class="form-group">
        <label for="recipient-name" class="col-form-label">{{trans('custom.name')}}</label>
        <input type="text" name="name" class="form-control" id="recipient-name">
        <span class="error-form text-danger"></span>
    </div>
    <button type="button" class="btn btn-primary btn-add-role">{{trans('custom.submit')}}</button>
</form>
