<div class="sidebar" id="sidebar">
    <div class="sidebar-inner slimscroll">
        <div id="sidebar-menu" class="sidebar-menu">
            <ul>

                <li class="active">
                    <a href="{{ route('home') }}"><i class="fe fe-home"></i> <span>Trang chủ</span></a>
                </li>
                <li class="submenu">
                    <a href="#"><i class="fe fe-users"></i> <span> Tài khoản </span> <span
                            class="menu-arrow"></span></a>
                    <ul style="display: none;">
                        <li>   <a href="{{ route('user.edit', ['user' => Auth()->user()->id]) }}"
                                                          >
                                                         Cài đặt tài khoản
                                                        </a></li>
                    </ul>
                </li>
                <li >
                    <a href="{{ route('home') }}"><i class="fe fe-facebook"></i> <span>Facebook</span></a>
                </li>
                <li>
                    <a href="{{ route('home') }}"><i class="fe fe-instagram"></i> <span>Instagram</span></a>
                </li>
                <li>
                    <a href="{{ route('home') }}"><i class="fe fe-twitter"></i> <span>Twitter</span></a>
                </li>
            </ul>
        </div>
    </div>
</div>
