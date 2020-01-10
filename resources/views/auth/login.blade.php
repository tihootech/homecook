@extends('layouts.landing')

@section('meta')
	<title> خونه پز - ورود به جساب کاربری </title>
	<meta name="keywords" content="خونه پز, رزرو غذا کرمانشاه, غذای خانگی, سفارش غذا">
	<meta name="description" content="خونه پز - ورود به جساب کاربری">
@endsection


@section('content')

	<section class="home-slider owl-carousel other-pages">

		<div class="slider-item" style="background-image: url('{{asset('assets/images/login.jpg')}}');" data-stellar-background-ratio="0.5">
			<div class="overlay"></div>
			<div class="container">
				<div class="row slider-text justify-content-center align-items-center">

					<div class="col-md-7 col-sm-12 text-center ftco-animate">
						<h1 class="mb-3 mt-5 bread">  ورود به حساب کاربری </h1>
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
					<form action="{{route('login')}}" method="post" class="billing-form ftco-bg-dark p-3 p-md-5">
						@csrf
						<h3 class="mb-4 billing-heading"> ورود به حساب کاربری </h3>
                        <hr>
						<div class="row align-items-end">
							<div class="col-md-6">
								<div class="form-group">
									<label for="username"> نام کاربری </label>
									<input type="text" name="username" id="username" class="form-control" value="{{old('username')}}">
								</div>
							</div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="password"> رمزعبور </label>
                                    <input type="password" name="password" id="password" class="form-control">
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
