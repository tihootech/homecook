<section class="ftco-section">
	<div class="container">
		<div class="row justify-content-center mb-5 pb-3">
			<div class="col-md-7 heading-section ftco-animate text-center">
				<span class="subheading">Blog</span>
				<h2 class="mb-4"> مطالب منتشر شده </h2>
				<p>{{$website->blogs}}</p>
			</div>
		</div>
		<div class="row d-flex">
			@if ($blogs->count())
				@foreach ($blogs as $blog)
					@include('includes.blog_col')
				@endforeach
			@else
				<div class="alert alert-danger mx-auto">
					<p class="m-0"> <i class="material-icons icon">error</i> هنوز هیچ بلاگی در سیستم ثبت نشده. </p>
				</div>
			@endif
		</div>
		<hr class="hr-primary">
		<div class="text-center">
			<a href="{{route('blogs')}}" class="btn btn-primary btn-outline-primary px-4 py-3">
				مشاهده همه مطالب
			</a>
		</div>
	</div>
</section>
