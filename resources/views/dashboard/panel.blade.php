

@if (master() || active_cook())
	<li>
		<a class="app-menu__item @if( rn() == 'food.index' ) active @endif" href="{{route("food.index")}}">
			<i class="ml-2 material-icons">fastfood</i>
			<span class="app-menu__label"> مدیریت غذا ها </span>
		</a>
	</li>
@endif


@master

@php
	$routes = ['cook.fresh_requests', 'cook.index'];
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
				<i class="icon material-icons">dynamic_feed</i> درخواست های جدید
			</a>
		</li>
		<li>
			<a class="treeview-item @if(rn() == $routes[1]) active @endif" href="{{route($routes[1])}}">
				<i class="icon material-icons">list</i> لیست همکاران
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
				<i class="icon material-icons">add</i> بلاگ جدید
			</a>
		</li>
		<li>
			<a class="treeview-item @if(rn() == $routes[1]) active @endif" href="{{route($routes[1])}}">
				<i class="icon material-icons">list</i> لیست بلاگ ها
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
