<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="/" target="_blank" class="brand-link">
        <img src="{{ asset('assets/admin/dist/img/AdminLTELogo.png') }}" alt="AdminLTE Logo"
             class="brand-image img-circle elevation-3"
             style="opacity: .8">
        <span class="brand-text font-weight-light">Перейти на сайт</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            @if(auth()->check())
                {{--<div class="image">
                    <img src="assets/admin/dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
                </div>--}}
                <div class="info">
                    <a href="#" class="d-block">{{auth()->user()->name}}</a>
                </div>
            @endif
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
                     with font-awesome or any other icon font library -->
                <li class="nav-item">
                    <a href="{{ route('admin.dashboard.index') }}" class="nav-link">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>Админ панель</p>
                    </a>
                </li>

                <li class="nav-item has-treeview">
                    <a href="#" class="nav-link">
                        <i class="fas fa-users"></i>
                        <p>
                            Пользователи
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('admin.user.index') }}"
                               class="nav-link{{ request()->is('admin/user') ? ' active' : null }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Все пользователи</p>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="{{ route('admin.user.create') }}"
                               class="nav-link{{ request()->is('admin/user/create') ? ' active' : null }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Добавить пользователя</p>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="{{ route('admin.user_role.index') }}"
                               class="nav-link{{ request()->is('admin/user_role') ? ' active' : null }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Роли пользователей</p>
                            </a>
                        </li>
                    </ul>
                </li>

                {{--<li class="nav-item has-treeview">
                    <a href="#" class="nav-link">
                        <i class="fas fa-sticky-note"></i>
                        <p>
                            Страницы
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('admin.page.index') }}"
                               class="nav-link{{ request()->is('admin/page') ? ' active' : null }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Все страницы</p>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="{{ route('admin.page.create') }}"
                               class="nav-link{{ request()->is('admin/page/create') ? ' active' : null }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Добавить страницу</p>
                            </a>
                        </li>
                    </ul>
                </li>--}}

                {{--<li class="nav-item has-treeview">
                    <a href="#" class="nav-link">
                        <i class="fas fa-blog"></i>
                        <p>
                            Записи
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('admin.post.index') }}"
                               class="nav-link{{ request()->is('admin/post') ? ' active' : null }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Все записи</p>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="{{ route('admin.post.create') }}"
                               class="nav-link{{ request()->is('admin/post/create') ? ' active' : null }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Добавить запись</p>
                            </a>
                        </li>
                    </ul>
                </li>--}}



                <li class="nav-item has-treeview">
                    <a href="#" class="nav-link">
                        <i class="fas fa-project-diagram"></i>
                        <p>
                            Роли
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('admin.role.index') }}"
                               class="nav-link{{ request()->is('admin/user') ? ' active' : null }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Все роли</p>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="{{ route('admin.role.create') }}"
                               class="nav-link{{ request()->is('admin/user/create') ? ' active' : null }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Добавить роль</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a href="{{ route('admin.permission.index') }}" class="nav-link">
                        <i class="fas fa-drum"></i>
                        <p>Разрешения</p>
                    </a>
                </li>

                <li class="nav-item has-treeview">
                    <a href="#" class="nav-link">
                        <i class="fas fa-cogs"></i>
                        <p>Настройки
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="" class="nav-link">
                                <i class="fas fa-network-wired"></i>
                                <p>=========</p>
                            </a>
                        </li>
                    </ul>
                </li>
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
