<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="I❤️Oras Project">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>I❤️Oras - <?= session("page_title") ?></title>

    <link rel="shortcut icon" href="favicon.ico?v=1.1" type="image/x-icon">

    <link rel="stylesheet" href="public/dist/landing/styles/bootstrap4/bootstrap.min.css" type="text/css">
    <link rel="stylesheet" href="public/dist/landing/plugins/font-awesome-4.7.0/css/font-awesome.min.css" type="text/css">
    <link rel="stylesheet" href="public/dist/landing/plugins/OwlCarousel2-2.2.1/owl.carousel.css" type="text/css">
    <link rel="stylesheet" href="public/dist/landing/plugins/OwlCarousel2-2.2.1/owl.theme.default.css" type="text/css">
    <link rel="stylesheet" href="public/dist/landing/plugins/OwlCarousel2-2.2.1/animate.css" type="text/css">
    <link rel="stylesheet" href="public/dist/landing/styles/about_styles.css?v=1.3" type="text/css">
    <link rel="stylesheet" href="public/dist/landing/styles/responsive.css" type="text/css">
    <link rel="stylesheet" href="public/dist/landing/styles/custom.css" type="text/css">
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
                            <div class="phone">+63 917 6080 214</div>
                            <div class="social">
                                <ul class="social_list">
                                    <li class="social_list_item"><a href="javascript:void(0)" class="no-function"><i class="fa fa-pinterest" aria-hidden="true"></i></a></li>
                                    <li class="social_list_item"><a href="javascript:void(0)" class="no-function"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
                                    <li class="social_list_item"><a href="javascript:void(0)" class="no-function"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
                                    <li class="social_list_item"><a href="javascript:void(0)" class="no-function"><i class="fa fa-dribbble" aria-hidden="true"></i></a></li>
                                    <li class="social_list_item"><a href="javascript:void(0)" class="no-function"><i class="fa fa-behance" aria-hidden="true"></i></a></li>
                                    <li class="social_list_item"><a href="javascript:void(0)" class="no-function"><i class="fa fa-linkedin" aria-hidden="true"></i></a></li>
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
                                        <img src="public/dist/landing/images/logo.png?v=1.0" alt="" width="50">I❤️Oras
                                    </a>
                                </div>
                            </div>
                            <div class="main_nav_container ml-auto">
                                <ul class="main_nav_list">
                                    <li class="main_nav_item <?= (session()->get('page') === 'home') ? 'active' : '' ?>"><a href="<?= base_url() ?>">Home</a></li>
                                    <li class="main_nav_item <?= (session()->get('page') === 'about_oras') ? 'active' : '' ?>"><a href="<?= base_url('about_oras') ?>">About Oras</a></li>
                                    <li class="main_nav_item <?= (session()->get('page') === 'attractions') ? 'active' : '' ?>"><a href="<?= base_url('attractions') ?>">Attractions</a></li>
                                    <li class="main_nav_item <?= (session()->get('page') === 'gallery') ? 'active' : '' ?>"><a href="<?= base_url('gallery') ?>">Gallery</a></li>
                                    <li class="main_nav_item <?= (session()->get('page') === 'contact') ? 'active' : '' ?>"><a href="<?= base_url('contact') ?>">Contact</a></li>
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

        <!-- Menu -->
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
                    <li class="menu_item <?= (session()->get('page') === 'about_oras') ? 'active' : '' ?>"><a href="<?= base_url('about_oras') ?>">About Oras</a></li>
                    <li class="menu_item <?= (session()->get('page') === 'attractions') ? 'active' : '' ?>"><a href="<?= base_url('attractions') ?>">Attractions</a></li>
                    <li class="menu_item <?= (session()->get('page') === 'gallery') ? 'active' : '' ?>"><a href="<?= base_url('gallery') ?>">Gallery</a></li>
                    <li class="menu_item <?= (session()->get('page') === 'contact') ? 'active' : '' ?>"><a href="<?= base_url('contact') ?>">Contact</a></li>
                </ul>
            </div>
        </div>

        <!-- Home -->
        <div class="home">
            <div class="home_background parallax-window" data-parallax="scroll" data-image-src="public/dist/landing/images/bg_2.jpg?v=1.0"></div>
            <div class="home_content">
                <div class="home_title"><?= session()->get('page_title') ?></div>
            </div>
        </div>