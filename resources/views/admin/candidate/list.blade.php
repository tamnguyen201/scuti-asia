@if($candidates->count() > 0)
<table class="table table-hover">
    <thead>
        <tr>
            <th>
            <div class="th-inner">@lang('custom.stt')</div>
            </th>
            <th>
                <div class="th-inner">@lang('custom.name')</div>
            </th>
            <th>
                <div class="th-inner">@lang('custom.email')</div>
            </th>
            <th>
                <div class="th-inner">@lang('custom.jobApplied')</div>
            </th>
            <th>
                <div class="th-inner">@lang('custom.process')</div>
            </th>
            <th>
                <div class="th-inner text-center">@lang('custom.action')</div>
            </th>
        </tr>
    </thead>
    <tbody>
        @php $stt = 1; @endphp
        @foreach($candidates as $candidate)
            <tr>
                <td>{{$stt++}}</td>
                <td>{{$candidate->user->name}}</td>
                <td>{{$candidate->user->email}}</td>
                <td>{{$candidate->job->name}}</td>
                <td>
                    @if($candidate->process->count() > 0 && $candidate->process->count() < 4)
                        @for($i = 0; $i <= $candidate->process->count(); $i++)
                            @if($i == $candidate->process->count() - 1)
                                <a href="{{ route('evaluate.candidate.show', $candidate->process[$i]->id) }}" style="text-decoration: none">
                                    <span @if ($candidate->process[$i])
                                        @switch($i)
                                            @case(0)
                                                class="label label-primary"
                                                @break
                                            @case(1)
                                                class="label label-success"
                                                @break
                                            @case(2)
                                                class="label label-warning"
                                                @break
                                            @case(3)
                                                class="label label-info"
                                                @break
                                        @endswitch
                                    @endif>
                                        {{$candidate->process[$i]->name}}
                                    
                                    </span>
                                </a>
                            @endif
                        @endfor
                    @elseif($candidate->process->count() == 4)
                        @lang('custom.finished')
                    @else
                        @lang('custom.applied')
                    @endif
                </td>
                <td>
                    <a href="{{route('candidates.show', $candidate->user->id)}}" class="btn btn-info text-light view-profile" title="Xem"><em class="fa fa-eye"></em></a>
                    @if ($candidate->process->count() == 0)
                        <form action="{{route('start.evaluate', $candidate->id)}}" method="post" class="form-delete-{{$candidate->id}}" style="display: inline">
                            @csrf
                            @method('POST')
                            <button class="btn btn-warning text-light start-confirm" idStart={{$candidate->id}} title="Bắt đầu đánh giá"><em class="fas fa-random"></em></button>
                        </form>
                    @endif
                </td>
            </tr>
        @endforeach
    </tbody>
</table>
<div class="fixed-table-pagination">
    <div class="pull-right pagination">
        {{$candidates->links()}}
    </div>
</div>
@else
<table class="table">
    <thead>
        <tr>
            <th>
                <div class="th-inner">@lang('custom.stt')</div>
            </th>
            <th>
                <div class="th-inner">@lang('custom.name')</div>
            </th>
            <th>
                <div class="th-inner">@lang('custom.email')</div>
            </th>
            <th>
                <div class="th-inner">@lang('custom.jobApplied')</div>
            </th>
            <th>
                <div class="th-inner">@lang('custom.process')</div>
            </th>
            <th>
                <div class="th-inner text-center">@lang('custom.action')</div>
            </th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td colspan="6" class="text-center"><p> @lang('custom.empty_data')</p></td>
        </tr>
    </tbody>
</table>
@endif