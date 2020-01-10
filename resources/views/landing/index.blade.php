@extends('layouts.landing')

@section('meta')
    <title> خونه پز - سرویس سفارش غذای خانگی </title>
    <meta name="keywords" content="خونه پز, رزرو غذا کرمانشاه, غذای خانگی, سفارش غذا">
    <meta name="description" content="خونه پز - سرویس سفارش غذای خانگی">
@endsection

@section('content')
    <section class="home-slider owl-carousel">
    	<div class="slider-item" style="background-image: url('{{asset('assets/images/bg_1.jpg')}}');">
    		<div class="overlay"></div>
    		<div class="container">
    			<div class="row slider-text justify-content-center align-items-center" data-scrollax-parent="true">

    				<div class="col-md-8 col-sm-12 text-center ftco-animate">
    					<span class="subheading">Welcome</span>
    					<h1 class="mb-4"> سفارش غذا در کرمانشاه </h1>
    					<p class="mb-4 mb-md-5"> اولین سامانه سفارش غذا در کرمانشاه </p>
    					{{-- <div class="header-btns"> --}}
    						{{-- <a href="#" class="btn btn-primary p-3 px-xl-4 py-xl-3"> همکاری </a> --}}
    						{{-- <a href="#" class="btn btn-white btn-outline-white p-3 px-xl-4 py-xl-3"> سفارش غذا </a> --}}
    					{{-- </div> --}}
    				</div>

    			</div>
    		</div>
    	</div>

    	<div class="slider-item" style="background-image: url('{{asset('assets/images/bg_2.jpg')}}');">
    		<div class="overlay"></div>
    		<div class="container">
    			<div class="row slider-text justify-content-center align-items-center" data-scrollax-parent="true">

    				<div class="col-md-8 col-sm-12 text-center ftco-animate">
    					<span class="subheading">Welcome</span>
    					<h1 class="mb-4"> عنوان شماره 2 </h1>
    					<p class="mb-4 mb-md-5"> عنوان و توضیحات مناسب بعدا قرار داده میشود </p>
    					{{-- <div class="header-btns"> --}}
    						{{-- <a href="#" class="btn btn-primary p-3 px-xl-4 py-xl-3"> همکاری </a> --}}
    						{{-- <a href="#" class="btn btn-white btn-outline-white p-3 px-xl-4 py-xl-3"> سفارش غذا </a> --}}
    					{{-- </div> --}}
    				</div>

    			</div>
    		</div>
    	</div>

    	<div class="slider-item" style="background-image: url('{{asset('assets/images/bg_3.jpg')}}');">
    		<div class="overlay"></div>
    		<div class="container">
    			<div class="row slider-text justify-content-center align-items-center" data-scrollax-parent="true">

    				<div class="col-md-8 col-sm-12 text-center ftco-animate">
    					<span class="subheading">Welcome</span>
    					<h1 class="mb-4"> عنوان شماره 3 </h1>
    					<p class="mb-4 mb-md-5"> عنوان و توضیحات مناسب بعدا قرار داده میشود </p>
    					{{-- <div class="header-btns"> --}}
    						{{-- <a href="#" class="btn btn-primary p-3 px-xl-4 py-xl-3"> همکاری </a> --}}
    						{{-- <a href="#" class="btn btn-white btn-outline-white p-3 px-xl-4 py-xl-3"> سفارش غذا </a> --}}
    					{{-- </div> --}}
    				</div>

    			</div>
    		</div>
    	</div>
    </section>

    <section class="ftco-intro">
    	<div class="container-wrap">
    		<div class="wrap d-md-flex align-items-xl-end">
    			<div class="info">
    				<div class="row no-gutters">
    					<div class="col-sm-5 d-flex ftco-animate">
    						<div class="icon"><span class="material-icons">phone</span></div>
    						<div class="text">
    							<h3 dir="ltr"> <a href="tel:+988337271234"> +98 833 727 1234 </a> </h3>
    							<p> شماره تماس پشتیبانی </p>
    						</div>
    					</div>
    					<div class="col-sm-7 d-flex ftco-animate">
    						<div class="icon"><span class="material-icons">my_location</span></div>
    						<div class="text">
    							<h3> <a href="#"> آدرس دفتر مرکزی </a> </h3>
    							<p> آدرس - دقیق - بعدا - اینجا - قرار - داده - میشود </p>
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
    	<div class="one-half img" style="background-image: url('{{asset('assets/images/about.jpg')}}');"></div>
    	<div class="one-half ftco-animate">
    		<div class="overlap">
    			<div class="heading-section ftco-animate ">
    				<span class="subheading">About Us</span>
    				<h2 class="mb-4"> درباره ما </h2>
    			</div>
    			<div class="about-text">
    				<p class="rtl-justify">
    					متن توضیحات درباره ما بعدا در اسن قسمت قرار داده میشود.
    					متن توضیحات درباره ما بعدا در اسن قسمت قرار داده میشود.
    					متن توضیحات درباره ما بعدا در اسن قسمت قرار داده میشود.
    					متن توضیحات درباره ما بعدا در اسن قسمت قرار داده میشود.
    					متن توضیحات درباره ما بعدا در اسن قسمت قرار داده میشود.
    					متن توضیحات درباره ما بعدا در اسن قسمت قرار داده میشود.
    					متن توضیحات درباره ما بعدا در اسن قسمت قرار داده میشود.
    					متن توضیحات درباره ما بعدا در اسن قسمت قرار داده میشود.
    					متن توضیحات درباره ما بعدا در اسن قسمت قرار داده میشود.
    					متن توضیحات درباره ما بعدا در اسن قسمت قرار داده میشود.
    					متن توضیحات درباره ما بعدا در اسن قسمت قرار داده میشود.
    					متن توضیحات درباره ما بعدا در اسن قسمت قرار داده میشود.
    				</p>
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
    			<div class="col-md-4 ftco-animate">
    				<div class="media d-block text-center block-6 services">
    					<div class="icon d-flex justify-content-center align-items-center mb-5">
    						<span class="material-icons">touch_app</span>
    					</div>
    					<div class="media-body">
    						<h3 class="heading"> به راحتی سفارش دهید </h3>
    						<p>
    							توضیحات این مورد اینجا قرار گرفته میشود
    							توضیحات این مورد اینجا قرار گرفته میشود
    							توضیحات این مورد اینجا قرار گرفته میشود
    							توضیحات این مورد اینجا قرار گرفته میشود
    						</p>
    					</div>
    				</div>
    			</div>
    			<div class="col-md-4 ftco-animate">
    				<div class="media d-block text-center block-6 services">
    					<div class="icon d-flex justify-content-center align-items-center mb-5">
    						<span class="material-icons">motorcycle</span>
    					</div>
    					<div class="media-body">
    						<h3 class="heading"> تحویل به موقع </h3>
    						<p>
    							توضیحات این مورد اینجا قرار گرفته میشود
    							توضیحات این مورد اینجا قرار گرفته میشود
    							توضیحات این مورد اینجا قرار گرفته میشود
    							توضیحات این مورد اینجا قرار گرفته میشود
    						</p>
    					</div>
    				</div>
    			</div>
    			<div class="col-md-4 ftco-animate">
    				<div class="media d-block text-center block-6 services">
    					<div class="icon d-flex justify-content-center align-items-center mb-5">
    						<span class="material-icons">eco</span>
    					</div>
    					<div class="media-body">
    						<h3 class="heading"> کیفیت مرغوب </h3>
    						<p>
    							توضیحات این مورد اینجا قرار گرفته میشود
    							توضیحات این مورد اینجا قرار گرفته میشود
    							توضیحات این مورد اینجا قرار گرفته میشود
    							توضیحات این مورد اینجا قرار گرفته میشود
    						</p>
    					</div>
    				</div>
    			</div>
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
    					<p class="mb-4 rtl-justify">
    						متن مربوط به توضیحات سفارش غذا نیز، بعدا در این قسمت و وارد میشود.
    						متن مربوط به توضیحات سفارش غذا نیز، بعدا در این قسمت و وارد میشود.
    						متن مربوط به توضیحات سفارش غذا نیز، بعدا در این قسمت و وارد میشود.
    						متن مربوط به توضیحات سفارش غذا نیز، بعدا در این قسمت و وارد میشود.
    						متن مربوط به توضیحات سفارش غذا نیز، بعدا در این قسمت و وارد میشود.
    					</p>
    					<p><a href="#" class="btn btn-primary btn-outline-primary px-4 py-3">مشاهده منوی کامل</a></p>
    				</div>
    			</div>
    			<div class="col-md-6">
    				<div class="row">
    					<div class="col-md-6">
    						<div class="menu-entry">
    							<a href="#" class="img" style="background-image: url('{{asset('assets/images/menu-1.jpg')}}');"></a>
    						</div>
    					</div>
    					<div class="col-md-6">
    						<div class="menu-entry mt-lg-4">
    							<a href="#" class="img" style="background-image: url('{{asset('assets/images/menu-2.jpg')}}');"></a>
    						</div>
    					</div>
    					<div class="col-md-6">
    						<div class="menu-entry">
    							<a href="#" class="img" style="background-image: url('{{asset('assets/images/menu-3.jpg')}}');"></a>
    						</div>
    					</div>
    					<div class="col-md-6">
    						<div class="menu-entry mt-lg-4">
    							<a href="#" class="img" style="background-image: url('{{asset('assets/images/menu-4.jpg')}}');"></a>
    						</div>
    					</div>
    				</div>
    			</div>
    		</div>
    	</div>
    </section>

    <section class="ftco-counter ftco-bg-dark img" id="section-counter" style="background-image: url('{{asset('assets/images/m1.jpg')}}');" data-stellar-background-ratio="0.5">
    	<div class="overlay"></div>
    	<div class="container">
    		<div class="row justify-content-center">
    			<div class="col-md-10">
    				<div class="row">
    					<div class="col-md-6 col-lg-3 d-flex justify-content-center counter-wrap ftco-animate">
    						<div class="block-18 text-center">
    							<div class="text">
    								<div class="icon"> <span class="material-icons">people</span> </div>
    								<strong class="number" data-number="100">0</strong>
    								<span>آشپز مختلف</span>
    							</div>
    						</div>
    					</div>
    					<div class="col-md-6 col-lg-3 d-flex justify-content-center counter-wrap ftco-animate">
    						<div class="block-18 text-center">
    							<div class="text">
    								<div class="icon"> <span class="material-icons">fastfood</span> </div>
    								<strong class="number" data-number="85">0</strong>
    								<span>غذای گوناگون</span>
    							</div>
    						</div>
    					</div>
    					<div class="col-md-6 col-lg-3 d-flex justify-content-center counter-wrap ftco-animate">
    						<div class="block-18 text-center">
    							<div class="text">
    								<div class="icon"> <span class="material-icons">room_service</span> </div>
    								<strong class="number" data-number="10567">0</strong>
    								<span>سفارش غذا</span>
    							</div>
    						</div>
    					</div>
    					<div class="col-md-6 col-lg-3 d-flex justify-content-center counter-wrap ftco-animate">
    						<div class="block-18 text-center">
    							<div class="text">
    								<div class="icon"> <span class="material-icons">emoji_emotions</span> </div>
    								<strong class="number" data-number="900">0</strong>
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
    				<p>
    					توضیحاتی مختصر در باره محصولات خانگی
    					توضیحاتی مختصر در باره محصولات خانگی
    					توضیحاتی مختصر در باره محصولات خانگی
    					توضیحاتی مختصر در باره محصولات خانگی
    					توضیحاتی مختصر در باره محصولات خانگی
    					توضیحاتی مختصر در باره محصولات خانگی
    				</p>
    			</div>
    		</div>
    		<div class="row">
    			<div class="col-md-3">
    				<div class="menu-entry">
    					<a href="#" class="img" style="background-image: url('{{asset('assets/images/product-1.jpg')}}');"></a>
    					<div class="text text-center pt-4">
    						<h3><a href="#">مربای انجیر</a></h3>
    						<p>توضیحاتی مختصر راجع به این محصول خانگی</p>
    						<p class="price"><span>23,000 تومان</span></p>
    						<p>
    							<a href="#" class="btn btn-primary btn-outline-primary">
    								اضافه کردن به سبد خرید
    							</a>
    						</p>
    					</div>
    				</div>
    			</div>
    			<div class="col-md-3">
    				<div class="menu-entry">
    					<a href="#" class="img" style="background-image: url('{{asset('assets/images/product-2.jpg')}}');"></a>
    					<div class="text text-center pt-4">
    						<h3><a href="#">عسل طبیعی</a></h3>
    						<p>توضیحاتی مختصر راجع به این محصول خانگی</p>
    						<p class="price"><span>76,000 تومان</span></p>
    						<p>
    							<a href="#" class="btn btn-primary btn-outline-primary">
    								اضافه کردن به سبد خرید
    							</a>
    						</p>
    					</div>
    				</div>
    			</div>
    			<div class="col-md-3">
    				<div class="menu-entry">
    					<a href="#" class="img" style="background-image: url('{{asset('assets/images/product-3.jpg')}}');"></a>
    					<div class="text text-center pt-4">
    						<h3><a href="#">شیرینی خانگی</a></h3>
    						<p>توضیحاتی مختصر راجع به این محصول خانگی</p>
    						<p class="price"><span>14,000 تومان</span></p>
    						<p>
    							<a href="#" class="btn btn-primary btn-outline-primary">
    								اضافه کردن به سبد خرید
    							</a>
    						</p>
    					</div>
    				</div>
    			</div>
    			<div class="col-md-3">
    				<div class="menu-entry">
    					<a href="#" class="img" style="background-image: url('{{asset('assets/images/product-4.jpg')}}');"></a>
    					<div class="text text-center pt-4">
    						<h3><a href="#">انواع ترشی</a></h3>
    						<p>توضیحاتی مختصر راجع به این محصول خانگی</p>
    						<p class="price"><span>18,000 تومان</span></p>
    						<p>
    							<a href="#" class="btn btn-primary btn-outline-primary">
    								اضافه کردن به سبد خرید
    							</a>
    						</p>
    					</div>
    				</div>
    			</div>
    		</div>
    		<hr class="hr-primary">
    		<div class="text-center">
    			<a href="#" class="btn btn-primary btn-outline-primary px-4 py-3">
    				مشاهده همه محصولات خانگی
    			</a>
    		</div>
    	</div>
    </section>

    {{-- <section class="ftco-gallery">
    	<div class="container-wrap">
    		<div class="row no-gutters">
    			<div class="col-md-3 ftco-animate">
    				<a href="gallery.html" class="gallery img d-flex align-items-center" style="background-image: url('{{asset('assets/images/gallery-1.jpg')}}');">
    					<div class="icon mb-4 d-flex align-items-center justify-content-center">
    						<span class="icon-search"></span>
    					</div>
    				</a>
    			</div>
    			<div class="col-md-3 ftco-animate">
    				<a href="gallery.html" class="gallery img d-flex align-items-center" style="background-image: url('{{asset('assets/images/gallery-2.jpg')}}');">
    					<div class="icon mb-4 d-flex align-items-center justify-content-center">
    						<span class="icon-search"></span>
    					</div>
    				</a>
    			</div>
    			<div class="col-md-3 ftco-animate">
    				<a href="gallery.html" class="gallery img d-flex align-items-center" style="background-image: url('{{asset('assets/images/gallery-3.jpg')}}');">
    					<div class="icon mb-4 d-flex align-items-center justify-content-center">
    						<span class="icon-search"></span>
    					</div>
    				</a>
    			</div>
    			<div class="col-md-3 ftco-animate">
    				<a href="gallery.html" class="gallery img d-flex align-items-center" style="background-image: url('{{asset('assets/images/gallery-4.jpg')}}');">
    					<div class="icon mb-4 d-flex align-items-center justify-content-center">
    						<span class="icon-search"></span>
    					</div>
    				</a>
    			</div>
    		</div>
    	</div>
    </section> --}}

    {{-- <section class="ftco-menu">
    	<div class="container">
    		<div class="row justify-content-center mb-5">
    			<div class="col-md-7 heading-section text-center ftco-animate">
    				<span class="subheading"> Order Food </span>
    				<h2 class="mb-4"> سفارش غذا </h2>
    				<p>
    					توضیحاتی مختصر راجع به سفارش غذا
    					توضیحاتی مختصر راجع به سفارش غذا
    					توضیحاتی مختصر راجع به سفارش غذا
    					توضیحاتی مختصر راجع به سفارش غذا
    				</p>
    			</div>
    		</div>
    		<div class="row d-md-flex">
    			<div class="col-lg-12 ftco-animate p-md-5">
    				<div class="row">
    					<div class="col-md-12 nav-link-wrap mb-5">
    						<div class="nav ftco-animate nav-pills justify-content-center" id="v-pills-tab" role="tablist" aria-orientation="vertical">
    							<a class="nav-link active" id="v-pills-1-tab" data-toggle="pill" href="#v-pills-1" role="tab" aria-controls="v-pills-1" aria-selected="true">Main Dish</a>

    							<a class="nav-link" id="v-pills-2-tab" data-toggle="pill" href="#v-pills-2" role="tab" aria-controls="v-pills-2" aria-selected="false">Drinks</a>

    							<a class="nav-link" id="v-pills-3-tab" data-toggle="pill" href="#v-pills-3" role="tab" aria-controls="v-pills-3" aria-selected="false">Desserts</a>
    						</div>
    					</div>
    					<div class="col-md-12 d-flex align-items-center">

    						<div class="tab-content ftco-animate" id="v-pills-tabContent">

    							<div class="tab-pane fade show active" id="v-pills-1" role="tabpanel" aria-labelledby="v-pills-1-tab">
    								<div class="row">
    									<div class="col-md-4 text-center">
    										<div class="menu-wrap">
    											<a href="#" class="menu-img img mb-4" style="background-image: url('{{asset('assets/images/dish-1.jpg')}}');"></a>
    											<div class="text">
    												<h3><a href="#">Grilled Beef</a></h3>
    												<p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia.</p>
    												<p class="price"><span>$2.90</span></p>
    												<p><a href="#" class="btn btn-primary btn-outline-primary">Add to cart</a></p>
    											</div>
    										</div>
    									</div>
    									<div class="col-md-4 text-center">
    										<div class="menu-wrap">
    											<a href="#" class="menu-img img mb-4" style="background-image: url('{{asset('assets/images/dish-2.jpg')}}');"></a>
    											<div class="text">
    												<h3><a href="#">Grilled Beef</a></h3>
    												<p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia.</p>
    												<p class="price"><span>$2.90</span></p>
    												<p><a href="#" class="btn btn-primary btn-outline-primary">Add to cart</a></p>
    											</div>
    										</div>
    									</div>
    									<div class="col-md-4 text-center">
    										<div class="menu-wrap">
    											<a href="#" class="menu-img img mb-4" style="background-image: url('{{asset('assets/images/dish-3.jpg')}}');"></a>
    											<div class="text">
    												<h3><a href="#">Grilled Beef</a></h3>
    												<p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia.</p>
    												<p class="price"><span>$2.90</span></p>
    												<p><a href="#" class="btn btn-primary btn-outline-primary">Add to cart</a></p>
    											</div>
    										</div>
    									</div>
    								</div>
    							</div>

    							<div class="tab-pane fade" id="v-pills-2" role="tabpanel" aria-labelledby="v-pills-2-tab">
    								<div class="row">
    									<div class="col-md-4 text-center">
    										<div class="menu-wrap">
    											<a href="#" class="menu-img img mb-4" style="background-image: url('{{asset('assets/images/drink-1.jpg')}}');"></a>
    											<div class="text">
    												<h3><a href="#">Lemonade Juice</a></h3>
    												<p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia.</p>
    												<p class="price"><span>$2.90</span></p>
    												<p><a href="#" class="btn btn-primary btn-outline-primary">Add to cart</a></p>
    											</div>
    										</div>
    									</div>
    									<div class="col-md-4 text-center">
    										<div class="menu-wrap">
    											<a href="#" class="menu-img img mb-4" style="background-image: url('{{asset('assets/images/drink-2.jpg')}}');"></a>
    											<div class="text">
    												<h3><a href="#">Pineapple Juice</a></h3>
    												<p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia.</p>
    												<p class="price"><span>$2.90</span></p>
    												<p><a href="#" class="btn btn-primary btn-outline-primary">Add to cart</a></p>
    											</div>
    										</div>
    									</div>
    									<div class="col-md-4 text-center">
    										<div class="menu-wrap">
    											<a href="#" class="menu-img img mb-4" style="background-image: url('{{asset('assets/images/drink-3.jpg')}}');"></a>
    											<div class="text">
    												<h3><a href="#">Soda Drinks</a></h3>
    												<p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia.</p>
    												<p class="price"><span>$2.90</span></p>
    												<p><a href="#" class="btn btn-primary btn-outline-primary">Add to cart</a></p>
    											</div>
    										</div>
    									</div>
    								</div>
    							</div>

    							<div class="tab-pane fade" id="v-pills-3" role="tabpanel" aria-labelledby="v-pills-3-tab">
    								<div class="row">
    									<div class="col-md-4 text-center">
    										<div class="menu-wrap">
    											<a href="#" class="menu-img img mb-4" style="background-image: url('{{asset('assets/images/dessert-1.jpg')}}');"></a>
    											<div class="text">
    												<h3><a href="#">Hot Cake Honey</a></h3>
    												<p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia.</p>
    												<p class="price"><span>$2.90</span></p>
    												<p><a href="#" class="btn btn-primary btn-outline-primary">Add to cart</a></p>
    											</div>
    										</div>
    									</div>
    									<div class="col-md-4 text-center">
    										<div class="menu-wrap">
    											<a href="#" class="menu-img img mb-4" style="background-image: url('{{asset('assets/images/dessert-2.jpg')}}');"></a>
    											<div class="text">
    												<h3><a href="#">Hot Cake Honey</a></h3>
    												<p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia.</p>
    												<p class="price"><span>$2.90</span></p>
    												<p><a href="#" class="btn btn-primary btn-outline-primary">Add to cart</a></p>
    											</div>
    										</div>
    									</div>
    									<div class="col-md-4 text-center">
    										<div class="menu-wrap">
    											<a href="#" class="menu-img img mb-4" style="background-image: url('{{asset('assets/images/dessert-3.jpg')}}');"></a>
    											<div class="text">
    												<h3><a href="#">Hot Cake Honey</a></h3>
    												<p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia.</p>
    												<p class="price"><span>$2.90</span></p>
    												<p><a href="#" class="btn btn-primary btn-outline-primary">Add to cart</a></p>
    											</div>
    										</div>
    									</div>
    								</div>
    							</div>
    						</div>
    					</div>
    				</div>
    			</div>
    		</div>
    	</div>
    </section> --}}

    <section class="ftco-section img" id="ftco-testimony" style="background-image: url('{{asset('assets/images/testimony-bg.jpg')}}');" data-stellar-background-ratio="0.5">
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
    				<p>
    					در این قسمت میتوانید آخرین مطالب منتشر شده توسط وبسایت ما را مطالعه کنید.
    				</p>
    			</div>
    		</div>
    		<div class="row d-flex">
    			<div class="col-md-4 d-flex ftco-animate">
    				<div class="blog-entry align-self-stretch">
    					<a href="#" class="block-20" style="background-image: url('{{asset('assets/images/image_1.jpg')}}');">
    					</a>
    					<div class="text py-4 d-block">
    						<div class="meta">
    							<div>
    								<a href="#">
    									<span class="material-icons">date_range</span>
    									25 آذر 1398
    								</a>
    							</div>
    							<div>
    								<a href="#" class="meta-chat">
    									<span class="material-icons">visibility</span> 148
    								</a>
    							</div>
    						</div>
    						<h3 class="heading mt-2"><a href="#">تاثیرات خوردن نوشابه بعد از غذا</a></h3>
    						<p> کاراکتر های ابتدایی مربوط به توضیحات این مطلب... </p>
    					</div>
    				</div>
    			</div>
    			<div class="col-md-4 d-flex ftco-animate">
    				<div class="blog-entry align-self-stretch">
    					<a href="#" class="block-20" style="background-image: url('{{asset('assets/images/image_2.jpg')}}');">
    					</a>
    					<div class="text py-4 d-block">
    						<div class="meta">
    							<div>
    								<a href="#">
    									<span class="material-icons">date_range</span>
    									25 آذر 1398
    								</a>
    							</div>
    							<div>
    								<a href="#" class="meta-chat">
    									<span class="material-icons">visibility</span> 148
    								</a>
    							</div>
    						</div>
    						<h3 class="heading mt-2"><a href="#"> فواید سبزیجات </a></h3>
    						<p> کاراکتر های ابتدایی مربوط به توضیحات این مطلب... </p>
    					</div>
    				</div>
    			</div>
    			<div class="col-md-4 d-flex ftco-animate">
    				<div class="blog-entry align-self-stretch">
    					<a href="#" class="block-20" style="background-image: url('{{asset('assets/images/image_3.jpg')}}');">
    					</a>
    					<div class="text py-4 d-block">
    						<div class="meta">
    							<div>
    								<a href="#">
    									<span class="material-icons">date_range</span>
    									25 آذر 1398
    								</a>
    							</div>
    							<div>
    								<a href="#" class="meta-chat">
    									<span class="material-icons">visibility</span> 148
    								</a>
    							</div>
    						</div>
    						<h3 class="heading mt-2"><a href="#"> تاثیرات منفی فیت فود </a></h3>
    						<p> کاراکتر های ابتدایی مربوط به توضیحات این مطلب... </p>
    					</div>
    				</div>
    			</div>
    		</div>
    		<hr class="hr-primary">
    		<div class="text-center">
    			<a href="#" class="btn btn-primary btn-outline-primary px-4 py-3">
    				مشاهده همه مطالب
    			</a>
    		</div>
    	</div>
    </section>

    <section class="ftco-appointment">
    	<div class="overlay"></div>
    	<div class="container-wrap">
    		<div class="row no-gutters d-md-flex align-items-center">
    			<div class="col-md-6 d-flex align-self-stretch">
    				<iframe id="map" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2692.2537373597593!2d47.056201136305184!3d34.31323392847227!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3ffaee741488d481%3A0x328a8f04799f6230!2sSina%20Hotel!5e0!3m2!1sen!2s!4v1578678558051!5m2!1sen!2s" frameborder="0" allowfullscreen="true"></iframe>
    			</div>
    			<div class="col-md-6 appointment ftco-animate">
    				<h3 class="mb-3">تماس با ما</h3>
    				<form action="#" class="appointment-form">
    					<div class="d-flex">
    						<div class="form-group">
    							<input type="text" class="form-control" placeholder="نام شما">
    						</div>
    					</div>
    					<div class="d-flex">
    						<div class="form-group">
    							<input type="text" class="form-control" placeholder="موضوع">
    						</div>
    					</div>
    					<div class="d-flex">
    						<div class="form-group">
    							<textarea name="" id="" cols="30" rows="3" class="form-control" placeholder="متن پیام"></textarea>
    						</div>
    					</div>
    					<div class="d-flex justify-content-center">
    						<div class="form-group w-50">
    							<input type="submit" value="ارسال پیام" class="btn btn-primary py-3 px-4">
    						</div>
    					</div>
    				</form>
    			</div>
    		</div>
    	</div>
    </section>
@endsection
