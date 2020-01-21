@extends('layouts.landing')

@section('meta')
	<title> خونه پز - {{$food->title}} </title>
@endsection


@section('content')

	<section class="home-slider owl-carousel other-pages">

		<div class="slider-item" style="background-image: url('{{asset($food->image)}}');" data-stellar-background-ratio="0.5">
			<div class="overlay"></div>
			<div class="container">
				<div class="row slider-text justify-content-center align-items-center">

					<div class="col-md-7 col-sm-12 text-center ftco-animate">
						<h1 class="mb-3 mt-5 bread"> {{$food->title}} </h1>
						@if ($cook = $food->cook)
							<h3> {{$cook->full_name()}} </h3>
						@endif
					</div>

				</div>
			</div>
		</div>
	</section>

	<section class="ftco-section" dir="rtl">
		<div class="container">
			<p class="h3"> این قسمت در دست ساخت است </p>
			<hr class="gray-border">
			<a href="{{url('/')}}" class="btn btn-primary btn-outline-primary px-4 py-3"> رفتن به صفحه اصلی وبسایت </a>
		</div>
	</section>
@endsection