<div class="modal-header">
    <h5 class="modal-title" id="exampleModalLabel">@lang('client.page.profile.manage_cv')</h5>
    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>
<span class="text-center text-danger show-errors"></span>
<div class="modal-body">
    <form id="formUploadCV" enctype="multipart/form-data" method="post">
        <div class="form-group">
            <label class="label-required">@lang('custom.name_cv')</label>
            <input type="text" class="form-control" name="cv_name" placeholder="@lang('custom.placeholder.name')">
            <span class="help-block text-danger"> </span>
        </div>
        <div class="form-group">
            <label class="label-required">@lang('custom.cv_url')</label>
            <input type="file" name="cv_url" accept="application/pdf,.doc,.docx,application/msword">
            <p class="help-block text-danger"> </p>
        </div>
        
        <div class="col-md-12 text-center">
            <button class="btn btn-outline-reg btn-upload-cv">@lang('custom.button.submit')</button>
            <button type="button" class="btn btn-outline-reg" data-dismiss="modal">@lang('custom.button.cancel')</button>
        </div>
    </form>
</div>
