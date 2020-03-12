@extends('layouts.acc')

@section('meta')
	<title> کوفته ریزه - بازیابی رمزعبور </title>
@endsection

@section('content')

	@if (count($users))
		<p class="w-full h5 text-center mb-4"> <span class="ml-1"> {{count($users)}} </span> کاربر پیدا شد. </p>
	@endif
	<hr class="hr-primary">
	<div class="row">
		@foreach ($users as $user)
			<form class="col-md-6 mx-auto" action="{{route('acc.send_code', $user->id)}}" method="post">
				@if (count($users) > 1)
					<p class="text-center mb-2"> دسترسی : {{$user->persian_type()}} </p>
				@endif
				@csrf
				<button type="submit" class="login100-form-btn simple"> ارسال کد بازیابی به {{$user->owner->mobile ?? '-'}} </button>
			</form>
		@endforeach
	</div>

@endsection
