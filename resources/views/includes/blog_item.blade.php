<div class="block-21 mb-4 d-flex">
	<a class="blog-img ml-4" style="background-image: url('{{asset($blog->image)}}')"></a>
	<div class="text">
		<h3 class="heading">
			<a href="{{$blog->public_link()}}"> {{$blog->title}} </a>
		</h3>
		<div class="meta">
			<div><a href="#"><span class="material-icons">date_range</span> {{human_date($blog->created_at)}} </a></div>
			<div><a href="#"><span class="material-icons">visibility</span> {{nf($blog->seens)}} </a></div>
		</div>
	</div>
</div>
