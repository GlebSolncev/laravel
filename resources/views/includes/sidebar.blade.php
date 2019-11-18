<ul class="nav">
    <li class="nav-item nav-profile">
        <a href="#" class="nav-link">
            <div class="nav-profile-image">
                <img src="/assets/images/faces/{{ $me->role->name }}.png" alt="profile">
                <span class="login-status online"></span>
                <!--change to offline or busy as needed-->
            </div>
            <div class="nav-profile-text d-flex flex-column">
                <span class="font-weight-bold mb-2">{{ $me->name }}</span>
                <span class="text-secondary text-small">{{ $me->role->title }}</span>
            </div>
            <i class="mdi mdi-bookmark-check text-success nav-profile-badge"></i>
        </a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="{{ route('home') }}">
            <span class="menu-title">Главная</span>
            <i class="mdi mdi-home-account menu-icon"></i>
        </a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="{{ route('users.index') }}">
            <span class="menu-title">Пользователи</span>
            <i class="mdi mdi-human-handsup menu-icon"></i>
        </a>
    </li>

   {{-- <li class="nav-item">
        <a class="nav-link" data-toggle="collapse" href="#general-pages" aria-expanded="false" aria-controls="general-pages">
            <span class="menu-title">Sample Pages</span>
            <i class="menu-arrow"></i>
            <i class="mdi mdi-medical-bag menu-icon"></i>
        </a>
        <div class="collapse" id="general-pages">
            <ul class="nav flex-column sub-menu">
                <li class="nav-item"> <a class="nav-link" href="pages/samples/blank-page.html"> Blank Page </a></li>
                <li class="nav-item"> <a class="nav-link" href="pages/samples/login.html"> Login </a></li>
                <li class="nav-item"> <a class="nav-link" href="pages/samples/register.html"> Register </a></li>
                <li class="nav-item"> <a class="nav-link" href="pages/samples/error-404.html"> 404 </a></li>
                <li class="nav-item"> <a class="nav-link" href="pages/samples/error-500.html"> 500 </a></li>
            </ul>
        </div>
    </li>--}}

</ul>
