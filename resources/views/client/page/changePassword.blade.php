<form>
    <div class="form-group @error('name') has-error @enderror">
        <label>@lang('custom.name')</label>
        <input type="text" name="name" value="{{Auth::user()->name}}" class="form-control" placeholder="Please enter full name">
        @error('name') 
        <span class="help-block"> {{$message}} </span>
        @enderror
    </div>
    <div class="form-group @error('email') has-error @enderror">
        <label>@lang('custom.email')</label>
        <input type="text" name="email" value="{{Auth::user()->email}}" class="form-control" placeholder="Please enter email">
        @error('email') 
        <span class="help-block"> {{$message}} </span>
        @enderror
    </div>
    <div class="form-group @error('phone') has-error @enderror">
        <label>@lang('custom.phone')</label>
        <input type="text" name="phone" value="{{Auth::user()->phone}}" class="form-control" placeholder="Please enter phone">
        @error('phone') 
        <span class="help-block"> {{$message}} </span>
        @enderror
    </div>
    
    <div class="col-md-12 text-center">
        <button type="submit" class="btn btn-success btn-reset-pw">@lang('custom.button.submit')</button>
        <button type="reset" class="btn btn-primary">@lang('custom.button.reset')</button>
    </div>
</form>
