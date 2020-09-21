@if($jobs->count() > 0)
    <table class="table table-hover">
        <thead>
            <tr>
                <th>
                    <div class="th-inner">@lang('custom.title')</div>
                </th>
                <th>
                    <div class="th-inner">@lang('custom.categories')</div>
                </th>
                <th>
                    <div class="th-inner">@lang('custom.jobs.date')</div>
                </th>
                <th>
                    <div class="th-inner">@lang('custom.status')</div>
                </th>
                <th>
                    <div class="th-inner text-center">@lang('custom.jobs.candidate_number')</div>
                </th>
            </tr>
        </thead>
        <tbody>
            @foreach($jobs as $item)
            <tr>
                <td>{{ $item->name }}</td>
                <td>{{ $item->category->category_name }}</td>
                <td>
                    {{ \Carbon\Carbon::parse($item->expireDay)->format('d/m/Y')}}
                </td>
                <td>
                    {{ $item->status == 1 ? 'Active' : 'InActive' }}
                </td>
                <td class="text-center">
                    <a href="{{ route('candidate.byJob', $item->id) }}" class="btn btn-primary">{{ count($item->user) }} <span class="fa fa-user"></span></a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    <div class="fixed-table-pagination">
        <div class="pull-right pagination">
            {{ $jobs->links() }}
        </div>
    </div>
@else
    <table class="table table-hover">
        <thead>
            <tr>
                <th>
                    <div class="th-inner">@lang('custom.title')</div>
                </th>
                <th>
                    <div class="th-inner">@lang('custom.categories')</div>
                </th>
                <th>
                    <div class="th-inner">@lang('custom.jobs.date')</div>
                </th>
                <th>
                    <div class="th-inner">@lang('custom.status')</div>
                </th>
                <th>
                    <div class="th-inner text-center">@lang('custom.jobs.candidate_number')</div>
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