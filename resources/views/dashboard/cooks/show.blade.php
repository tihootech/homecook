@extends('layouts.dashboard')
@section('title')
    {{$cook->full_name()}}
@endsection
@section('content')

	<div class="tile">
        <div class="container">
            @if ($cook->balance())
                <div class="row">
                    <div class="col-md-6 mx-auto">
                        @include('includes.payment_card', ['object'=>'cook'])
                    </div>
                </div>
            @else
                <div class="alert alert-info">
                    با این همکار تسویه حساب شده است.
                </div>
            @endif
            <hr>
            <div class="text-center">
                <a href="{{route('food.index')}}?cooks%5B%5D={{$cook->id}}" class="btn btn-primary">
                    <i class="fa fa-list ml-1"></i>
                    لیست غذا های این همکار
                </a>
            </div>
        </div>
    </div>

@endsection
