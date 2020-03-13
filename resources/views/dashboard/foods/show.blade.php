@extends('layouts.dashboard')
@section('title')
    {{$food->title}}
@endsection
@section('content')

	<div class="tile">
        <div class="container">
            <h4> امتیازات کاربران </h4>
            <hr>
            @if ($food->reviews->count())
                <div class="row justify-content-center">
                    @foreach ($food->reviews as $review)
                        <div class="col-md-4">
                            <div class="card">
                                <div class="card-body text-center">
                                    @for ($i=0; $i < 5; $i++)
                                        <i class="text-info fa @if($i<$review->rate) fa-star @else fa-star-o @endif"></i>
                                    @endfor
                                    <hr>
                                    {{$review->body}}
                                    @if ($review->created_at)
                                        <hr>
                                        {{human_date($review->created_at)}}
                                        <br>
                                        ساعت
                                        {{$review->created_at->format('H:i')}}
                                    @endif
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            @else
                <div class="alert alert-info">
                    هنوز هیچ یک از کاربران امتیازی ثبت نکرده است.
                </div>
            @endif
        </div>
    </div>

@endsection
