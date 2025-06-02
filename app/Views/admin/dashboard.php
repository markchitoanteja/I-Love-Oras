<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>I❤️Oras - Dashboard</title>

    <link rel="shortcut icon" href="<?= base_url() ?>favicon.ico?v=1.1" type="image/x-icon" />

    <!-- Fonts & Icons -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700&display=fallback">
    <link rel="stylesheet" href="<?= base_url() ?>public/plugins/fontawesome-free/css/all.min.css">

    <!-- AdminLTE CSS -->
    <link rel="stylesheet" href="<?= base_url() ?>public/dist/admin/css/adminlte.min.css">
    <link rel="stylesheet" href="<?= base_url() ?>public/plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
</head>

<body class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper">
        <!-- Preloader -->
        <div class="preloader flex-column justify-content-center align-items-center">
            <img class="animation__shake" src="<?= base_url() ?>public/dist/admin/img/logo.png?v=1.0" alt="Logo" height="60" width="60">
        </div>

        <!-- Navbar -->
        <nav class="main-header navbar navbar-expand navbar-white navbar-light">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" data-widget="pushmenu" href="javascript:void(0)"><i class="fas fa-bars"></i></a>
                </li>
            </ul>

            <ul class="navbar-nav ml-auto">
                <!-- Admin Profile -->
                <li class="nav-item dropdown">
                    <a class="nav-link" data-toggle="dropdown" href="#"><i class="fas fa-user-circle"></i></a>
                    <div class="dropdown-menu dropdown-menu-right">
                        <a href="#" class="dropdown-item"><i class="fas fa-user mr-2"></i> My Profile</a>
                        <a href="#" class="dropdown-item"><i class="fas fa-cog mr-2"></i> Settings</a>
                        <div class="dropdown-divider"></div>
                        <a href="javascript:void(0)" class="dropdown-item logoutBtn"><i class="fas fa-sign-out-alt mr-2"></i> Logout</a>
                    </div>
                </li>
            </ul>
        </nav>

        <!-- Sidebar -->
        <aside class="main-sidebar sidebar-dark-primary elevation-4">
            <a href="#" class="brand-link">
                <img src="<?= base_url() ?>public/dist/admin/img/logo.png?v=1.0" alt="Oras Logo" class="brand-image img-circle elevation-3">
                <span class="brand-text font-weight-bold ml-2">I❤️Oras</span>
            </a>

            <div class="sidebar">
                <!-- User Panel -->
                <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                    <div class="image">
                        <img src="<?= base_url() ?>public/dist/admin/img/uploads/default-user-image.webp" class="img-circle elevation-2" alt="User">
                    </div>
                    <div class="info">
                        <a href="#" class="d-block">Administrator</a>
                    </div>
                </div>

                <!-- Sidebar Menu -->
                <nav class="mt-2">
                    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu">

                        <li class="nav-item">
                            <a href="dashboard.html" class="nav-link active">
                                <i class="nav-icon fas fa-home"></i>
                                <p>Dashboard</p>
                            </a>
                        </li>

                        <li class="nav-header">TOURISM MANAGEMENT</li>

                        <li class="nav-item">
                            <a href="events.html" class="nav-link">
                                <i class="nav-icon fas fa-calendar-check"></i>
                                <p>Events</p>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="spots.html" class="nav-link">
                                <i class="nav-icon fas fa-map-marked-alt"></i>
                                <p>Tourist Spots</p>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="gallery.html" class="nav-link">
                                <i class="nav-icon fas fa-images"></i>
                                <p>Photo Gallery</p>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="users.html" class="nav-link">
                                <i class="nav-icon fas fa-comments"></i>
                                <p>Communication</p>
                            </a>
                        </li>

                        <li class="nav-header">SYSTEM</li>

                        <li class="nav-item">
                            <a href="settings.html" class="nav-link">
                                <i class="nav-icon fas fa-cogs"></i>
                                <p>Settings</p>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="javascript:void(0)" class="nav-link logoutBtn">
                                <i class="nav-icon fas fa-sign-out-alt"></i>
                                <p>Logout</p>
                            </a>
                        </li>

                    </ul>
                </nav>
            </div>
        </aside>

        <!-- Content Wrapper -->
        <div class="content-wrapper">
            <div class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1 class="m-0">Dashboard</h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="#">Home</a></li>
                                <li class="breadcrumb-item active">Dashboard</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Main Dashboard Content -->
            <section class="content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-3 col-6">
                            <div class="small-box bg-info">
                                <div class="inner">
                                    <h3>5</h3>
                                    <p>Upcoming Events</p>
                                </div>
                                <div class="icon">
                                    <i class="fas fa-calendar-day"></i>
                                </div>
                                <a href="events.html" class="small-box-footer">Manage Events <i class="fas fa-arrow-circle-right"></i></a>
                            </div>
                        </div>

                        <div class="col-lg-3 col-6">
                            <div class="small-box bg-success">
                                <div class="inner">
                                    <h3>12</h3>
                                    <p>Tourist Spots</p>
                                </div>
                                <div class="icon">
                                    <i class="fas fa-tree"></i>
                                </div>
                                <a href="spots.html" class="small-box-footer">View Spots <i class="fas fa-arrow-circle-right"></i></a>
                            </div>
                        </div>

                        <div class="col-lg-3 col-6">
                            <div class="small-box bg-warning">
                                <div class="inner">
                                    <h3>28</h3>
                                    <p>Gallery Photos</p>
                                </div>
                                <div class="icon">
                                    <i class="fas fa-image"></i>
                                </div>
                                <a href="gallery.html" class="small-box-footer">Manage Gallery <i class="fas fa-arrow-circle-right"></i></a>
                            </div>
                        </div>

                        <div class="col-lg-3 col-6">
                            <div class="small-box bg-danger">
                                <div class="inner">
                                    <h3>3</h3>
                                    <p>New Messages</p>
                                </div>
                                <div class="icon">
                                    <i class="fas fa-envelope"></i>
                                </div>
                                <a href="users.html" class="small-box-footer">Check Messages <i class="fas fa-arrow-circle-right"></i></a>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <!-- Recent Events -->
                        <div class="col-lg-6">
                            <div class="card">
                                <div class="card-header border-transparent">
                                    <h3 class="card-title">Recent Events</h3>
                                    <div class="card-tools">
                                        <a href="events.html" class="btn btn-tool btn-sm">
                                            <i class="fas fa-list"></i> View All
                                        </a>
                                    </div>
                                </div>
                                <div class="card-body p-0">
                                    <div class="table-responsive">
                                        <table class="table m-0">
                                            <thead>
                                                <tr>
                                                    <th>Event</th>
                                                    <th>Date</th>
                                                    <th>Location</th>
                                                    <th>Status</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td>Oras Fiesta 2025</td>
                                                    <td>July 16, 2025</td>
                                                    <td>Oras Plaza</td>
                                                    <td><span class="badge badge-success">Upcoming</span></td>
                                                </tr>
                                                <tr>
                                                    <td>Beach Cleanup</td>
                                                    <td>June 10, 2025</td>
                                                    <td>Barangay Sabang</td>
                                                    <td><span class="badge badge-warning">Ongoing</span></td>
                                                </tr>
                                                <tr>
                                                    <td>Heritage Talk</td>
                                                    <td>May 15, 2025</td>
                                                    <td>Municipal Hall</td>
                                                    <td><span class="badge badge-secondary">Completed</span></td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Top Tourist Spots -->
                        <div class="col-lg-6">
                            <div class="card">
                                <div class="card-header border-transparent">
                                    <h3 class="card-title">Top Tourist Spots</h3>
                                    <div class="card-tools">
                                        <a href="spots.html" class="btn btn-tool btn-sm">
                                            <i class="fas fa-map"></i> View All
                                        </a>
                                    </div>
                                </div>
                                <div class="card-body p-0">
                                    <table class="table m-0">
                                        <thead>
                                            <tr>
                                                <th>Spot</th>
                                                <th>Barangay</th>
                                                <th>Visitors (2025)</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>Oras Beach</td>
                                                <td>Sabang</td>
                                                <td>2,345</td>
                                            </tr>
                                            <tr>
                                                <td>River Cruise</td>
                                                <td>San Roque</td>
                                                <td>1,280</td>
                                            </tr>
                                            <tr>
                                                <td>Heritage Church</td>
                                                <td>Poblacion</td>
                                                <td>980</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>

                        <!-- Recent Inquiries -->
                        <div class="col-12">
                            <div class="card">
                                <div class="card-header border-transparent">
                                    <h3 class="card-title">Recent Inquiries</h3>
                                    <div class="card-tools">
                                        <a href="users.html" class="btn btn-tool btn-sm">
                                            <i class="fas fa-comments"></i> Manage Messages
                                        </a>
                                    </div>
                                </div>
                                <div class="card-body p-0">
                                    <table class="table table-striped m-0">
                                        <thead>
                                            <tr>
                                                <th>Name</th>
                                                <th>Email</th>
                                                <th>Subject</th>
                                                <th>Date</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>Ana Reyes</td>
                                                <td>ana.reyes@email.com</td>
                                                <td>Tour Info</td>
                                                <td>2025-06-01</td>
                                            </tr>
                                            <tr>
                                                <td>John Cruz</td>
                                                <td>johncruz@gmail.com</td>
                                                <td>Volunteer Inquiry</td>
                                                <td>2025-05-30</td>
                                            </tr>
                                            <tr>
                                                <td>Maria Santos</td>
                                                <td>maria.santos@email.com</td>
                                                <td>Booking Help</td>
                                                <td>2025-05-28</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>

        <!-- Footer -->
        <footer class="main-footer">
            <strong>&copy; 2025 Municipality of Oras Tourism</strong>
            <div class="float-right d-none d-sm-inline-block">
                <b>Version</b> 1.0
            </div>
        </footer>
    </div>

    <!-- Scripts -->
    <script src="<?= base_url() ?>public/plugins/jquery/jquery.min.js"></script>
    <script src="<?= base_url() ?>public/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="<?= base_url() ?>public/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
    <script src="<?= base_url() ?>public/dist/admin/js/adminlte.js"></script>
    <script>
        $('.logoutBtn').click(function() {
            $.ajax({
                url: '../logout',
                method: 'POST',
                success: function() {
                    window.location.href = "<?= base_url() ?>";
                }
            });
        });
    </script>
</body>

</html>