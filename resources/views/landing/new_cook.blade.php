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
					<form action="{{route('cook.store')}}" method="post" class="billing-form ftco-bg-dark p-3 p-md-5">
						@csrf
						<h3 class="mb-4 billing-heading"> فرم همکاری </h3>
						<div class="row align-items-end">
							<div class="col-md-6">
								<div class="form-group">
									<label for="first-name"> * نام شما </label>
									<input type="text" name="first_name" id="first-name" class="form-control" value="{{old('first_name')}}">
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group">
									<label for="last-name"> * نام خانوادگی </label>
									<input type="text" name="last_name" id="last-name" class="form-control" value="{{old('last_name')}}">
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group">
									<label for="telephone"> تلفن ثابت </label>
									<input type="text" name="telephone" id="telephone" class="form-control" value="{{old('telephone')}}">
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group">
									<label for="mobile"> * تلفن همراه </label>
									<input type="text" name="mobile" id="mobile" class="form-control" value="{{old('mobile')}}">
								</div>
							</div>
							<div class="col-md-4">
								<div class="form-group">
									<label for="state"> * استان </label>
									<input type="text" name="state" id="state" class="form-control" value="{{old('state')}}">
								</div>
							</div>
							<div class="col-md-4">
								<div class="form-group">
									<label for="city"> * شهر </label>
									<input type="text" name="city" id="city" class="form-control" value="{{old('city')}}">
								</div>
							</div>
							<div class="col-md-4">
								<div class="form-group">
									<label for="hood"> * محله </label>
									<input type="text" name="hood" id="hood" class="form-control" value="{{old('hood')}}">
								</div>
							</div>
							<div class="col-md-12">
								<div class="form-group">
									<label for="address"> * آدرس </label>
									<input type="text" name="address" id="address" class="form-control" value="{{old('address')}}">
								</div>
							</div>
							<div class="col-md-2 mx-auto">
								<div class="form-group">
									<button type="submit" class="btn btn-primary btn-block py-3 px-4"> تایید </button>
								</div>
							</div>
						</div>
					</form><!-- END -->

				</div>
			</div>
		</div>
	</section>
@endsection
