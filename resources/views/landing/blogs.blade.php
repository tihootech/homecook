@extends('layouts.landing')

@section('meta')
	<title> خونه پز - وبلاگ </title>
@endsection


@section('content')

	<section class="home-slider owl-carousel other-pages">

		<div class="slider-item" style="background-image: url('{{asset('assets/images/message.jpg')}}');" data-stellar-background-ratio="0.5">
			<div class="overlay"></div>
			<div class="container">
				<div class="row slider-text justify-content-center align-items-center">

					<div class="col-md-7 col-sm-12 text-center ftco-animate">
						<h1 class="mb-3 mt-5 bread"> وبلاگ </h1>
					</div>

				</div>
			</div>
		</div>
	</section>

	<section class="ftco-section" dir="rtl">
		<div class="container">
			<form class="row justify-content-center billing-form p-3 p-md-5" method="GET">
				<div class="col-md-4">
					<div class="form-group">
						<input type="text" name="search" class="form-control gold" value="{{request('search')}}" placeholder="عبارت مورد نظر">
					</div>
				</div>
				<div class="col-md-2">
					<button type="submit" class="btn btn-primary btn-outline-primary btn-block"> جستجو </button>
				</div>
			</form>
			<div class="row d-flex">
				@if ($blogs->count())
					@foreach ($blogs as $blog)
						@include('includes.blog_col')
					@endforeach
				@else
					<div class="alert alert-warning mx-auto">
						<i class="material-icons icon">warning</i>
						موردی یافت نشد.
					</div>
				@endif
			</div>
			{{$blogs->links()}}
		</div>
	</section>


@endsection
