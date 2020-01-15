@extends('layouts.dashboard')
@section('title')
    داشبورد ما
@endsection
@section('content')

    @master
        @if ($pending_comments->count() || $fresh_cooks->count())
            <div class="tile">
                <div class="container">
                    <div class="row justify-content-center">
                        @if ($fresh_cooks->count())
                            <div class="col-md-4">
                                شما
                                <b class="text-primary mx-1">{{$fresh_cooks->count() == 1 ? 'یک' : $fresh_cooks->count()}}</b>
                                درخواست جدید برای همکاری دارید.
                                <hr>
                                <a href="{{route('cook.fresh_requests')}}" class="btn btn-primary"> مدیریت درخواست ها </a>
                            </div>
                        @endif
                        @if ($pending_comments->count())
                            <div class="col-md-4">
                                شما
                                <b class="text-primary mx-1">{{$pending_comments->count() == 1 ? 'یک' : $pending_comments->count()}}</b>
                                کامنت معلق دارید.
                                <hr>
                                <a href="{{route('comment.index')}}" class="btn btn-primary"> مدیریت کامنت ها </a>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        @endif
        <div class="tile">
            بعدا در این قسمت آمار هایی برای تحلیل عملکرد کاربران به شما داده میشود.
        </div>
    @endmaster

    @cook
        <div class="tile">

            @if (!$cook)
                <div class="alert alert-danger">
                    در حساب کاربری شما خطایی رخ داده. لطفا با پشتیبانی هماهنگ کنید.
                </div>
            @elseif (!$cook->active)
                <div class="alert alert-danger">
                    حساب شما درحال حاضر
                    <b> غیرفعال </b>
                    میباشد.
                </div>
            @else
                <div class="">
                    داشبرد همکار
                </div>
            @endif

            @if ($cook && $cook->modify_reason)
                @if ($cook->fresh)
                    <div class="alert alert-success">
                        اصلاحات مورد نظر شما با موفقیت انجام شده.
                        منتظر تایید ناظر باشید.
                        <hr>
                        <a href="{{route('cook.cook_edit', $cook->uid)}}" class="btn btn-outline-dark"> اصلاح مجدد </a>
                    </div>
                @else
                    <div class="alert alert-warning">
                        برای شما درخواست اصلاح ارسال شده است.
                        برای فعال شدن حساب کاربری خود، اصلاحات مورد نیاز را باید انجام دهید.
                        <hr>
                        علت نیاز به اصلاح : <b>{{$cook->modify_reason}}</b>
                        <br><br>
                        <a href="{{route('cook.cook_edit', $cook->uid)}}" class="btn btn-outline-dark"> ویرایش اطلاعات و اعمال اصلاحات </a>
                    </div>
                @endif
            @endif
        </div>
    @endcook

@endsection
