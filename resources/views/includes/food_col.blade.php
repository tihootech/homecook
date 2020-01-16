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
		<div class="text py-4 d-block">
			<div class="meta d-flex">
				<div>
					<a href="{{$cook->public_link()}}">
						<span class="material-icons">person</span>
						{{$cook->full_name()}}
					</a>
				</div>
				@if ($rate = $food->f_rate)
					<div class="mr-auto" data-toggle="popover" data-trigger="hover" data-placement="top"
						data-content="{{rand(5,50)}} بررسی با میانگین {{round($rate, 2)}} امتیاز برای این غذا">
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
			<div class="d-flex justify-content-around">
				<div class="text-light">
					<span @if($food->discount) class="off" @endif> {{toman($food->price)}} </span>
				</div>
				@if ($food->discount)
					<div class="text-primary">
						{{toman($food->f_cost)}}
					</div>
				@endif
			</div>
			<hr class="hr-primary">
			<div class="d-flex justify-content-between">
				<a href="{{$food->public_link()}}" class="btn btn-primary btn-outline-primary">
					<i class="material-icons ml-1">list</i>
					جزییات
				</a>
				<a href="javascript:void" class="btn btn-primary btn-outline-primary">
					<i class="material-icons ml-1">add_shopping_cart</i>
					افزودن به سبد خرید
				</a>
			</div>
		</div>
	</div>
</div>
