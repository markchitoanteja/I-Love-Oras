<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="Lovely Oras Project">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Lovely Oras - <?= session("page_title") ?></title>

    <link rel="shortcut icon" href="favicon.ico?v=1.1" type="image/x-icon">

    <link rel="stylesheet" href="public/dist/landing/styles/bootstrap4/bootstrap.min.css" type="text/css">
    <link rel="stylesheet" href="public/dist/landing/plugins/font-awesome-4.7.0/css/font-awesome.min.css" type="text/css">
    <link rel="stylesheet" href="public/dist/landing/plugins/OwlCarousel2-2.2.1/owl.carousel.css" type="text/css">
    <link rel="stylesheet" href="public/dist/landing/plugins/OwlCarousel2-2.2.1/owl.theme.default.css" type="text/css">
    <link rel="stylesheet" href="public/dist/landing/plugins/OwlCarousel2-2.2.1/animate.css" type="text/css">
    <link rel="stylesheet" href="public/dist/landing/styles/about_styles.css?v=<?= app_version() ?>" type="text/css">
    <link rel="stylesheet" href="public/dist/landing/styles/responsive.css" type="text/css">
    <link rel="stylesheet" href="public/dist/landing/styles/custom.css" type="text/css">

    <style>
        @media (max-width: 768px) {
            .home_title {
                font-size: 50px;
            }
        }

        /* Make dropdown links full-width clickable */
        .dropdown-menu .dropdown-link {
            display: block;
            width: 100%;
            padding: 10px 15px;
            color: #212529;
            /* dark text */
            text-decoration: none;
        }

        .dropdown-menu .dropdown-link:hover,
        .dropdown-menu .dropdown-link:focus {
            background-color: #f1f1f1;
            /* light gray highlight */
            color: #000;
        }
    </style>
</head>

