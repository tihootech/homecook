@extends('layouts.dashboard')
@section('title')
    @if($food->id) ویرایش {{$word}} {{$food->title}} @else تعریف {{$word}} جدید @endif
@endsection
@section('content')

	<div class="tile">
        <div class="container">

            <form action="{{$food->id ? route('food.update', $food->id) : route('food.store')}}" method="post" enctype="multipart/form-data">
            	@csrf
            	@if (isset($food) && $food->id)
            		@method('PUT')
            	@endif
                <input type="hidden" name="type" value="{{$type}}">
            	<div class="row justify-content-center">

            		<div class="col-md-6">
            			<div class="form-group">
            				<label for="title"> عنوان {{$word}} </label>
            				<input type="text" name="title" id="title" class="form-control" value="{{$food->title ?? old('title')}}" required>
            			</div>
            		</div>

            		<div class="col-md-3">
            			<div class="form-group">
            				<label for="cat"> دسته بندی </label>
                            <select class="form-control" name="cat_id">
                                <option value=""> بدون دسته بندی </option>
                                @foreach ($cats as $cat)
                                    <option value="{{$cat->id}}">{{$cat->title}}</option>
                                @endforeach
                            </select>
            			</div>
            		</div>

                    <div class="w-100"></div>

            		<div class="col-md-3">
            			<div class="form-group">
            				<label for="price"> قیمت {{$word}} </label>
            				<input type="number" name="price" id="price" class="form-control" value="{{$food->price ?? old('price')}}" required>
            			</div>
            		</div>

            		<div class="col-md-3">
            			<div class="form-group">
            				<label for="discount"> درصد تخفیف </label>
            				<input type="number" name="discount" id="discount" class="form-control" value="{{$food->discount ?? old('discount') ?? 0}}">
            			</div>
            		</div>

            		<div class="col-md-3">
            			<div class="form-group">
            				<label for="image"> @if($food->id) تغییر @endif تصویر </label>
            				<input type="file" name="image" id="image" class="form-control" @unless($food->id) required @endunless>
            			</div>
            		</div>

                    <div class="col-md-12">
            			<div class="form-group">
            				<label for="material"> محتویات </label>
            				<input type="text" name="material" id="material" class="form-control" value="{{$food->material ?? old('material')}}" required>
                            <small class="text-info">
                                <i class="fa fa-asterisk ml-1"></i>
                                <b> مثال : </b>
                                @if ($type == 'food')
                                    برنج ایرانی، لوبیا، گوشت گوساله و ...
                                @else
                                    کلم، کاهو، هویج ....
                                @endif
                            </small>
            			</div>
            		</div>

            		@master
            			<div class="col-md-12 text-center">
            				<div class="form-group">
            					<div class="custom-control custom-checkbox">
            						<input type="hidden" name="confirmed" value="0">
            						<input type="checkbox" class="custom-control-input" id="confirmed" name="confirmed" value="1"
            							@if($food->confirmed) checked @endif>
            						<label class="custom-control-label" for="confirmed">
            							<span class="mr-2"> تایید نمایش </span>
            						</label>
            					</div>
            				</div>
            			</div>
            		@endmaster

            		<div class="col-md-2 mx-auto">
            			<div class="form-group">
            				<button type="submit" class="btn btn-primary btn-block"> تایید </button>
            			</div>
            		</div>
            	</div>
            </form>

        </div>
    </div>

@endsection
