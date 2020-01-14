@extends('layouts.dashboard')
@section('title')
    لیست همکاران
@endsection
@section('content')

	<div class="tile text-center">
		<a href="{{route('cook.create')}}" class="btn btn-primary m-2"> <i class="material-icons">add</i> تعریف همکار جدید </a>
		<a href="#search-box" data-toggle="collapse" class="btn btn-primary m-2"> <i class="material-icons">search</i> جستجو </a>
		<div class="collapse @if(request()->getQueryString()) show @endif" id="search-box">
			<hr>
			<div class="container">
				<form class="row text-right justify-content-center" method="GET">
					<div class="col-md-3">
						<div class="form-group">
							<label for="name"> نام </label>
							<input type="text" id="name" name="name" value="{{request('name')}}" class="form-control">
						</div>
					</div>
					<div class="col-md-3">
						<div class="form-group">
							<label for="mobile"> موبایل </label>
							<input type="text" id="mobile" name="mobile" value="{{request('mobile')}}" class="form-control">
						</div>
					</div>
					<div class="col-md-3">
						<div class="form-group">
							<label for="telephone"> تلفن </label>
							<input type="text" id="telephone" name="telephone" value="{{request('telephone')}}" class="form-control">
						</div>
					</div>
					<div class="col-md-3">
						<div class="form-group">
							<label for="hood"> محله </label>
							<input type="text" id="hood" name="hood" value="{{request('hood')}}" class="form-control">
						</div>
					</div>
					<div class="col-md-12 text-center">
						<div class="form-group">
							<div class="custom-control custom-checkbox">
								<input type="hidden" name="active" value="0">
								<input type="checkbox" class="custom-control-input" id="active" name="active" value="1"
									@if(request('active')) checked @endif>
								<label class="custom-control-label" for="active">
									<span class="mr-2"> فقط همکاران فعال را نمایش بده </span>
								</label>
							</div>
						</div>
					</div>
					<div class="col-md-2 my-1">
						<button type="submit" class="btn btn-primary btn-block">
							<i class="material-icons">check</i> تایید و جستجو
						</button>
					</div>
					@if(request()->getQueryString())
						<div class="col-md-2 my-1">
							<a class="btn btn-primary btn-block" href="{{route(rn())}}">
								<i class="material-icons">close</i> بازنشانی جستجو
							</a>
						</div>
					@endif
				</form>
			</div>
		</div>
	</div>

	@if ($cooks->count())
		<div class="tile">

			<div class="table-responsive-lg">
				<table class="table table-bordered table-hover">
					<thead>
						<tr>
							<th> ردیف </th>
							<th> نام </th>
							<th> موبایل </th>
							<th> تلفن </th>
							<th> استان </th>
							<th> شهر </th>
							<th> محله </th>
							<th> فعال </th>
							<th colspan="2"> عملیات </th>
						</tr>
					</thead>
					<tbody>
						@foreach ($cooks as $index => $cook)
							<tr>
								<th> {{$index+1}} </th>
								<td> {{$cook->full_name()}} </td>
								<td> {{$cook->mobile}} </td>
								<td> {{$cook->telephone ?? '-'}} </td>
								<td> {{$cook->state}} </td>
								<td> {{$cook->city}} </td>
								<td> {{$cook->hood}} </td>
								<td> @include('dashboard.partials.yesno', ['boolean' => $cook->active]) </td>
								<td data-toggle="popover" data-trigger="hover" data-placement="top" data-content="ویرایش">
									<a href="{{route('cook.edit', $cook->id)}}" class="text-success">
										<i class="fa fa-edit"></i>
									</a>
								</td>
								<td data-toggle="popover" data-trigger="hover" data-placement="top" data-content="جزییات">
									<a href="{{route('cook.show', $cook->id)}}" class="text-primary">
										<i class="fa fa-list"></i>
									</a>
								</td>
							</tr>
				    	@endforeach
					</tbody>
				</table>
			</div>

			{{$cooks->links()}}
		</div>
    @else
        <div class="tile">
            <div class="alert alert-warning m-0">
                موردی یافت نشد.
            </div>
        </div>
    @endif

@endsection
