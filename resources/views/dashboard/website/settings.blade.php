@extends('layouts.dashboard')
@section('title')
    تغییر تظیمات مالی
@endsection
@section('content')

	<div class="tile">
        <div class="container">

			<h3> <i class="material-icons">attach_money</i> تنظیمات مالی </h3>
			<hr>

            <form action="{{route('settings.update')}}" method="post">
            	@csrf
				@method('PUT')
            	<div class="row justify-content-center">

            		<div class="col-md-3">
            			<div class="form-group">
            				<label for="peyk"> سهم پیک (به تومان) </label>
            				<input type="text" name="peyk_share" id="peyk" class="form-control calibri" value="{{$settings->peyk_share}}" required>
            			</div>
            		</div>

            		<div class="col-md-3">
            			<div class="form-group">
            				<label for="tax"> درصد مالیات </label>
            				<input type="text" name="tax" id="tax" class="form-control calibri" value="{{$settings->tax}}" required>
            			</div>
            		</div>

            		<div class="col-md-3">
            			<div class="form-group">
            				<label for="ap"> ارزش افزوده (درصد) </label>
            				<input type="text" name="added_price" id="ap" class="form-control calibri" value="{{$settings->added_price}}" required>
            			</div>
            		</div>

            		<div class="col-md-3">
            			<div class="form-group">
            				<label for="dt"> نوع تحویل </label>
                            <select class="form-control" id="dt" name="deliver_type" required>
                                <option @if($settings->deliver_type == 'peyk') selected @endif value="peyk"> پیک </option>
                                <option @if($settings->deliver_type == 'azhans') selected @endif value="azhans"> آژانس </option>
                            </select>
            			</div>
            		</div>


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
