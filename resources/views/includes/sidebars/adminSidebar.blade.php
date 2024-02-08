 <!-- Sidebar Start -->
 <div class="sidebar pe-4 pb-3">
    <nav class="navbar bg-secondary navbar-dark">
        <a href="{{ route('dashboard') }}" class="navbar-brand mx-4 mb-3">
            <h3 class="text-primary"><i class="fa fa-user-edit me-2"></i>DarkPan</h3>
        </a>
        <div class="d-flex align-items-center ms-4 mb-4">
            <div class="position-relative">
                <img class="rounded-circle" src="{{ asset('admin/img/user.jpg') }}" alt=""
                    style="width: 40px; height: 40px;">
                <div
                    class="bg-success rounded-circle border border-2 border-white position-absolute end-0 bottom-0 p-1">
                </div>
            </div>
            <div class="ms-3">
                <h6 class="mb-0"> {{ Auth::user()->name }}</h6>
                <span>Admin</span>
            </div>
        </div>
        <div class="navbar-nav w-100">
            <a href="{{ route('dashboard') }}" class="nav-item nav-link active"><i
                    class="fa fa-tachometer-alt me-2"></i>Dashboard</a>
            <div class="nav-item dropdown">
                <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown"><i
                        class="fa fa-laptop me-2"></i>Site langs
                    <span class="badge badge badge-info badge-pill float-right mr-2">
                        {{ App\Models\Language::active()->count() }}
                    </span>
                </a>
                <div class="dropdown-menu bg-transparent border-0">
                    <a href={{ route('languages.show') }} class="dropdown-item">
                       Show All Langs 
                    </a>
                    <a href="{{ route('languages.add') }}" class="dropdown-item">Add New Lang</a>
                </div>
            </div>

            <div class="nav-item dropdown">
                <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown"><i
                        class="fa fa-laptop me-2"></i> All Categories
                    <span class="badge badge badge-info badge-pill float-right mr-2">
                        {{ DefaultMainCategory()->count() }}
                    </span>
                </a>
                <div class="dropdown-menu bg-transparent border-0">
                    <a href="{{ route('MainCategory.show') }}" class="dropdown-item">Show All Categories</a>
                    <a href="{{ route('MainCategory.add') }}" class="dropdown-item">Add New Category</a>
                </div>
            </div>

            <div class="nav-item dropdown">
                <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown"><i
                        class="fa fa-laptop me-2"></i> All Vendors
                    <span class="badge badge badge-info badge-pill float-right mr-2">
                        {{ DefaultMainCategory()->count() }}
                    </span>
                </a>
                <div class="dropdown-menu bg-transparent border-0">
                    <a href="" class="dropdown-item">Show All Vendors</a>
                    <a href="" class="dropdown-item">Add New Vendor</a>
                </div>
            </div>

            <a href="form.html" class="nav-item nav-link"><i class="fa fa-keyboard me-2"></i>Forms</a>
            <a href="table.html" class="nav-item nav-link"><i class="fa fa-table me-2"></i>Tables</a>
            <a href="chart.html" class="nav-item nav-link"><i class="fa fa-chart-bar me-2"></i>Charts</a>
            <div class="nav-item dropdown">
                <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown"><i
                        class="far fa-file-alt me-2"></i>Pages</a>
                <div class="dropdown-menu bg-transparent border-0">
                    <a href="signin.html" class="dropdown-item">Sign In</a>
                    <a href="signup.html" class="dropdown-item">Sign Up</a>
                    <a href="404.html" class="dropdown-item">404 Error</a>
                    <a href="blank.html" class="dropdown-item">Blank Page</a>
                </div>
            </div>
        </div>
    </nav>
</div>
<!-- Sidebar End -->