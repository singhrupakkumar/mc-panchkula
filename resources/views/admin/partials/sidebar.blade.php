<nav class="sidebar sidebar-offcanvas" id="sidebar">
    <ul class="nav">
        <li class="nav-item">
            <a class="nav-link" href="{{ route('admin.dashboard') }}">
                <i class="icon-grid menu-icon"></i>
                <span class="menu-title">Dashboard</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{ route('admin.users.index') }}">
                <i class="icon-layout menu-icon"></i>
                <span class="menu-title">Users</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{ route('admin.category.index') }}">
                <i class="icon-layout menu-icon"></i>
                <span class="menu-title">Categories</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{ route('admin.product.index') }}">
                <i class="icon-layout menu-icon"></i>
                <span class="menu-title">Product</span>
            </a>
        </li>

        <li class="nav-items">
            <a class="nav-link" href="javascript:void(0)">
                <i class="icon-layout menu-icon"></i>
                <span class="menu-title">Receipt</span>
            </a>
            <ul class="nav">
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('admin.orders.index') }}">
                        <i class="icon-layout menu-icon"></i>
                        <span class="menu-title">Receipt History</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('admin.orders.addRecipts') }}">
                        <i class="icon-layout menu-icon"></i>
                        <span class="menu-title">Add Receipt</span>
                    </a>
                </li>
            </ul>
        </li>
        
        
        
    </ul>
</nav>
