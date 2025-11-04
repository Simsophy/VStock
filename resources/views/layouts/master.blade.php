<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('page_title', 'Admin Dashboard')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <style>
        body { background-color: #f0f2f5; }
        #sidebar { width: 250px; background-color: #343a40; color: #fff; height: 100vh; position: fixed; top: 0; left: 0; padding-top: 1rem; transition: all 0.3s; }
        #sidebar .list-group-item { background-color: #343a40; color: #adb5bd; border: none; }
        #sidebar .list-group-item.active { background-color: #495057; color: #fff; border-left: 3px solid #0d6efd; }
        #main-content { margin-left: 250px; padding: 2rem; transition: all 0.3s; }
        .card { border-radius: 0.75rem; box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1); }
        .navbar { border-bottom: 1px solid #dee2e6; }
    </style>
</head>
<body>

   @include('layouts.sidebar')

    <div id="main-content">
        <!-- Navbar -->
        <nav class="navbar navbar-expand-lg navbar-light bg-white rounded-3 shadow-sm mb-4">
            <div class="container-fluid">
                <!-- Mobile toggle -->
                <button class="btn btn-primary d-md-none" type="button">
                    <i class="bi bi-list"></i>
                </button>

                <!-- Mobile brand -->
                <a class="navbar-brand d-md-none" href="#">@yield('page_title', 'Admin Dashboard')</a>

                <div class="collapse navbar-collapse" id="navbarNav">
                     <ul class="navbar-nav ms-auto">
                        @auth
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle d-flex align-items-center" href="#" id="userDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                <span class="me-2">{{ Auth::user()->name }}</span>
                                <!-- <img src="https://via.placeholder.com/30" alt="" class="rounded-circle" style="width: 30px; height: 30px;"> -->
                            </a>

                       <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="userDropdown">
                             
                                <li>
                                    <a class="dropdown-item" href="{{ route('user.edit', Auth::user()->uuid) }}">
                                        <i class="bi bi-person-circle me-2"></i> Profile
                                    </a>
                                </li>

                                
                                <li>
                                    <a class="dropdown-item" href="#">
                                        <i class="bi bi-key me-2"></i> Reset Password
                                    </a>
                                </li>

                                <li><hr class="dropdown-divider"></li>

                               
                                <li>
                                    <a class="dropdown-item" href="{{ route('admin.logout') }}"
                                       onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                        <i class="bi bi-box-arrow-right me-2"></i> Logout
                                    </a>
                                </li>
                                <form id="logout-form" action="{{ route('admin.logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                            </ul> 
                        </li>
                        @endauth
                    </ul> 
                </div>
            </div>
        </nav>

        <!-- Main Content -->
        @yield('content')

    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
