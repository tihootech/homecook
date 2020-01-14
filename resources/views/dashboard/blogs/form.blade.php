@extends('layouts.dashboard')
@section('title')
    @if($blog->id) ویرایش بلاگ : {{$blog->title}} @else بلاگ جدید @endif
@endsection
@section('content')

    <div class="tile text-center">
        <a href="{{route('blog.index')}}" class="btn btn-primary">
            <i class="fa fa-list ml-2"></i>
            لیست همه بلاگ ها
        </a>
    </div>

	<div class="tile">
        <form class="row justify-content-center" action="{{$blog->id ? route('blog.update', $blog->id) : route('blog.store')}}" method="post" enctype="multipart/form-data">

            @csrf
            @if ($blog->id)
                @method('PUT')
            @endif

			<div class="col-md-3 form-group">
				<label for="title"> عنوان </label>
				<input type="text" class="form-control" name="title" id="title" value="{{old('title') ?? $blog->title}}" required>
			</div>


            <div class="col-md-3 form-group">
				<label for="image"> @if($blog->id) تغییر @endunless تصویر اصلی </label>
				<input type="file" class="form-control" name="image" id="image" @unless($blog->id) required @endunless>
			</div>

            <div class="col-md-3 form-group">
				<label for="bg"> @if($blog->id) تغییر @endunless تصویر پس زمینه </label>
				<input type="file" class="form-control" name="bg" id="bg" @unless($blog->id) required @endunless>
			</div>

            <div class="col-md-12 form-group">
				<label for="tags"> تگ ها - با Enter از هم جدا کنید </label>
				<textarea name="tags" id="tags" rows="4" class="form-control">{{old('tags') ?? $blog->tags}}</textarea>
			</div>

            <div class="col-md-12 form-group">
				<label for="subtitle"> زیر عنوان </label>
				<textarea name="subtitle" id="subtitle" rows="1" class="form-control">{{old('subtitle') ?? $blog->subtitle}}</textarea>
			</div>
            <hr class="w-100">
            <div class="col-md-12 form-group">
                <label> محتوا </label>
				<textarea name="content" rows="12" class="form-control mt-2" required>{!!old('content') ?? $blog->content!!}</textarea>
			</div>

            <div class="col-md-2 mx-auto">
                <button type="submit" class="btn btn-primary btn-block"> ذخیره سازی </button>
            </div>

		</form>
	</div>

    @include('includes.display_images', ['object' => $blog])

@endsection
