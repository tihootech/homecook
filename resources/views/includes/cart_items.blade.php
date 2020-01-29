<table class="table">
	<thead>
		<tr>
			<th> # </th>
			<th> آیتم </th>
			<th> نوع </th>
			<th> قیمت </th>
			<th> تعداد </th>
			<th> قابل پرداخت </th>
			<th> حذف </th>
		</tr>
	</thead>
	<tbody>
		@foreach ($transaction->items as $index => $item)
			<tr>
				<td>{{$index+1}}</td>
				<td>
					<a href="{{$item->food->public_link()}}" target="_blank">
						{{$item->food->title}}
					</a>
				</td>
				<td>{{$item->food->persian_type}}</td>
				<td>{{nf($item->cost)}}</td>
				<td>{{$item->count}}</td>
				<td>{{nf($item->payable)}}</td>
				<td>
					<form class="d-inline" action="{{route('cart.destroy', $item->food->uid)}}" method="post">
						@csrf
						<a href="javascript:void" data-action="delete-from-cart">
							<i class="material-icons">close</i>
						</a>
					</form>
				</td>
			</tr>
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
