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
            <input type="text" name="job" value="{{ $jobById->name }}" hidden>
            <input type="text" name="process_id" value="{{ $processById->id }}" hidden>
            <textarea name="reason" class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
            @if (Session::has('error'))
                <span class="text-danger"> {{ Session::get('error') }} </span>
            @endif
            <button class="col-md-12  action-button" type="submit" style="width: 25%">Gửi email cho ứng viên</button>
        </form>
    </div>

    <div class="list col-md-12" style="background-color: #fff; margin-top:20px">
        <fieldset>
            <div class="form-card">
                <form action="{{ route('status.user_job') }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label class="label-required">Ứng viên có nhận lời làm việc hay không ?</label> <br>
                        <input name="process_id" type="text" value="{{ $processById->id }}" hidden>
                        <span>Không</span>
                        <input type="checkbox" name="status" class="js-switch">
                        <span>Có</span>
                    </div>
                    <button class="col-md-12  action-button" type="submit">Xác nhận</button>
                </form>
            </div>
        </fieldset>
    </div>
</div>
