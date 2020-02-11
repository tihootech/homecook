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
							<h3> {{$cook->nickname ?? $cook->full_name()}} </h3>
						@endif
					</div>

				</div>
			</div>
		</div>
	</section>

	<section class="ftco-section" dir="rtl">

		<div class="container">
			<div class="row">
				<div class="col-lg-6 mb-5 ftco-animate">
					<a href="{{asset($food->image)}}" class="image-popup">
						<img src="{{asset($food->image)}}" class="img-fluid" alt="{{$food->title}}">
					</a>
				</div>
				<div class="col-lg-6 product-details pl-md-5 ftco-animate">
					<h3>{{$food->title}}</h3>
					<p class="price">
						@if ($food->discount)
							<span class="off ml-3">{{$food->price}}</span>
						@endif
						<span>{{toman($food->getCost())}}</span>
					</p>
					<p>{{$food->material}}</p>
				</div>
			</div>
		</div>

		<div class="container">
			<p class="h3"> بررسی های کاربران </p>
			<hr class="gray-border">
			@if ($food->reviews->count())
				@foreach ($food->reviews as $review)
					@for ($i = 1; $i <= 5; $i++)
						<span class="material-icons @if(round($review->rate) >= $i) text-primary @endif">star</span>
					@endfor
					<p>
						@if ($review->body)
							{{$review->body}}
						@else
							<em> بدون توضیحات </em>
						@endif
					</p>
				@endforeach
			@else
				<div class="alert alert-warning">
					بدون بررسی
				</div>
			@endif
		</div>
	</section>
@endsection
