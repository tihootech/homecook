@extends('layouts.dashboard')
@section('title')
    مدیریت وبسایت
@endsection
@section('content')

	<form action="{{route('website.update')}}" method="post" enctype="multipart/form-data">

        @csrf
        @method('PUT')

        <div class="tile">
            <div class="container">

    			<h3> <i class="material-icons">phone_in_talk</i> اطلاعات پشتیبانی </h3>
    			<hr>

                <div class="row justify-content-center">

                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="phones"> <i class="material-icons icon">phone</i> شماره تماس پشتیبانی </label>
                            <input type="text" name="phones" id="phones" class="form-control" value="{{$website->phones}}">
                            <small class="text-info"> شماره تماس ها را با - از هم جدا کنید </small>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="email"> <i class="material-icons icon">email</i> ایمیل </label>
                            <input type="email" name="email" id="email" class="form-control" value="{{$website->email}}">
                        </div>
                    </div>

                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="address"> <i class="material-icons icon">home_work</i> آدرس </label>
                            <input type="text" name="address" id="address" class="form-control" value="{{$website->address}}">
                        </div>
                    </div>

                </div>

            </div>
        </div>

        <div class="tile">
            <div class="container">

    			<h3> <i class="material-icons">public</i> لینک شبکه های اجتماعی </h3>
    			<hr>

                <div class="row justify-content-center">

                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="instagram"> <i class="fa fa-instagram ml-1"></i> اینستاگرام </label>
                            <input type="text" name="instagram" id="instagram" class="form-control" value="{{$website->instagram}}">
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="telegram"> <i class="fa fa-telegram ml-1"></i> تلگرام </label>
                            <input type="text" name="telegram" id="telegram" class="form-control" value="{{$website->telegram}}">
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="facebook"> <i class="fa fa-facebook ml-1"></i> فیسبوک </label>
                            <input type="text" name="facebook" id="facebook" class="form-control" value="{{$website->facebook}}">
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="twitter"> <i class="fa fa-twitter ml-1"></i> تویتر </label>
                            <input type="text" name="twitter" id="twitter" class="form-control" value="{{$website->twitter}}">
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="linkedin"> <i class="fa fa-linkedin ml-1"></i> لینکدین </label>
                            <input type="text" name="linkedin" id="linkedin" class="form-control" value="{{$website->linkedin}}">
                        </div>
                    </div>

                </div>

            </div>
        </div>

        <div class="tile">
            <div class="container">

                <h3> <i class="material-icons">room_service</i> ستون خدمات </h3>
                <a href="https://material.io/resources/icons/?style=baseline" target="_blank">
                    <i class="material-icons icon">info</i>
                    برای مشاهده لیست آیکون ها کلیک کنید.
                </a>
    			<hr>

                @foreach ($website->columns() as $i => $col)

                    <h5 class="mb-3 text-info"> ستون شماره {{$i+1}} </h5>
                    <div class="row justify-content-center">
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="icon-{{$i}}"> آیکون </label>
                                <input type="text" name="cols[icon][]" id="icon-{{$i}}" class="form-control" required value="{{$col[0]}}">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="title-{{$i}}"> عنوان </label>
                                <input type="text" name="cols[title][]" id="title-{{$i}}" class="form-control" required value="{{$col[1]}}">
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="info-{{$i}}"> توضیحات </label>
                                <textarea name="cols[info][]" id="info-{{$i}}" rows="4" class="form-control" required>{{$col[2]}}</textarea>
                            </div>
                        </div>
                    </div>

                @endforeach

            </div>
        </div>

        <div class="tile">
            <div class="container">
                <h3> <i class="material-icons">text_fields</i> متون وبسایت </h3>
    			<hr>

                <div class="form-group">
                    <label for="about"> <i class="material-icons icon">info</i> متن در باره ما </label>
                    <textarea name="about" id="about" rows="10" class="form-control">{{$website->about}}</textarea>
                </div>

                <div class="form-group">
                    <label for="of"> <i class="material-icons icon">fastfood</i> متن سفارش غذا </label>
                    <textarea name="order_food" id="of" rows="6" class="form-control">{{$website->order_food}}</textarea>
                </div>

                <div class="form-group">
                    <label for="op"> <i class="material-icons icon">store</i> متن محصولات خانگی </label>
                    <textarea name="order_product" id="op" rows="6" class="form-control">{{$website->order_product}}</textarea>
                </div>

                <div class="form-group">
                    <label for="blogs"> <i class="material-icons icon">menu_book</i> متن مطالب منتشر شده </label>
                    <textarea name="blogs" id="blogs" rows="6" class="form-control">{{$website->blogs}}</textarea>
                </div>

            </div>
        </div>

        <div class="tile">
            <div class="container">
                <h3> <i class="material-icons">photo</i> مدیریت تصاویر </h3>
    			<hr>
                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="about"> <i class="material-icons icon">info</i> تصویر در باره ما </label>
                            <input type="file" name="about_image" id="about" class="form-control">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="statics"> <i class="material-icons icon">bar_chart</i> تصویر پس زمینه آمار وبسایت </label>
                            <input type="file" name="statics_image" id="statics" class="form-control">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="testimonial"> <i class="material-icons icon">speaker_notes</i> تصویر پس زمینه نظرات کاربران </label>
                            <input type="file" name="testimonial_image" id="testimonial" class="form-control">
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="tile">
            <div class="container">
                <div class="row">
                    <div class="col-md-2 m-auto">
                        <button type="submit" class="btn btn-primary btn-block"> تایید </button>
                    </div>
                </div>
            </div>
        </div>

    </form>

@endsection
