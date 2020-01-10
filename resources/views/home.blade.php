@extends('layouts.dashboard')
@section('title')
    داشبورد ما
@endsection
@section('content')

    @master
        @if ($fresh_cooks->count())
            <div class="tile">
                شما
                <b class="text-primary mx-1">{{$fresh_cooks->count() == 1 ? 'یک' : $fresh_cooks->count()}}</b>
                درخواست جدید برای همکاری دارید.
                <hr>
                <a href="{{route('cook.fresh_requests')}}" class="btn btn-primary"> مدیریت درخواست ها </a>
            </div>
        @endif
        <div class="tile">
            بعدا در این قسمت آمار هایی برای تحلیل عملکرد کاربران به شما داده میشود.
        </div>
    @endmaster

@endsection
