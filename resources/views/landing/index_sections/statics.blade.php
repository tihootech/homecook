<section class="ftco-counter ftco-bg-dark img" id="section-counter" style="background-image: url('{{asset($website->statics_image)}}')" data-stellar-background-ratio="0.5">
	<div class="overlay"></div>
	<div class="container">
		<div class="row justify-content-center">
			<div class="col-md-10">
				<div class="row">
					<div class="col-md-6 col-lg-3 d-flex justify-content-center counter-wrap ftco-animate">
						<div class="block-18 text-center">
							<div class="text">
								<div class="icon"> <span class="material-icons">people</span> </div>
								<strong class="number" data-number="{{$counts['cooks']}}">0</strong>
								<span>آشپز مختلف</span>
							</div>
						</div>
					</div>
					<div class="col-md-6 col-lg-3 d-flex justify-content-center counter-wrap ftco-animate">
						<div class="block-18 text-center">
							<div class="text">
								<div class="icon"> <span class="material-icons">fastfood</span> </div>
								<strong class="number" data-number="{{$counts['foods']}}">0</strong>
								<span>غذای گوناگون</span>
							</div>
						</div>
					</div>
					<div class="col-md-6 col-lg-3 d-flex justify-content-center counter-wrap ftco-animate">
						<div class="block-18 text-center">
							<div class="text">
								<div class="icon"> <span class="material-icons">room_service</span> </div>
								<strong class="number" data-number="{{$counts['orders']}}">0</strong>
								<span>سفارش غذا</span>
							</div>
						</div>
					</div>
					<div class="col-md-6 col-lg-3 d-flex justify-content-center counter-wrap ftco-animate">
						<div class="block-18 text-center">
							<div class="text">
								<div class="icon"> <span class="material-icons">emoji_emotions</span> </div>
								<strong class="number" data-number="{{$counts['users']}}">0</strong>
								<span>کاربر فعال</span>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
