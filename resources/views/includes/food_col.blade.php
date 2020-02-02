<div class="col-md-4 d-flex ftco-animate">
	<div class="blog-entry">
		<a href="{{$food->public_link()}}" class="block-20" style="background-image: url('{{asset($food->image)}}');"></a>
		@if ($food->discount)
			<span class="off-badge bg-danger">
				<b>{{$food->discount}}%</b>
				<br>
				تخفیف
			</span>
		@endif
		<div class="text py-4 d-block food-col">
			<div class="meta d-flex">
				<div>
					<a href="{{$food->cook->public_link()}}">
						<span class="material-icons">person</span>
						{{$food->cook->full_name()}}
					</a>
				</div>
				@php
					$rate = $food->rate ?? $food->getRate()
				@endphp
				@if ($rate > 0)
					<div class="mr-auto" data-toggle="popover" data-trigger="hover" data-placement="top"
						data-content="{{$food->reviews->count()}} بررسی با میانگین {{round($rate, 2)}} امتیاز برای این غذا">
						<a href="javascript:void" class="meta-chat">
							@for ($i = 1; $i <= 5; $i++)
								<span class="material-icons @if(round($rate) >= $i) text-primary @endif">star</span>
							@endfor
						</a>
					</div>
				@endif
			</div>
			<h3 class="heading text-center mt-2">
				<a href="{{$food->public_link()}}"> {{$food->title}} </a>
			</h3>
			<p class="text-center"> {{$food->material}} </p>
			@if ($food->min > 1)
				<p class="text-center">
					<i class="text-primary material-icons icon">info</i>
					حداقل تعداد سفارش : {{$food->min}}
				</p>
			@endif
			<div class="d-flex justify-content-around">
				<div class="text-light">
					<span @if($food->discount) class="off" @endif> {{toman($food->price)}} </span>
				</div>
				@if ($food->discount)
					<div class="text-primary">
						{{toman($food->cost ?? $food->getCost())}}
					</div>
				@endif
			</div>
			<hr class="hr-primary">
			<div class="row px-3">
				<div class="col-lg-4 px-1 my-1">
					<a href="{{$food->public_link()}}" class="btn btn-primary btn-outline-primary btn-block">
						<i class="material-icons ml-1">list</i>
						جزییات
					</a>
				</div>
				<div class="col-lg-8 px-1 my-1">
					<a href="#food-{{$food->uid}}" data-toggle="collapse" class="btn btn-primary btn-outline-primary btn-block">
						<i class="material-icons ml-1">add_shopping_cart</i>
						افزودن به سبد خرید
					</a>
				</div>
			</div>
			<form class="collapse" action="{{route('cart.add')}}" method="post" id="food-{{$food->uid}}">
				<hr>
				<div class="alert alert-danger text-center hidden" id="min-error-{{$food->uid}}">
					<i class="material-icons icon">error</i>
					برای این محصول حداقل تعداد سفارش
					{{$food->min}}
					عدد میباشد.
				</div>
				<p class="text-center"> لطفا تعداد را انتخاب کنید </p>
				@csrf
				<input type="hidden" name="food" value="{{$food->uid}}">
				<div class="row my-2 cart-count-panel mx-1">
					<div class="col-2 change" data-action="negative">
						<span>-</span>
					</div>
					<div class="col-8 col-lg-6 mx-auto input">
						<input type="text" name="count" value="{{$food->min}}" class="form-control">
					</div>
					<div class="col-2 change" data-action='add'>
						<span>+</span>
					</div>
				</div>
				<div class="my-3 text-center">
					<a href="javascript:void" class="btn btn-primary btn-outline-primary" data-action="add-to-cart" data-min="{{$food->min}}">
						<i class="material-icons ml-1">add</i>
						افزودن
					</a>
				</div>
			</form>
		</div>
	</div>
</div>
