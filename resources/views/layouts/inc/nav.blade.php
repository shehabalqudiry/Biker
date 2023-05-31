<nav class="topnav navbar navbar-light">
    <button type="button" class="navbar-toggler text-muted mt-2 p-0 mr-3 collapseSidebar">
        <i class="fe fe-menu navbar-toggler-icon"></i>
    </button>
    {{--  <form class="form-inline mr-auto searchform text-muted">
      <input class="form-control mr-sm-2 bg-transparent border-0 pl-4 text-muted" type="search" placeholder="Type something..." aria-label="Search">
    </form>  --}}
    <ul class="nav">
        <li class="nav-item">
            <a class="nav-link text-muted my-2" href="#" id="modeSwitcher" data-mode="dark">
                <i class="fe fe-sun fe-16"></i>
            </a>
        </li>
        <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle text-muted pr-0" href="#" id="navbarDropdownMenuLink"
                role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <span class="avatar avatar-sm mt-2">
                    <img src="{{ auth('admin')->user()->profile_photo_url ?? asset('build/assets/avatars/user_avatar.png') }}" alt="..."
                        class="avatar-img rounded-circle">
                </span>
                {{ auth('admin')->user()->name ?? "" }}
            </a>
            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink">
                <a class="dropdown-item" href="{{ route('admin.profile.index') }}">الملف الشخصي</a>
                 <a class="dropdown-item" href="#">الاعدادات</a>
                <form method="POST" id="LogoutForm" action="{{ route('admin.logout') }}" x-data>
                    @csrf
                    <a href="#" onclick="getElementById('LogoutForm').submit();"
                        class="dropdown-item">
                        خروج
                    </a>
                </form>
            </div>
        </li>
    </ul>
</nav>
