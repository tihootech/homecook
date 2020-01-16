@extends('layouts.dashboard')
@section('title')
    لیست غذاها
@endsection
@section('content')

	<div class="tile text-center">
		@cook
            <a href="{{route('food.create')}}" class="btn btn-primary m-2"> <i class="material-icons">add</i> غذای جدید </a>
        @endcook
        @master
            <form class="d-inline" action="{{route('food.confirm_all')}}" method="post">
                @csrf
                <button type="submit" class="btn btn-primary m-2">
                    <i class="material-icons">done_all</i> تایید همه
                </button>
            </form>
        @endmaster
		<a href="#search-box" data-toggle="collapse" class="btn btn-primary m-2"> <i class="material-icons">search</i> جستجو </a>
		<div class="collapse @if(request()->getQueryString() && request('confirmed') === null) show @endif" id="search-box">
			<hr>
			<div class="container">
				<form class="row text-right justify-content-center" method="GET">
					<div class="col-md-3">
						<div class="form-group">
							<label for="title"> عنوان </label>
							<input type="text" id="title" name="title" value="{{request('title')}}" class="form-control">
						</div>
					</div>
					@master
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="cooks"> همکار : میتوانید یک یا چند مورد انتخاب کنید </label>
                                <select class="select2" name="cooks[]" multiple>
                                    @foreach ($cooks as $cook)
                                        <option value="{{$cook->id}}" @if( is_array(request('cooks')) && in_array($cook->id, request('cooks'))) selected @endif>
                                            {{$cook->full_name().' - '.$cook->mobile}}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    @endmaster
                    <div class="w-100"></div>
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

	@if ($foods->count())
		<div class="tile">

			<div class="table-responsive-lg">
				<table class="table table-bordered table-hover">
					<thead>
						<tr>
							<th> ردیف </th>
                            @master
                                <th> همکار </th>
                            @endmaster
							<th> عنوان </th>
							<th> قیمت </th>
                            <th> تخفیف </th>
							<th> قیمت با تخفیف </th>
							<th> مواد اولیه </th>
							<th> تاییدشده </th>
							<th> تصویر </th>
							<th colspan="4"> عملیات </th>
						</tr>
					</thead>
					<tbody>
						@foreach ($foods as $index => $food)
							<tr>
								<th> {{$index+1}} </th>
                                @master
                                    <td>
                                        @if ($food->cook)
                                            <a href="{{route('user.show', $food->cook->user_id)}}"> {{$food->cook->full_name()}} </a>
                                        @else
                                            <em> - </em>
                                        @endif
                                    </td>
                                @endmaster
								<td> {{$food->title}} </td>
								<td> {{toman($food->price)}} </td>
								<td> {{nf($food->discount)}} </td>
                                <td> {{toman($food->cost)}} </td>
                                <td>
                                    <a href="javascript:void" data-toggle="popover" data-placement="top" data-content="{{$food->material}}">
                                        {{short($food->material,25)}}
                                    </a>
                                </td>
                                <td> @include('dashboard.partials.yesno', ['boolean' => $food->confirmed]) </td>
                                <td align="center">
                                    <a href="javascript:void" data-toggle="popover" data-placement="right" data-html="true"
                                    data-content="<img src='{{asset($food->image)}}' style='max-height:300px;width:100%'>"
                                    >
                                        <i class="material-icons mt-2">photo</i>
                                    </a>
                                </td>
                                @master
                                    <td data-toggle="popover" data-trigger="hover" data-placement="top" data-content="{{$food->confirmed ? 'عدم تایید' : 'تایید'}}">
                                        <form class="d-inline" action="{{route('food.confirm', $food->id)}}" method="post">
                                            @csrf
                                            @method('PUT')
                                            <button type="submit" class="btn btn-link {{$food->confirmed ? 'text-danger' : 'text-primary'}}">
                                                <i class="material-icons">{{$food->confirmed ? 'close' : 'check'}}</i>
                                            </button>
                                        </form>
                                    </td>
                                @endmaster
                                <td data-toggle="popover" data-trigger="hover" data-placement="top" data-content="جزییات">
                                    <a href="{{route('food.show', $food->id)}}" class="btn btn-link text-primary">
                                        <i class="material-icons">list</i>
                                    </a>
                                </td>
                                <td data-toggle="popover" data-trigger="hover" data-placement="top" data-content="ویرایش">
                                    <a href="{{route('food.edit', $food->id)}}" class="btn btn-link text-success">
                                        <i class="material-icons">edit</i>
                                    </a>
                                </td>
                                <td data-toggle="popover" data-trigger="hover" data-placement="top" data-content="حذف">
                                    <form class="d-inline" action="{{route('food.destroy', $food->id)}}" method="post">
                                        @csrf
                                        @method('DELETE')
                                        <button type="button" class="btn btn-link text-danger delete">
                                            <i class="material-icons">delete</i>
                                        </button>
                                    </form>
                                </td>
							</tr>
				    	@endforeach
					</tbody>
				</table>
			</div>

			{{$foods->links()}}
		</div>
    @else
        <div class="tile">
            <div class="alert alert-warning m-0">
                موردی یافت نشد.
            </div>
        </div>
    @endif

@endsection
