@extends('layouts.landing')

@section('meta')
	<title> کوفته ریزه - مسابقات </title>
@endsection


@section('content')

	<section class="ftco-section" dir="rtl">
		<div class="container">

			<section class="ftco-section" dir="rtl">

				@include('includes.errors')

				<div class="container">
					<h1> مسابقات </h1>
					<hr class="gray-border">
					@if ($compts->count())
						@foreach ($compts as $compt)
							<div class="card landing-card my-3">
								<div class="card-body">
									<h5> {{$compt->title}} </h5>
									<hr class="gray-border">
									<p> {{$compt->info}} </p>
									@if ($compt->rank_1 || $compt->rank_2 || $compt->rank_3)
										<hr class="gray-border">
										<div class="row">
											@for ($i=1; $i <= 3; $i++)
												@php $var = "rank_{$i}" @endphp
												<div class="col-md-4">
													<div class="card bg-primary text-light">
														<div class="card-body">
															<b> {{__($var)}} </b> : <span class="text-light"> {{$compt->winner($i)}} </span>
														</div>
													</div>
												</div>
											@endfor
										</div>
										<hr class="gray-border">
									@endif
									<div class="d-flex justify-content-between">
										<div>
											<b class="text-primary"> تاریخ برگزاری :  </b> <span> {{human_date($compt->date)}} </span>
										</div>
										<div>
											@if ( now() > $compt->date || $compt->rank_1 || $compt->rank_2 || $compt->rank_3 )
												زمان شرکت در این مسابقه خاتمه یافته
											@else
												<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#signup-{{$compt->id}}">
													شرکت در مسابقه
												</button>
											@endif
										</div>
									</div>
								</div>
							</div>

							<div class="modal fade" id="signup-{{$compt->id}}" tabindex="-1" role="dialog">
								<div class="modal-dialog" role="document">
									<form class="modal-content" action="{{route('competition.signup', $compt)}}" method="post">
										@csrf
										<div class="modal-header">
											<h5 class="modal-title text-dark">{{$compt->title}}</h5>
											<button type="button" class="close mr-auto ml-0" data-dismiss="modal" aria-label="Close">
												<span class="text-dark" aria-hidden="true">&times;</span>
											</button>
										</div>
										<div class="modal-body">
											<div class="row on-light-bg">
												<div class="col-md-6 form-group">
									                <label for="fn"> نام و نام خانوادگی </label>
									                <input type="text" name="full_name" id="fn" class="form-control" required>
									            </div>
												<div class="col-md-6 form-group">
									                <label for="mobile"> شماره تماس </label>
									                <input type="text" name="mobile" id="mobile" class="form-control" required>
									            </div>
											</div>
										</div>
										<div class="modal-footer">
											<button type="button" class="btn btn-secondary mx-1" data-dismiss="modal">انصراف</button>
											<button type="submit" class="btn btn-primary"> ثبت نام </button>
										</div>
									</form>
								</div>
							</div>

						@endforeach
						{{$compts->links()}}
					@else
						<div class="alert alert-warning">
			                مسابقه ای تعریف نشده است.
			            </div>
					@endif
				</div>
			</section>

		</div>
	</section>

@endsection
