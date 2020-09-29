@if($jobs->count() > 0)
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/switchery/0.8.2/switchery.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
    <link rel="stylesheet" href="{{ asset('adminAsset/css/job.css') }}">
	<table class="table table-hover">
		<thead>
			<tr>
				<th>
					<div class="th-inner">@lang('custom.stt')</div>
				</th>
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
					<div class="th-inner">@lang('custom.jobs.candidate_number')</div>
				</th>
				<th>
					<div class="th-inner text-center">@lang('custom.action')</div>
				</th>
			</tr>
		</thead>
		<tbody>
			@php $stt = 1; @endphp
			@foreach($jobs as $item)
			<tr>
				<td>{{$stt++}}</td>
				<td>{{ $item->name }}</td>
				<td>{{ $item->category->category_name }}</td>
				<td>
					{{ \Carbon\Carbon::parse($item->expireDay)->format('d/m/Y')}}
				</td>
				<td>
					<input type="checkbox" data-id="{{ $item->id }}" name="status" class="js-switch" {{ $item->status == 1 ? 'checked' : '' }}>
				</td>
				<td>{{ count($item->user) }}</td>
				<td class="text-center">
					<a href="{{ route('job.detail', ['id' => $item->id]) }}" class="btn btn-primary text-light view-profile"><em class="fa fa-eye"></em></a>
					<a href="{{ route('jobs.edit', $item->id) }}" class="btn btn-primary text-light"><em class="far fa-edit"></em></a> 
					<form action="{{ route('jobs.destroy',$item->id) }}" method="post" class="form-delete-{{$item->id}}" style="display: inline">
						@csrf
						@method('DELETE')
						<button class="btn btn-danger text-light delete-confirm" idDelete={{$item->id}}><em class="fas fa-trash-alt"></em></button>
					</form>
				</td>
			</tr>
			@endforeach
		</tbody>
	</table>
	<div class="fixed-table-pagination">
		<div class="pull-right pagination">
			{{$jobs->links()}}
		</div>
	</div>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/switchery/0.8.2/switchery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
    <script>
        let elems = Array.prototype.slice.call(document.querySelectorAll('.js-switch'));
        elems.forEach(function(html) {
            let switchery = new Switchery(html,  { size: 'small' });
        });
	</script>
@else
	<table class="table table-hover">
		<thead>
			<tr>
				<th>
					<div class="th-inner">@lang('custom.stt')</div>
				</th>
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
					<div class="th-inner">@lang('custom.jobs.candidate_number')</div>
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
