<div class="card my-2">
	<div class="card-body text-center">
		<h5> {{$$object->full_name()}} - {{$$object->mobile}} </h5>
		<hr>
		<p>
			شما باید
			<b class="calibri"> {{nf($$object->balance())}} </b>
			تومان به او پرداخت کنید.
		</p>
		<hr>
		<div>
			<form class="d-inline" action="{{route('payment.store')}}" method="post">
				@csrf
				<input type="hidden" name="owner_type" value="{{class_name($object)}}">
				<input type="hidden" name="owner_id" value="{{$$object->id}}">
				<input type="hidden" name="ids" value="{{$$object->payment_ids()}}">
				<input type="hidden" name="amount" value="{{$$object->balance()}}">
				<button type="button" class="btn btn-primary btn-sm are-you-sure">
					<i class="fa fa-check ml-1"></i> پرداخت شد
				</button>
			</form>
			<a href="{{route('transaction.index')}}?{{$object}}={{$$object->id}}" class="btn btn-primary btn-outline-primary btn-sm">
				<i class="fa fa-list ml-1"></i> جزییات
			</a>
		</div>
	</div>
</div>
