<div class="row justify-content-center">

	<div class="col-md-3">
		<div class="form-group">
			<label for="path"> انتخاب تصویر </label>
			<input type="file" name="path" id="path" class="form-control" @unless($slide->id) required @endunless>
			@if ($slide->id)
				<small class="text-info">
					<i class="fa fa-asterisk ml-1"></i>
					در صورتی که تمایل به تغییر تصویر دارید میتوانید عکس جدید انتخاب کنید.
				</small>
			@endif
		</div>
	</div>

	<div class="col-md-5">
		<div class="form-group">
			<label for="title"> عنوان (اختیاری)</label>
			<input type="text" name="title" id="title" class="form-control" value="{{$slide->title}}">
		</div>
	</div>

	<div class="col-md-4">
		<div class="form-group">
			<label for="ew"> عبارت انگلیسی (اختیاری)</label>
			<input type="text" name="english_word" id="ew" class="form-control" value="{{$slide->english_word}}">
		</div>
	</div>

	<div class="col-md-9">
		<div class="form-group">
			<label for="subtitle"> زیرعنوان (اختیاری)</label>
			<input type="text" name="subtitle" id="subtitle" class="form-control" value="{{$slide->subtitle}}">
		</div>
	</div>

	<div class="w-100"></div>

	<div class="col-md-2">
		<button type="submit" class="btn btn-primary btn-block"> تایید </button>
	</div>

</div>
