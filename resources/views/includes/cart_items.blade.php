<table class="table @isset($in_panel) table-bordered @endisset">
	<thead>
		<tr>
			<th> # </th>
			<th> آیتم </th>
			@isset($in_panel)
				<th> آشپز </th>
			@endisset
			<th> نوع </th>
			<th> قیمت </th>
			<th> تعداد </th>
			<th> قابل پرداخت </th>
			@isset($in_panel)
				<th> ارزش افزوده </th>
				<th> مالیات </th>
				<th> سهم آشپز </th>
			@endisset
			@if (!isset($no_action))
				<th> حذف </th>
			@endif
		</tr>
	</thead>
	<tbody>
		@foreach ($transaction->items as $index => $item)
			@if (!isset($filter_cook) || $cook->id == $item->cook_id)
				<tr>
					<td>{{$index+1}}</td>
					<td>
						<a href="{{$item->food->public_link()}}" target="_blank">
							{{$item->food->title}}
						</a>
					</td>
					@isset($in_panel)
						<th>
							<a href="{{$item->cook->dashboard_link()}}">
								{{$item->cook->full_name()}}
							</a>
						</th>
					@endisset
					<td>{{$item->food->persian_type}}</td>
					<td>{{nf($item->cost)}}</td>
					<td>{{$item->count}}</td>
					<td>{{nf($item->payable)}}</td>
					@isset($in_panel)
						<td> {{nf($item->master_share)}} </td>
						<td> {{nf($item->tax)}} </td>
						<td class="{{$item->cook_ponied ? 'text-success' : 'text-danger'}}"> {{nf($item->cook_share)}} </td>
					@endisset
					@if (!isset($no_action))
						<td>
							<form class="d-inline" action="{{route('cart.destroy', $item->food->uid)}}" method="post">
								@csrf
								<a href="javascript:void" data-action="delete-from-cart">
									<i class="material-icons">close</i>
								</a>
							</form>
						</td>
					@endif
				</tr>
			@endif
		@endforeach
	</tbody>
</table>
<div class="d-flex justify-content-between text-center">
	<p>
		هزینه ارسال <br>
		<span class="peyk-share">{{nf($transaction->peyk_share)}}</span> تومان
	</p>
	<p id="sum">
		مجموع <br>
		<span>{{nf($transaction->sum)}}</span> تومان
	</p>
</div>
