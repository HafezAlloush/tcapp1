<div class="main-menu menu-fixed menu-dark menu-accordion menu-shadow" data-scroll-to-active="true">
    <div class="main-menu-content">
        <ul class="navigation navigation-main" id="main-menu-navigation" data-menu="menu-navigation">
            <li id="home" class=" nav-item">
                <a href="{{ route('home') }}"><i class="la la-home"></i>
                    <span class="menu-title" data-i18n="nav.support_documentation.main">dashboard</span>
                </a>
            </li>
            <li class=" nav-item"><a href="index.html"><i class="
                la la-gear"></i><span
                        class="menu-title" data-i18n="nav.dash.main">الإعدادات العامة</span><span
                        class="badge badge badge-info badge-pill float-right mr-2">3</span></a>
                <ul class="menu-content">
                    <li id="departments"><a class="menu-item" href="{{ route('departments') }}">الدوائر والأقسام</a>
                    </li>
                </ul>
            </li>
            <li class=" nav-item"><a href="index.html"><i class="la la-users"></i><span class="menu-title"
                        data-i18n="nav.dash.main">المتدربين</span><span
                        class="badge badge badge-info badge-pill float-right mr-2">3</span></a>
                <ul class="menu-content">
                    <li id="trainees"><a class="menu-item" href="{{ route('trainees') }}">الملف الشخصي</a>
                    </li>

                </ul>
            </li>

        </ul>
    </div>
</div>
