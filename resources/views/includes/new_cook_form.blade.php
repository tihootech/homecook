<form action="{{isset($cook) && $cook->id ? route('cook.update', $cook->id) : route('cook.store')}}" method="post" class="billing-form ftco-bg-dark p-3 p-md-5">
	@csrf
	@if (isset($cook) && $cook->id)
		@method('PUT')
	@endif
	@if($is_master)
		<input type="hidden" name="master" value="1">
	@else
		<h3 class="mb-4 billing-heading"> فرم همکاری </h3>
		<hr>
	@endif
	<div class="row align-items-end">
		<div class="col-md-6">
			<div class="form-group">
				<label for="first-name"> * نام </label>
				<input type="text" name="first_name" id="first-name" class="form-control" value="{{$cook->first_name ?? old('first_name')}}">
			</div>
		</div>
		<div class="col-md-6">
			<div class="form-group">
				<label for="last-name"> * نام خانوادگی </label>
				<input type="text" name="last_name" id="last-name" class="form-control" value="{{$cook->last_name ?? old('last_name')}}">
			</div>
		</div>
		<div class="col-md-6">
			<div class="form-group">
				<label for="telephone"> تلفن ثابت </label>
				<input type="text" name="telephone" id="telephone" class="form-control" value="{{$cook->telephone ?? old('telephone')}}">
			</div>
		</div>
		<div class="col-md-6">
			<div class="form-group">
				<label for="mobile"> * تلفن همراه </label>
				<input type="text" name="mobile" id="mobile" class="form-control" value="{{$cook->mobile ?? old('mobile')}}">
			</div>
		</div>
		<div class="col-md-4">
			<div class="form-group">
				<label for="state"> * استان </label>
				<input type="text" name="state" id="state" class="form-control" value="{{$cook->state ?? old('state')}}">
			</div>
		</div>
		<div class="col-md-4">
			<div class="form-group">
				<label for="city"> * شهر </label>
				<input type="text" name="city" id="city" class="form-control" value="{{$cook->city ?? old('city')}}">
			</div>
		</div>
		<div class="col-md-4">
			<div class="form-group">
				<label for="hood"> * محله </label>
				<input type="text" name="hood" id="hood" class="form-control" value="{{$cook->hood ?? old('hood')}}">
			</div>
		</div>
		<div class="col-md-12">
			<div class="form-group">
				<label for="address"> * آدرس </label>
				<input type="text" name="address" id="address" class="form-control" value="{{$cook->address ?? old('address')}}">
			</div>
		</div>
		<div class="col-md-2 mx-auto">
			<div class="form-group">
				<button type="submit" class="btn btn-primary btn-block"> تایید </button>
			</div>
		</div>
	</div>
</form>
