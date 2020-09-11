@foreach($data['hotJobs'] as $job)
<div class="d-md-flex col-6 development">
    <div class="col-md-12 list-group-item d-flex">
        <div class="col-md-7 col-12">
            <div class="mb-block cell name-job">
                <h4 class="title-h4"><a style="font-weight: normal;color: #f4511e; text-decoration: none" href="{{route('job-detail', [$job->id, $job->slug])}}"> {{$job->name}}</a></h4>
                <p class="desc-job">
                    {{$job->description}}
                </p>
            </div>
        </div>
        <div class="col-md-5 col-12 text-md-right text-center">
            <a href="{{route('client.applied', [$job->id, $job->slug])}}" class="btn-apply-main btn-apply">@lang('client.section.recruitment.apply')</a>
            <p class="desc-job text-left mt-3">
                <i class="far fa-money-bill-alt"></i> Lương: {{$job->salary}} <br>
                <i class="fas fa-map-marker-alt"></i> Nơi làm việc: {{$job->location->name}} <br>
                <i class="far fa-clock"></i> Hạn nộp: {{$job->formatExpireDay()}}
            </p>
        </div>
    </div>
</div>
@endforeach
