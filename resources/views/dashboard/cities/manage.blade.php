@extends('layouts.dashboard')
@section('title')
    مدیریت شهر ها
@endsection
@section('content')

	<div class="tile">

        <h3> اضافه کردن شهر و ادمین </h3>
        <hr>
        <form class="row justify-content-center" dir="rtl" action="{{route('cities.store')}}" method="post">
            @csrf
            <div class="col-md-4 form-group">
                <label for="city"> انتخاب شهر </label>
                <select id="city" class="select2" name="city_id" required>
                    <option value=""> -- انتخاب کنید -- </option>
                    @foreach ($cities as $city)
                        <option value="{{$city->id}}" @if(old('city_id') == $city->id) selected @endif> {{$city->name}} </option>
                    @endforeach
                </select>
            </div>
            <div class="col-md-4 form-group">
                <label> نام و نام خانوادگی ادمین </label>
                <input type="text" name="full_name" class="form-control" value="{{old('full_name')}}" required>
            </div>
            <div class="col-md-2 form-group">
                <label> نام کاربری </label>
                <input type="text" name="username" class="form-control" value="{{old('username')}}" required>
            </div>
            <div class="col-md-2 form-group">
                <label> رمزعبور </label>
                <input type="text" name="pwd" class="form-control" value="{{old('pwd')}}" required>
            </div>
            <div class="col-md-2 align-self-center">
                <button type="submit" class="btn btn-primary btn-block"> اضافه کردن شهر و ادمین </button>
            </div>
        </form>

	</div>

    <div class="tile">
        <h3> شهر های تحت پوشش </h3>
        <hr>
        @if ($selected_cities->count())
            <div class="row">
                @foreach ($selected_cities as $city)
                    <div class="col-md-3">
                        <form class="card" action="{{route('cities.unselect', $city)}}" method="post">
                            @csrf
                            @method('PUT')
                            <div class="card-body">
                                <div class="row text-center">
                                    <div class="col-md-12">
                                        شهر : <span class="text-primary"> {{$city->name}} </span>

                                    </div>
                                    <div class="col-md-12">
                                        استان : <span class="text-primary"> {{$city->state->name ?? ''}} </span>
                                    </div>
                                    <hr class="w-100">
                                    <div class="col-md-8">
                                        <b> ادمین : </b>
                                        <span> {{$city->admin->full_name ?? '-'}} </span>
                                    </div>
                                    <div class="col-md-2">
                                        <button type="button" class="btn btn-sm btn-link delete">
                                            <i class="material-icons text-danger">delete</i>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                @endforeach
            </div>
        @else
            <div class="alert alert-warning">
                هیچ شهری تحت پوشش نیست
            </div>
        @endif
    </div>

@endsection
