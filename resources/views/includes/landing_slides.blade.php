@if ($slides->count())

	<section class="home-slider owl-carousel @unless($home_page) other-pages @endunless">

		@foreach ($slides as $slide)
			<div class="slider-item" style="background-image: url('{{asset($slide->path)}}');"  @unless($home_page) data-stellar-background-ratio="0.5" @endunless>
				<div class="overlay"></div>
				<div class="container">
					<div class="row slider-text justify-content-center align-items-center" @if($home_page) data-scrollax-parent="true" @endif>

						<div class="col-md-8 col-sm-12 text-center ftco-animate">
							@if ($slide->english_word)
								<span class="subheading">{{$slide->english_word}}</span>
							@endif
							@if ($slide->title)
								<h2 class="mb-4">{{$slide->title}}</h2>
							@endif
							@if ($slide->subtitle)
								<p class="mb-4 mb-md-5">{{$slide->subtitle}}</p>
							@endif
						</div>

					</div>
				</div>
			</div>

		@endforeach

	</section>

@endif
