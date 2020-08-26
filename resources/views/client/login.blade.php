@extends('client.layout.master')
@section('title', trans('custom.page_title.company_manage'))
@section('content')
<div class="basic-2">
    <div class="col-lg-6 mx-auto">
        <!-- Get Quote Form -->
        <div class="form-container">
            <form id="getQuoteForm" data-toggle="validator" data-focus="false">
                <div class="form-group">
                    <input type="text" class="form-control-input" id="gname" name="gname" required>
                    <label class="label-control" for="gname">Name</label>
                    <div class="help-block with-errors"></div>
                </div>
                <div class="form-group">
                    <input type="email" class="form-control-input" id="gemail" name="gemail" required>
                    <label class="label-control" for="gemail">Email</label>
                    <div class="help-block with-errors"></div>
                </div>
                <div class="form-group">
                    <input type="text" class="form-control-input" id="gphone" name="gphone" required>
                    <label class="label-control" for="gphone">Phone</label>
                    <div class="help-block with-errors"></div>
                </div>
                <div class="form-group">
                    <select class="form-control-select" id="gselect" required>
                        <option class="select-option" value="" disabled selected>Select Package</option>
                        <option class="select-option" value="Basic">Basic</option>
                        <option class="select-option" value="Complete">Complete</option>
                    </select>
                    <div class="help-block with-errors"></div>
                </div>
                <div class="form-group checkbox">
                    <input type="checkbox" id="gterms" value="Agreed-to-Terms" name="gterms" required>I agree to Juno's <a href="https://inovatik.com/juno-landing-page/privacy-policy.html">Privacy Policy</a> and <a href="https://inovatik.com/juno-landing-page/terms-conditions.html">Terms & Conditions</a>
                    <div class="help-block with-errors"></div>
                </div>
                <div class="form-group">
                    <button type="submit" class="form-control-submit-button">GET QUOTE</button>
                </div>
                <div class="form-group text-center">
                    <p>Hoặc Đăng nhập với:</p>
                </div>
                <div class="form-group">
                    <button type="submit" class="form-control-submit-button">GOOGLE</button>
                </div>
            </form>
        </div> <!-- end of form-container -->
        <!-- end of get quote form -->
    </div> <!-- end of col -->
</div>
@endsection
