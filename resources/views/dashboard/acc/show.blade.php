@extends('layouts.dashboard')
@section('title')
	مشخصات کاربر | {{$user->name}}
@endsection
@section('content')

	<div class="tile">

		<h4 class="text-primary"> آزمون ها </h4>
		<hr>
		@if ($user->fillers->count())
			@foreach ($user->fillers as $filler)
				<p>
					@include('dashboard.partials.date_popver', ['object' => $filler])
				</p>
				@include('tables.fillers', ['fillers' => [$filler], 'quiz'=>$filler->quiz, 'single'=>true])
			@endforeach
		@else
			<div class="alert alert-warning">
				آزمونی
				یافت نشد.
			</div>
		@endif

		<h4 class="text-primary"> کامنت ها </h4>
		<hr>
		@if ($user->comments->count())
			<div class="row">
				@foreach ($user->comments as $comment)
					<div class="col-md-4 mb-2">
						<div class="card card-body calibri">
							<p class="yekan m-0"> {{$comment->content}} </p>
							<hr>
							<a href="{{$comment->owner ? $comment->owner->public_link() : '#'}}" target="_blank">
								{{$comment->owner_type}}\{{$comment->owner_id}}
							</a>
							<span dir="ltr">
								{{date_picker_date($comment->created_at, '-')}},
								{{$comment->created_at->format('H:i')}}
							</span>
						</div>
					</div>
				@endforeach
			</div>
		@else
			<div class="alert alert-warning">
				کامنتی
				یافت نشد.
			</div>
		@endif

		<h4 class="text-primary"> لایک ها </h4>
		<hr>
		@if ($user->likes->count())
			<div class="row">
				@foreach ($user->likes as $like)
					<div class="col-md-3 mb-2">
						<div class="card card-body calibri">
							<a href="{{$like->owner ? $like->owner->public_link() : '#'}}" target="_blank">
								{{$like->owner_type}}\{{$like->owner_id}}
							</a>
							<span dir="ltr">
								{{date_picker_date($like->created_at, '-')}},
								{{$like->created_at->format('H:i')}}
							</span>
						</div>
					</div>
				@endforeach
			</div>
		@else
			<div class="alert alert-warning">
				هنوز چیزی را لایک نکرده.
			</div>
		@endif

		<h4 class="text-primary"> بازدید ها </h4>
		<hr>
		@include('tables.activities', ['single'=>true])
		{{$activities->links()}}

	</div>

@endsection
