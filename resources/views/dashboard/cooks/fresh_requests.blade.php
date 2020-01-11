@extends('layouts.dashboard')
@section('title')
    درخواست های همکاری
@endsection
@section('content')

	<div class="tile">
		<p>
			<i class="fa fa-asterisk text-info ml-1"></i>
			در صورت تایید درخواست یک پیامک به شخص درخواست دهنده ارسال میشود و به او اطلاع داده میشود
			که در خواست وی مورد تایید واقع شده.
			همچنین اطلاعات حساب کاربری مانند رمزعبور و گذرواژه نیز برای شخص ارسال میشود تا بتواند وارد حساب کاربری خود شود.
		</p>
		<hr>
		<p>
			<i class="fa fa-asterisk text-info ml-1"></i>
			در صورتی که درخواست شخص نیاز به اصلاح داشته باشد، میتوانید روی گزینه اصلاح کلیک کنید و علت نیاز به اصلاح را نیز ذکر کنید.
			پس از تایید، به شخص متقاضی یک پیامک ارسال میشود و علت رد شدن درخواست وی به او ابلاغ میشود و از او خواسته میشود تا اصلاحات لازم را انجام دهد.
		</p>
	</div>

	@foreach ($fresh_requests as $cook)

		<div class="tile">

			<div class="row mb-3">
				<div class="col-md-3 my-2">
					<div class="card">
						<div class="card-body">
							نام : <b> {{$cook->full_name()}} </b>
						</div>
					</div>
				</div>
				<div class="col-md-3 my-2">
					<div class="card">
						<div class="card-body">
							تلفن : <b> {{$cook->telephone}} </b>
						</div>
					</div>
				</div>
				<div class="col-md-3 my-2">
					<div class="card">
						<div class="card-body">
							موبایل : <b> {{$cook->mobile}} </b>
						</div>
					</div>
				</div>
				<div class="col-md-3 my-2">
					<div class="card">
						<div class="card-body">
							استان : <b> {{$cook->state}} </b>
						</div>
					</div>
				</div>
				<div class="col-md-3 my-2">
					<div class="card">
						<div class="card-body">
							شهر : <b> {{$cook->city}} </b>
						</div>
					</div>
				</div>
				<div class="col-md-3 my-2">
					<div class="card">
						<div class="card-body">
							محله : <b> {{$cook->hood}} </b>
						</div>
					</div>
				</div>
				<div class="col-md-3 my-2">
					<div class="card">
						<div class="card-body">
							تاریخ : <b> {{human_date($cook->created_at)}} </b>
						</div>
					</div>
				</div>
				<div class="col-md-3 my-2">
					<div class="card">
						<div class="card-body">
							ساعت : <b class="calibri"> {{$cook->created_at->format('H:i')}} </b>
						</div>
					</div>
				</div>
				<div class="col-md-12">
					<div class="card">
						<div class="card-body">
							آدرس : <b> {{$cook->address}} </b>
						</div>
					</div>
				</div>
			</div>

			<div class="text-center text-md-right">
                <form class="form-inline d-inline mx-1" action="{{route('cook.accept', $cook->id)}}" method="post">
    				@csrf
    				<button type="submit" class="btn btn-success my-1"> <i class="fa fa-check ml-1"></i> تایید </button>
    			</form>
    			<button type="button" class="btn btn-warning my-1" data-toggle="collapse" data-target="#modify-form-{{$cook->id}}">
    				<i class="fa fa-pencil ml-1"></i> نیاز به اصلاح
    			</button>
    			<form class="form-inline d-inline mx-1" action="{{route('cook.destroy', $cook->id)}}" method="post">
    				@csrf
    				@method('DELETE')
    				<button type="button" class="btn btn-danger my-1 delete"> <i class="fa fa-trash ml-1"></i> حذف درخواست </button>
    			</form>
    			<form class="collapse text-center" action="{{route('cook.modify', $cook->id)}}" method="post" id="modify-form-{{$cook->id}}">
    				@csrf
    				<hr>
    				<textarea name="reason" rows="3" class="form-control mb-3" required placeholder="علت نیاز به اصلاح"></textarea>
    				<button type="submit" class="btn btn-primary my-1"> <i class="fa fa-check ml-1"></i> تایید </button>
    			</form>
            </div>

		</div>

	@endforeach

@endsection
