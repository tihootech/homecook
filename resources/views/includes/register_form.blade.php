<form class="row justify-content-center" action="{{route('cart.register')}}" method="post">

	@csrf
	<input type="hidden" name="in_cart" value="{{$in_cart}}">

	<div class="col-md-6 form-group">
		<input type="text" name="first_name" value="{{old('first_name')}}" class="form-control tp" placeholder="نام شما" required>
	</div>

	<div class="col-md-6 form-group">
		<input type="text" name="last_name" value="{{old('last_name')}}" class="form-control tp" placeholder="نام خانوادگی" required>
	</div>

	<div class="col-md-6 form-group">
		<input type="text" name="mobile" value="{{old('mobile')}}" class="form-control tp" placeholder="شماره موبایل" required>
	</div>

	<div class="col-md-6 form-group">
		<input type="text" name="username" value="{{old('username')}}" class="form-control tp" placeholder="نام کاربری" required>
	</div>

	<div class="col-md-6 form-group">
		<input type="password" name="password" class="form-control tp" placeholder="رمزعبور" required>
	</div>

	<div class="col-md-6 form-group">
		<input type="password" name="password_confirmation" class="form-control tp" placeholder="تکرار رمزعبور" required>
	</div>

	<div class="col-md-6 align-self-end form-group">
		<button type="submit" class="@if($in_cart) btn btn-primary btn-block @else login100-form-btn simple @endif">
			ایجاد حساب کاربری
		</button>
	</div>

</form>
