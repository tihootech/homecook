<!DOCTYPE html>
<html lang="en">

<head>

	@yield('meta')

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Josefin+Sans:400,700" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Great+Vibes" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Material+Icons" rel="stylesheet">

    <link rel="stylesheet" href="{{asset('assets/css/animate.css')}}">

    <link rel="stylesheet" href="{{asset('assets/css/owl.carousel.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/owl.theme.default.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/magnific-popup.css')}}">

    <link rel="stylesheet" href="{{asset('assets/css/aos.css')}}">

    <link rel="stylesheet" href="{{asset('assets/css/bootstrap-datepicker.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/jquery.timepicker.css')}}">

    <link rel="stylesheet" href="{{asset('assets/css/icomoon.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/style.css?v=1.2')}}">
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light" id="ftco-navbar" dir="rtl">
        <div class="container">
            <a class="navbar-brand" href="#">خونه<small>پز</small></a>
            <div class="collapse navbar-collapse order-sm-1 order-12" id="ftco-nav">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item @if(rn() == 'index') active @endif">
						<a href="{{url('/')}}" class="nav-link">
							<i class="material-icons">home</i> صفحه اصلی
						</a>
					</li>
                    <li class="nav-item @if(rn() == 'order_food') active @endif">
						<a href="#" class="nav-link">
							<i class="material-icons">fastfood</i> سفارش غذا
						</a>
					</li>
					<li class="nav-item @if(rn() == 'x') active @endif">
						<a href="#" class="nav-link">
							<i class="material-icons">store</i> فروشگاه
						</a>
					</li>
                    <li class="nav-item @if(rn() == 'blogs') active @endif">
						<a href="{{route('blogs')}}" class="nav-link">
							<i class="material-icons">menu_book</i> وبلاگ
						</a>
					</li>
                    <li class="nav-item @if(rn() == 'x') active @endif">
						<a href="#" class="nav-link">
							<i class="material-icons">person_pin</i> در باره ما
						</a>
					</li>
                    <li class="nav-item @if(rn() == 'new_cook') active @endif">
						<a href="{{route('new_cook')}}" class="nav-link">
							<i class="material-icons">how_to_reg</i> همکاری
						</a>
					</li>
                    {{-- <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="room.html" id="dropdown04" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Shop</a>
                        <div class="dropdown-menu" aria-labelledby="dropdown04">
                            <a class="dropdown-item" href="shop.html">Shop</a>
                            <a class="dropdown-item" href="product-single.html">Single Product</a>
                            <a class="dropdown-item" href="room.html">Cart</a>
                            <a class="dropdown-item" href="checkout.html">Checkout</a>
                        </div>
                    </li> --}}
                </ul>
            </div>
			<div class="topbar order-sm-12 order-1">
				<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav" aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
	                <span class="material-icons">menu</span>
	            </button>
				<a href="{{route('home')}}" data-toggle="popover" data-content="ناحیه کاربری" data-trigger="hover" data-placement="bottom">
					<span class="material-icons">person</span>
				</a>
				<a href="#" class="nav-link" data-toggle="popover" data-content="1 آیتم در سبد خرید شماست" data-trigger="hover" data-placement="bottom">
					<span class="material-icons">shopping_cart</span>
					<span class="bag d-flex justify-content-center align-items-center"><small>1</small></span>
				</a>
            </div>
        </div>
    </nav>
    <!-- END nav -->


	@yield('content')


    <footer class="ftco-footer ftco-section img">
        <div class="overlay"></div>
        <div class="container">
            <div class="row mb-5">
                <div class="col-lg-3 col-md-6 mb-5 mb-md-5">
                    <div class="ftco-footer-widget mb-4">
                        <h2 class="ftco-heading-2"> در باره ما </h2>
                        <p>
                            توضیحات ابتدایی متن در باره ما در اینجا آورد میشود
                            توضیحات ابتدایی متن در باره ما در اینجا آورد میشود
                            ...
                        </p>
                        <a href="#" class="btn btn-white btn-outline-white px-3 py-2">
                            متن کامل
                        </a>
                        <ul class="ftco-footer-social list-unstyled mt-5">
                            <li class="ftco-animate"><a href="#"><span class="icon-instagram"></span></a></li>
                            <li class="ftco-animate"><a href="#"><span class="icon-telegram"></span></a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 mb-5 mb-md-5">
                    <div class="ftco-footer-widget mb-4">
                        <h2 class="ftco-heading-2">آخرین مطالب</h2>
                        @foreach (best_blogs(2) as $blog)
							@include('includes.blog_item')
                        @endforeach
                    </div>
                </div>
                <div class="col-lg-2 col-md-6 mb-5 mb-md-5">
                    <div class="ftco-footer-widget mb-4 ml-md-4">
                        <h2 class="ftco-heading-2"> لینک ها </h2>
                        <ul class="list-unstyled p-0">
                            <li><a href="{{route('new_cook')}}" class="py-2 d-block"> همکاری با ما </a></li>
                            <li><a href="#" class="py-2 d-block"> در باره ما  </a></li>
                            <li><a href="#" class="py-2 d-block"> مطالب وبسایت </a></li>
                            <li><a href="#" class="py-2 d-block"> محصولات خانگی </a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 mb-5 mb-md-5">
                    <div class="ftco-footer-widget mb-4">
                        <h2 class="ftco-heading-2"> تماس با ما </h2>
                        <div class="block-23 mb-3">
                            <ul>
                                <li>
                                    <span class="icon icon-map-marker"></span>
                                    <span class="text">
                                        آدرس - اینجا - قرار - داده - میشود
                                    </span>
                                </li>
                                <li>
                                    <a href="#">
                                        <span class="icon icon-phone"></span>
                                        <span class="text" dir="ltr"> +98 833 727 1234 </span>
                                    </a>
                                </li>
                                <li><a href="#"><span class="icon icon-envelope"></span><span class="text">info@yourdomain.com</span></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer>

    <!-- loader -->
    <div id="ftco-loader" class="show fullscreen">
        <svg class="circular" width="48px" height="48px">
            <circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee" />
            <circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10" stroke="#F96D00" />
        </svg>
    </div>

    <script src="{{asset('assets/js/jquery.min.js')}}"></script>
    <script src="{{asset('assets/js/jquery-migrate-3.0.1.min.js')}}"></script>
    <script src="{{asset('assets/js/popper.min.js')}}"></script>
    <script src="{{asset('assets/js/bootstrap.min.js')}}"></script>
    <script src="{{asset('assets/js/jquery.easing.1.3.js')}}"></script>
    <script src="{{asset('assets/js/jquery.waypoints.min.js')}}"></script>
    <script src="{{asset('assets/js/jquery.stellar.min.js')}}"></script>
    <script src="{{asset('assets/js/owl.carousel.min.js')}}"></script>
    <script src="{{asset('assets/js/jquery.magnific-popup.min.js')}}"></script>
    <script src="{{asset('assets/js/aos.js')}}"></script>
    <script src="{{asset('assets/js/jquery.animateNumber.min.js')}}"></script>
    <script src="{{asset('assets/js/bootstrap-datepicker.js')}}"></script>
    <script src="{{asset('assets/js/jquery.timepicker.min.js')}}"></script>
    <script src="{{asset('assets/js/scrollax.min.js')}}"></script>
    <script src="{{asset('assets/js/main.js?v=1.2')}}"></script>

</body>

</html>
