<aside id="sidebar-left" class="sidebar-left">

    <div class="sidebar-header">
        <div class="sidebar-title">
            Navigation
        </div>
        <div class="sidebar-toggle d-none d-md-block" data-toggle-class="sidebar-left-collapsed" data-target="html" data-fire-event="sidebar-left-toggle">
            <i class="fas fa-bars" aria-label="Toggle sidebar"></i>
        </div>
    </div>

    <div class="nano">
        <div class="nano-content">
            <nav id="menu" class="nav-main" role="navigation">
                <ul class="nav nav-main">
                    <li>
                        <a class="nav-link" href="{{ route('dashboard.index') }}">
                            <i class="bx bx-home-alt" aria-hidden="true"></i>
                            <span>Dashboard</span>
                        </a>                        
                    </li>
                    <li class="nav-parent">
                        <a class="nav-link" href="#">
                            <i class="fa fa-wrench" aria-hidden="true"></i>
                            <span>Case Setups</span>
                        </a>
                        <ul class="nav nav-children">
                            <li>
                                <a class="nav-link" href="{{ route('case-setups.index') }}">
                                    Active Cases
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="nav-parent">
                        <a class="nav-link" href="#">
                            <i class="fa fa-list" aria-hidden="true"></i>
                            <span>Products</span>
                        </a>
                        <ul class="nav nav-children">
                            <li>
                                <a class="nav-link" href="{{ route('product-categories.index') }}">
                                    Categories
                                </a>
                            </li>
                            <li>
                                <a class="nav-link" href="{{ route('product-subone-categories.index') }}">
                                    Sub Level One
                                </a>
                            </li>
                            <li>
                                <a class="nav-link" href="{{ route('product-subtwo-categories.index') }}">
                                    Sub Level Two
                                </a>
                            </li>
                            <li>
                                <a class="nav-link" href="{{ route('products.index') }}">
                                    Product List
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="nav-parent">
                        <a class="nav-link" href="#">
                            <i class="fa fa-cog" aria-hidden="true"></i>
                            <span>Utilities</span>
                        </a>
                        <ul class="nav nav-children">
                            <li>
                                <a class="nav-link" href="{{ route('agents.index') }}">
                                    Agents
                                </a>
                            </li>
                            <li>
                                <a class="nav-link" href="{{ route('branches.index') }}">
                                    Branches
                                </a>
                            </li>
                            <li>
                                <a class="nav-link" href="{{ route('hospitals.index') }}">
                                    Hospitals
                                </a>
                            </li>
                            <li>
                                <a class="nav-link" href="{{ route('implant-cases.index') }}">
                                    Loaner Forms
                                </a>
                            </li>
                            <li>
                                <a class="nav-link" href="{{ route('settings.index') }}">
                                    Settings
                                </a>
                            </li>
                            <li>
                                <a class="nav-link" href="{{ route('suppliers.index') }}">
                                    Suppliers
                                </a>
                            </li>
                            <li>
                                <a class="nav-link" href="{{ route('surgeons.index') }}">
                                    Surgeons
                                </a>
                            </li>
                            <li>
                                <a class="nav-link" href="{{ route('users.index') }}">
                                    Users
                                </a>
                            </li>
                            <li>
                                <a class="nav-link" href="{{ route('usertypes.index') }}">
                                    Usertypes
                                </a>
                            </li>
                        </ul>
                    </li>
                </ul>
            </nav>
        </div>

        <script>
            // Maintain Scroll Position
            if (typeof localStorage !== 'undefined') {
                if (localStorage.getItem('sidebar-left-position') !== null) {
                    var initialPosition = localStorage.getItem('sidebar-left-position'),
                        sidebarLeft = document.querySelector('#sidebar-left .nano-content');

                    sidebarLeft.scrollTop = initialPosition;
                }
            }
        </script>

    </div>

</aside>