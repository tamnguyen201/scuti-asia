<div class="form-card">
    <div class="col-md-6">
        <h3>Đánh giá ứng viên :</h3>
    </div>
    <div class="col-md-5">
        <h3 class="steps">Bước đánh giá 4 - 4</h3>
    </div>
    <div class="col-md-12">
        <p class="fail-notice"><span class="fa fa-times"> Bạn đã loại ứng viên này</span></p>
    </div>
    <div class="col-md-12">
        <form action="{{ route('fail.email') }}" method="POST">
            @csrf
            <label class="label-required"><span class="fa fa-sticky-note"></span> @lang('custom.evaluate.reason') : (Ứng viên có thể xem)</label>
            <input type="text" name="name" value="{{ $dataUser->name }}" hidden>
            <input type="text" name="email" value="{{ $dataUser->email }}" hidden>
            <input type="text" name="job" value="{{$jobById->name}}" hidden>
            <input type="text" name="process_id" value="{{ $processById->id }}" hidden>
            <textarea name="reason" class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
            @if ( Session::has('error') )
                <span class="text-danger"> {{ Session::get('error') }} </span>
            @endif
            <button class="col-md-12  action-button" type="submit" style="width: 25%">Gửi email cho ứng viên</button>
        </form>
        
    </div>
</div> 
