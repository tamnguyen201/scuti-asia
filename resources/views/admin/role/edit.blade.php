<form>
    <input type="hidden" name="id" id="id-update" value="{{$role->id}}">
    <div class="form-group">
        <label for="recipient-name" class="col-form-label">Name</label>
        <input type="text" name="name" value="{{$role->name}}" class="form-control" id="recipient-name">
        <span class="error-form text-danger"></span>
    </div>
    <button type="button" class="btn btn-primary btn-edit-role">Submit</button>
</form>