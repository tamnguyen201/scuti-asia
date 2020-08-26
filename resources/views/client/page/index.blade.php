@extends('client.layout.master')
@section('title', trans('custom.page_title.company_manage'))
@section('content')
    @include('client.layout.header')

    <div id="benefits" class="cards-1">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <h2>@lang('client.section.benefit.title')</h2>
                    <p class="p-heading p-large">@lang('client.section.benefit.description')</p>
                    <hr class="line-heading">
                </div>
            </div>
            <div class="row">
                <div class="col-lg-4">
                    <div class="text-container">
                        <h3>Môi Trường Lí Tưởng</h3>
                        <p>Our packages are designed to fit the budgets of all companies from startups to well established organizations looking for premium services.</p>
                        <p>Each version has flexible options that can be ticked on or off your services list.</p>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="text-container">
                        <h3>Cơ hội phát triển </h3>
                        <p>Our packages are designed to fit the budgets of all companies from startups to well established organizations looking for premium services.</p>
                        <p>Each version has flexible options that can be ticked on or off your services list.</p>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="text-container">
                        <h3>Thoải mái sáng tạo</h3>
                        <p>Our packages are designed to fit the budgets of all companies from startups to well established organizations looking for premium services.</p>
                        <p>Each version has flexible options that can be ticked on or off your services list.</p>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    
                    <img src="https://www.scuti.asia/uploads/6/1/9/4/61941893/scuti-recruitment-pitch-2019-video_orig.jpg" class="img-fluid" alt="">
                </div>
            </div>
        </div>
    </div>

    <div class="cards-2">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <h2>@lang('client.section.working_environment.title')</h2>
                    <p class="p-heading p-large">@lang('client.section.working_environment.description')</p>
                    <hr class="line-heading">
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="cards-container row">

                        <div class="card col-md-6 col-lg-4">
                            <div class="card-image">
                                <img class="img-fluid" src="https://inovatik.com/juno-landing-page/images/product-1.jpg" alt="alternative">
                            </div>
                            <div class="card-body">
                                <p>Use our software application to </p>
                            </div>
                        </div>
                        
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div id="about" class="basic-4">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <h2>@lang('client.section.about.title')</h2>
                    <p class="p-heading p-large">@lang('client.section.about.description')</p>
                    <hr class="line-heading">
                </div>
            </div>
            <div class="row">
                <div class="col-lg-6">
                    <div class="image-container">
                        <img class="img-fluid" src="https://inovatik.com/juno-landing-page/images/about.jpg" alt="alternative">
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="text-container">
                        <h4>@lang('client.section.about.sub_title')</h4>
                        <p>Having good knowledge about the resources you need to carry out your plan is very important. We can help you establish them, just give us a call or use the contact form below in the contact section.</p>
                        <p class="milestone"><strong>2012 - 2014</strong>: our manager setup the business and started work</p>
                        <p class="milestone"><strong>2014 - 2017</strong>: we've hired more colleagues and grown as a team</p>
                        <p class="milestone"><strong>2017 - 2019</strong>: business services have been acknowledged as great</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="slider-1 basic-2">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <h2>@lang('client.section.newspaper.title')</h2>
                    <p class="p-heading p-large">@lang('client.section.newspaper.description')</p>
                    <hr class="line-heading">
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">      
                    

                    <div class="slider-container">
                        <div class="swiper-container text-slider">
                            <div class="swiper-wrapper">
                                
                                <div class="swiper-slide">
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <div class="image-container">
                                                <img class="img-fluid" src="https://inovatik.com/juno-landing-page/images/description-1.jpg" alt="alternative">
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="text-container">
                                                <h3>Market Analysis</h3>
                                                <p>The best place to start is in your market. Analyse your customer profile, current positioning and your main competitors. This will be the starting foundation for our common business action plan.</p>
                                                <a class="btn-outline-reg" href="https://inovatik.com/juno-landing-page/#your-link">DETAILS</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>

                            <div class="swiper-button-next"></div>
                            <div class="swiper-button-prev"></div>

                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>

    <div id="contact" class="form-2">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <h2>@lang('client.section.visit_us.title')</h2>
                    <ul class="list-unstyled li-space-lg">
                        <li class="address">@lang('client.section.visit_us.description')</li>
                        <li><i class="fas fa-map-marker-alt"></i>22 Innovative Area, San Francisco, CA 94043, US</li>
                        <li><i class="fas fa-phone"></i><a class="orange" href="https://inovatik.com/juno-landing-page/tel:003024630820">+81 720 2212</a></li>
                        <li><i class="fas fa-envelope"></i><a class="orange" href="https://inovatik.com/juno-landing-page/mailto:office@junobs.com">office@junobs.com</a></li>
                    </ul>
                    <hr class="line-heading">
                </div>
            </div>
            <div class="row">
                <div class="col-lg-6">
                    <div class="map-responsive">
                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3723.962023272904!2d105.76304874986745!3d21.034205492900966!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x313454b947cd6e49%3A0x6a87974c6b44d671!2zNjggUGjhu5EgTmd1eeG7hW4gQ8ahIFRo4bqhY2gsIE3hu7kgxJDDrG5oLCBU4burIExpw6ptLCBIw6AgTuG7mWksIFZp4buHdCBOYW0!5e0!3m2!1svi!2s!4v1598327887854!5m2!1svi!2s" width="600" height="450" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
                    </div>
                </div>
                <div class="col-lg-6">
                    <form id="contactForm" data-toggle="validator" data-focus="false">
                        <div class="form-group">
                            <input type="text" class="form-control-input" id="cname" required>
                            <label class="label-control" for="cname">Name</label>
                            <div class="help-block with-errors"></div>
                        </div>
                        <div class="form-group">
                            <input type="email" class="form-control-input" id="cemail" required>
                            <label class="label-control" for="cemail">Email</label>
                            <div class="help-block with-errors"></div>
                        </div>
                        <div class="form-group">
                            <div class="form-check">
                                <label class="form-check-label">
                                    <input type="radio" class="form-check-input" name="optradio">Coffee
                                </label>
                            </div>
                            <div class="form-check">
                                <label class="form-check-label">
                                    <input type="radio" class="form-check-input" name="optradio">Trà Đá
                                </label>
                            </div>
                        </div>
                        <div class="form-group">
                            <textarea class="form-control-textarea" id="cmessage" required></textarea>
                            <label class="label-control" for="cmessage">Your message</label>
                            <div class="help-block with-errors"></div>
                        </div>
                        <div class="form-group">
                            <button type="submit" class="form-control-submit-button">SUBMIT MESSAGE</button>
                        </div>
                        <div class="form-message">
                            <div id="cmsgSubmit" class="h3 text-center hidden"></div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div id="services" class="basic-2">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <h2>@lang('client.section.recruitment_flow.title')</h2>
                    <p class="p-heading p-large">@lang('client.section.recruitment_flow.description')</p>
                    <hr class="line-heading">
                </div>
            </div>
            <div class="row">

            </div>
        </div>
    </div>

	<div id="recruitment" class="filter">
		<div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <h2>@lang('client.section.recruitment.title')</h2>
                    <p class="p-heading p-large">@lang('client.section.recruitment.description')</p>
                    <hr class="line-heading">
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12 d-md-flex">
                    <div class="col-lg-3 col-md-4 col-12 button-group filters-button-group">
                        <h3 class="is-checked"><span>@lang('client.section.recruitment.menu_title')</span></h3>

                        <a class="d-block button text-decoration-none"  id="v-pills-profile-tab" data-toggle="pill" href="#v-pills-profile" role="tab" aria-controls="v-pills-profile" aria-selected="true"><span>DESIGN</span></a>
                        <a class="d-block button text-decoration-none"><span>DEVELOPMENT</span></a>
                        
                        <a class="d-block button text-decoration-none" href=""><span>@lang('client.section.recruitment.end_menu')</span></a>
                    </div>
                    <div class="col-lg-9 col-md-8 col-12 list-group">
                        <div class="tab-content" id="v-pills-tabContent">

                            <div class="tab-pane fade" id="v-pills-profile" role="tabpanel" aria-labelledby="v-pills-profile-tab">
                                
                                <div class="list-group-item d-md-flex col-12 development">
                                    <div class="col-md-8 col-12">
                                        <div class="mb-block cell name-job">
                                            <h4 class="title-h4"><a style="font-weight: normal;color: #f4511e; text-decoration: none" href="#">[Đà Nẵng] CTV - Account Manager</a></h4>
                                            <span class="desc-job inline"><span class="-ap icon-access_time"></span>07/08 — 31/12/2020 <span class="job-type">Freelancer</span></span>
                                            <p class="desc-job"><span class="-ap icon-coin-dollar"></span>Thỏa thuận</p>
                                        </div>
                                    </div>
                                    <div class="col-md-4 col-12 text-md-right text-center">
                                        <a href="http://tuyendung.luxstay.com/job/hoi-anda-latda-nang-ctv-account-manager-20488?apply=1" class="btn-apply-main btn-apply">Ứng tuyển</a>
                                    </div>
                                </div>

                            </div>

                        </div>

                    </div>
                </div>
            </div>
		</div>
    </div>
@endsection
@section('script')
    <script src="clientAsset/js/swiper.min.js"></script> 
    <!-- <script src="https://inovatik.com/juno-landing-page/js/jquery.magnific-popup.js"></script>  -->
    <script src="https://inovatik.com/juno-landing-page/js/isotope.pkgd.min.js"></script>
    <script src="https://inovatik.com/juno-landing-page/js/validator.min.js"></script>
    <script src="clientAsset/js/scripts.js"></script>
@endsection
