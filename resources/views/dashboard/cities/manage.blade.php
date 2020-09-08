@extends('layouts.dashboard')
@section('title')
    مدیریت شهر ها
@endsection
@section('content')

	<div class="tile text-center">

        <h3> اضافه کردن شهر </h3>
        <hr>
        <form class="row justify-content-center" dir="rtl" action="{{route('cities.update')}}" method="post">
            @csrf
            <div class="col-md-4">
                <label for="city"> انتخاب شهر (ها) </label>
                <select multiple id="city" class="select2" name="city[]" required>
                    @foreach ($cities as $city)
                        <option value="{{$city->id}}"> {{$city->name}} </option>
                    @endforeach
                </select>
            </div>
            <div class="col-md-2 align-self-center">
                <button type="submit" class="btn btn-primary btn-block"> اضافه کردن شهر ها </button>
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
                            <div class="card-body d-flex justify-content-around align-items-center">
                                <div>
                                    شهر : <span class="text-primary"> {{$city->name}} </span>

                                </div>
                                <div>
                                    استان : <span class="text-primary"> {{$city->state->name ?? ''}} </span>
                                </div>
                                <button type="submit" class="btn btn-sm btn-link">
                                    <i class="material-icons text-danger">delete</i>
                                </button>
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
