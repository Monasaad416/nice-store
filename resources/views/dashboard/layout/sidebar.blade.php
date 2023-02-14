  <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{route('admin.dashboard.index')}}">
                <div class="sidebar-brand-icon rotate-n-15">
                    <i class="fas fa-laugh-wink"></i>
                </div>
                <div class="sidebar-brand-text mx-3">{{config('app.name')}}</div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item active">
                <a class="nav-link" href="{{route('admin.dashboard.index')}}">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Dashboard</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading">
                Interface
            </div>

            <!-- Nav Item - Pages Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo"
                    aria-expanded="true" aria-controls="collapseTwo">
                    <i class="fas fa-fw fa-cog"></i>
                    <span>Components</span>
                </a>
                <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Custom Components:</h6>
                        <a class="collapse-item" href="buttons.html">Buttons</a>
                        <a class="collapse-item" href="cards.html">Cards</a>
                    </div>
                </div>
            </li>

            <!-- Nav Item - Utilities Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities"
                    aria-expanded="true" aria-controls="collapseUtilities">
                    <i class="fas fa-fw fa-wrench"></i>
                    <span>Utilities</span>
                </a>
                <div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities"
                    data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Custom Utilities:</h6>
                        <a class="collapse-item" href="utilities-color.html">Colors</a>
                        <a class="collapse-item" href="utilities-border.html">Borders</a>
                        <a class="collapse-item" href="utilities-animation.html">Animations</a>
                        <a class="collapse-item" href="utilities-other.html">Other</a>
                    </div>
                </div>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading">
                Addons
            </div>

            <!-- Nav Item - Pages Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#categories"
                    aria-expanded="true" aria-controls="categories">
                    <i class="fas fa-list"></i>
                    <span>Categories</span>
                </a>
                <div id="categories" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
                  <div class="bg-white py-2 collapse-inner rounded">
                    <a class="collapse-item" href="{{route('admin.dashboard.categories.index')}}">List Of Categories</a>
                    <a class="collapse-item" href="{{route('admin.dashboard.categories.create')}}">Add Category</a>
                  </div>
                </div>
            </li>

            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#products"
                    aria-expanded="true" aria-controls="products">
                    <i class="fab fa-product-hunt"></i>
                    <span>Products</span>
                </a>
                <div id="products" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
                  <div class="bg-white py-2 collapse-inner rounded">
                    @auth('admin')
                        <a class="collapse-item" href="{{route('admin.dashboard.products.index')}}">List Of Products</a>
                        <a class="collapse-item" href="{{route('admin.dashboard.products.create')}}">Add Product</a>
                    @endauth
                    @auth('store')
                        <a class="collapse-item" href="{{route('store.dashboard.products.index')}}">List Of Products</a>
                        <a class="collapse-item" href="{{route('store.dashboard.products.create')}}">Add Product</a>
                    @endauth

                  </div>
                </div>
            </li>

                <li class="nav-item">
                {{-- <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#products"
                    aria-expanded="true" aria-controls="products">
                    <i class="fab fa-product-hunt"></i>
                    <span>Products</span>
                </a>
                <div id="products" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
                  <div class="bg-white py-2 collapse-inner rounded">
                    @auth('admin')
                        <a class="collapse-item" href="{{route('admin.dashboard.products.index')}}">List Of Products</a>
                        <a class="collapse-item" href="{{route('admin.dashboard.products.create')}}">Add Product</a>
                    @endauth
                    @auth('store')
                        <a class="collapse-item" href="{{route('store.dashboard.products.index')}}">List Of Products</a>
                        <a class="collapse-item" href="{{route('store.dashboard.products.create')}}">Add Product</a>
                    @endauth

                  </div>
                </div> --}}
                settings
            </li>

            <!-- Nav Item - Charts -->
            <li class="nav-item">
                <a class="nav-link" href="charts.html">
                    <i class="fas fa-fw fa-chart-area"></i>
                    <span>Charts</span></a>
            </li>

            <!-- Nav Item - Tables -->
            <li class="nav-item">
                <a class="nav-link" href="tables.html">
                    <i class="fas fa-fw fa-table"></i>
                    <span>Tables</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider d-none d-md-block">

            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>

            <!-- Sidebar Message -->
            <div class="sidebar-card d-none d-lg-flex">
                <img class="sidebar-card-illustration mb-2" src="{{asset('web/assets/img/undraw_rocket.svg')}}" alt="...">
                <p class="text-center mb-2"><strong>SB Admi Pro</strong> is packed with premium features, components, and more!</p>
                <a class="btn btn-success btn-sm" href="https://startbootstrap.com/theme/sb-admin-pro">Upgrade to Pro!</a>
            </div>

        </ul>
