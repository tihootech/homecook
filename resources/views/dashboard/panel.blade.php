<li>
	<a class="app-menu__item @if( rn() == 'transaction.index' ) active @endif" href="{{route("transaction.index")}}">
		<i class="ml-2 material-icons">shopping_cart</i>
		<span class="app-menu__label"> لیست سفارشات </span>
	</a>
</li>

@if (master() || active_cook())
	<li>
		<a class="app-menu__item @if( rn() == 'food.index' ) active @endif" href="{{route("food.index")}}">
			<i class="ml-2 material-icons">fastfood</i>
			<span class="app-menu__label"> غذاها و محصولات خانگی </span>
		</a>
	</li>
@endif


@master

<li>
	<a class="app-menu__item @if( rn() == 'cat.index' ) active @endif" href="{{route("cat.index")}}">
		<i class="ml-2 material-icons">category</i>
		<span class="app-menu__label"> دسته بندی ها </span>
	</a>
</li>

@php
	$routes = ['peyk.index', 'peyk.create'];
@endphp
<li class="treeview @if( in_array(rn(), $routes) ) is-expanded @endif">
	<a class="app-menu__item" href="#" data-toggle="treeview">
		<i class="ml-2 material-icons">motorcycle</i>
		<span class="app-menu__label"> مدیریت پیک ها </span>
		<i class="treeview-indicator fa fa-angle-left"></i>
	</a>
	<ul class="treeview-menu">
		<li>
			<a class="treeview-item @if(rn() == $routes[0]) active @endif" href="{{route($routes[0])}}">
				<i class="icon material-icons ml-2">list</i> لیست پیک ها
			</a>
		</li>
		<li>
			<a class="treeview-item @if(rn() == $routes[1]) active @endif" href="{{route($routes[1])}}">
				<i class="icon material-icons ml-2">add</i> تعریف پیک جدید
			</a>
		</li>
	</ul>
</li>

@php
	$routes = ['cook.fresh_requests', 'cook.index', 'cook.create'];
@endphp
<li class="treeview @if( in_array(rn(), $routes) ) is-expanded @endif">
	<a class="app-menu__item" href="#" data-toggle="treeview">
		<i class="ml-2 material-icons">people</i>
		<span class="app-menu__label"> مدیریت همکاران </span>
		<i class="treeview-indicator fa fa-angle-left"></i>
	</a>
	<ul class="treeview-menu">
		<li>
			<a class="treeview-item @if(rn() == $routes[0]) active @endif" href="{{route($routes[0])}}">
				<i class="icon material-icons ml-2">dynamic_feed</i> درخواست های جدید
			</a>
		</li>
		<li>
			<a class="treeview-item @if(rn() == $routes[1]) active @endif" href="{{route($routes[1])}}">
				<i class="icon material-icons ml-2">list</i> لیست همکاران
			</a>
		</li>
		<li>
			<a class="treeview-item @if(rn() == $routes[2]) active @endif" href="{{route($routes[2])}}">
				<i class="icon material-icons ml-2">add</i> تعریف همکار
			</a>
		</li>
	</ul>
</li>

@php
	$routes = ['blog.create', 'blog.index'];
@endphp
<li class="treeview @if( in_array(rn(), $routes) ) is-expanded @endif">
	<a class="app-menu__item" href="#" data-toggle="treeview">
		<i class="ml-2 material-icons">menu_book</i>
		<span class="app-menu__label"> مدیریت وبلاگ </span>
		<i class="treeview-indicator fa fa-angle-left"></i>
	</a>
	<ul class="treeview-menu">
		<li>
			<a class="treeview-item @if(rn() == $routes[0]) active @endif" href="{{route($routes[0])}}">
				<i class="icon material-icons ml-2">add</i> بلاگ جدید
			</a>
		</li>
		<li>
			<a class="treeview-item @if(rn() == $routes[1]) active @endif" href="{{route($routes[1])}}">
				<i class="icon material-icons ml-2">list</i> لیست بلاگ ها
			</a>
		</li>
	</ul>
</li>

@php
	$routes = ['website.settings', 'website.general', 'website.slides'];
@endphp
<li class="treeview @if( in_array(rn(), $routes) ) is-expanded @endif">
	<a class="app-menu__item" href="#" data-toggle="treeview">
		<i class="ml-2 material-icons">build</i>
		<span class="app-menu__label"> تنظیمات وبسایت </span>
		<i class="treeview-indicator fa fa-angle-left"></i>
	</a>
	<ul class="treeview-menu">
		<li>
			<a class="treeview-item @if(rn() == $routes[0]) active @endif" href="{{route($routes[0])}}">
				<i class="icon material-icons ml-2">attach_money</i> تنظیمات مالی
			</a>
		</li>
		<li>
			<a class="treeview-item @if(rn() == $routes[1]) active @endif" href="{{route($routes[1])}}">
				<i class="icon material-icons ml-2">web</i> مدیریت وبسایت
			</a>
		</li>
		<li>
			<a class="treeview-item @if(rn() == $routes[2]) active @endif" href="{{route($routes[2])}}">
				<i class="icon material-icons ml-2">photo</i> مدیریت اسلاید ها
			</a>
		</li>
	</ul>
</li>

<li>
	<a class="app-menu__item @if( rn() == 'comment.index' ) active @endif" href="{{route("comment.index")}}">
		<i class="ml-2 material-icons">comment</i>
		<span class="app-menu__label"> مدیریت کامنت ها </span>
	</a>
</li>

<li>
	<a class="app-menu__item @if( rn() == 'review.index' ) active @endif" href="{{route("review.index")}}">
		<i class="ml-2 material-icons">rate_review</i>
		<span class="app-menu__label"> بازنگری ها </span>
	</a>
</li>

<li>
	<a class="app-menu__item @if( rn() == 'text_messages' ) active @endif" href="{{route("text_messages")}}">
		<i class="ml-2 material-icons">email</i>
		<span class="app-menu__label"> پیامک ها </span>
	</a>
</li>
@endmaster


<li>
	<a class="app-menu__item @if( rn() == 'acc' ) active @endif" href="{{route("acc")}}">
		<i class="ml-2 material-icons">lock</i>
		<span class="app-menu__label"> مدیریت حساب کاربری </span>
	</a>
</li>
