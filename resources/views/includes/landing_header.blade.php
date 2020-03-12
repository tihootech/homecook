<nav class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light" id="ftco-navbar" dir="rtl">
	<div class="container">
		<a class="navbar-brand" href="{{url('/')}}">کوفته<small>ریزه</small></a>
		<div class="collapse navbar-collapse order-sm-1 order-12" id="ftco-nav">
			<ul class="navbar-nav ml-auto">
				<li class="nav-item @if(rn() == 'index') active @endif">
					<a href="{{url('/')}}" class="nav-link">
						<i class="material-icons">home</i> صفحه اصلی
					</a>
				</li>
				<li class="nav-item @if(rn() == 'order_food') active @endif">
					<a href="{{route('order_food')}}" class="nav-link">
						<i class="material-icons">fastfood</i> سفارش غذا
					</a>
				</li>
				<li class="nav-item @if(rn() == 'order_product') active @endif">
					<a href="{{route('order_product')}}" class="nav-link">
						<i class="material-icons">store</i> فروشگاه
					</a>
				</li>
				<li class="nav-item @if(rn() == 'blogs') active @endif">
					<a href="{{route('blogs')}}" class="nav-link">
						<i class="material-icons">menu_book</i> وبلاگ
					</a>
				</li>
				<li class="nav-item @if(rn() == 'new_cook') active @endif">
					<a href="{{route('new_cook')}}" class="nav-link">
						<i class="material-icons">how_to_reg</i> همکاری
					</a>
				</li>
			</ul>
		</div>
		<div class="topbar order-sm-12 order-1">
			<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav" aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
				<span class="material-icons">menu</span>
			</button>
			<a href="{{route('home')}}" data-toggle="popover" data-content="ناحیه کاربری" data-trigger="hover" data-placement="bottom">
				<span class="material-icons">person</span>
			</a>
			<a href="{{route('cart.checkout')}}" class="nav-link" data-toggle="popover" data-trigger="hover" data-placement="bottom"
				data-content="برای مشاهده سبد خرید کلیک کنید." rel="nofollow">
				<span class="material-icons">shopping_cart</span>
				@php
					$cart = current_cart()
				@endphp
				@if ($cart_count = count($cart))
					<span class="bag d-flex justify-content-center align-items-center">
						<small id="cart-count">{{$cart_count}}</small>
					</span>
				@endif
			</a>
		</div>
	</div>
</nav>
