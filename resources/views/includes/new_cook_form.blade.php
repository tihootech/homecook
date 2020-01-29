<form action="{{isset($cook) && $cook->id ? (master() ? route('cook.update', $cook->id) : route('cook.cook_update', $cook->uid) ) : route('cook.store')}}" method="post" class="billing-form ftco-bg-dark p-3 p-md-5">
	@csrf
	@if (isset($cook) && $cook->id)
		@method('PUT')
	@endif
	@if($in_panel)
		<input type="hidden" name="in_panel" value="1">
	@else
		<h3 class="mb-4 billing-heading"> فرم همکاری </h3>
		<hr>
	@endif
	<div class="row align-items-end">
		<div class="col-md-6">
			<div class="form-group">
				<label for="first-name"> * نام </label>
				<input type="text" name="first_name" id="first-name" class="form-control" value="{{$cook->first_name ?? old('first_name')}}" required>
			</div>
		</div>
		<div class="col-md-6">
			<div class="form-group">
				<label for="last-name"> * نام خانوادگی </label>
				<input type="text" name="last_name" id="last-name" class="form-control" value="{{$cook->last_name ?? old('last_name')}}" required>
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
				<input type="text" name="mobile" id="mobile" class="form-control" value="{{$cook->mobile ?? old('mobile')}}" required>
			</div>
		</div>
		<div class="col-md-4">
			<div class="form-group">
				<label for="state"> * استان </label>
				<input type="text" name="state" id="state" class="form-control" value="{{$cook->state ?? old('state')}}" required>
			</div>
		</div>
		<div class="col-md-4">
			<div class="form-group">
				<label for="city"> * شهر </label>
				<input type="text" name="city" id="city" class="form-control" value="{{$cook->city ?? old('city')}}" required>
			</div>
		</div>
		<div class="col-md-4">
			<div class="form-group">
				<label for="hood"> * محله </label>
				<input type="text" name="hood" id="hood" class="form-control" value="{{$cook->hood ?? old('hood')}}" required>
			</div>
		</div>
		<div class="col-md-12">
			<div class="form-group">
				<label for="address"> * آدرس </label>
				<input type="text" name="address" id="address" class="form-control" value="{{$cook->address ?? old('address')}}" required>
			</div>
		</div>
		@if ($in_panel && master())
			<div class="col-md-12 text-center">
				<div class="form-group">
					<div class="custom-control custom-checkbox">
						<input type="hidden" name="active" value="0">
						<input type="checkbox" class="custom-control-input" id="active" name="active" value="1"
						 @if($cook->id) {{$cook->active ? 'checked' : ''}}  @else checked @endif>
						<label class="custom-control-label" for="active">
							<span class="mr-2"> فعال </span>
						</label>
					</div>
				</div>
			</div>
		@endif
		<div class="col-md-2 mx-auto">
			<div class="form-group">
				<button type="submit" class="btn btn-primary btn-block"> تایید </button>
			</div>
		</div>
	</div>
</form>
