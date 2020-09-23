<div class="form-card">
    <div class="col-md-6">
        <h3>@lang('custom.evaluate.candidate_evaluate') :</h3>
    </div>
    <div class="col-md-6">
        <h3 class="steps">@lang('custom.evaluate.step') 2 - 4</h3>
    </div>
    <div class="row">
        <div class="col-md-12">
            <form action="{{ route('evaluate.store', $processById->id) }}" method="POST">
                @csrf
                    <div class="infor col-md-6">
                        <div class="col-md-12">
                            <label class="col-form-label col-md-6"><h5><span class="fa fa-user"></span> @lang('custom.candidate.name'):</h5></label>
                            <h5 class="col-md-6">{{ $candidateById->name }}</h5>
                        </div>
                        <hr>
                        <div class="col-md-12">
                            <label class="col-form-label col-md-6"><h5><span class="fa fa-envelope-o"></span> @lang('custom.candidate.email'):</h5></label>
                            <h5 class="col-md-6">{{ $candidateById->email }}</h5>
                        </div>
                        <div class="col-md-12">
                            <label class="col-form-label col-md-6"><h5><span class="fa fa-phone-square"></span> @lang('custom.candidate.phone'):</h5></label>
                            <h5 class="col-md-6">{{ $candidateById->phone }}</h5>
                        </div>
                        <div class="col-md-12">
                            <label class="col-form-label col-md-6"><h5><span class="fa fa-map-marker"></span> @lang('custom.candidate.address'):</h5></label>
                            <h5 class="col-md-6">{{ $candidateById->address }}</h5>
                        </div>
                    </div>
                    <div class="form-group col-md-6">
                        <div class="form-group">
                            <label class="label-required">@lang('custom.status')</label> <br>
                            <span>Fail</span>
                            <input type="checkbox" name="status" class="js-switch"> 
                            <span>Pass</span>
                        </div>
                        
                        <label><span class="fa fa-sticky-note"></span> @lang('custom.candidate.note') :</label>
                        <textarea name="comment" class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
                        <label class="label-required"><span class="fa fa-sticky-note"></span> @lang('custom.evaluate.reason') : (Ứng viên có thể xem)</label>
                        <textarea name="reason" class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
                        @error('reason') 
                        <span class="text-danger"> {{$message}} </span>
                        @enderror
                    </div>
                <button class="col-md-12  action-button" type="submit">Next</button>
            </form>
            <div class="col-12" style="">
                <div class="panel">
                    <div class="panel-heading">
                        @lang('custom.candidate.cv_info') <a href="{{$processById->user_job->cv_file}}" target="_blank" rel="noopener noreferrer"><span>(@lang('custom.evaluate.view_cv_on_new_tab'))</span></a>
                    </div>
                    <div class="panel-body articles-container" style="padding-top: 0;height: 50rem">
                        <iframe src="{{$processById->user_job->cv_file}}" width="100%" height="100%"></iframe>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div> 

