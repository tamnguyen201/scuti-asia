<div class="row col-lg-12 d-flex">
@if($jobs->count() > 0)
    @foreach($jobs as $job)
    <div class="d-md-flex col-lg-6 col-12 d-block development">
        <div class="col-md-12 list-group-item d-md-flex">
            <div class="col-md-7 col-12">
                <div class="mb-block cell name-job">
                    <h4 class="title-h4"><a style="color: #f4511e;" href="{{route('job-detail', [$job->id, $job->slug])}}" class="text-decoration-none"> {{$job->name}}</a></h4>
                    <p class="desc-job">
                        {{$job->description}}
                    </p>
                </div>
            </div>
            <div class="col-md-5 d-none d-md-block text-md-right text-center">
                <a href="{{route('client.applied', [$job->id, $job->slug])}}" class="btn btn-apply-main btn-apply">@lang('client.section.recruitment.apply')</a>
                <p class="desc-job text-left mt-3">
                    <i class="far fa-money-bill-alt"></i> @lang('client.section.recruitment.salary'): {{$job->salary}} <br>
                    <i class="fas fa-map-marker-alt"></i> @lang('client.section.recruitment.work_place'): {{$job->location->name}} <br>
                    <i class="far fa-clock"></i> @lang('client.section.recruitment.deadline'): {{$job->formatExpireDay()}}
                </p>
            </div>
        </div>
    </div>
    @endforeach
@else
<p>@lang('custom.empty_data')</p>
@endif
</div>