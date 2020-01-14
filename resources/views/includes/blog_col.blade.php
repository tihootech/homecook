<div class="col-md-4 d-flex ftco-animate">
	<div class="blog-entry">
		<a href="{{$blog->public_link()}}" class="block-20" style="background-image: url('{{asset($blog->image)}}');">
		</a>
		<div class="text py-4 d-block">
			<div class="meta">
				<div>
					<a href="javascript:void">
						<span class="material-icons">date_range</span>
						{{human_date($blog->created_at)}}
					</a>
				</div>
				<div>
					<a href="javascript:void" class="meta-chat">
						<span class="material-icons">visibility</span> {{nf($blog->seens)}}
					</a>
				</div>
			</div>
			<h3 class="heading mt-2">
				<a href="{{$blog->public_link()}}"> {{$blog->title}} </a>
			</h3>
			<p> {{short($blog->content)}} </p>
			<hr class="hr-primary">
			<div class="text-center">
				<a href="{{$blog->public_link()}}" class="btn btn-primary btn-outline-primary"> ادامه مطلب </a>
			</div>
		</div>
	</div>
</div>
