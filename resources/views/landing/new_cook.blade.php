@extends('layouts.landing')

@section('meta')
	<title> خونه پز - همکاری با ما </title>
	<meta name="keywords" content="خونه پز, رزرو غذا کرمانشاه, غذای خانگی, سفارش غذا">
	<meta name="description" content="خونه پز - سرویس سفارش غذای خانگی">
@endsection


@section('content')

	<section class="home-slider owl-carousel other-pages">

		<div class="slider-item" style="background-image: url('{{asset('assets/images/handshake.jpg')}}');" data-stellar-background-ratio="0.5">
			<div class="overlay"></div>
			<div class="container">
				<div class="row slider-text justify-content-center align-items-center">

					<div class="col-md-7 col-sm-12 text-center ftco-animate">
						<h1 class="mb-3 mt-5 bread"> همکاری با ما </h1>
					</div>

				</div>
			</div>
		</div>
	</section>

	<section class="ftco-section">
		<div class="container">
			<div class="row justify-content-center">
				<div class="col-xl-10 ftco-animate">

					@include('includes.errors')
					@include('includes.new_cook_form', ['in_panel'=>false])

				</div>
			</div>
		</div>
	</section>
@endsection
