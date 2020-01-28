@extends('layouts.landing')

@section('meta')
	<title> خونه پز - همکاری با ما </title>
@endsection


@section('content')

	<section class="ftco-section mt-5" dir="rtl">
		<div class="container mt-5">
			<p class="h5"> آدرسی که شما غذا را از آشپز تحویل میگیرید : </p>
			<div class="alert alert-warning">
				بعد از حل چالش
			</div>
			<hr class="gray-border">
			<p class="h5"> آدرسی مشتری که غذا را تحویل میگیرد :  </p>
			<p> {{$transaction->address->body}} </p>
		</div>
	</section>

@endsection
