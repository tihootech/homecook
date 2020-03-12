@extends('layouts.landing')

@section('meta')
	<title> کوفته ریزه - همکاری با ما </title>
@endsection


@section('content')


	<section class="ftco-section mt-lg-5" dir="rtl">
		<div class="container mt-lg-5">

			<div class="alert alert-warning text-center">
				<i class="material-icons icon">date_range</i>
				تاریخ تحویل :
				<span class="mx-1 text-dark"> {{human_date($transaction->delivery)}} </span>
				<i class="material-icons icon">access_time</i>
				ساعت تحویل
				<span class="mx-1 text-dark"> ساعت : {{$transaction->time}} </span>
			</div>

			@if ($type == 'peyk')

				<p class="h5"> لیست سفارشات : </p>
				<ul>
					@foreach ($transaction->items as $item)
						<li class="text-white">
							<b class="ml-1"> {{$item->count}} </b>
							عدد
							{{$item->food->title}}
							از
							{{$item->food->cook->address}}
						</li>
					@endforeach
				</ul>
				<hr class="gray-border">
				<p class="h5"> آدرسی مشتری که سفارش را تحویل میگیرد :  </p>
				<p class="text-white"> {{$transaction->address->body}} </p>

			@endif

			@if ($type == 'customer')

				<div class="table-responsive-lg">
					@include('includes.cart_items', ['no_action'=>true])
				</div>

			@endif

		</div>
	</section>

@endsection
