<div class="sidebar" id="sidebar">
    <div class="sidebar-inner slimscroll">
        <div id="sidebar-menu" class="sidebar-menu">
            <ul>
                <li class="{{ request()->is('admin/dashboard*') ? 'active' : '' }}">
                    <a href="{{ route('dashboard') }}"><i class="fe fe-home"></i> <span>Trang chủ</span></a>
                </li>
                <li class="{{ request()->is('admin/contact*') ? 'active' : '' }}">
                    <a href="{{ route('admin.contact') }}"><i class="fe fe-mail"></i> <span>Mail của khách hàng</span></a>
                </li>
                <li class="{{ request()->is('user*') ? 'active' : '' }}">
                    <a href="{{ route('user.index') }}"><i class="fe fe-layout"></i> <span>Quản lý user</span></a>
                </li>
                <li class="{{ request()->is('course*') ? 'active' : '' }}">
                    <a href="{{ route('course.index') }}"><i class="fe fe-layout"></i> <span>Quản lý courses</span></a>
                </li>
                <li class="submenu">
                    <a href="#"><i class="fe fe-users"></i> <span> Tài khoản </span> <span class="menu-arrow"></span></a>
                    <ul style="display: none;">
                        <li><a href="users.html">Tài khoản quản trị</a></li>
                        <li><a href="blocked-users.html">Quản lý quyền hạn</a></li>
                    </ul>
                </li>
                <li class="submenu">
                    <a href="#"><i class="fe fe-gear"></i> <span> Cài đặt chung </span> <span class="menu-arrow"></span></a>
                    <ul style="display: none;">
                        <li><a href="general.html">Thông tin chung</a></li>
                        <li><a href="admob.html"> </a></li>
                        <li><a href="sinch-settings.html">Sinch Settings </a></li>
                        <li><a href="firebase-settings.html">Firebase Settings </a></li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
</div>
