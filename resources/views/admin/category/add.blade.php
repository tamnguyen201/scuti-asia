<form>
    @csrf
    <div class="form-group">
      <label for="recipient-name" class="col-form-label">@lang('custom.category.name')* :</label>
      <input type="text" name="name" class="form-control" id="recipient-name" placeholder="@lang('custom.category.name_placeholder')">
      <span class="error-form text-danger"></span>
    </div>
    <button type="button" class="btn btn-primary btn-add-category"><span class="fa fa-plus"></span> @lang('custom.button.add')</button>
  </form>