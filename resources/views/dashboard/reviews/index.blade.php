@extends('layouts.dashboard')
@section('title')
	بازنگری ها
@endsection
@section('content')
	<div class="tile">

		<div class="row justify-content-center">
			@foreach ($reviews as $review)
				<div class="col-md-6 my-2">
					<div class="card">
						<div class="card-body text-center">
							<p>
								@if ($review->body)
									{{$review->body}}
								@else
									<em> [بدون متن] </em>
								@endif
							</p>
							<p> <a href="{{$review->food->public_link()}}"> {{$review->food->title}} </a> </p>
							@for ($i = 1; $i <= 5; $i++)
								<span class="material-icons @if(round($review->rate) >= $i) text-primary @endif">star</span>
							@endfor
							@if ($review->body)
								<form class="mt-3" action="{{route('review.accept', $review->id)}}" method="post">
									@csrf
									<button type="submit" class="btn @if($review->accepted) btn-outline-danger @else btn-outline-primary @endif">
										@if($review->accepted) عدم نمایش @else نمایش در صفحه اصلی @endif
									</button>
								</form>
							@endif
						</div>
					</div>
				</div>
			@endforeach
		</div>

		<div class="mt-4">
			{{$reviews->links()}}
		</div>

	</div>

@endsection
