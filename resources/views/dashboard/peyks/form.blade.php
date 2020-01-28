@extends('layouts.dashboard')
@section('title')
    @if($peyk->id) ویرایش پیک : {{$peyk->full_name()}} @else تعریف پیک جدید @endif
@endsection
@section('content')

	<div class="tile">
        <div class="container">

            <form action="{{$peyk->id ? route('peyk.update', $peyk->id) : route('peyk.store')}}" method="post">
            	@csrf
            	@if ($peyk->id)
            		@method('PUT')
            	@endif

            	<div class="row justify-content-center">

            		<div class="col-md-4">
            			<div class="form-group">
            				<label for="first-name"> نام </label>
            				<input type="text" name="first_name" id="first-name" class="form-control" value="{{$peyk->first_name ?? old('first_name')}}" required>
            			</div>
            		</div>

            		<div class="col-md-4">
            			<div class="form-group">
            				<label for="last-name"> نام خانوادگی </label>
            				<input type="text" name="last_name" id="last-name" class="form-control" value="{{$peyk->last_name ?? old('last_name')}}" required>
            			</div>
            		</div>

                    <div class="col-md-3">
            			<div class="form-group">
            				<label for="mobile"> شماره موبایل </label>
            				<input type="text" name="mobile" id="mobile" class="form-control" value="{{$peyk->mobile ?? old('mobile')}}" required>
            			</div>
            		</div>

                    @unless ($peyk->id)

                        <div class="col-md-3">
                			<div class="form-group">
                				<label for="username"> نام کاربری </label>
                				<input type="text" name="username" id="username" class="form-control" required>
                			</div>
                		</div>

                        <div class="col-md-3">
                			<div class="form-group">
                				<label for="password"> رمزعبور </label>
                				<input type="text" name="password" id="password" class="form-control" required>
                			</div>
                		</div>


                    @endunless

                    <hr class="w-100">

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
