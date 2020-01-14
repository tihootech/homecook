@extends('layouts.landing')

@section('meta')
	<title> {{$blog->title}} </title>
@endsection


@section('content')

	<section class="home-slider owl-carousel other-pages">

		<div class="slider-item" style="background-image: url('{{asset($blog->bg)}}');" data-stellar-background-ratio="0.5">
			<div class="overlay"></div>
			<div class="container">
				<div class="row slider-text justify-content-center align-items-center">

					<div class="col-md-7 col-sm-12 text-center ftco-animate">
						<h1 class="mb-3 mt-5 bread"> {{$blog->title}} </h1>
						@if ($blog->subtitle)
							<h2 class="h4"> {{$blog->subtitle}} </h2>
						@endif
					</div>

				</div>
			</div>
		</div>
	</section>

	<section class="ftco-section">
		<div class="container">
			<div class="row">
				<div class="col-md-8 ftco-animate">

					@if (session('message'))
						<div class="alert alert-success">
							{{session('message')}}
						</div>
					@endif

					<div class="my-3 text-center">
						<img src="{{asset($blog->image)}}" alt="{{$blog->title}}" class="img-fluid blog-img">
					</div>
					<h1 class="mb-3">{{$blog->title}}</h1>
					@if ($blog->subtitle)
						<h2 class="h4"> {{$blog->subtitle}} </h2>
					@endif
					<p> {{$blog->content}} </p>
					<div class="tag-widget post-tag-container mb-5 mt-5">
						<div class="tagcloud">
							@foreach ($blog->tags_list() as $tag)
								<a href="javascript:void" class="tag-cloud-link">{{$tag}}</a>
							@endforeach
						</div>
					</div>


					<div class="pt-5 mt-5">
						<h3 class="mb-5">{{2+2}} کامنت</h3>
						<ul class="comment-list">

							@for ($i = 0; $i < 2; $i++)
								<li class="comment">

									<div class="comment-body">
										<h3>Main</h3>
										<div class="meta">June 27, 2018 at 2:21pm</div>
										<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Pariatur quidem laborum necessitatibus, ipsam impedit vitae autem, eum officia, fugiat saepe enim sapiente iste iure! Quam voluptas earum impedit necessitatibus, nihil?</p>
										{{-- <p><a href="#" class="reply">Reply</a></p> --}}
									</div>

									@if (false)
										<ul class="children">
											<li class="comment">
												<div class="comment-body">
													<h3>Answer 1</h3>
													<div class="meta">June 27, 2018 at 2:21pm</div>
													<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Pariatur quidem laborum necessitatibus, ipsam impedit vitae autem, eum officia, fugiat saepe enim sapiente iste iure! Quam voluptas earum impedit necessitatibus, nihil?</p>
												</div>
												<div class="comment-body">
													<h3>Answer 2</h3>
													<div class="meta">June 27, 2018 at 2:21pm</div>
													<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Pariatur quidem laborum necessitatibus, ipsam impedit vitae autem, eum officia, fugiat saepe enim sapiente iste iure! Quam voluptas earum impedit necessitatibus, nihil?</p>
												</div>
											</li>
										</ul>
									@endif

								</li>
							@endfor
						</ul>
						<!-- END comment-list -->

						<div class="comment-form-wrap pt-5">
							<h3 class="mb-5"> شما هم کامنت بگذارید </h3>
							<form action="{{route('comment.store')}}" method="post">
								@csrf
								<input type="hidden" name="owner_id" value="{{$blog->id}}">
								<input type="hidden" name="owner_type" value="blog">
								<div class="form-group">
									<label for="body">متن کامنت</label>
									<textarea name="body" id="body" cols="30" rows="4" class="form-control" required></textarea>
								</div>
								<div class="form-group">
									<input type="submit" value="قراردادن کامنت" class="btn py-3 px-4 btn-primary">
								</div>

							</form>
						</div>
					</div>

				</div> <!-- .col-md-8 -->
				<div class="col-md-4 sidebar ftco-animate">

					<div class="sidebar-box">
						<form action="{{route('blogs')}}" class="search-form" method="get">
							<div class="form-group">
								<div class="icon">
									<span class="icon-search"></span>
								</div>
								<input type="text" name="search" class="form-control" placeholder="جستجو...">
							</div>
						</form>
					</div>

					<div class="sidebar-box ftco-animate">
						<h3> پربازدید ترین مطالب </h3>
						@foreach (best_blogs(5) as $blog)
							@include('includes.blog_item')
                        @endforeach
					</div>

				</div>

			</div>
		</div>
	</section>




@endsection
