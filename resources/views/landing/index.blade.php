@extends('layouts.landing')

@section('meta')
    <title> خونه پز - سرویس سفارش غذای خانگی </title>
    <meta name="keywords" content="خونه پز, رزرو غذا کرمانشاه, غذای خانگی, سفارش غذا">
    <meta name="description" content="خونه پز - سرویس سفارش غذای خانگی">
@endsection

@section('content')

    @include('includes.landing_slides', ['home_page'=>true])

    <section class="ftco-intro">
    	<div class="container-wrap">
    		<div class="wrap d-md-flex align-items-xl-end">
    			<div class="info">
    				<div class="row no-gutters">
    					<div class="col-sm-5 d-flex ftco-animate">
    						<div class="icon"><span class="material-icons">phone</span></div>
    						<div class="text">
    							<h3 dir="ltr"> <a href="tel:{{$website->phone}}"> {{pretty_phone($website->phone)}} </a> </h3>
    							<p> شماره تماس پشتیبانی </p>
    						</div>
    					</div>
    					<div class="col-sm-7 d-flex ftco-animate">
    						<div class="icon"><span class="material-icons">my_location</span></div>
    						<div class="text">
    							<h3> <a href="javascript:void"> آدرس دفتر مرکزی </a> </h3>
    							<p>{{$website->address}}</p>
    						</div>
    					</div>
    				</div>
    			</div>
    			<div class="book p-4">
    				<h3 class="text-center"> جستجو در سایت </h3>
    				<form action="#" class="appointment-form">
    					<div class="d-flex justify-content-center">
    						<div class="form-group w-75">
    							<input type="text" class="form-control" placeholder="عبارت مورد نظر">
    						</div>
    					</div>
    					<div class="d-flex justify-content-center">
    						<div class="form-group w-50">
    							<input type="submit" value="جستجو" class="btn btn-white py-3 px-4">
    						</div>
    					</div>
    				</form>
    			</div>
    		</div>
    	</div>
    </section>

    <section class="ftco-about d-md-flex">
    	<div class="one-half img" style="background-image: url('{{asset($website->about_image)}}');"></div>
    	<div class="one-half ftco-animate">
    		<div class="overlap">
    			<div class="heading-section ftco-animate ">
    				<span class="subheading">About Us</span>
    				<h2 class="mb-4"> درباره ما </h2>
    			</div>
    			<div class="about-text">
    				<p class="rtl-justify">{{$website->about}}</p>
    				<a href="{{route('new_cook')}}" class="btn btn-primary btn-outline-primary px-4 py-3">
    					برای همکاری با ما کلیک کنید
    				</a>
    			</div>
    		</div>
    	</div>
    </section>

    <section class="ftco-section ftco-services">
    	<div class="container">
    		<div class="row">

                @foreach ($website->columns() as $col)
                    <div class="col-md-4 ftco-animate">
        				<div class="media d-block text-center block-6 services">
        					<div class="icon d-flex justify-content-center align-items-center mb-5">
        						<span class="material-icons">{{$col[0]}}</span>
        					</div>
        					<div class="media-body">
        						<h3 class="heading">{{$col[1]}}</h3>
        						<p>{{$col[2]}}</p>
        					</div>
        				</div>
        			</div>
                @endforeach

    		</div>
    	</div>
    </section>

    <section class="ftco-section">
    	<div class="container">
    		<div class="row align-items-center">
    			<div class="col-md-6 pl-md-5">
    				<div class="heading-section text-md-right ftco-animate">
    					<span class="subheading">Order</span>
    					<h2 class="mb-4"> سفارش غذا </h2>
    					<p class="mb-4 rtl-justify">{{$website->order_food}}</p>
    					<p><a href="{{route('order_food')}}" class="btn btn-primary btn-outline-primary px-4 py-3">مشاهده منوی کامل</a></p>
    				</div>
    			</div>
    			<div class="col-md-6">
    				<div class="row">
    					@foreach ($foods as $food)
                            <div class="col-md-6">
        						<div class="menu-entry">
        							<a href="{{$food->public_link()}}" class="img"
                                        style="background-image: url('{{asset($food->image)}}');">
                                    </a>
        						</div>
        					</div>
                        @endforeach
    				</div>
    			</div>
    		</div>
    	</div>
    </section>

    <section class="ftco-counter ftco-bg-dark img" id="section-counter" style="background-image: url('{{asset($website->statics_image)}}')" data-stellar-background-ratio="0.5">
    	<div class="overlay"></div>
    	<div class="container">
    		<div class="row justify-content-center">
    			<div class="col-md-10">
    				<div class="row">
    					<div class="col-md-6 col-lg-3 d-flex justify-content-center counter-wrap ftco-animate">
    						<div class="block-18 text-center">
    							<div class="text">
    								<div class="icon"> <span class="material-icons">people</span> </div>
    								<strong class="number" data-number="{{$counts['cooks']}}">0</strong>
    								<span>آشپز مختلف</span>
    							</div>
    						</div>
    					</div>
    					<div class="col-md-6 col-lg-3 d-flex justify-content-center counter-wrap ftco-animate">
    						<div class="block-18 text-center">
    							<div class="text">
    								<div class="icon"> <span class="material-icons">fastfood</span> </div>
    								<strong class="number" data-number="{{$counts['foods']}}">0</strong>
    								<span>غذای گوناگون</span>
    							</div>
    						</div>
    					</div>
    					<div class="col-md-6 col-lg-3 d-flex justify-content-center counter-wrap ftco-animate">
    						<div class="block-18 text-center">
    							<div class="text">
    								<div class="icon"> <span class="material-icons">room_service</span> </div>
    								<strong class="number" data-number="{{$counts['orders']}}">0</strong>
    								<span>سفارش غذا</span>
    							</div>
    						</div>
    					</div>
    					<div class="col-md-6 col-lg-3 d-flex justify-content-center counter-wrap ftco-animate">
    						<div class="block-18 text-center">
    							<div class="text">
    								<div class="icon"> <span class="material-icons">emoji_emotions</span> </div>
    								<strong class="number" data-number="{{$counts['users']}}">0</strong>
    								<span>کاربر فعال</span>
    							</div>
    						</div>
    					</div>
    				</div>
    			</div>
    		</div>
    	</div>
    </section>

    <section class="ftco-section">
    	<div class="container">
    		<div class="row justify-content-center mb-5 pb-3">
    			<div class="col-md-7 heading-section ftco-animate text-center">
    				<span class="subheading">Shop</span>
    				<h2 class="mb-4">محصولات خانگی</h2>
    				<p>{{$website->order_product}}</p>
    			</div>
    		</div>
    		<div class="row">
    			@if ($products->count())
                    @foreach ($products as $food)
                        @include('includes.food_col')
                    @endforeach
                @else
                    <div class="alert alert-danger mx-auto">
                        <p class="m-0"> <i class="material-icons icon">error</i> هنوز هیچ محصولی در سیستم ثبت نشده. </p>
                    </div>
                @endif
    		</div>
    		<hr class="hr-primary">
    		<div class="text-center">
    			<a href="{{route('order_product')}}" class="btn btn-primary btn-outline-primary px-4 py-3">
    				مشاهده همه محصولات خانگی
    			</a>
    		</div>
    	</div>
    </section>

    <section class="ftco-section img" id="ftco-testimony" style="background-image: url('{{asset($website->testimonial_image)}}');" data-stellar-background-ratio="0.5">
    	<div class="overlay"></div>
    	<div class="container">
    		<div class="row justify-content-center mb-5">
    			<div class="col-md-7 heading-section text-center ftco-animate">
    				<span class="subheading">Testimony</span>
    				<h2 class="mb-4">نظرات کاربران</h2>
    			</div>
    		</div>
    	</div>
    	<div class="container-wrap">
    		<div class="row d-flex no-gutters">
    			<div class="col-lg align-self-sm-end ftco-animate">
    				<div class="testimony">
    					<blockquote>
    						<p>
    							&rdquo;
    							نشان دادن نظرات کاربران در صفحه اصلی تکنیک جالبی است
    							که اخیرا بسیاری از وبسایت های معروف از آن استفاده میکنند.
    							حال در این صفحه 5 نظر  به صورت اتفاقی از لیست تایین شده نمایش داده میشود.
    							در مورد قمت نظرات کاربران توضیحات بیشتری داده خواهد شد.
    							&ldquo;
    						</p>
    					</blockquote>
    				</div>
    			</div>
    			<div class="col-lg align-self-sm-end">
    				<div class="testimony overlay">
    					<blockquote>
    						<p>
    							&rdquo;
    								برخی از نظرات در این قسمت نمایش داده میشوند
    								برخی از نظرات در این قسمت نمایش داده میشوند
    								برخی از نظرات در این قسمت نمایش داده میشوند
    								برخی از نظرات در این قسمت نمایش داده میشوند
    							&ldquo;
    						</p>
    					</blockquote>
    				</div>
    			</div>
    			<div class="col-lg align-self-sm-end ftco-animate">
    				<div class="testimony">
    					<blockquote>
    						<p>
    							&rdquo;
    								برخی از نظرات در این قسمت نمایش داده میشوند
    								برخی از نظرات در این قسمت نمایش داده میشوند
    								برخی از نظرات در این قسمت نمایش داده میشوند
    								برخی از نظرات در این قسمت نمایش داده میشوند
    								برخی از نظرات در این قسمت نمایش داده میشوند
    							&ldquo;
    						</p>
    					</blockquote>
    				</div>
    			</div>
    			<div class="col-lg align-self-sm-end">
    				<div class="testimony overlay">
    					<blockquote>
    						<p>
    							&rdquo;
    								برخی از نظرات در این قسمت نمایش داده میشوند
    								برخی از نظرات در این قسمت نمایش داده میشوند
    							&ldquo;
    						</p>
    					</blockquote>
    				</div>
    			</div>
    			<div class="col-lg align-self-sm-end ftco-animate">
    				<div class="testimony">
    					<blockquote>
    						<p>
    							&rdquo;
    								برخی از نظرات در این قسمت نمایش داده میشوند
    								برخی از نظرات در این قسمت نمایش داده میشوند
    								برخی از نظرات در این قسمت نمایش داده میشوند
    								برخی از نظرات در این قسمت نمایش داده میشوند
    							&ldquo;
    						</p>
    					</blockquote>
    				</div>
    			</div>
    		</div>
    	</div>
    </section>

    <section class="ftco-section">
    	<div class="container">
    		<div class="row justify-content-center mb-5 pb-3">
    			<div class="col-md-7 heading-section ftco-animate text-center">
    				<span class="subheading">Blog</span>
    				<h2 class="mb-4"> مطالب منتشر شده </h2>
    				<p>{{$website->blogs}}</p>
    			</div>
    		</div>
    		<div class="row d-flex">
    			@if ($blogs->count())
                    @foreach ($blogs as $blog)
                        @include('includes.blog_col')
                    @endforeach
                @else
                    <div class="alert alert-danger mx-auto">
                        <p class="m-0"> <i class="material-icons icon">error</i> هنوز هیچ بلاگی در سیستم ثبت نشده. </p>
                    </div>
                @endif
    		</div>
    		<hr class="hr-primary">
    		<div class="text-center">
    			<a href="{{route('blogs')}}" class="btn btn-primary btn-outline-primary px-4 py-3">
    				مشاهده همه مطالب
    			</a>
    		</div>
    	</div>
    </section>

    <section class="ftco-appointment">
    	<div class="overlay"></div>
    	<div class="container-wrap">
    		<div class="row no-gutters d-md-flex align-items-center">
    			<div class="col-md-12 d-flex align-self-stretch">
    				<iframe id="map" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2692.2537373597593!2d47.056201136305184!3d34.31323392847227!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3ffaee741488d481%3A0x328a8f04799f6230!2sSina%20Hotel!5e0!3m2!1sen!2s!4v1578678558051!5m2!1sen!2s" frameborder="0" allowfullscreen="true"></iframe>
    			</div>
    		</div>
    	</div>
    </section>
@endsection
