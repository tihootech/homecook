@extends('layouts.acc')

@section('meta')
	<title> خونه پز - وارد کردن کد تایید </title>
@endsection

@section('content')

	@include('includes.errors')

	<form class="row" action="{{route('acc.reset_password', $user->id)}}" method="POST">
		@csrf
		<div class="col-md-6 my-2">
			<input type="password" name="password" class="form-control tp" placeholder="رمزعبور جدید" required>
		</div>
		<div class="col-md-6 my-2">
			<input type="password" name="password_confirmation" class="form-control tp" placeholder="رمزعبور جدید" required>
		</div>
		<div class="col-md-9 my-2">
			<input type="text" name="code" class="form-control tp" placeholder="کد تایید ارسال شده به موبایل شما" required>
		</div>
		<div class="col-md-3 my-auto">
			<button type="submit" class="login100-form-btn simple"> تایید </button>
		</div>
	</form>

@endsection
