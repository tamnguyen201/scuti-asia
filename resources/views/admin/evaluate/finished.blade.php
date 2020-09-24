<div class="form-card">
    <div class="col-md-6">
        <h3>Đánh giá ứng viên :</h3>
    </div>
    <div class="col-md-5">
        <h3 class="steps">Bước đánh giá 4 - 4</h3>
    </div>
    <div class="col-md-12">
        <form action="{{ route('pass.email') }}" method="POST">
            @csrf
            <label class="label-required"><span class="fa fa-sticky-note"></span> Nhập nội dung emai ở đây :</label>
            <input type="text" name="name" value="{{ $dataUser->name }}" hidden>
            <input type="text" name="email" value="{{ $dataUser->email }}" hidden>
            <input type="text" name="job" value="{{$jobById->name}}" hidden>
            <textarea name="reason" class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
            @error('reason') 
                <span class="text-danger"> {{$message}} </span>
            @enderror
            <button class="col-md-12  action-button" type="submit" style="width: 25%">Gửi email cho ứng viên</button>
        </form>
    </div>
</div> 