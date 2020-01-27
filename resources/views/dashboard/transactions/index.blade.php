@extends('layouts.dashboard')
@section('title')
    لیست سفارشات
@endsection
@section('content')

	{{-- @master
        <div class="tile text-center">
            <a href="#search-box" data-toggle="collapse" class="btn btn-primary m-2"> <i class="material-icons">search</i> جستجو </a>
            <div class="collapse @if(request()->getQueryString()) show @endif" id="search-box">
                <hr>
                <div class="container">
                    <form class="row text-right justify-content-center" method="GET">
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="receptor"> موبایل دریافت کننده </label>
                                <input type="text" id="receptor" name="receptor" value="{{request('receptor')}}" class="form-control">
                            </div>
                        </div>
                        <div class="w-100"></div>
                        <div class="col-md-2 my-1">
                            <button type="submit" class="btn btn-primary btn-block">
                                <i class="material-icons">check</i> تایید و جستجو
                            </button>
                        </div>
                        @if(request()->getQueryString())
                            <div class="col-md-2 my-1">
                                <a class="btn btn-primary btn-block" href="{{route(rn())}}">
                                    <i class="material-icons">close</i> بازنشانی جستجو
                                </a>
                            </div>
                        @endif
                    </form>
                </div>
            </div>
        </div>
    @endmaster

	@if ($transactions->count())
		<div class="tile">

			<div class="table-responsive-lg">
				<table class="table table-bordered table-hover">
					<thead>
						<tr>
							<th> ردیف </th>
                            <th> اقلام سفارش </th>
                            <th> قابل پرداخت </th>
                            <th> پرداخت شده </th>
                            <th> تحویل داده شده </th>
						</tr>
					</thead>
					<tbody>
						@foreach ($transactions as $index => $transaction)
							<tr>
								<th> {{$index+1}} </th>
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
                                <td> {{toman($transaction->total)}} </td>
                                <td> @include('dashboard.partials.yesno', ['boolean' => $transaction->ponied]) </td>
                                <td> @include('dashboard.partials.yesno', ['boolean' => !$transaction->open]) </td>
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
    @endif --}}

    <div class="tile">
        <div class="alert alert-warning m-0">
            بعد از حل چالش
        </div>
    </div>

@endsection
