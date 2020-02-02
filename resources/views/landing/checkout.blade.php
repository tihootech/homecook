@extends('layouts.landing')

@section('meta')
	<title>
		خونه پز -
		@if ($type == 'checkout')
			سبد خرید
		@endif
		@if ($type == 'code')
			فعال سازی حساب کاربری
		@endif
		@if ($type == 'address')
			انتخاب آدرس
		@endif
		@if ($type == 'review')
			بازنگری سبد خرید
		@endif
	</title>
@endsection


@section('content')

	<section class="ftco-section" dir="rtl">
		<div class="container">

			@include('includes.errors')

			@if ($type == 'review')
				<div class="ftco-bg-dark p-3 p-md-5">

					@if ($transaction->items->count())
						<h5 class="mb-4"> بازنگری و پرداخت </h5>
						<div class="table-responsive-lg">
							@include('includes.cart_items')
						</div>
						<div class="text-center">
							<p>
								<b> آدرس : </b>
								<span> {{$transaction->address->body}} </span>
							</p>
							<p>
								<b> شماره تماس : </b>
								<span> {{$transaction->customer->mobile}} </span>
							</p>
							<p>
								<b> تاریخ تحویل : </b>
								<span class="mx-1"> {{$transaction->generate_delivery('persian')}} </span>
								<span class="mx-1"> ساعت 12 الی 18 </span>
							</p>
							<form action="{{route('cart.finish', $transaction->uid)}}" method="post">
								@csrf
								<div class="row justify-content-center">
									<div class="col-lg-3 col-md-6">
										<select class="simple-select2" name="time">
											@for ($i=12; $i <= 18; $i++)
												<option value="{{$i}}" @if($i==14) selected @endif> {{$i}} بعد از ظهر </option>
											@endfor
										</select>
									</div>
									<div class="col-lg-2 col-md-6">
										<button type="submit" class="btn btn-primary btn-block p-3 px-4"> تایید و پرداخت </button>
									</div>
								</div>
							</form>
						</div>
					@else
						<div class="alert alert-danger">
							<i class="icon material-icons">error</i>
							سبد خرید شما خالی است.
						</div>
					@endif

				</div>
			@endif

			@if ($type == 'code')
				<div class="ftco-bg-dark p-3 p-md-5">
					@include('includes.cart_verify', ['cols' => 6])
				</div>
			@endif

			@if ($type == 'address')
				<div class="ftco-bg-dark p-3 p-md-5">
					@include('includes.cart_address', ['cols' => 4])
				</div>
			@endif

			@if ($type == 'checkout')
				@if ($transaction && $transaction->items->count())
					<div class="ftco-bg-dark p-3 p-md-5">
						<div class="row">
							@if (!user() || user('type') != 'customer')
								<div class="col-md-5">
									<p class="h5">
										<i class="material-icons icon">info</i>
										برای خرید نیاز است که به عنوان مشتری یک حساب کاربری داشته باشید
									</p>
									<div class="mt-3 p-3 p-md-4">
										<div id="account">
											<a href="#register" data-toggle="collapse" class="d-block">
												ایجاد حساب کاربری
											</a>
											<div id="register" class="collapse show my-3" data-parent="#account">

												@include('includes.register_form', ['in_cart'=>true])

											</div>
											<a href="#login" data-toggle="collapse" class="d-block">
												قبلا حساب کاربری ایجاد کردم
											</a>
											<div id="login" class="collapse my-3" data-parent="#account">

												<form class="row justify-content-center" action="{{route('cart.login')}}" method="post">

													@csrf

													<div class="col-md-6 form-group">
														<input type="text" name="username" value="{{old('username')}}" class="form-control" placeholder="نام کاربری" required>
													</div>

													<div class="col-md-6 form-group">
														<input type="password" name="password" class="form-control" placeholder="رمزعبور" required>
													</div>

													<div class="col-md-6 form-group">
														<button type="submit" class="btn btn-primary btn-block">
															ورود به حساب کاربری
														</button>
													</div>

												</form>

											</div>
										</div>
									</div>
								</div>
							@elseif (user('acc_verified_at'))
								<div class="col-md-5">
									@include('includes.cart_address', ['cols' => 6, 'customer' => user()->owner])
								</div>
							@elseif($customer = user()->owner)
								<div class="col-md-5">
									@include('includes.cart_verify', ['cols' => 12])
								</div>
							@else
								<div class="alert alert-danger">
									خطایی رخ داده است.
								</div>
							@endif
							<div class="col-md-7">
								<div class="table-responsive-md">
									@include('includes.cart_items')
									@if ($transaction->count_cooks() > 1)
										<div class="alert alert-warning" id="many-cooks-alert">
											<i class="material-icons icon">info</i>
											به علت سفارش از
											<b id="cook-count" class="text-dark mx-1"> {{$transaction->count_cooks()}} </b>
											آشپز مختلف، هزینه ارسال شما
											<b class="peyk-share text-dark mx-1">{{nf($transaction->peyk_share)}}</b>
											تومان
											میباشد.
										</div>
									@endif
								</div>
							</div>
						</div>
					</div>
				@else
					<div class="alert alert-warning mt-5">
						<i class="material-icons icon">warning</i>
						سبد خرید شما خالی است.
					</div>
					<hr class="gray-border">
					<a href="{{url('/')}}" class="btn btn-primary btn-outline-primary mx-1 px-4 py-3"> رفتن به صفحه اصلی وبسایت </a>
					<a href="{{route('order_food')}}" class="btn btn-primary btn-outline-primary mx-1 px-4 py-3"> سفارش غذا </a>
				@endif
			@endif

		</div>
	</section>
@endsection
