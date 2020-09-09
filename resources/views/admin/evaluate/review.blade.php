<div class="form-card">
    <div class="col-md-6">
        <h3>Đánh giá ứng viên :</h3>
    </div>
    <div class="col-md-6">
        <h3 class="steps">Step 2 - 4</h3>
    </div>
    <div class="row">
      <div class="col-md-12">
          <form action="{{ route('evaluate.store', $processById->id) }}" method="POST">
            @csrf
                <div class="infor col-md-6">
                  <div class="col-md-12">
                    <label class="col-form-label col-md-6"><h5><span class="fa fa-user"></span> @lang('custom.candidate.name')</h5></label>
                    <h5 class="col-md-6">{{ $candidateById->name }}</h5>
                  </div>
                  <hr>
                  <div class="col-md-12">
                    <label class="col-form-label col-md-6"><h5><span class="fa fa-envelope-o"></span> @lang('custom.candidate.email')</h5></label>
                    <h5 class="col-md-6">{{ $candidateById->email }}</h5>
                  </div>
                  <div class="col-md-12">
                    <label class="col-form-label col-md-6"><h5><span class="fa fa-phone-square"></span> @lang('custom.candidate.phone')</h5></label>
                    <h5 class="col-md-6">{{ $candidateById->phone }}</h5>
                  </div>
                </div>
                <div class="form-group col-md-6">
                    <label><span class="fa fa-sticky-note"></span> @lang('custom.candidate.note') :</label>
                  <textarea name="comment" class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
                </div>
              <button class="col-md-12  action-button" type="submit">Next</button>
          </form>
      </div>
  </div>
</div> 

