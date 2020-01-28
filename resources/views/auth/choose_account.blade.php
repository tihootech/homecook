@extends('layouts.acc')

@section('meta')
	<title> خونه پز - بازیابی رمزعبور </title>
@endsection

@section('content')

	@if (count($users))
		<p class="w-full h5 text-center mb-4"> <span class="ml-1"> {{count($users)}} </span> کاربر پیدا شد. </p>
	@endif

	<div class="row">
		@foreach ($users as $user)
			<form class="col-md-6 mx-auto" action="{{route('acc.send_code', $user->id)}}" method="post">
				@csrf
				<button type="submit" class="login100-form-btn simple"> ارسال کد بازیابی به {{$user->owner->mobile ?? '-'}} </button>
			</form>
		@endforeach
	</div>

@endsection
