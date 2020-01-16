@extends('layouts.landing')

@section('meta')
	<title> خونه پز - سفارش غذا </title>
@endsection


@section('content')

	<section class="home-slider owl-carousel other-pages">

		<div class="slider-item" style="background-image: url('{{asset('assets/images/order.jpg')}}');" data-stellar-background-ratio="0.5">
			<div class="overlay"></div>
			<div class="container">
				<div class="row slider-text justify-content-center align-items-center">

					<div class="col-md-7 col-sm-12 text-center ftco-animate">
						<h1 class="mb-3 mt-5 bread"> سفارش غذا </h1>
					</div>

				</div>
			</div>
		</div>

	</section>

	<section class="ftco-section" dir="rtl">
		<div class="container">

			{{-- @if ($food_count && request()->getQueryString())
				<div class="alert alert-info">
					<i class="material-icons icon">info</i>
					{{$food_count}}
					غذا با این مشخصات یافت شد.
				</div>
			@endif --}}

			<div class="billing-form ftco-bg-dark p-3 p-md-5 mb-3 mb-md-5">

				<div class="row justify-content-between mb-3">
					<div class="col-md-4 text-center text-md-right my-2">
						<a href="#searchbox" data-toggle="collapse"> برای جستجو یک غذا خاص کلیک کنید </a>
					</div>
					<div class="col-md-8 text-center text-md-left my-2">
						<div class="tagcloud">
							<a href="{{route('order_food', 1)}}" @if($order == 1) class="active" @endif>
								بهترین
							</a>
							<a href="{{route('order_food', 2)}}" @if($order == 2) class="active" @endif>
								گرانترین
							</a>
							<a href="{{route('order_food', 3)}}" @if($order == 3) class="active" @endif>
								ارزانترین
							</a>
							<a href="{{route('order_food', 4)}}" @if($order == 4) class="active" @endif>
								پرفروش ترین
							</a>
							<a href="{{route('order_food', 5)}}" @if($order == 5) class="active" @endif>
								جدیدترین
							</a>
							<a href="{{route('order_food', 6)}}" @if($order == 6) class="active" @endif>
								بیشترین تخفیف
							</a>
						</div>
					</div>
				</div>

				<div class="collapse" id="searchbox">
					<form class="row justify-content-center" method="GET">
						<div class="col-md-4">
							<div class="form-group">
								<input type="text" name="t" class="form-control" value="{{request('t')}}" placeholder="نام غذا">
							</div>
						</div>
						<hr class="w-100 hr-primary">
						<div class="col-md-2">
							<button type="submit" class="btn btn-primary btn-outline-primary btn-block"> جستجو </button>
						</div>
					</form>
				</div>

			</div>

			<div class="row d-flex">
				@if ($foods->count())
					@foreach ($foods as $food)
						@if ($cook = $food->cook)
							@include('includes.food_col')
						@endif
					@endforeach
				@else
					<div class="alert alert-warning mx-auto">
						<i class="material-icons icon">warning</i>
						موردی یافت نشد.
					</div>
				@endif
			</div>

			{{$foods->links()}}
		</div>
	</section>
@endsection
