@extends('layouts.landing')

@section('meta')
	<title> کوفته ریزه - قوانین و مقررات </title>
@endsection


@section('content')


	<section class="ftco-section" dir="rtl">
		<div class="container">

			<section class="ftco-section" dir="rtl">
				<div class="container">
					<h2> قوانین و مقررات خونه پز </h2>
					<hr class="gray-border">
					<ul>
						@if (website('rnr'))
							@foreach (website()->rules() as $rule)
								<li> {{$rule}} </li>
							@endforeach
						@else
							<div class="alert alert-warning">
								هنوز قوانینی تعریف نشده است.
							</div>
						@endif
					</ul>
					<hr class="gray-border">
					<a href="{{url('/')}}" class="btn btn-primary btn-outline-primary px-4 py-3"> رفتن به صفحه اصلی وبسایت </a>
				</div>
			</section>

		</div>
	</section>

@endsection
