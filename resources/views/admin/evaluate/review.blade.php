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
                <div class="form-group col-md-6">
                  <label for="inputEmail4" class="col-form-label col-form-label-sm">Ten</label>
                  <input type="text" class="form-control form-control-lg" value="{{ $candidateById->name }}" disabled>
                </div>
                <div class="form-group col-md-6">
                  <label for="inputPassword4">Email</label>
                  <input type="text" class="form-control" value="{{ $candidateById->email }}" disabled>
                </div>
                <div class="form-group col-md-12">
                  <label for="inputAddress2">Ghi chu :</label>
                  <textarea name="comment" id="" cols="30" rows="5"></textarea>
                </div>
              {{-- <input type="button" name="next" class="next action-button" value="Next" /> --}}
              <button class="action-button" type="submit">Next</button>
              {{-- <input type="button" name="fail" class="next action-button" value="Fail" /> --}}
          </form>
      </div>
  </div>
</div> 

