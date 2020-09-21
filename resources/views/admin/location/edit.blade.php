<form>
    <input type="hidden" name="id" id="id-update" value="{{$location->id}}">
    <div class="form-group">
        <label for="recipient-name" class="col-form-label">@lang('custom.location.name')* :</label>
        <input type="text" name="name" value="{{$location->name}}" class="form-control" id="recipient-name">
        <span class="error-form text-danger"></span>
    </div>
    <button type="button" class="btn btn-primary btn-edit-location"><span class="fa fa-edit"></span> @lang('custom.button.edit')</button>
</form>
