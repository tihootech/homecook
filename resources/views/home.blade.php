@extends('layouts.dashboard')
@section('title')
    داشبورد ما
@endsection
@section('content')

    @master
        @if ($pending_comments->count() || $fresh_cooks->count() || $pending_foods->count())
            <div class="tile">
                <div class="container">
                    <div class="row justify-content-center">
                        @if ($count = $fresh_cooks->count())
                            <div class="col-md-4">
                                <span class="text-info ml-1">
                                    @if ($count > 9)
                                        <i class="material-icons">filter_9_plus</i>
                                    @else
                                        <i class="material-icons icon">filter_{{$count}}</i>
                                    @endif
                                </span>
                                شما
                                <b class="text-primary mx-1">{{$count == 1 ? 'یک' : $count}}</b>
                                درخواست جدید برای همکاری دارید.
                                <hr>
                                <a href="{{route('cook.fresh_requests')}}" class="btn btn-primary"> مدیریت درخواست ها </a>
                            </div>
                        @endif
                        @if ($count = $pending_comments->count())
                            <div class="col-md-4">
                                <span class="text-info ml-1">
                                    @if ($count > 9)
                                        <i class="material-icons">filter_9_plus</i>
                                    @else
                                        <i class="material-icons icon">filter_{{$count}}</i>
                                    @endif
                                </span>
                                شما
                                <b class="text-primary mx-1">{{$count == 1 ? 'یک' : $count}}</b>
                                کامنت معلق دارید.
                                <hr>
                                <a href="{{route('comment.index')}}" class="btn btn-primary"> مدیریت کامنت ها </a>
                            </div>
                        @endif
                        @if ($count = $pending_foods->count())
                            <div class="col-md-4">
                                <span class="text-info ml-1">
                                    @if ($count > 9)
                                        <i class="material-icons">filter_9_plus</i>
                                    @else
                                        <i class="material-icons icon">filter_{{$count}}</i>
                                    @endif
                                </span>
                                شما
                                <b class="text-primary mx-1">{{$count == 1 ? 'یک' : $count}}</b>
                                غذا جهت بررسی دارید
                                <hr>
                                <a href="{{route('food.index')}}?confirmed=0" class="btn btn-primary"> مدیریت غذا ها </a>
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


    @customer
        <div class="tile">
            <div class="row justify-content-center">
                @foreach ($transactions as $transaction)
                    @foreach ($transaction->items as $item)
                        @unless ($customer->review_on($item->food_id))

                            <div class="col-md-6">
                                <div class="card text-center">
                                    <div class="card-body">
                                        <h5> {{$item->food->title}} </h5>
                                        <h6> {{$item->food->cook->full_name()}} </h6>
                                        <hr>
                                        <p> از سفارش خود راضی بودید؟ </p>
                                        <form class="my-2" action="{{route('review.store')}}" method="post" data-selected="0">
                                            @csrf
                                            <input type="hidden" name="food_uid" value="{{$item->food->uid}}">

                                            <div class="rating"></div>

                                            <textarea name="body" rows="4" class="form-control hidden my-3" placeholder="توضیحات (اختیاری)"></textarea>

                                            <div class="w-100 my-3"></div>

                                            <button type="submit" class="btn btn-primary"> ثبت کردن </button>

                                        </form>
                                    </div>
                                </div>
                            </div>

                        @endunless
                    @endforeach
                @endforeach
            </div>
            <div class="text-center my-3">
                <a href="{{route('transaction.index')}}" class="btn btn-primary"> لیست سفارشات شما </a>
            </div>
        </div>
    @endcustomer

@endsection
