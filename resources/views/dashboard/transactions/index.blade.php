@extends('layouts.dashboard')
@section('title')
    لیست سفارشات
@endsection
@section('content')

	@if ($transactions->count())
		<div class="tile">

			<div class="table-responsive-lg">
				<table class="table table-bordered table-hover">
					<thead>
						<tr>
							<th> ردیف </th>
                            @master
                                <th> مشتری </th>
                            @endmaster
                            <th> اقلام سفارش </th>
                            @not_peyk
                                <th> پرداختی </th>
                            @endnot_peyk
                            <th> سهم پیک </th>
                            @master_or_peyk
                                <th> تسویه پیک </th>
                            @endmaster_or_peyk
                            <th> تاریخ سفارش </th>
                            <th> تاریخ تحویل </th>
                            @master
                                <th> جزییات </th>
                            @endmaster
						</tr>
					</thead>
					<tbody>
						@foreach ($transactions as $index => $transaction)
							<tr>
								<th> {{$index+1}} </th>
                                @master
                                    <th> <a href="{{$transaction->customer->dashboard_link()}}"> {{$transaction->customer->full_name()}} </a> </th>
                                @endmaster
								<td>
                                    <ul>
                                        @foreach ($transaction->items as $item)
                                            <li>
                                                {{$item->food->title}}
                                                <span data-toggle="popover" data-trigger="hover" data-content="تعداد" data-placement="top">
                                                    ({{$item->count}})
                                                </span>
                                            </li>
                                        @endforeach
                                    </ul>
                                </td>
                                @not_peyk
                                    <td> <span class="calibri">{{nf($transaction->sum)}}</span> تومان </td>
                                @endnot_peyk
                                <td> <span class="calibri">{{nf($transaction->peyk_share)}}</span> تومان </td>
                                @master_or_peyk
                                    <td> @include('dashboard.partials.yesno', ['boolean' => $transaction->peyk_ponied]) </td>
                                @endmaster_or_peyk
                                <td>
                                    {{date_picker_date($transaction->created_at)}}
                                    <br>
                                    <span class="calibri"> {{$transaction->created_at->format('H:i')}} </span>
                                </td>
                                <td>
                                    {{date_picker_date($transaction->delivery)}}
                                    <br>
                                    ساعت {{$transaction->time}}
                                </td>
                                @master
                                    <td>
                                        <a href="{{route('transaction.show', $transaction->id)}}" class="btn btn-outline-primary"> جزییات </a>
                                    </td>
                                @endmaster
							</tr>
				    	@endforeach
					</tbody>
				</table>
			</div>

			{{$transactions->links()}}
		</div>
    @else
        <div class="tile">
            <div class="alert alert-warning m-0">
                موردی یافت نشد.
            </div>
        </div>
    @endif

@endsection
