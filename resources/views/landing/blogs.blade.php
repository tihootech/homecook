@extends('layouts.landing')

@section('meta')
	<title> کوفته ریزه - وبلاگ </title>
@endsection


@section('content')

	@include('includes.landing_slides', ['home_page'=>false])

	<section class="ftco-section" dir="rtl">
		<div class="container">
			<form class="row justify-content-center billing-form p-3 p-md-5" method="GET">
				<div class="col-md-4">
					<div class="form-group">
						<input type="text" name="search" class="form-control gold" value="{{request('search')}}" placeholder="عبارت مورد نظر">
					</div>
				</div>
				<div class="col-md-2">
					<button type="submit" class="btn btn-primary btn-outline-primary btn-block"> جستجو </button>
				</div>
			</form>
			<div class="row d-flex">
				@if ($blogs->count())
					@foreach ($blogs as $blog)
						@include('includes.blog_col')
					@endforeach
				@else
					<div class="alert alert-warning mx-auto">
						<i class="material-icons icon">warning</i>
						موردی یافت نشد.
					</div>
				@endif
			</div>
			{{$blogs->links()}}
		</div>
	</section>


@endsection
