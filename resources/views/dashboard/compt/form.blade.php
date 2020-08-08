@extends('layouts.dashboard')


@section('title')
    @if ($compt->id)
        ویرایش مسابقه
    @else
        تعریف مسابقه جدید
    @endif
@endsection

@section('content')
    <div class="tile text-left">
        <a href="{{route('compt.index')}}" class="btn btn-primary"> <i class="material-icons">list</i> لیست مسابقات </a>
    </div>
    <div class="tile">
        @if ($compt->id)
            <h3> ویرایش مسابقه </h3>
        @else
            <h3> تعریف مسابقه جدید </h3>
        @endif
        <hr>
        <form class="row justify-content-center" action="{{$compt->id ? route('compt.update', $compt) : route('compt.store')}}" method="post">

            @csrf
            @if ($compt->id)
                @method('PUT')
            @endif

            <div class="col-md-3 form-group">
                <label for="title"> عنوان مسابقه </label>
                <input type="text" name="title" id="title" class="form-control" value="{{$compt->title}}" required>
            </div>

            <div class="col-md-3 form-group">
                <label for="date"> تاریخ </label>
                <input type="text" name="date" id="date" class="form-control pdp" value="{{date_picker_date($compt->date)}}" required autocomplete="off">
            </div>

            <div class="col-md-12 form-group">
                <label for="info"> توضیحات </label>
                <textarea name="info" rows="6" id="info" class="form-control">{{$compt->info}}</textarea>
            </div>

            <div class="col-md-2 form-group">
                <button type="submit" class="btn btn-primary btn-block"> ذخیره </button>
            </div>

        </form>
    </div>
@endsection
