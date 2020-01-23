@extends('layouts.landing')

@section('meta')
	<title> خونه پز - همکاری با ما </title>
@endsection


@section('content')

	@include('includes.landing_slides', ['home_page'=>false])

	<section class="ftco-section" dir="rtl">
		<div class="container">
			<p class="h3"> {{$message}} </p>
			<hr class="gray-border">
			<a href="{{url('/')}}" class="btn btn-primary btn-outline-primary px-4 py-3"> رفتن به صفحه اصلی وبسایت </a>
		</div>
	</section>
@endsection
