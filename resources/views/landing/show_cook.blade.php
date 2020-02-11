@extends('layouts.landing')

@section('meta')
	<title> خونه پز - {{$cook->full_name()}} </title>
@endsection


@section('content')

	<section class="ftco-section mt-5" dir="rtl">
		<div class="container">
			<p class="h3"> {{$cook->nickname ?? $cook->full_name()}} </p>
			<hr class="gray-border">
			<div class="row">
				@foreach ($cook->foods as $food)
					@include('includes.food_col')
				@endforeach
			</div>
		</div>
	</section>

@endsection
