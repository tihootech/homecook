@extends('layouts.dashboard')
@section('title')
    @if($blog->id) ویرایش همکار {{$blog->title}} @else تعریف همکار جدید @endif
@endsection
@section('content')

	<div class="tile">
        <div class="container">
            @unless ($cook->id)
                <p class="text-info">
                    <i class="fa fa-asterisk ml-1"></i>
                    توجه داشته باشید که اگر از این قسمت برای تعریف همکار استفاده کنید، دیگر نیازی به تایید درخواست نخواهد داشت و پیامک فعالسازی حساب کاربری برای شخص مورد نظر به صورت اتوماتیک ارسال خواهد شد.
                </p>
            @endunless
            @include('includes.new_cook_form', ['in_panel'=>true])
        </div>
    </div>

@endsection
