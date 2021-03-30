<nav class="topnav navbar navbar-light">
    <button type="button" class="navbar-toggler text-muted mt-2 p-0 mr-3 collapseSidebar">
        <i class="fe fe-menu navbar-toggler-icon"></i>
    </button>
    <ul class="nav">
        <li class="nav-item">
            <a class="nav-link text-muted my-2" href="#" id="modeSwitcher" data-mode="dark">
            <i class="fe fe-sun fe-16"></i>
            </a>
        </li>
        <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle text-muted pr-0" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <span class="avatar avatar-sm mt-2">
                @if ($avatar->foto == null)
                    
                @else
                <img src="{{asset('profile/' . $avatar->foto)}}" alt="..." class="avatar-img rounded-circle">
                @endif
            </span>
            </a>
            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink">
                <a class="dropdown-item" href="/profile">Profile</a>
                <a class="dropdown-item" href="#">Settings</a>
                <a class="dropdown-item" href="#">Activities</a>
            </div>
        </li>
    </ul>
</nav>
<aside class="sidebar-left border-right bg-white shadow" id="leftSidebar" data-simplebar>
    <a href="#" class="btn collapseSidebar toggle-btn d-lg-none text-muted ml-2 mt-3" data-toggle="toggle">
    <i class="fe fe-x"><span class="sr-only"></span></i>
    </a>
    <nav class="vertnav navbar navbar-light">
        <!-- nav bar -->
        <div class="w-100 mb-4 d-flex">
            <a class="navbar-brand mx-auto mt-2 flex-fill text-center" href="./index.html">
            <svg version="1.1" id="logo" class="navbar-brand-img brand-sm" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 120 120" xml:space="preserve">
                <g>
                <polygon class="st0" points="78,105 15,105 24,87 87,87" />
                <polygon class="st0" points="96,69 33,69 42,51 105,51" />
                <polygon class="st0" points="78,33 15,33 24,15 87,15" />
                </g>
            </svg>
            </a>
        </div>
        <ul class="navbar-nav flex-fill w-100 mb-2">
            <?php
            $role = Auth::user()->role;
            $queryMenu  = DB::table('access_menus')
                            ->join('menus','menus.id', '=', 'access_menus.id_menu')
                            ->where('access_menus.id_role', '=' ,$role)
                            ->orderBy('title')
                            ->get();
                                
            foreach ($queryMenu as $m) :?>
            <li class="nav-item dropdown mb-2">
                <a href="#dashboard{{$m->id}}" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle nav-link">
                    <i class="{{$m->icon}} fe-16"></i>
                    <span class="ml-3 item-text">{{$m->title}}</span><span class="sr-only">(current)</span>
                </a>
                <?php
                    $menu_id = $m->id;
                    $querySubMenu   = DB::table('menus')
                                        ->join('sub_menus','sub_menus.id_menu', '=', 'menus.id')
                                        ->where('sub_menus.id_menu', '=' ,$menu_id)
                                        ->select('sub_menus.icon', 'sub_menus.title','id_menu','url')
                                        ->orderBy('sub_menus.title')
                                        ->get();
                ?>
                <ul class="collapse list-unstyled pl-4 w-100" id="dashboard{{$m->id}}">
                    <?php foreach ($querySubMenu as $sm) : ?>
                    @if ($sm->id_menu == 0)
                    
                    @else
                    <li class="nav-item active">
                        <a class="nav-link pl-3" href="{{'/' . $sm->url}}">
                        <i class="{{$sm->icon}} fe-16"></i>
                        <span class="ml-1 item-text">{{$sm->title}}</span></a>
                    </li>
                    @endif
                    <?php endforeach?>
                </ul>
            </li>
            <?php endforeach?>
            <li class="nav-item dropdown mb-2">
                <a class="nav-link" href="{{ route('logout') }} " content="{{'logout'}}"
                    onclick="event.preventDefault();
                        document.getElementById('logout-form').submit();">
                    <i class="fas fa-sign-out-alt  fe-16"></i>
                    <span class="ml-3 item-text">{{ __('Logout') }}</span>
                </a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST">
                    @csrf
                </form>
            </li>
        </ul>
    </nav>
</aside>