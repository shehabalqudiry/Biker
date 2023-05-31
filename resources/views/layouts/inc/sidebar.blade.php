<aside class="sidebar-left border-right bg-white shadow" id="leftSidebar" data-simplebar>
    <a href="#" class="btn collapseSidebar toggle-btn d-lg-none text-muted ml-2 mt-3" data-toggle="toggle">
        <i class="fe fe-x"><span class="sr-only"></span></i>
    </a>
    <nav class="vertnav navbar navbar-light">
        <!-- nav bar -->
        <div class="w-100 mb-4 d-flex">
            <a class="navbar-brand mx-auto mt-2 flex-fill text-center" href="{{ route('admin.index') }}">
                <svg version="1.1" id="logo" class="navbar-brand-img brand-sm" xmlns="http://www.w3.org/2000/svg"
                    xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 120 120"
                    xml:space="preserve">
                    <g>
                        <polygon class="st0" points="78,105 15,105 24,87 87,87 	" />
                        <polygon class="st0" points="96,69 33,69 42,51 105,51 	" />
                        <polygon class="st0" points="78,33 15,33 24,15 87,15 	" />
                    </g>
                </svg>
            </a>
        </div>
        <ul class="navbar-nav flex-fill w-100 mb-2">
            <li class="nav-item dropdown">
                <a href="{{ route('admin.index') }}" class="nav-link">
                    <i class="fe fe-home fe-16"></i>
                    <span class="ml-3 item-text">الرئيسية</span><span class="sr-only">(current)</span>
                </a>
            </li>
        </ul>
        {{-- <ul class="navbar-nav flex-fill w-100 mb-2">
            <li class="nav-item dropdown">
                <a href="#ui-elements" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle nav-link">
                    <i class="fe fe-flag fe-16"></i>
                    <span class="ml-3 item-text">الفروع</span>
                </a>
                <ul class="collapse list-unstyled pl-4 w-100" id="ui-elements">
                    <li class="nav-item">
                        <a class="nav-link pl-3" href="{{ route('admin.branches.index') }}"><span
                                class="ml-1 item-text">عرض كل الفروع</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link pl-3" href="{{ route('admin.branches.create') }}"><span
                                class="ml-1 item-text">اضافة فرع</span></a>
                    </li>
                </ul>
            </li>
            <li class="nav-item dropdown">
                <a href="#employees" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle nav-link">
                    <i class="fe fe-user-check fe-16"></i>
                    <span class="ml-3 item-text">الموظفين</span>
                </a>
                <ul class="collapse list-unstyled pl-4 w-100" id="employees">
                    <li class="nav-item">
                        <a class="nav-link pl-3" href="{{ route('admin.employees.index') }}"><span
                                class="ml-1 item-text">عرض كل الموظفين</span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link pl-3" href="{{ route('admin.employees.create') }}"><span
                                class="ml-1 item-text">إضافة موظف جديد</span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link pl-3" href="{{ route('admin.employees.hr_empAttend.index') }}"><span
                                class="ml-1 item-text">الحضور والانصراف</span></a>
                    </li>
                </ul>
            </li>
            <li class="nav-item dropdown">
                <a href="#services" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle nav-link">
                    <i class="fe fe-server fe-16"></i>
                    <span class="ml-3 item-text">الخدمات</span>
                </a>
                <ul class="collapse list-unstyled pl-4 w-100" id="services">
                    <li class="nav-item">
                        <a class="nav-link pl-3" href="{{ route('admin.cat_services.index') }}"><span
                                class="ml-1 item-text">فئات الخدمات</span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link pl-3" href="{{ route('admin.services.index') }}"><span
                                class="ml-1 item-text">كل الخدمات</span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link pl-3" href="{{ route('admin.services.create') }}"><span
                                class="ml-1 item-text">اضــافة خدمة جديدة</span></a>
                    </li>
                </ul>
            </li>
            <li class="nav-item dropdown">
                <a href="#products" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle nav-link">
                    <i class="fe fe-grid fe-16"></i>
                    <span class="ml-3 item-text">المنتجات</span>
                </a>
                <ul class="collapse list-unstyled pl-4 w-100" id="products">
                    <li class="nav-item">
                        <a class="nav-link pl-3" href="{{ route('admin.cat_products.index') }}"><span
                                class="ml-1 item-text">فئات المنتجات</span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link pl-3" href="{{ route('admin.products.index') }}"><span
                                class="ml-1 item-text">كل المنتجات</span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link pl-3" href="{{ route('admin.products.create') }}"><span
                                class="ml-1 item-text">إضــافة منتج جديد</span></a>
                    </li>
                </ul>
            </li>
            <li class="nav-item dropdown">
                <a href="#clients" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle nav-link">
                    <i class="fe fe-users fe-16"></i>
                    <span class="ml-3 item-text">العملاء</span>
                </a>
                <ul class="collapse list-unstyled pl-4 w-100" id="clients">
                    <li class="nav-item">
                        <a class="nav-link pl-3" href="{{ route('admin.clients.index') }}"><span
                                class="ml-1 item-text">كل العملاء</span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link pl-3" href="{{ route('admin.clients.create') }}"><span
                                class="ml-1 item-text">إضــافة عميل جديد</span></a>
                    </li>
                </ul>
            </li>
            <li class="nav-item dropdown">
                <a href="#offers" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle nav-link">
                    <i class="fe fe-tag fe-16"></i>
                    <span class="ml-3 item-text">العروض</span>
                </a>
                <ul class="collapse list-unstyled pl-4 w-100" id="offers">
                    <li class="nav-item">
                        <a class="nav-link pl-3" href="{{ route('admin.offers.index') }}"><span
                                class="ml-1 item-text">كل
                                العروض</span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link pl-3" href="{{ route('admin.offers.create') }}"><span
                                class="ml-1 item-text">اضافة عرض
                                جديد</span></a>
                    </li>
                </ul>
            </li>
            <li class="nav-item dropdown">
                <a href="#subscriptions" data-toggle="collapse" aria-expanded="false"
                    class="dropdown-toggle nav-link">
                    <i class="fe fe-sliders fe-16"></i>
                    <span class="ml-3 item-text">الاشتراكات</span>
                </a>
                <ul class="collapse list-unstyled pl-4 w-100" id="subscriptions">
                    <li class="nav-item">
                        <a class="nav-link pl-3" href="{{ route('admin.subscriptions.index') }}"><span
                                class="ml-1 item-text">كل
                                الاشتراكات</span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link pl-3" href="{{ route('admin.subscriptions.create') }}"><span
                                class="ml-1 item-text">اضافة
                                اشتراك
                                جديد</span></a>
                    </li>
                </ul>
            </li>
            <li class="nav-item dropdown">
                <a href="#programs" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle nav-link">
                    <i class="fe fe-star fe-16"></i>
                    <span class="ml-3 item-text">البرامج</span>
                </a>
                <ul class="collapse list-unstyled pl-4 w-100" id="programs">
                    <li class="nav-item">
                        <a class="nav-link pl-3" href="#"><span class="ml-1 item-text">كل البرامج</span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link pl-3" href="#"><span class="ml-1 item-text">اضافة برنامج
                                جديد</span></a>
                    </li>
                </ul>
            </li>
            <li class="nav-item dropdown">
                <a href="#reports" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle nav-link">
                    <i class="fe fe-pie-chart fe-16"></i>
                    <span class="ml-3 item-text">التقارير</span>
                </a>
                <ul class="collapse list-unstyled pl-4 w-100" id="reports">
                    <li class="nav-item">
                        <a class="nav-link pl-3" href="#"><span class="ml-1 item-text">عرض كل
                                التقارير</span></a>
                    </li>
                </ul>
            </li>
        </ul> --}}
    </nav>
</aside>
