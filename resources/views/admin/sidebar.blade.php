<div class="side-nav">
    <div class="side-nav-inner">
        <ul class="side-nav-menu scrollable">
            <li class="nav-item ">
                <a class="" href="#">
                    <h6 class="mb-0">Thống kê</h6>
                </a>
            </li>
            <li class="nav-item dropdown statistic-group">
                <a class="dropdown-toggle statistic-overview" href="{{ route('admin.statistic.overview') }}">
                    <span class="icon-holder">
                        <i class="anticon anticon-dashboard"></i>
                    </span>
                    <span class="title">Tổng quan</span>
                </a>
            </li>
            <li class="nav-item dropdown statistic-group">
                <a class="dropdown-toggle statistic-product" href="{{ route('admin.statistic.product') }}">
                    <span class="icon-holder">
                        <i class="anticon anticon-exception"></i>
                    </span>
                    <span class="title">Sản phẩm</span>
                </a>
            </li>
            <li class="nav-item ">
                <a class="" href="#">
                    <h6 class="mb-0">Quản lí chung</h6>
                </a>
            </li>
            <li class="nav-item dropdown category-group">
                <a class="dropdown-toggle category" href="{{ route('admin.category.index') }}">
                    <span class="icon-holder">
                        <i class="anticon anticon-gateway"></i>
                    </span>
                    <span class="title">Danh mục</span>
                </a>
            </li>
            <li class="nav-item dropdown supplier-group">
                <a class="dropdown-toggle supplier" href="{{ route('admin.supplier.index') }}">
                    <span class="icon-holder">
                        <i class="anticon anticon-team"></i>
                    </span>
                    <span class="title">Nhà cung cấp</span>
                </a>
            </li>
            <li class="nav-item dropdown branch-group">
                <a class="dropdown-toggle branch" href="{{ route('admin.branch.index') }}">
                    <span class="icon-holder">
                        <i class="anticon anticon-bank"></i>
                    </span>
                    <span class="title">Chi nhánh</span>
                </a>
            </li>
            <li class="nav-item dropdown product-group">
                <a class="dropdown-toggle product" href="{{ route('admin.product.index') }}">
                    <span class="icon-holder">
                        <i class="anticon anticon-shopping-cart"></i>
                    </span>
                    <span class="title">Sản phẩm</span>
                </a>
            </li>
            <li class="nav-item dropdown discount-group">
                <a class="dropdown-toggle discount" href="{{ route('admin.discount.index') }}">
                    <span class="icon-holder">
                        <i class="anticon anticon-tag"></i>
                    </span>
                    <span class="title">Giảm giá</span>
                </a>
            </li>
            <li class="nav-item dropdown voucher-group">
                <a class="dropdown-toggle voucher" href="{{ route('admin.voucher.index') }}">
                    <span class="icon-holder">
                        <i class="anticon anticon-gift"></i>
                    </span>
                    <span class="title">Mã giảm giá</span>
                </a>
            </li>
            <li class="nav-item ">
                <a class="" href="#">
                    <h6 class="mb-0">Hệ thống</h6>
                </a>
            </li>
            <li class="nav-item dropdown warehouse-group">
                <a class="dropdown-toggle warehouse" href="{{ route('admin.warehouse.index') }}">
                    <span class="icon-holder">
                        <i class="anticon anticon-database"></i>
                    </span>
                    <span class="title">Kho hàng</span>
                </a>
            </li>
            <li class="nav-item dropdown order-group">
                <a class="dropdown-toggle order" href="{{ route('admin.order.index') }}">
                    <span class="icon-holder">
                        <i class="anticon anticon-profile"></i>
                    </span>
                    <span class="title">Đơn hàng</span>
                </a>
            </li>
            <li class="nav-item dropdown customer-group">
                <a class="dropdown-toggle customer" href="{{ route('admin.customer.index') }}">
                    <span class="icon-holder">
                        <i class="anticon anticon-user"></i>
                    </span>
                    <span class="title">Khách hàng</span>
                </a>
            </li>
            <li class="nav-item ">
                <a class="" href="#">
                    <h6 class="mb-0">Nhân sự</h6>
                </a>
            </li>
            <li class="nav-item dropdown staff-group">
                <a class="dropdown-toggle staff" href="{{ route('admin.staff.index') }}">
                    <span class="icon-holder">
                        <i class="anticon anticon-idcard"></i>
                    </span>
                    <span class="title">Nhân viên</span>
                </a>
            </li>
            <li class="nav-item dropdown permission-group">
                <a class="dropdown-toggle permission" href="{{ route('admin.role.index') }}">
                    <span class="icon-holder">
                        <i class="anticon anticon-safety"></i>
                    </span>
                    <span class="title">Vai trò</span>
                </a>
            </li>
        </ul>
    </div>
</div>