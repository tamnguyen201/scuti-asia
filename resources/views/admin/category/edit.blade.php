<form>
    <input type="hidden" name="id" id="id-update" value="{{$category->id}}">
    <div class="form-group">
        <label for="recipient-name" class="col-form-label">@lang('custom.category.name')* :</label>
        <input type="text" name="category_name" value="{{$category->category_name}}" class="form-control" id="recipient-name">
        <span class="error-form text-danger"></span>
    </div>
    <button type="button" class="btn btn-primary btn-edit-category"><span class="fa fa-edit"></span> @lang('custom.button.edit')</button>
</form>
