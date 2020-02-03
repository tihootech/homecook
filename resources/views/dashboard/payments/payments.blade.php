@extends('layouts.dashboard')
@section('title')
    امور مالی
@endsection
@section('content')

	<div class="conainer">

        <div class="tile text-center">
            <a href="{{route('payment.index')}}" class="btn btn-outline-primary"> لیست پرداختی ها </a>
        </div>

		<div class="row">
			<div class="col-md-6">
				<div class="tile">
					<h4> امور مالی آشپزان </h4>
					<hr>
					@if ($cooks->count())

						@foreach ($cooks as $cook)
							@include('includes.payment_card', ['object'=>'cook'])
						@endforeach

					@else
						<div class="alert alert-success">
							همه موارد تسویه شده است.
						</div>
					@endif
				</div>
			</div>
			<div class="col-md-6">
				<div class="tile">
					<h4> امور مالی پیک ها </h4>
					<hr>
					@if ($peyks->count())
						@foreach ($peyks as $peyk)
							@include('includes.payment_card', ['object'=>'peyk'])
						@endforeach
					@else
						<div class="alert alert-success">
							همه موارد تسویه شده است.
						</div>
					@endif
				</div>
			</div>
		</div>
	</div>

@endsection
