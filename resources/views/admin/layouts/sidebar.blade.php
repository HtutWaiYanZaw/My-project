<div id="layoutSidenav_nav">
    <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
        <div class="sb-sidenav-menu">
            <div class="nav">
                <!-- Get Started -->
                <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#get-started" aria-expanded="false" aria-controls="collapseLayouts">
                    <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                    Get Started
                    <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                </a>
                <div class="collapse" id="get-started" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                    <nav class="sb-sidenav-menu-nested nav">
                        <a class="nav-link" href="{{ url('admin/page1') }}">Page 1</a>
                        <a class="nav-link" href="{{ url('admin/page2') }}">Page 2</a>
                    </nav>
                </div>

                <!-- Routing -->
                <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#routing" aria-expanded="false" aria-controls="collapseLayouts">
                    <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                    Routing
                    <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                </a>
                <div class="collapse" id="routing" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                    <nav class="sb-sidenav-menu-nested nav">
                        <a class="nav-link" href="{{ url('admin/routing/view-only') }}">View Only</a>
                        <a class="nav-link" href="{{ url('admin/routing/pass-data-to-view') }}">Pass Data To View</a>
                        <a class="nav-link" href="{{ url('admin/routing/route-para/tomato/white') }}">Route Para</a>
                        <a class="nav-link" href="{{ url('admin/routing/dynamic-route-para') }}">Dynamic Route Para</a>
                        <a class="nav-link" href="{{ url('admin/routing/named-route') }}">Named Route</a>
                        <a class="nav-link" href="{{ url('admin/routing/middleware') }}">Middleware</a>
                        <a class="nav-link" href="{{ url('/admin/routing/regular-expression') }}">Regular Expression</a>
                    </nav>
                </div>

                 <!-- CSRF -->
                <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#csrf" aria-expanded="false" aria-controls="collapseLayouts">
                    <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                    CSRF
                    <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                </a>
                <div class="collapse" id="csrf" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                    <nav class="sb-sidenav-menu-nested nav">
                        <a class="nav-link" href="{{ url('admin/csrf/lecture1') }}">Lecture 1</a>
                        <a class="nav-link" href="{{ url('admin/csrf/lecture2') }}">Lecture 2</a>
                        <a class="nav-link" href="{{ url('admin/csrf/lecture3') }}">Lecture 3</a>
                    </nav>
                </div>

                 <!-- SESSION -->
                 <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#session" aria-expanded="false" aria-controls="collapseLayouts">
                    <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                    Session
                    <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                </a>
                <div class="collapse" id="session" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                    <nav class="sb-sidenav-menu-nested nav">
                        <a class="nav-link" href="{{ url('admin/session/get') }}">Get</a>
                        <a class="nav-link" href="{{ url('admin/session/put') }}">Put</a>
                        <a class="nav-link" href="{{ url('admin/session/flash') }}">Flash</a>
                        <a class="nav-link" href="{{ url('admin/session/delete') }}">Delete</a>
                        <a class="nav-link" href="{{ url('admin/session/ajax') }}">Ajax</a>
                    </nav>
                </div>

                <!-- Blade Template -->
                <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#blade-template" aria-expanded="false" aria-controls="collapseLayouts">
                    <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                    Blade Template
                    <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                </a>
                <div class="collapse" id="blade-template" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                    <nav class="sb-sidenav-menu-nested nav">
                        <a class="nav-link" href="{{ url('admin/blade-template/json-string') }}">Json String</a>
                        <a class="nav-link" href="{{ url('admin/blade-template/localization') }}">Localization</a>
                        <a class="nav-link" href="{{ url('admin/blade-template/component') }}">Component</a>
                    </nav>
                </div>

                <!-- Project -->
                <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#project" aria-expanded="false" aria-controls="collapseLayouts">
                    <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                    Project
                    <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                </a>
                <div class="collapse" id="project" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                    <nav class="sb-sidenav-menu-nested nav">
                        <a class="nav-link" href="{{ url('admin/users') }}">Users</a>
                         <a class="nav-link" href="{{ url('admin/customers') }}">Customer</a>
                         <a class="nav-link" href="{{ url('admin/customer_sales') }}">Customer Sale</a>
                        <a class="nav-link" href="{{ url('admin/portfolio-images') }}">Portfolio Images</a>
                    </nav>
                </div>

                <!-- Pos -->
                <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#pos" aria-expanded="false" aria-controls="collapseLayouts">
                    <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                    POS
                    <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                </a>
                <div class="collapse" id="pos" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                    <nav class="sb-sidenav-menu-nested nav">
                        <a class="nav-link" href="{{ url('admin/brands') }}">Brands</a>
                        <a class="nav-link" href="{{ url('admin/categories') }}">Categories</a>
                        <a class="nav-link" href="{{ url('admin/items') }}">Items</a>
                        <a class="nav-link" href="{{ url('admin/sales') }}">Sales</a>
                    </nav>
                </div>
            </div>
        </div>
        <div class="sb-sidenav-footer">
            <div class="small">Logged in as:</div>
            Start Bootstrap
        </div>
    </nav>
</div>
