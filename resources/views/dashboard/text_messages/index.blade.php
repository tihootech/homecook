@extends('layouts.dashboard')
@section('title')
    لیست همکاران
@endsection
@section('content')

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

	@if ($text_messages->count())
		<div class="tile">

			<div class="table-responsive-lg">
				<table class="table table-bordered table-hover">
					<thead>
						<tr>
							<th> ردیف </th>
							<th> نوع پیامک </th>
							<th> دریافت کننده </th>
                            <th> ارسال شده </th>
							<th> ارسال کننده </th>
							<th> هزینه </th>
							<th> وضعیت </th>
							<th> متن </th>
						</tr>
					</thead>
					<tbody>
						@foreach ($text_messages as $index => $sms)
							<tr>
								<th> {{$index+1}} </th>
								<td> {{$sms->persian_type()}} </td>
								<td> {{$sms->receptor ?? '-'}} </td>
                                <td> @include('dashboard.partials.yesno', ['boolean' => $sms->sent]) </td>
								<td> {{$sms->sender ?? '-'}} </td>
								<td> {{$sms->cost ? rial($sms->cost) : '-'}} </td>
								<td> {{$sms->status ?? '-'}} </td>
								<td>
                                    @if ($sms->body)
                                        <a href="javascript:void" data-toggle="popover" data-placement="top" data-content="{{$sms->body}}">
                                            مشاهده متن
                                        </a>
                                    @else
                                        <em> ارسال نشده </em>
                                    @endif
                                </td>
							</tr>
				    	@endforeach
					</tbody>
				</table>
			</div>

			{{$text_messages->links()}}
		</div>
    @else
        <div class="tile">
            <div class="alert alert-warning m-0">
                موردی یافت نشد.
            </div>
        </div>
    @endif

@endsection
