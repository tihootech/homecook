@extends('layouts.landing')

@section('meta')
	<title> کوفته ریزه - همکاری با ما </title>
@endsection


@section('content')

	<section class="ftco-section mt-5" dir="rtl">
		<div class="container mt-5">
			<p class="h3"> نتایج جستجو </p>
			<hr class="gray-border">
			<div class="row">
				@if ($foods->count())
					@foreach ($foods as $food)
						@include('includes.food_col')
					@endforeach
				@else
					<div class="w-100">
						<div class="alert alert-warning">
							موردی یافت نشد
						</div>
					</div>
				@endif
			</div>
			{{$foods->links()}}
		</div>
	</section>

@endsection
