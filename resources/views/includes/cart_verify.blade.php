<form class="row justify-content-center billing-form" action="{{route('cart.activate', $customer->uid)}}" method="post">
	@csrf
	<div class="col-lg-{{$cols}} form-group">
		<label for="code"> کد 6 رقمی ارسال شده به موبایل شما </label>
		<input type="text" dir="ltr" id="code" name="code" class="form-control" value="{{old('code')}}">
	</div>
	<div class="w-100"></div>
	<div class="col-lg-{{$cols/2}} my-1">
		<button type="submit" class="btn btn-primary btn-block"> تایید و ادامه </button>
	</div>
	<div class="col-lg-{{$cols/2}} my-1">
		<button type="button" class="btn btn-primary btn-block btn-large"> ارسال دوباره کد تایید </button>
	</div>
</form>
