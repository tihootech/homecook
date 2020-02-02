<section class="ftco-section">
	<div class="container">
		<div class="row justify-content-center mb-5 pb-3">
			<div class="col-md-7 heading-section ftco-animate text-center">
				<span class="subheading">Shop</span>
				<h2 class="mb-4">محصولات خانگی</h2>
				<p>{{$website->order_product}}</p>
			</div>
		</div>
		<div class="row">
			@if ($products->count())
				@foreach ($products as $food)
					@include('includes.food_col')
				@endforeach
			@else
				<div class="alert alert-danger mx-auto">
					<p class="m-0"> <i class="material-icons icon">error</i> هنوز هیچ محصولی در سیستم ثبت نشده. </p>
				</div>
			@endif
		</div>
		<hr class="hr-primary">
		<div class="text-center">
			<a href="{{route('order_product')}}" class="btn btn-primary btn-outline-primary px-4 py-3">
				مشاهده همه محصولات خانگی
			</a>
		</div>
	</div>
</section>
