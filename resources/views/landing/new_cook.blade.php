@extends('layouts.landing')

@section('meta')
	<title> خونه پز - همکاری با ما </title>
@endsection


@section('content')

	@include('includes.landing_slides', ['home_page'=>false])

	<section class="ftco-section">
		<div class="container">
			<div class="row justify-content-center">
				<div class="col-xl-10 ftco-animate">

					@include('includes.errors')
					@include('includes.new_cook_form', ['in_panel'=>false])

				</div>
			</div>
		</div>
	</section>
	
@endsection
