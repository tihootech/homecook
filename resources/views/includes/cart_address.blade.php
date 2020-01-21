<h5> سفارش شما به چه آدرسی ارسال شود؟ </h5>
<hr>
<form class="row justify-content-center billing-form" action="{{route('cart.finalize')}}" method="post" id="finalize">
	@csrf

	@if ($customer->all_addresses->count())

		@if ($customer->primary_address)
			<div class="col-12 form-group">
				<div class="custom-control custom-radio">
					<input type="radio" id="primary-address" name="address" class="custom-control-input" value="{{$customer->primary_address->id}}" checked>
					<label class="custom-control-label" for="primary-address">
						<span class="mr-4"> {{$customer->primary_address->body}} </span>
					</label>
				</div>
			</div>
		@endif


		@foreach ($customer->other_addresses as $i => $address)
			<div class="col-12 form-group">
				<div class="custom-control custom-radio">
					<input type="radio" id="address-{{$i}}" name="address" class="custom-control-input" value="{{$address->id}}">
					<label class="custom-control-label" for="address-{{$i}}">
						<span class="mr-4"> {{$address->body}} </span>
					</label>
				</div>
			</div>
		@endforeach

		<div class="col-12 form-group">
			<div class="custom-control custom-radio">
				<input type="radio" id="new-address" name="address" class="custom-control-input" value="0">
				<label class="custom-control-label" for="new-address">
					<span class="mr-4"> آدرس جدید </span>
				</label>
			</div>
		</div>

		<div class="col-12 form-group hidden" id="new-address-div">
			<div class="col-lg-12 form-group">
				<input type="text" name="new_address" class="form-control" value="{{old('new_address')}}">
			</div>
		</div>

	@else
		<div class="col-lg-12 form-group">
			<label for="new-address"> آدرس </label>
			<input type="text" id="new-address" name="new_address" class="form-control" value="{{old('new_address')}}" required>
		</div>
	@endif

	<div class="w-100"></div>
	<div class="col-lg-{{$cols}} my-1">
		<button type="submit" class="btn btn-primary btn-block"> تایید و ادامه </button>
	</div>
</form>
