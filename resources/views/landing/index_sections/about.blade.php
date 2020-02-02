<section class="ftco-about d-md-flex">
	<div class="one-half img" style="background-image: url('{{asset($website->about_image)}}');"></div>
	<div class="one-half ftco-animate">
		<div class="overlap">
			<div class="heading-section ftco-animate ">
				<span class="subheading">About Us</span>
				<h2 class="mb-4"> درباره ما </h2>
			</div>
			<div class="about-text">
				<p class="rtl-justify">{{$website->about}}</p>
				<a href="{{route('new_cook')}}" class="btn btn-primary btn-outline-primary px-4 py-3">
					برای همکاری با ما کلیک کنید
				</a>
			</div>
		</div>
	</div>
</section>
