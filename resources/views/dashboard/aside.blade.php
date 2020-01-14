<div class="app-sidebar__overlay" data-toggle="sidebar"></div>
<aside class="app-sidebar">
    <div class="app-sidebar__user">
        <img class="app-sidebar__user-avatar" src="{{asset('general/img/logo.png')}}" alt="خونه پز">
        <div>
            <p class="app-sidebar__user-name">{{auth()->user()->name}}</p>
            <p class="app-sidebar__user-designation" data-toggle="popover" data-trigger="hover" data-placement="top" data-content="سطح دسترسی">
                دسترسی :
                @if (user('type') == 'cook')
                    همکار
                @else
                    {{strtoupper(user('type'))}}
                @endif
            </p>
        </div>
    </div>
    <ul class="app-menu">
        <li>
            <a class="app-menu__item @if(rn() == 'home') active @endif" href="{{route('home')}}">
                <i class="ml-2 material-icons">dashboard</i>
                <span class="app-menu__label"> داشبورد </span>
            </a>
        </li>

        @include('dashboard.panel')

    </ul>
</aside>
