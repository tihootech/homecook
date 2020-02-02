<section class="ftco-section img" id="ftco-testimony" style="background-image: url('{{asset($website->testimonial_image)}}');" data-stellar-background-ratio="0.5">
	<div class="overlay"></div>
	<div class="container">
		<div class="row justify-content-center mb-5">
			<div class="col-md-7 heading-section text-center ftco-animate">
				<span class="subheading">Testimony</span>
				<h2 class="mb-4">نظرات کاربران</h2>
			</div>
		</div>
	</div>
	<div class="container-wrap">
		<div class="row d-flex no-gutters">
			@foreach ($reviews as $ri => $review)
				<div class="col-lg align-self-sm-end ftco-animate">
					<div class="testimony @if($ri%2==0) overlay @endif">
						<blockquote>
							<p>
								&rdquo;
								{{$review->body}}
								&ldquo;
							</p>
						</blockquote>
					</div>
				</div>
			@endforeach
		</div>
	</div>
</section>
