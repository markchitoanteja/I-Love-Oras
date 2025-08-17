<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>I❤️Oras - <?= session()->get("current_page_title") ?></title>

    <link rel="shortcut icon" href="<?= base_url() ?>favicon.ico?v=1.1" type="image/x-icon" />

    <!-- Fonts & Icons -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700&display=fallback">
    <link rel="stylesheet" href="<?= base_url() ?>public/plugins/fontawesome-free/css/all.min.css">

    <!-- DataTables CSS -->
    <link rel="stylesheet" href="<?= base_url() ?>public/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="<?= base_url() ?>public/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
    <link rel="stylesheet" href="<?= base_url() ?>public/plugins/datatables-buttons/css/buttons.bootstrap4.min.css">

    <!-- AdminLTE CSS -->
    <link rel="stylesheet" href="<?= base_url() ?>public/dist/admin/css/adminlte.min.css">
    <link rel="stylesheet" href="<?= base_url() ?>public/plugins/overlayScrollbars/css/OverlayScrollbars.min.css">

    <style>
        #overlayLoader {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(255, 255, 255, 0.85);
            z-index: 2000;
            /* higher than sidebar/navbar */
            display: none;
            /* hidden by default */
            display: flex;
            /* enable flexbox */
            justify-content: center;
            /* center horizontally */
            align-items: center;
            /* center vertically */
        }

        #overlayLoader .loader-content {
            text-align: center;
            color: #333;
        }
    </style>
</head>

<body class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper">
        <!-- Overlay Loader -->
        <div id="overlayLoader">
            <div class="loader-content">
                <i class="fas fa-spinner fa-spin fa-3x"></i>
                <p class="mt-2">Loading...</p>
            </div>
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
                    <a class="nav-link" data-toggle="dropdown" href="#"><i class="fas fa-cog"></i></a>
                    <div class="dropdown-menu dropdown-menu-right">
                        <a href="javascript:void(0)" class="dropdown-item" data-toggle="modal" data-target="#update_profile_modal"><i class="fas fa-user mr-2"></i> My Profile</a>
                        <a href="javascript:void(0)" class="dropdown-item" data-toggle="modal" data-target="#about_us_modal"><i class="fas fa-info-circle mr-2"></i> About Us</a>
                        <div class="dropdown-divider"></div>
                        <a href="javascript:void(0)" class="dropdown-item logoutBtn"><i class="fas fa-sign-out-alt mr-2"></i> Logout</a>
                    </div>
                </li>
            </ul>
        </nav>

        <!-- Sidebar -->
        <aside class="main-sidebar sidebar-dark-primary elevation-4">
            <a href="<?= base_url() ?>" class="brand-link">
                <img src="<?= base_url("public/dist/admin/img/logo.png?v=1.0") ?>" alt="Oras Logo" class="brand-image img-circle elevation-3">
                <span class="brand-text font-weight-bold ml-2">I❤️Oras</span>
            </a>

            <div class="sidebar">
                <!-- User Panel -->
                <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                    <div class="image">
                        <img src="<?= base_url("public/dist/admin/img/uploads/") . session()->get("user")["image"] ?>" class="img-circle elevation-2" style="width: 35px; height: 35px;" alt="User">
                    </div>
                    <div class="info">
                        <a href="javascript:void(0)" class="d-block"><?= session()->get("user")["name"] ?></a>
                    </div>
                </div>

                <!-- Sidebar Menu -->
                <nav class="mt-2">
                    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu">

                        <li class="nav-item">
                            <a href="<?= base_url('admin/dashboard') ?>" class="nav-link <?= session()->get("current_page") === "dashboard" ? "active" : "" ?>">
                                <i class="nav-icon fas fa-tachometer-alt"></i>
                                <p>Dashboard</p>
                            </a>
                        </li>

                        <li class="nav-header">TOURISM MANAGEMENT</li>

                        <li class="nav-item">
                            <a href="<?= base_url('admin/events') ?>" class="nav-link <?= session()->get("current_page") === "events" ? "active" : "" ?>">
                                <i class="nav-icon fas fa-calendar-check"></i>
                                <p>Events</p>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="<?= base_url('admin/tourist_spots') ?>" class="nav-link <?= session()->get("current_page") === "tourist_spots" ? "active" : "" ?>">
                                <i class="nav-icon fas fa-map-marked-alt"></i>
                                <p>Tourist Spots</p>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="<?= base_url('admin/photo_gallery') ?>" class="nav-link <?= session()->get("current_page") === "photo_gallery" ? "active" : "" ?>">
                                <i class="nav-icon fas fa-images"></i>
                                <p>Photo Gallery</p>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="<?= base_url('admin/communication') ?>" class="nav-link <?= session()->get("current_page") === "communication" ? "active" : "" ?>">
                                <i class="nav-icon fas fa-comments"></i>
                                <p>Communication</p>
                            </a>
                        </li>

                        <li class="nav-header">SYSTEM</li>

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