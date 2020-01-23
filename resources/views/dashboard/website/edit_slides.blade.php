@extends('layouts.dashboard')
@section('title')
    ویرایش اسلاید
@endsection
@section('content')

    <div class="tile">
        <div class="container">
            <form action="{{route('slides.update', $slide->id)}}" method="post" enctype="multipart/form-data">

                @csrf
                @method('PUT')

                @include('includes.slide_form')

            </form>
        </div>
    </div>

@endsection
