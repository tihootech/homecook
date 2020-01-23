@extends('layouts.landing')

@section('meta')
	<title> خونه پز - سفارش غذا </title>
@endsection


@section('content')

	@include('includes.landing_slides', ['home_page'=>false])

	<section class="ftco-section" dir="rtl">
		<div class="container">

			<div class="billing-form ftco-bg-dark p-3 p-md-4 mb-3 mb-md-5">

				<div class="text-center text-center">
					<div class="tagcloud">
						<a href="{{route('order_food', 1)}}" @if($order == 1) class="active" @endif>
							بهترین
						</a>
						<a href="{{route('order_food', 2)}}" @if($order == 2) class="active" @endif>
							گرانترین
						</a>
						<a href="{{route('order_food', 3)}}" @if($order == 3) class="active" @endif>
							ارزانترین
						</a>
						<a href="{{route('order_food', 4)}}" @if($order == 4) class="active" @endif>
							پرفروش ترین
						</a>
						<a href="{{route('order_food', 5)}}" @if($order == 5) class="active" @endif>
							جدیدترین
						</a>
						<a href="{{route('order_food', 6)}}" @if($order == 6) class="active" @endif>
							بیشترین تخفیف
						</a>
					</div>
				</div>

			</div>

			<div class="row">

				<div class="col-md-2 p-0">
					<form class="billing-form ftco-bg-dark p-3 mb-3">

						@foreach ($cats as $cat)
							<div class="form-group">
								<div class="custom-control custom-checkbox">
									<input type="checkbox" class="custom-control-input" id="cat-{{$cat->id}}" name="c[]" value="{{$cat->id}}"
										@if( is_array(request('c')) && in_array($cat->id, request('c')) ) checked @endif>
									<label class="custom-control-label" for="cat-{{$cat->id}}">
										<span class="mr-4"> {{$cat->title}} </span>
									</label>
								</div>
							</div>
						@endforeach
						{{-- <div class="form-group">
							<input type="text" name="t" class="form-control" value="{{request('t')}}" placeholder="نام غذا">
						</div> --}}
						<button type="submit" class="btn btn-primary btn-outline-primary btn-block"> فیلتر کردن </button>

					</form>
				</div>
				<div class="col-md-10">
					<div class="row">
						@if ($foods->count())
							@foreach ($foods as $food)
								@if ($cook = $food->cook)
									@include('includes.food_col')
								@endif
							@endforeach
						@else
							<div class="col-md-8 mx-auto">
								<div class="alert alert-warning mx-auto">
									<i class="material-icons icon">warning</i>
									موردی یافت نشد.
								</div>
							</div>
						@endif
					</div>
				</div>

			</div>

			{{$foods->links()}}
		</div>
	</section>
@endsection
