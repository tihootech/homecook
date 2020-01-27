@extends('layouts.acc')

@section('meta')
	<title> خونه پز - ورود به حساب کاربری </title>
@endsection

@section('content')


	<form class="login100-form validate-form" method="post" action="{{ route('login') }}" autocomplete="off">
		@csrf

		<span class="login100-form-title p-b-43">
			ورود به حساب کاربری
		</span>

		<div class="wrap-input100 rs1 validate-input" data-validate = "نام کاربری الزامی است">
			<input class="input100" type="text" name="username">
			<span class="label-input100">نام کاربری</span>
		</div>


		<div class="wrap-input100 rs2 validate-input" data-validate="رمز عبور الزامی است">
			<input class="input100" type="password" name="password">
			<span class="label-input100">رمز عبور</span>
		</div>

		<div class="container-login100-form-btn">
			<button class="login100-form-btn">
				ورود
			</button>
		</div>

		<div class="w-full text-center">
			<div class="custom-control custom-checkbox d-inline-block mt-3">
				<input type="checkbox" class="custom-control-input" id="remember"
				{{ old('remember') ? 'checked' : '' }} >
				<label class="custom-control-label" for="remember">
					<small class="text-bright mr-4"> مرا به خاطر بسپار </small>
				</label>
			</div>
		</div>

		<div class="text-center w-full p-t-23">
			<div class="d-flex justify-content-between">
				<a href="#forgot-password" class="txt1" data-toggle="collapse">
					<i class="material-icons">info</i>
					رمز عبور خود را فراموش کردید؟
				</a>
				<a href="{{route('acc.register')}}" class="txt1">
					<i class="material-icons">person_add</i>
					ایجاد حساب کاربری
				</a>
			</div>
		</div>
	</form>

	<div class="mt-4">
		@include('includes.errors')
	</div>

	<form class="collapse mt-4" action="{{route('acc.forget')}}" method="post" id="forgot-password">
		@csrf
		<label for="kwd" class="text-bright mb-2">
			<small>
				برای بازیابی رمز عبور،
				نام کاربری یا شماره تماس خود را وارد کنید.
			</small>
		</label>
		<div class="row">
			<div class="col-md-10 my-2">
				<input type="text" name="keyword" class="form-control tp" id="kwd" value="{{old('keyword')}}">
			</div>
			<div class="col-md-2 my-auto">
				<button type="submit" class="login100-form-btn simple"> تایید </button>
			</div>
		</div>
	</form>

@endsection
