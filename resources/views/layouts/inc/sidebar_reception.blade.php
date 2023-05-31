<aside class="sidebar-left border-right bg-white shadow" id="leftSidebar" data-simplebar>
    <a href="#" class="btn collapseSidebar toggle-btn d-lg-none text-muted ml-2 mt-3" data-toggle="toggle">
        <i class="fe fe-x"><span class="sr-only"></span></i>
    </a>
    <nav class="vertnav navbar navbar-light">
        <!-- nav bar -->
        <div class="w-100 mb-4 d-flex">
            <a class="navbar-brand mx-auto mt-2 flex-fill text-center" href="{{ route('dashboard') }}">
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
                <a href="#employees" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle nav-link">
                    <i class="fe fe-user-check fe-16"></i>
                    <span class="ml-3 item-text">الموظفين</span>
                </a>
                <ul class="collapse list-unstyled pl-4 w-100" id="employees">
                    <li class="nav-item">
                        <a class="nav-link pl-3" href="{{ route('reception.employees.hr_empAttend.index') }}"><span
                                class="ml-1 item-text">الحضور والانصراف</span></a>
                    </li>
                </ul>
            </li>
            <li class="nav-item dropdown">
                <a href="#services" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle nav-link">
                    <i class="fe fe-server fe-16"></i>
                    <span class="ml-3 item-text">حجز</span>
                </a>
                <ul class="collapse list-unstyled pl-4 w-100" id="services">
                    <li class="nav-item">
                        <a class="nav-link pl-3" href="{{ route('reception.reservations.index') }}"><span
                                class="ml-1 item-text">عرض الحجوزات</span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link pl-3" href="{{ route('reception.reservations.create') }}"><span
                                class="ml-1 item-text"> اضافة حجز</span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link pl-3" href="{{ route('reception.reservations.search_reservation') }}"><span
                                class="ml-1 item-text">تشغيل عميل</span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link pl-3" href="{{ route('reception.implementations.index') }}"><span
                                class="ml-1 item-text">عرض كل التشغيلات</span></a>
                    </li>
                    {{-- <li class="nav-item">
                        <a class="nav-link pl-3" href="{{ route('admin.services.create') }}"><span
                                class="ml-1 item-text">تشغيل عروسة</span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link pl-3" href="{{ route('admin.services.create') }}"><span
                                class="ml-1 item-text">تشغيل عريس</span></a>
                    </li> --}}
                </ul>
            </li>
            <li class="nav-item dropdown">
                <a href="#products" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle nav-link">
                    <i class="fe fe-grid fe-16"></i>
                    <span class="ml-3 item-text">مصروفات</span>
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
        </ul>
    </nav>
</aside>
