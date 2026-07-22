<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Admin · one2FLY!')</title>
    <meta name="description" content="@yield('meta_description', 'Bảng quản trị one2FLY! — giao diện admin gọn, table-first, render client side.')">

    <link rel="shortcut icon" href="{{ asset('vendor/enlink/assets/images/logo/logo-fold.png') }}">
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="{{ asset('vendor/enlink/assets/css/app.min.css') }}" rel="stylesheet">
    <link href="{{ asset('vendor/enlink/assets/vendors/datatables/dataTables.bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/admin.css') }}" rel="stylesheet">
    @stack('head')
</head>
<body class="admin-body">
    @php
        $contentKeys = ['destinations', 'explore', 'issues', 'food-regions', 'articles', 'offers'];
        $contentOpen = in_array($activeNav ?? '', $contentKeys, true);
    @endphp

    <div class="app">
        <div class="layout">
            <div class="header">
                <div class="logo logo-dark">
                    <a href="{{ route('admin.dashboard') }}" class="admin-logo-link">
                        <img src="{{ asset('vendor/enlink/assets/images/logo/logo.png') }}" alt="Logo">
                        <img class="logo-fold" src="{{ asset('vendor/enlink/assets/images/logo/logo-fold.png') }}" alt="Logo">
                    </a>
                </div>
                <div class="logo logo-white">
                    <a href="{{ route('admin.dashboard') }}" class="admin-logo-link">
                        <img src="{{ asset('vendor/enlink/assets/images/logo/logo-white.png') }}" alt="Logo">
                        <img class="logo-fold" src="{{ asset('vendor/enlink/assets/images/logo/logo-fold-white.png') }}" alt="Logo">
                    </a>
                </div>
                <div class="nav-wrap">
                    <ul class="nav-left">
                        <li class="desktop-toggle">
                            <a href="javascript:void(0);" id="admin-desktop-toggle">
                                <i class="anticon"></i>
                            </a>
                        </li>
                        <li class="mobile-toggle">
                            <a href="javascript:void(0);" id="admin-mobile-toggle">
                                <i class="anticon"></i>
                            </a>
                        </li>
                        <li>
                            <a href="javascript:void(0);">
                                <i class="anticon anticon-search"></i>
                            </a>
                        </li>
                    </ul>
                    <ul class="nav-right">
                        <li class="dropdown dropdown-animated scale-left">
                            <a href="javascript:void(0);">
                                <i class="anticon anticon-bell notification-badge"></i>
                            </a>
                        </li>
                        <li class="dropdown dropdown-animated scale-left">
                            <div class="pointer">
                                <div class="avatar avatar-image m-h-10 m-r-15">
                                    <img src="{{ asset('vendor/enlink/assets/images/avatars/thumb-3.jpg') }}" alt="">
                                </div>
                            </div>
                        </li>
                        <li>
                            <a href="javascript:void(0);">
                                <i class="anticon anticon-appstore"></i>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>

            <div class="side-nav">
                <div class="side-nav-inner">
                    <ul class="side-nav-menu scrollable">
                        <li class="nav-item {{ ($activeNav ?? '') === 'dashboard' ? 'active' : '' }}">
                            <a href="{{ route('admin.dashboard') }}">
                                <span class="icon-holder">
                                    <i class="anticon anticon-dashboard"></i>
                                </span>
                                <span class="title">Dashboard</span>
                            </a>
                        </li>

                        <li class="nav-item dropdown {{ $contentOpen ? 'open' : '' }}">
                            <a class="dropdown-toggle" href="javascript:void(0);">
                                <span class="icon-holder">
                                    <i class="anticon anticon-appstore"></i>
                                </span>
                                <span class="title">Nội dung</span>
                                <span class="arrow">
                                    <i class="arrow-icon"></i>
                                </span>
                            </a>
                            <ul class="dropdown-menu">
                                <li class="{{ ($activeNav ?? '') === 'articles' ? 'active' : '' }}">
                                    <a href="{{ route('admin.articles') }}">Bài viết</a>
                                </li>
                                <li class="{{ ($activeNav ?? '') === 'destinations' ? 'active' : '' }}">
                                    <a href="{{ route('admin.destinations') }}">Điểm đến</a>
                                </li>
                                <li class="{{ ($activeNav ?? '') === 'explore' ? 'active' : '' }}">
                                    <a href="{{ route('admin.explore') }}">Khám phá</a>
                                </li>
                                <li class="{{ ($activeNav ?? '') === 'issues' ? 'active' : '' }}">
                                    <a href="{{ route('admin.issues') }}">Ấn phẩm số</a>
                                </li>
                                <li class="{{ ($activeNav ?? '') === 'food-regions' ? 'active' : '' }}">
                                    <a href="{{ route('admin.food-regions') }}">Ẩm thực vùng miền</a>
                                </li>
                                <li class="{{ ($activeNav ?? '') === 'offers' ? 'active' : '' }}">
                                    <a href="{{ route('admin.offers') }}">Ưu đãi</a>
                                </li>
                            </ul>
                        </li>

                        <li class="nav-item">
                            <a href="javascript:void(0);">
                                <span class="icon-holder">
                                    <i class="anticon anticon-file"></i>
                                </span>
                                <span class="title">Trang</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="javascript:void(0);">
                                <span class="icon-holder">
                                    <i class="anticon anticon-picture"></i>
                                </span>
                                <span class="title">Media</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="javascript:void(0);">
                                <span class="icon-holder">
                                    <i class="anticon anticon-message"></i>
                                </span>
                                <span class="title">Bình luận</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="javascript:void(0);">
                                <span class="icon-holder">
                                    <i class="anticon anticon-skin"></i>
                                </span>
                                <span class="title">Giao diện</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="javascript:void(0);">
                                <span class="icon-holder">
                                    <i class="anticon anticon-appstore-add"></i>
                                </span>
                                <span class="title">Plugin / Module</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="javascript:void(0);">
                                <span class="icon-holder">
                                    <i class="anticon anticon-team"></i>
                                </span>
                                <span class="title">Người dùng</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="javascript:void(0);">
                                <span class="icon-holder">
                                    <i class="anticon anticon-setting"></i>
                                </span>
                                <span class="title">Cài đặt</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>

            <div class="page-container">
                <div class="main-content">
                    @yield('content')
                </div>

                <footer class="footer">
                    <div class="footer-content">
                        <p class="m-b-0">Copyright © {{ date('Y') }} one2FLY. All rights reserved.</p>
                        <span>
                            <a href="javascript:void(0);" class="text-gray m-r-15">Client-side Rendered</a>
                            <a href="javascript:void(0);" class="text-gray">Laravel Admin</a>
                        </span>
                    </div>
                </footer>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <script src="{{ asset('vendor/enlink/assets/js/vendors.min.js') }}"></script>
    <script src="{{ asset('vendor/enlink/assets/js/app.min.js') }}"></script>
    <script src="{{ asset('vendor/enlink/assets/vendors/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('vendor/enlink/assets/vendors/datatables/dataTables.bootstrap.min.js') }}"></script>
    <script src="{{ asset('js/api.js') }}"></script>
    <script src="{{ asset('js/admin-datatable.js') }}"></script>
    <script>
        (function () {
            var layout = document.querySelector(".layout");
            var deskToggle = document.getElementById("admin-desktop-toggle");
            var mobToggle = document.getElementById("admin-mobile-toggle");

            if (deskToggle && layout) {
                deskToggle.addEventListener("click", function () {
                    layout.classList.toggle("is-folded");
                });
            }

            if (mobToggle && layout) {
                mobToggle.addEventListener("click", function () {
                    layout.classList.toggle("is-expand");
                });
            }
        })();
    </script>
    @stack('scripts')
</body>
</html>
