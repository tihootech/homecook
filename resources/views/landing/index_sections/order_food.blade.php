<section class="ftco-section">
	<div class="container">
		<div class="row align-items-center">
			<div class="col-md-6 pl-md-5">
				<div class="heading-section text-md-right ftco-animate">
					<span class="subheading">Order</span>
					<h2 class="mb-4"> سفارش غذا </h2>
					<p class="mb-4 rtl-justify">{{$website->order_food}}</p>
					<p><a href="{{route('order_food')}}" class="btn btn-primary btn-outline-primary px-4 py-3">مشاهده منوی کامل</a></p>
				</div>
			</div>
			<div class="col-md-6">
				<div class="row">
					@foreach ($foods as $food)
						<div class="col-md-6">
							<div class="menu-entry">
								<a href="{{$food->public_link()}}" class="img"
									style="background-image: url('{{asset($food->image)}}');">
								</a>
							</div>
						</div>
					@endforeach
				</div>
			</div>
		</div>
	</div>
</section>
