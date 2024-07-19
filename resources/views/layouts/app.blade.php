<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- HTMX -->
    <script src="https://unpkg.com/htmx.org@1.4.1/dist/htmx.min.js"></script>

    <title>@yield('title', 'Student Management')</title>

    <style>
        /* Custom styles for sidebar */
        .sidebar {
            position: fixed;
            top: 0;
            left: 0;
            height: 100%;
            width: 250px;
            z-index: 100;
            background-color: #f8f9fa;
            padding: 20px 0;
            overflow-y: auto;
        }

        .sidebar-sticky {
            position: relative;
        }

        .sidebar .nav-link {
            padding: 10px 20px;
            font-size: 1rem;
            color: #333;
            border-radius: 5px;
            transition: background-color 0.3s ease;
        }

        .sidebar .nav-link:hover {
            background-color: #e9ecef;
        }

        .sidebar .nav-link.active {
            background-color: #007bff;
            color: #fff;
        }


        .main-content {
            /* margin-left: 250px; */
            padding: 20px;
        }
        .containers{
            margin-top: 50px;
            margin-left: 250px;
            padding: 10px;
        }

        @media (max-width: 768px) {
            .sidebar {
                width: 100%;
                height: auto;
                position: relative;
                padding: 20px 0;
            }

            .main-content {
                margin-left: 0;
            }
        }
    </style>
</head>
<body>
    <div class="container-fluid">
        <div class="row">
            <!-- Sidebar -->
            <nav id="sidebar" class="col-md-3 col-lg-2 d-md-block bg-light sidebar">
                <div class="position-sticky">
                    <ul class="nav flex-column">
                        <li class="nav-item">
                            <a class="nav-link {{ Request::is('students*') ? 'active' : '' }}" href="{{ route('students.index') }}">
                                Students
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link {{ Request::is('accounts*') ? 'active' : '' }}" href="{{ route('accounts.index') }}">
                                Accounts
                            </a>
                        </li>
                        <!-- Add more sidebar items as needed -->
                    </ul>
                </div>
            </nav>

            <!-- Page content -->
            <main class="main-content">
                @yield('content')
            </main>
        </div>
    </div>



    <!-- Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