<body>
    <div class="super_container">
        <!-- Header -->
        <header class="header">
            <!-- Top Bar -->
            <div class="top_bar">
                <div class="container">
                    <div class="row">
                        <div class="col d-flex flex-row">
                            <div class="phone">+63 932 7802 725</div>
                            <div class="social">
                                <ul class="social_list">
                                    <!-- Facebook -->
                                    <li class="social_list_item">
                                        <a href="https://www.facebook.com/profile.php?id=61563939982244" target="_blank">
                                            <i class="fa fa-facebook" aria-hidden="true"></i>
                                        </a>
                                    </li>

                                    <!-- YouTube -->
                                    <li class="social_list_item">
                                        <a href="https://www.youtube.com/" target="_blank">
                                            <i class="fa fa-youtube" aria-hidden="true"></i>
                                        </a>
                                    </li>

                                    <!-- Twitter -->
                                    <li class="social_list_item">
                                        <a href="https://twitter.com/" target="_blank">
                                            <i class="fa fa-twitter" aria-hidden="true"></i>
                                        </a>
                                    </li>

                                    <!-- Instagram -->
                                    <li class="social_list_item">
                                        <a href="https://www.instagram.com/" target="_blank">
                                            <i class="fa fa-instagram" aria-hidden="true"></i>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                            <div class="user_box ml-auto">
                                <div class="user_box_login user_box_link"><a href="javascript:void(0)" data-toggle="modal" data-target="#loginModal">Administrator Portal</a></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Main Navigation -->
            <nav class="main_nav">
                <div class="container">
                    <div class="row">
                        <div class="col main_nav_col d-flex flex-row align-items-center justify-content-start">
                            <div class="logo_container">
                                <div class="logo">
                                    <a href="<?= base_url() ?>">
                                        <img src="public/dist/landing/images/logo.png?v=1.0" alt="" width="40">Lovely Oras
                                    </a>
                                </div>
                            </div>
                            <div class="main_nav_container ml-auto">
                                <ul class="main_nav_list">
                                    <li class="main_nav_item <?= (session()->get('page') === 'home') ? 'active' : '' ?>">
                                        <a href="<?= base_url() ?>">Home</a>
                                    </li>

                                    <!-- Dropdown: The Municipality -->
                                    <li class="main_nav_item dropdown <?= in_array(session()->get('page'), ['about_oras', 'history', 'mayor', 'barangays', 'economy']) ? 'active' : '' ?>">
                                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">The Municipality <span class="caret"></span></a>
                                        <ul class="dropdown-menu">
                                            <li class="<?= (session()->get('page') === 'about_oras') ? 'active' : '' ?>" style="<?= (session()->get('page') === 'about_oras') ? 'background:#f8f9fa; border-radius:4px;' : '' ?>">
                                                <a href="<?= base_url('about_oras') ?>" class="dropdown-link" style="display:flex; align-items:center; gap:8px; padding:8px 12px; text-decoration:none; color:#333;">
                                                    <?php if (session()->get('page') === 'about_oras'): ?>
                                                        <i class="fa fa-check-circle" style="color:#1b3a57;"></i>
                                                    <?php endif; ?>
                                                    About Oras
                                                </a>
                                            </li>
                                            <div class="dropdown-divider"></div>
                                            
                                            <li class="<?= (session()->get('page') === 'history') ? 'active' : '' ?>" style="<?= (session()->get('page') === 'history') ? 'background:#f8f9fa; border-radius:4px;' : '' ?>">
                                                <a href="<?= base_url('history') ?>" class="dropdown-link" style="display:flex; align-items:center; gap:8px; padding:8px 12px; text-decoration:none; color:#333;">
                                                    <?php if (session()->get('page') === 'history'): ?>
                                                        <i class="fa fa-check-circle" style="color:#1b3a57;"></i>
                                                    <?php endif; ?>
                                                    History
                                                </a>
                                            </li>
                                            <div class="dropdown-divider"></div>

                                            <li class="<?= (session()->get('page') === 'mayor') ? 'active' : '' ?>" style="<?= (session()->get('page') === 'mayor') ? 'background:#f8f9fa; border-radius:4px;' : '' ?>">
                                                <a href="<?= base_url('mayor') ?>" class="dropdown-link" style="display:flex; align-items:center; gap:8px; padding:8px 12px; text-decoration:none; color:#333;">
                                                    <?php if (session()->get('page') === 'mayor'): ?>
                                                        <i class="fa fa-check-circle" style="color:#1b3a57;"></i>
                                                    <?php endif; ?>
                                                    Mayor
                                                </a>
                                            </li>
                                            <div class="dropdown-divider"></div>

                                            <li class="<?= (session()->get('page') === 'barangays') ? 'active' : '' ?>" style="<?= (session()->get('page') === 'barangays') ? 'background:#f8f9fa; border-radius:4px;' : '' ?>">
                                                <a href="<?= base_url('barangays') ?>" class="dropdown-link" style="display:flex; align-items:center; gap:8px; padding:8px 12px; text-decoration:none; color:#333;">
                                                    <?php if (session()->get('page') === 'barangays'): ?>
                                                        <i class="fa fa-check-circle" style="color:#1b3a57;"></i>
                                                    <?php endif; ?>
                                                    Barangays
                                                </a>
                                            </li>
                                            <div class="dropdown-divider"></div>

                                            <li class="<?= (session()->get('page') === 'economy') ? 'active' : '' ?>" style="<?= (session()->get('page') === 'economy') ? 'background:#f8f9fa; border-radius:4px;' : '' ?>">
                                                <a href="<?= base_url('economy') ?>" class="dropdown-link" style="display:flex; align-items:center; gap:8px; padding:8px 12px; text-decoration:none; color:#333;">
                                                    <?php if (session()->get('page') === 'economy'): ?>
                                                        <i class="fa fa-check-circle" style="color:#1b3a57;"></i>
                                                    <?php endif; ?>
                                                    Economy
                                                </a>
                                            </li>
                                        </ul>
                                    </li>

                                    <li class="main_nav_item <?= (session()->get('page') === 'events') ? 'active' : '' ?>">
                                        <a href="<?= base_url('events') ?>">Events</a>
                                    </li>
                                    <li class="main_nav_item <?= (session()->get('page') === 'attractions') ? 'active' : '' ?>">
                                        <a href="<?= base_url('attractions') ?>">Attractions</a>
                                    </li>
                                    <li class="main_nav_item <?= (session()->get('page') === 'gallery') ? 'active' : '' ?>">
                                        <a href="<?= base_url('gallery') ?>">Gallery</a>
                                    </li>
                                    <li class="main_nav_item <?= (session()->get('page') === 'contact') ? 'active' : '' ?>">
                                        <a href="<?= base_url('contact') ?>">Contact</a>
                                    </li>
                                </ul>
                            </div>

                            <div class="hamburger">
                                <i class="fa fa-bars trans_200"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </nav>
        </header>

        <!-- Mobile App Menu -->
        <div class="menu trans_500">
            <div class="menu_content d-flex flex-column align-items-center justify-content-center text-center">
                <div class="menu_close_container">
                    <div class="menu_close"></div>
                </div>
                <div class="logo menu_logo">
                    <a href="javascript:void(0)">
                        <img src="public/dist/landing/images/logo.png?v=1.0" alt="" width="50">
                    </a>
                </div>
                <ul>
                    <li class="menu_item <?= (session()->get('page') === 'home') ? 'active' : '' ?>"><a href="<?= base_url() ?>">Home</a></li>
                    <li class="menu_item <?= (session()->get('page') === 'history') ? 'active' : '' ?>"><a href="<?= base_url('history') ?>">History</a></li>
                    <li class="menu_item <?= (session()->get('page') === 'mayor') ? 'active' : '' ?>"><a href="<?= base_url('mayor') ?>">Mayor</a></li>
                    <li class="menu_item <?= (session()->get('page') === 'barangays') ? 'active' : '' ?>"><a href="<?= base_url('barangays') ?>">Barangays</a></li>
                    <li class="menu_item <?= (session()->get('page') === 'economy') ? 'active' : '' ?>"><a href="<?= base_url('economy') ?>">Economy</a></li>
                    <li class="menu_item <?= (session()->get('page') === 'attractions') ? 'active' : '' ?>"><a href="<?= base_url('attractions') ?>">Attractions</a></li>
                    <li class="menu_item <?= (session()->get('page') === 'gallery') ? 'active' : '' ?>"><a href="<?= base_url('gallery') ?>">Gallery</a></li>
                    <li class="menu_item <?= (session()->get('page') === 'contact') ? 'active' : '' ?>"><a href="<?= base_url('contact') ?>">Contact</a></li>
                </ul>
            </div>
        </div>

        <!-- Home -->
        <div class="home">
            <div class="home_background parallax-window" data-parallax="scroll" data-image-src="public/dist/landing/images/<?= $bg_image ?>?v=<?= app_version() ?>"></div>
            <div class="home_content">
                <div class="home_title"><?= session()->get('page_title') ?></div>
            </div>
        </div>