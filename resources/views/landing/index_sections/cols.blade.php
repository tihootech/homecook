<section class="ftco-section ftco-services">
	<div class="container">
		<div class="row">

			@foreach ($website->columns() as $col)
				<div class="col-md-4 ftco-animate">
					<div class="media d-block text-center block-6 services">
						<div class="icon d-flex justify-content-center align-items-center mb-5">
							<span class="material-icons">{{$col[0]}}</span>
						</div>
						<div class="media-body">
							<h3 class="heading">{{$col[1]}}</h3>
							<p>{{$col[2]}}</p>
						</div>
					</div>
				</div>
			@endforeach

		</div>
	</div>
</section>
