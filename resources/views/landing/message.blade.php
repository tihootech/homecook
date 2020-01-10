@extends('layouts.landing')

@section('meta')
	<title> خونه پز - همکاری با ما </title>
	<meta name="keywords" content="خونه پز, رزرو غذا کرمانشاه, غذای خانگی, سفارش غذا">
	<meta name="description" content="خونه پز - سرویس سفارش غذای خانگی">
@endsection


@section('content')

	<section class="home-slider owl-carousel other-pages">

		<div class="slider-item" style="background-image: url('{{asset('assets/images/message.jpg')}}');" data-stellar-background-ratio="0.5">
			<div class="overlay"></div>
			<div class="container">
				<div class="row slider-text justify-content-center align-items-center">

					<div class="col-md-7 col-sm-12 text-center ftco-animate">
						<h1 class="mb-3 mt-5 bread"> با تشکر از همکاری شما </h1>
					</div>

				</div>
			</div>
		</div>
	</section>

	<section class="ftco-section" dir="rtl">
		<div class="container">
			<p class="h3"> {{$message}} </p>
			<hr class="gray-border">
			<a href="{{url('/')}}" class="btn btn-primary btn-outline-primary px-4 py-3"> رفتن به صفحه اصلی وبسایت </a>
		</div>
	</section>
@endsection
