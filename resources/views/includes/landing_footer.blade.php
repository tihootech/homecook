<footer class="ftco-footer ftco-section img">
	<div class="overlay"></div>
	<div class="container">
		<div class="row mb-5">
			<div class="col-lg-2 col-md-6 mb-5 mb-md-5">
				<div class="ftco-footer-widget mb-4">
					<h2 class="ftco-heading-2"> شبکه های اجتماعی </h2>
					<ul class="ftco-footer-social list-unstyled mt-5 p-0">
						@if ($instagram = website('instagram'))
							<li class="ftco-animate">
								<a href="https://instagram.com/{{$instagram}}"><span class="icon-instagram"></span></a>
							</li>
						@endif
						@if ($telegram = website('telegram'))
							<li class="ftco-animate">
								<a href="https://t.me/{{$telegram}}"><span class="icon-telegram"></span></a>
							</li>
						@endif
						@if ($twitter = website('twitter'))
							<li class="ftco-animate">
								<a href="https://twitter.com/{{$twitter}}"><span class="icon-twitter"></span></a>
							</li>
						@endif
						@if ($facebook = website('facebook'))
							<li class="ftco-animate">
								<a href="https://facebook.com/{{$facebook}}"><span class="icon-facebook"></span></a>
							</li>
						@endif
						@if ($linkedin = website('linkedin'))
							<li class="ftco-animate">
								<a href="https://linkedin.com/{{$linkedin}}"><span class="icon-linkedin"></span></a>
							</li>
						@endif
					</ul>
				</div>
			</div>
			<div class="col-lg-5 col-md-6 mb-5 mb-md-5">
				<div class="ftco-footer-widget mb-4">
					<h2 class="ftco-heading-2">آخرین مطالب</h2>
					@foreach (best_blogs(2) as $blog)
						@include('includes.blog_item')
					@endforeach
				</div>
			</div>
			<div class="col-lg-2 col-md-6 mb-5 mb-md-5">
				<div class="ftco-footer-widget mb-4 ml-md-4">
					<h2 class="ftco-heading-2"> لینک ها </h2>
					<ul class="list-unstyled p-0">
						<li><a href="{{route('new_cook')}}" class="py-2 d-block"> همکاری با ما </a></li>
						<li><a href="{{route('blogs')}}" class="py-2 d-block"> مطالب وبسایت </a></li>
						<li><a href="{{route('order_food')}}" class="py-2 d-block"> سفارش غذا </a></li>
						<li><a href="{{route('order_product')}}" class="py-2 d-block"> محصولات خانگی </a></li>
						<li><a href="{{route('rnr')}}" class="py-2 d-block"> قوانین و مقررات </a></li>
					</ul>
				</div>
			</div>
			<div class="col-lg-3 col-md-6 mb-5 mb-md-5">
				<div class="ftco-footer-widget mb-4">
					<h2 class="ftco-heading-2"> تماس با ما </h2>
					<div class="block-23 mb-3">
						<ul>
							@if (website('address'))
								<li>
									<span class="icon icon-map-marker"></span>
									<span class="text">
										{{website('address')}}
									</span>
								</li>
							@endif
							@if (website('phones'))
								@foreach (website()->phones_list() as $phone)
									<li>
										<a href="tel:{{$phone}}">
											<span class="icon icon-phone"></span>
											<span class="text" dir="ltr">{{pretty_phone($phone)}}</span>
										</a>
									</li>
								@endforeach
							@endif
							@if (website('email'))
								<li>
									<a href="mailto:{{website('email')}}">
										<span class="icon icon-envelope"></span>
										<span class="text">{{website('email')}}</span>
									</a>
								</li>
							@endif
						</ul>
					</div>
				</div>
			</div>
		</div>
	</div>
</footer>
