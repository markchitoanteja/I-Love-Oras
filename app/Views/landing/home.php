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
    <link rel="stylesheet" href="public/dist/landing/styles/main_styles.css?v=1.2" type="text/css">
    <link rel="stylesheet" href="public/dist/landing/styles/responsive.css" type="text/css">
    <link rel="stylesheet" href="public/dist/landing/styles/custom.css" type="text/css">

    <style>
        .img-wrapper {
            width: 100%;
            height: 120px;
            /* Adjust height as needed */
            overflow: hidden;
            border-radius: 0.25rem;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }

        .img-wrapper img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            border-radius: 0.25rem;
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

        .title-truncate {
            display: -webkit-box;
            -webkit-line-clamp: 3;
            /* Limit to 3 lines */
            line-clamp: 3;
            -webkit-box-orient: vertical;
            overflow: hidden;
            text-overflow: ellipsis;
            max-height: 4.5em;
            /* Approx for 3 lines (1.5em each) */
            word-wrap: break-word;
        }
    </style>
</head>

<body>
    <!-- Super Container -->
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
                                        <img src="public/dist/landing/images/logo.png?v=1.0" alt="" width="40">I❤️Oras
                                    </a>
                                </div>
                            </div>
                            <div class="main_nav_container ml-auto">
                                <ul class="main_nav_list">
                                    <li class="main_nav_item <?= (session()->get('page') === 'home') ? 'active' : '' ?>">
                                        <a href="<?= base_url() ?>">Home</a>
                                    </li>

                                    <!-- Dropdown: The Municipality -->
                                    <li class="main_nav_item dropdown <?= in_array(session()->get('page'), ['history', 'mayor', 'barangays', 'economy']) ? 'active' : '' ?>">
                                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">The Municipality <span class="caret"></span></a>
                                        <ul class="dropdown-menu">
                                            <li class="<?= (session()->get('page') === 'history') ? 'bg-light' : '' ?>">
                                                <a href="<?= base_url('history') ?>" class="dropdown-link">History</a>
                                            </li>
                                            <div class="dropdown-divider"></div>

                                            <li class="<?= (session()->get('page') === 'mayor') ? 'bg-light' : '' ?>">
                                                <a href="<?= base_url('mayor') ?>" class="dropdown-link">Mayor</a>
                                            </li>
                                            <div class="dropdown-divider"></div>

                                            <li class="<?= (session()->get('page') === 'barangays') ? 'bg-light' : '' ?>">
                                                <a href="<?= base_url('barangays') ?>" class="dropdown-link">Barangays</a>
                                            </li>
                                            <div class="dropdown-divider"></div>

                                            <li class="<?= (session()->get('page') === 'economy') ? 'bg-light' : '' ?>">
                                                <a href="<?= base_url('economy') ?>" class="dropdown-link">Economy</a>
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
            <!-- Home Slider -->
            <div class="home_slider_container">
                <div class="owl-carousel owl-theme home_slider">
                    <!-- Slider Item -->
                    <div class="owl-item home_slider_item">
                        <div class="home_slider_background" style="background-image:url(public/dist/landing/images/bg.jpg)"></div>

                        <div class="home_slider_content text-center">
                            <div class="home_slider_content_inner" data-animation-in="flipInX" data-animation-out="animate-out fadeOut">
                                <h1>Lovely</h1>
                                <h1>ORAS</h1>
                            </div>
                        </div>
                    </div>
                    <!-- Slider Item -->
                    <div class="owl-item home_slider_item">
                        <div class="home_slider_background" style="background-image:url(public/dist/landing/images/bg_2.jpg)"></div>

                        <div class="home_slider_content text-center">
                            <div class="home_slider_content_inner" data-animation-in="flipInX" data-animation-out="animate-out fadeOut">
                                <h1>Lovely</h1>
                                <h1>ORAS</h1>
                            </div>
                        </div>
                    </div>
                    <!-- Slider Item -->
                    <div class="owl-item home_slider_item">
                        <div class="home_slider_background" style="background-image:url(public/dist/landing/images/bg_3.jpg)"></div>

                        <div class="home_slider_content text-center">
                            <div class="home_slider_content_inner" data-animation-in="flipInX" data-animation-out="animate-out fadeOut">
                                <h1>Lovely</h1>
                                <h1>ORAS</h1>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Home Slider Nav - Prev -->
                <div class="home_slider_nav home_slider_prev">
                    <svg version="1.1" id="Layer_2" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" width="28px" height="33px" viewBox="0 0 28 33" enable-background="new 0 0 28 33" xml:space="preserve">
                        <defs>
                            <linearGradient id='home_grad_prev'>
                                <stop offset='0%' stop-color='#fa9e1b' />
                                <stop offset='100%' stop-color='#8d4fff' />
                            </linearGradient>
                        </defs>
                        <path class="nav_path" fill="#F3F6F9" d="M19,0H9C4.029,0,0,4.029,0,9v15c0,4.971,4.029,9,9,9h10c4.97,0,9-4.029,9-9V9C28,4.029,23.97,0,19,0zM26,23.091C26,27.459,22.545,31,18.285,31H9.714C5.454,31,2,27.459,2,23.091V9.909C2,5.541,5.454,2,9.714,2h8.571C22.545,2,26,5.541,26,9.909V23.091z" />
                        <polygon class="nav_arrow" fill="#F3F6F9" points="15.044,22.222 16.377,20.888 12.374,16.885 16.377,12.882 15.044,11.55 9.708,16.885 11.04,18.219 11.042,18.219 " />
                    </svg>
                </div>

                <!-- Home Slider Nav - Next -->
                <div class="home_slider_nav home_slider_next">
                    <svg version="1.1" id="Layer_3" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" width="28px" height="33px" viewBox="0 0 28 33" enable-background="new 0 0 28 33" xml:space="preserve">
                        <defs>
                            <linearGradient id='home_grad_next'>
                                <stop offset='0%' stop-color='#fa9e1b' />
                                <stop offset='100%' stop-color='#8d4fff' />
                            </linearGradient>
                        </defs>
                        <path class="nav_path" fill="#F3F6F9" d="M19,0H9C4.029,0,0,4.029,0,9v15c0,4.971,4.029,9,9,9h10c4.97,0,9-4.029,9-9V9C28,4.029,23.97,0,19,0zM26,23.091C26,27.459,22.545,31,18.285,31H9.714C5.454,31,2,27.459,2,23.091V9.909C2,5.541,5.454,2,9.714,2h8.571C22.545,2,26,5.541,26,9.909V23.091z" />
                        <polygon class="nav_arrow" fill="#F3F6F9" points="13.044,11.551 11.71,12.885 15.714,16.888 11.71,20.891 13.044,22.224 18.379,16.888 17.048,15.55417.046,15.554 " />
                    </svg>
                </div>

                <!-- Home Slider Dots -->
                <!-- <div class="home_slider_dots">
                    <ul id="home_slider_custom_dots" class="home_slider_custom_dots">
                        <li class="home_slider_custom_dot active">
                            <div></div>01.
                        </li>
                        <li class="home_slider_custom_dot">
                            <div></div>02.
                        </li>
                        <li class="home_slider_custom_dot">
                            <div></div>03.
                        </li>
                    </ul>
                </div> -->
            </div>
        </div>

        <!-- Search -->
        <!-- <div class="search">
            <div class="container fill_height">
                <div class="row fill_height">
                    <div class="col fill_height">
                        <div class="search_tabs_container">
                            <div class="search_tabs d-flex flex-lg-row flex-column align-items-lg-center align-items-start justify-content-lg-between justify-content-start">
                                <div class="search_tab active d-flex flex-row align-items-center justify-content-lg-center justify-content-start">
                                    <span>History</span>
                                </div>
                                <div class="search_tab d-flex flex-row align-items-center justify-content-lg-center justify-content-start">
                                    <span>Mayor</span>
                                </div>
                                <div class="search_tab d-flex flex-row align-items-center justify-content-lg-center justify-content-start">
                                    <span>Economy</span>
                                </div>
                                <div class="search_tab d-flex flex-row align-items-center justify-content-lg-center justify-content-start">
                                    <span>Culture</span>
                                </div>
                                <div class="search_tab d-flex flex-row align-items-center justify-content-lg-center justify-content-start">
                                    <span>Tourism</span>
                                </div>
                                <div class="search_tab d-flex flex-row align-items-center justify-content-lg-center justify-content-start">
                                    <span>Environment</span>
                                </div>
                            </div>
                        </div>

                        <div class="search_panel text-white active">
                            <div class="search_panel_content d-flex flex-lg-row flex-column align-items-lg-center align-items-start justify-content-lg-between justify-content-start">
                                <p class="text-white">
                                    Oras, Eastern Samar, with its rich cultural heritage and deep-rooted traditions, has long been a resilient coastal town shaped by its storied past—from its early days of settlement to its role in regional trade and resistance during historical conflicts. Established during the Spanish colonial period, Oras became a vital hub for agriculture and fishing, contributing significantly to the province’s economy. Its fertile lands and abundant waters provided a sustainable livelihood for generations, making it a key community in Eastern Samar’s development.
                                </p>
                            </div>
                        </div>
                        <div class="search_panel text-white">
                            <div class="search_panel_content d-flex flex-lg-row flex-column align-items-lg-center align-items-start justify-content-lg-between justify-content-start">
                                <p class="text-white">
                                    Mayor Roy C. Ador currently leads Oras, Eastern Samar, with a strong vision focused on sustainable infrastructure development and enhancing community welfare. Since taking office, Mayor Ador has prioritized projects that directly improve the quality of life for residents, particularly in agriculture, education, and health services. Under his leadership, the municipality has launched a ₱100-million farm-to-market road initiative, which has significantly improved connectivity for eight barangays, facilitating better access to markets, healthcare facilities, and schools.
                                </p>
                            </div>
                        </div>
                        <div class="search_panel text-white">
                            <div class="search_panel_content d-flex flex-lg-row flex-column align-items-lg-center align-items-start justify-content-lg-between justify-content-start">
                                <p class="text-white">
                                    The economy of Oras is steadily evolving as a vibrant hub rooted in its natural resources and strategic location. Traditionally dependent on agriculture and fisheries, the town has adapted to modern challenges by embracing sustainable practices and diversification of income sources. Agriculture remains the backbone of Oras’s economy, with rice, coconut, and root crops cultivated across fertile plains. Local farmers increasingly utilize modern farming techniques and organic fertilizers to boost productivity while preserving soil health.
                                </p>
                            </div>
                        </div>
                        <div class="search_panel text-white">
                            <div class="search_panel_content d-flex flex-lg-row flex-column align-items-lg-center align-items-start justify-content-lg-between justify-content-start">
                                <p class="text-white">
                                    The cultural identity of Oras is a vibrant mosaic that reflects the rich heritage of its people. Rooted in indigenous traditions and enriched by centuries of interaction with colonial and neighboring influences, the town celebrates its unique customs through music, dance, festivals, and crafts. Local festivals such as the annual “Pakol Festival” highlight the community’s connection to agriculture and the sea, featuring colorful parades, traditional dances, and culinary fairs that bring residents and visitors together.
                                </p>
                            </div>
                        </div>
                        <div class="search_panel text-white">
                            <div class="search_panel_content d-flex flex-lg-row flex-column align-items-lg-center align-items-start justify-content-lg-between justify-content-start">
                                <p class="text-white">
                                    Tourism in Oras, Eastern Samar, is emerging as a promising sector with vast potential for sustainable growth. The town’s natural beauty, characterized by pristine beaches, lush forests, and historical landmarks, offers unique experiences for travelers seeking both adventure and cultural immersion. Attractions such as the white sand shores and coral reefs provide excellent opportunities for swimming, snorkeling, and diving, while inland areas invite hiking and birdwatching amidst diverse flora and fauna.
                                </p>
                            </div>
                        </div>
                        <div class="search_panel text-white">
                            <div class="search_panel_content d-flex flex-lg-row flex-column align-items-lg-center align-items-start justify-content-lg-between justify-content-start">
                                <p class="text-white">
                                    Environmental conservation is a vital priority in Oras, Eastern Samar, reflecting the community’s deep connection to its natural surroundings. The municipality recognizes that protecting coastal ecosystems, forests, and biodiversity is essential for sustaining livelihoods and mitigating the impacts of climate change. To this end, Oras actively promotes coastal resource management programs aimed at preserving marine habitats such as mangroves and coral reefs, which serve as natural barriers against storms and support fisheries.
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div> -->

        <!-- Intro -->
        <div class="intro bg-light">
            <div class="container">
                <div class="row">
                    <div class="col">
                        <h2 class="intro_title text-center">Discover the Best Tours in Oras, Eastern Samar</h2>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-10 offset-lg-1">
                        <div class="intro_text text-center">
                            <p>Explore the breathtaking landscapes, rich culture, and vibrant history of Oras. From pristine beaches to heritage sites and eco-adventures, our curated tours offer unforgettable experiences that connect you with the heart of Eastern Samar.</p>
                        </div>
                    </div>
                </div>

                <div class="row intro_items">
                    <?php if (!empty($attractions)): ?>
                        <?php
                        // Take only the top 3 (descending order assumed from DB)
                        $topAttractions = array_slice($attractions, 0, 3);
                        ?>
                        <?php foreach ($topAttractions as $attraction): ?>
                            <?php
                            $photos = json_decode($attraction['photo_gallery'], true);
                            $firstPhoto = !empty($photos)
                                ? base_url('public/dist/landing/images/attractions/' . $photos[0])
                                : base_url('public/dist/landing/images/no-image.jpg');
                            ?>
                            <div class="col-lg-4 intro_col">
                                <div class="intro_item">
                                    <div class="intro_item_overlay"></div>
                                    <!-- Background Image -->
                                    <div class="intro_item_background" style="background-image:url('<?= esc($firstPhoto) ?>')"></div>
                                    <div class="intro_item_content d-flex flex-column align-items-center justify-content-center">
                                        <div class="button intro_button">
                                            <div class="button_bcg"></div>
                                            <a href="javascript:void(0);"
                                                data-toggle="modal"
                                                data-target="#attractionModal"
                                                data-name="<?= esc($attraction['name']) ?>"
                                                data-description="<?= esc($attraction['description']) ?>"
                                                data-photos='<?= json_encode($photos) ?>'
                                                data-lat="<?= esc($attraction['latitude']) ?>"
                                                data-lng="<?= esc($attraction['longitude']) ?>">
                                                More Info<span></span><span></span><span></span>
                                            </a>
                                        </div>
                                        <div class="intro_center text-center">
                                            <h1 class="title-truncate"><?= esc($attraction['name']) ?></h1>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <div class="col-12 text-center py-5">
                            <div class="no-gallery-placeholder">
                                <img src="<?= base_url('public/dist/landing/images/no-image.png'); ?>"
                                    alt="No images"
                                    class="mb-3"
                                    style="max-width:150px; opacity:0.6;">
                                <h4 class="text-muted">No tours available</h4>
                                <p class="text-muted">Our tours will be updated soon. Please check back later.</p>
                            </div>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>

        <!-- Feature Video -->
        <div class="intro">
            <div class="container">
                <div class="row align-items-center">
                    <!-- Video Column -->
                    <div class="col-lg-6 mb-4 mb-lg-0">
                        <div class="embed-responsive embed-responsive-16by9 shadow-lg rounded">
                            <iframe class="embed-responsive-item"
                                src="https://www.youtube.com/embed/D9xlfMOB9_0"
                                title="Feature Video of Oras"
                                allowfullscreen>
                            </iframe>
                        </div>
                    </div>

                    <!-- Text Column -->
                    <div class="col-lg-6">
                        <h2 class="font-weight-bold mb-3">Experience Oras in Motion</h2>
                        <p class="text-muted mb-4">
                            Oras, Eastern Samar, is a vibrant coastal town with a rich cultural
                            heritage and deep-rooted traditions. Known for its scenic landscapes,
                            pristine beaches, and resilient communities, Oras offers both a
                            glimpse into the past and a promise of growth for the future.
                        </p>
                        <p class="text-muted mb-4">
                            From the colorful <strong>Larara Festival</strong> that showcases the
                            agricultural bounty of the town to the warm hospitality of its people,
                            Oras is more than just a destination—it’s an experience that connects
                            you with history, culture, and nature.
                        </p>
                        <a href="<?= base_url('history') ?>" class="btn btn-primary px-4">
                            Learn More About Oras
                        </a>
                    </div>
                </div>
            </div>
        </div>

        <!-- Events Section -->
        <div class="intro bg-light">
            <div class="container">
                <div class="text-center mb-5">
                    <h2 class="font-weight-bold">Featured Events in Oras</h2>
                    <p class="text-muted">Don't miss the hottest happenings in Oras, Eastern Samar!</p>
                </div>

                <div class="row">
                    <?php if (!empty($featured)): ?>
                        <?php foreach ($featured as $event): ?>
                            <div class="col-md-6 col-lg-4 mb-4">
                                <div class="card bg-dark text-white h-100 shadow-lg border-0" style="overflow: hidden; transition: transform 0.3s ease; border-radius: 0.5rem;">
                                    <img src="<?= base_url("public/dist/landing/images/events/{$event['thumbnail']}") ?>" class="card-img" alt="<?= esc($event['title']) ?>" style="height: 100%; object-fit: cover; transition: opacity 0.3s ease;">
                                    <div class="card-img-overlay d-flex flex-column justify-content-end" style="padding: 1.5rem; color: #fff; background: linear-gradient(to top, rgba(0, 0, 0, 0.85) 30%, rgba(0, 0, 0, 0) 100%); border-radius: 0.5rem;">
                                        <span style="background-color: #ff5e5e; padding: 0.3rem 0.6rem; font-size: 0.75rem; border-radius: 0.25rem; display: inline-block; margin-bottom: 0.5rem; font-weight: bold;">
                                            <?= esc($event['event_type']) ?>
                                        </span>
                                        <h5 style="font-size: 1.3rem; font-weight: 600;"><?= esc($event['title']) ?></h5>
                                        <p class="mb-1"><?= esc($event['performers']) ?></p>
                                        <div style="font-size: 0.85rem;">
                                            <i class="fa fa-calendar"></i>
                                            <?= date('M d, Y', strtotime($event['date'])) ?> – <?= date('g:i A', strtotime($event['start_time'])) ?>
                                        </div>
                                        <div style="font-size: 0.85rem;">
                                            <i class="fa fa-map-marker"></i> <?= esc($event['venue']) ?>
                                        </div>
                                        <a href="<?= base_url('events') ?>" style="margin-top: 0.75rem; font-size: 0.8rem; color: #fff; border: 1px solid #fff; padding: 0.4rem 0.75rem; border-radius: 0.25rem; transition: 0.3s; align-self: flex-start; text-decoration: none;">
                                            View Details
                                        </a>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <div class="col-12 text-center">
                            <div class="p-5 bg-white border rounded-3 shadow-sm mx-auto" style="max-width: 420px;">
                                <i class="fa fa-calendar-o fa-4x text-muted mb-4"></i>
                                <h4 class="fw-semibold text-dark mb-2">No Events Available</h4>
                                <p class="text-muted mb-0">Please check back soon — new and exciting events will be added here.</p>
                            </div>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>

        <!-- Testimonials -->
        <div class="testimonials">
            <div class="container">
                <div class="text-center">
                    <h2 class="font-weight-bold">Testimonials</h2>
                    <p class="text-muted">What our fellow Orasnon are saying about us.</p>
                </div>

                <div class="row">
                    <div class="col">
                        <!-- Testimonials Slider -->
                        <div class="test_slider_container">
                            <div class="owl-carousel owl-theme test_slider">
                                <!-- Testimonial Item -->
                                <div class="owl-item">
                                    <div class="test_item">
                                        <div class="test_image">
                                            <img src="public/dist/landing/images/visitors/1.jpg" alt="Photo of Emma Johnson">
                                        </div>
                                        <div class="test_icon">
                                            <img src="public/dist/landing/images/backpack.png" alt="Travel icon">
                                        </div>
                                        <div class="test_content_container">
                                            <div class="test_content">
                                                <div class="test_item_info">
                                                    <div class="test_name">Nagtitinda hin Karan-on</div>
                                                    <div class="test_date">March 12, 2025</div>
                                                </div>
                                                <div class="test_quote_title">"Palit na mga suki!"</div>
                                                <p class="test_quote_text">Sobra nga rasa hit mga karan-on dinhi. Talagang sulit it kada piraso.</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- Testimonial Item -->
                                <div class="owl-item">
                                    <div class="test_item">
                                        <div class="test_image">
                                            <img src="public/dist/landing/images/visitors/2.jpg" alt="Photo of Emma Johnson">
                                        </div>
                                        <div class="test_icon">
                                            <img src="public/dist/landing/images/island_t.png" alt="Travel icon">
                                        </div>
                                        <div class="test_content_container">
                                            <div class="test_content">
                                                <div class="test_item_info">
                                                    <div class="test_name">Mga Taga Burak</div>
                                                    <div class="test_date">June 07, 2025</div>
                                                </div>
                                                <div class="test_quote_title">"Damo an Gala!"</div>
                                                <p class="test_quote_text">Maupay pagkinulaw hit usa nga sarayaw nga damo it gala pirme.</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- Testimonial Item -->
                                <div class="owl-item">
                                    <div class="test_item">
                                        <div class="test_image">
                                            <img src="public/dist/landing/images/visitors/3.jpg" alt="Photo of Emma Johnson">
                                        </div>
                                        <div class="test_icon">
                                            <img src="public/dist/landing/images/kayak.png" alt="Travel icon">
                                        </div>
                                        <div class="test_content_container">
                                            <div class="test_content">
                                                <div class="test_item_info">
                                                    <div class="test_name">Mga Taga Dao</div>
                                                    <div class="test_date">June 07, 2025</div>
                                                </div>
                                                <div class="test_quote_title">"Galante it Mayor hit Oras!"</div>
                                                <p class="test_quote_text">Kaupay pagkinulawan ita nagkakalupad nga kwarta. Sana All.</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- Testimonials Slider Nav - Prev -->
                            <div class="test_slider_nav test_slider_prev">
                                <svg version="1.1" id="Layer_6" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                                    width="28px" height="33px" viewBox="0 0 28 33" enable-background="new 0 0 28 33" xml:space="preserve">
                                    <defs>
                                        <linearGradient id='test_grad_prev'>
                                            <stop offset='0%' stop-color='#fa9e1b' />
                                            <stop offset='100%' stop-color='#8d4fff' />
                                        </linearGradient>
                                    </defs>
                                    <path class="nav_path" fill="#F3F6F9" d="M19,0H9C4.029,0,0,4.029,0,9v15c0,4.971,4.029,9,9,9h10c4.97,0,9-4.029,9-9V9C28,4.029,23.97,0,19,0z
                        M26,23.091C26,27.459,22.545,31,18.285,31H9.714C5.454,31,2,27.459,2,23.091V9.909C2,5.541,5.454,2,9.714,2h8.571
                        C22.545,2,26,5.541,26,9.909V23.091z" />
                                    <polygon class="nav_arrow" fill="#F3F6F9" points="15.044,22.222 16.377,20.888 12.374,16.885 16.377,12.882 15.044,11.55 9.708,16.885 11.04,18.219 
                        11.042,18.219 " />
                                </svg>
                            </div>

                            <!-- Testimonials Slider Nav - Next -->
                            <div class="test_slider_nav test_slider_next">
                                <svg version="1.1" id="Layer_7" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                                    width="28px" height="33px" viewBox="0 0 28 33" enable-background="new 0 0 28 33" xml:space="preserve">
                                    <defs>
                                        <linearGradient id='test_grad_next'>
                                            <stop offset='0%' stop-color='#fa9e1b' />
                                            <stop offset='100%' stop-color='#8d4fff' />
                                        </linearGradient>
                                    </defs>
                                    <path class="nav_path" fill="#F3F6F9" d="M19,0H9C4.029,0,0,4.029,0,9v15c0,4.971,4.029,9,9,9h10c4.97,0,9-4.029,9-9V9C28,4.029,23.97,0,19,0z
                        M26,23.091C26,27.459,22.545,31,18.285,31H9.714C5.454,31,2,27.459,2,23.091V9.909C2,5.541,5.454,2,9.714,2h8.571
                        C22.545,2,26,5.541,26,9.909V23.091z" />
                                    <polygon class="nav_arrow" fill="#F3F6F9" points="13.044,11.551 11.71,12.885 15.714,16.888 11.71,20.891 13.044,22.224 18.379,16.888 17.048,15.554 
                        17.046,15.554 " />
                                </svg>
                            </div>

                        </div>

                    </div>
                </div>
            </div>
        </div>

        <!-- Footer -->
        <footer class="footer">
            <div class="container">
                <div class="row">
                    <!-- About Column -->
                    <div class="col-lg-3 footer_column">
                        <div class="footer_col">
                            <div class="footer_content footer_about">
                                <div class="logo_container footer_logo">
                                    <div class="logo">
                                        <a href="#">
                                            <img src="public/dist/landing/images/logo.png?v=1.0" alt="" width="37">
                                            I❤️Oras
                                        </a>
                                    </div>
                                </div>
                                <p class="footer_about_text">
                                    Discover the heart of Oras with us. We bring you closer to the culture, experiences, and community that make this place unique.
                                </p>
                                <ul class="footer_social_list">
                                    <li class="footer_social_item"><a href="javascript:void(0)" class="no-function"><i class="fa fa-facebook-f"></i></a></li>
                                    <li class="footer_social_item"><a href="javascript:void(0)" class="no-function"><i class="fa fa-twitter"></i></a></li>
                                    <li class="footer_social_item"><a href="javascript:void(0)" class="no-function"><i class="fa fa-pinterest"></i></a></li>
                                    <li class="footer_social_item"><a href="javascript:void(0)" class="no-function"><i class="fa fa-dribbble"></i></a></li>
                                    <li class="footer_social_item"><a href="javascript:void(0)" class="no-function"><i class="fa fa-behance"></i></a></li>
                                </ul>
                            </div>
                        </div>
                    </div>

                    <!-- Latest Blogs Column -->
                    <div class="col-lg-3 footer_column">
                        <div class="footer_col">
                            <div class="footer_title">Latest from Oras</div>
                            <div class="footer_content footer_blog">

                                <!-- Blog Post 1 -->
                                <div class="footer_blog_item clearfix">
                                    <div class="footer_blog_image">
                                        <img src="public/dist/landing/images/footer_blog_1.jpg" alt="Street parade in Oras during fiesta" />
                                    </div>
                                    <div class="footer_blog_content">
                                        <div class="footer_blog_title">
                                            <a href="javascript:void(0)" class="no-function">Oras Festival Parades & Local Celebrations</a>
                                        </div>
                                        <div class="footer_blog_date">June 2025</div>
                                    </div>
                                </div>

                                <!-- Blog Post 2 -->
                                <div class="footer_blog_item clearfix">
                                    <div class="footer_blog_image">
                                        <img src="public/dist/landing/images/footer_blog_2.jpg" alt="Nature trails in Eastern Samar" />
                                    </div>
                                    <div class="footer_blog_content">
                                        <div class="footer_blog_title">
                                            <a href="javascript:void(0)" class="no-function">Exploring Hidden Natural Gems of Eastern Samar</a>
                                        </div>
                                        <div class="footer_blog_date">February 2025</div>
                                    </div>
                                </div>

                                <!-- Blog Post 3 -->
                                <div class="footer_blog_item clearfix">
                                    <div class="footer_blog_image">
                                        <img src="public/dist/landing/images/footer_blog_3.jpg" alt="Samar Island Natural Park forest trails" />
                                    </div>
                                    <div class="footer_blog_content">
                                        <div class="footer_blog_title">
                                            <a href="javascript:void(0)" class="no-function">Tracks Through Samar Island Natural Park</a>
                                        </div>
                                        <div class="footer_blog_date">April 2025</div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>

                    <!-- Tags Column -->
                    <div class="col-lg-3 footer_column">
                        <div class="footer_col">
                            <div class="footer_title">Tags</div>
                            <div class="footer_content footer_tags">
                                <ul class="tags_list clearfix">
                                    <li class="tag_item no-function"><a href="javascript:void(0)">Oras</a></li>
                                    <li class="tag_item no-function"><a href="javascript:void(0)">Eastern Samar</a></li>
                                    <li class="tag_item no-function"><a href="javascript:void(0)">Travel</a></li>
                                    <li class="tag_item no-function"><a href="javascript:void(0)">Eco‑Tourism</a></li>
                                    <li class="tag_item no-function"><a href="javascript:void(0)">Culture</a></li>
                                    <li class="tag_item no-function"><a href="javascript:void(0)">Festivals</a></li>
                                    <li class="tag_item no-function"><a href="javascript:void(0)">Nature</a></li>
                                    <li class="tag_item no-function"><a href="javascript:void(0)">Hidden Gems</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>

                    <!-- Contact Info Column -->
                    <div class="col-lg-3 footer_column">
                        <div class="footer_col">
                            <div class="footer_title">Contact & Info</div>
                            <div class="footer_content footer_contact">
                                <ul class="contact_info_list">
                                    <li class="contact_info_item d-flex flex-row align-items-center">
                                        <div class="contact_info_icon"><img src="public/dist/landing/images/placeholder.svg" alt="Location Icon" /></div>
                                        <div class="contact_info_text">Butnga, Oras, Eastern Samar</div>
                                    </li>
                                    <li class="contact_info_item d-flex flex-row align-items-center">
                                        <div class="contact_info_icon"><img src="public/dist/landing/images/phone-call.svg" alt="Phone Icon" /></div>
                                        <div class="contact_info_text"><a href="tel:+639176080214">+63 917 6080 214</a></div>
                                    </li>
                                    <li class="contact_info_item d-flex flex-row align-items-center">
                                        <div class="contact_info_icon"><img src="public/dist/landing/images/message.svg" alt="Email Icon" /></div>
                                        <div class="contact_info_text"><a href="mailto:lguoras@gmail.com?Subject=Inquiry">lguoras@gmail.com</a></div>
                                    </li>
                                    <li class="contact_info_item d-flex flex-row align-items-center">
                                        <div class="contact_info_icon"><img src="public/dist/landing/images/planet-earth.svg" alt="Website Icon" /></div>
                                        <div class="contact_info_text"><a href="https://i-love-oras.essuc.online/" target="_blank" rel="noopener noreferrer">www.i-love-oras.essuc.online</a></div>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </footer>

        <!-- Copyright -->
        <div class="copyright">
            <div class="container">
                <div class="row">
                    <div class="col-lg-3 order-lg-1 order-2  ">
                        <div class="copyright_content d-flex flex-row align-items-center">
                            <div>
                                &copy; <script>
                                    document.write(new Date().getFullYear());
                                </script> I❤️Oras. All rights reserved.
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-9 order-lg-2 order-1">
                        <div class="footer_nav_container d-flex flex-row align-items-center justify-content-lg-end">
                            <div class="footer_nav">
                                <ul class="footer_nav_list">
                                    <li class="footer_nav_item"><a href="<?= base_url() ?>">Home</a></li>
                                    <li class="footer_nav_item"><a href="<?= base_url('about_oras') ?>">About Oras</a></li>
                                    <li class="footer_nav_item"><a href="<?= base_url('attractions') ?>">Attractions</a></li>
                                    <li class="footer_nav_item"><a href="<?= base_url('gallery') ?>">Gallery</a></li>
                                    <li class="footer_nav_item"><a href="<?= base_url('contact') ?>">Contact</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Login Modal -->
    <div class="modal fade" id="loginModal" tabindex="-1" role="dialog" aria-labelledby="loginModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="loginModalLabel">Administrator Portal</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <div class="modal-body">
                    <div class="alert alert-danger text-center d-none" id="loginError" role="alert">Invalid Email or Password</div>
                    <form id="loginForm" action="javascript:void(0)">
                        <div class="form-group">
                            <label for="loginEmail">Email address</label>
                            <input type="email" class="form-control" id="loginEmail" placeholder="Enter email" required>
                        </div>
                        <div class="form-group">
                            <label for="loginPassword">Password</label>
                            <input type="password" class="form-control" id="loginPassword" placeholder="Password" required>
                        </div>
                    </form>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary" form="loginForm" id="loginSubmit">Login</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Attraction Modal -->
    <div class="modal fade" id="attractionModal" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
            <div class="modal-content shadow-lg border-0">

                <div class="modal-header bg-primary text-white">
                    <h5 class="modal-title mb-0" id="modalTitle"></h5>
                    <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <div class="modal-body p-4 bg-white rounded-bottom">
                    <h6 class="font-weight-bold mb-3">Description</h6>
                    <div class="mb-4 p-3 border rounded bg-light">
                        <p id="modalDescription" class="text-dark mb-0"></p>
                    </div>

                    <h6 class="font-weight-bold mb-3">Photo Gallery</h6>
                    <div class="border rounded mb-4 p-2 bg-light">
                        <div id="modalCarousel" class="carousel slide" data-ride="carousel">
                            <div class="carousel-inner" id="carouselInner"></div>
                            <a class="carousel-control-prev" href="#modalCarousel" role="button" data-slide="prev">
                                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                <span class="sr-only">Previous</span>
                            </a>
                            <a class="carousel-control-next" href="#modalCarousel" role="button" data-slide="next">
                                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                <span class="sr-only">Next</span>
                            </a>
                        </div>
                    </div>

                    <h6 class="font-weight-bold mb-3">Map</h6>
                    <div class="border rounded overflow-hidden shadow-sm">
                        <iframe id="modalMap" width="100%" height="400" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        const base_url = "<?= base_url() ?>";
        const user = <?= json_encode(session()->get("user")) ?>;
        const notification = <?= json_encode(session()->get("notification")) ?>;
    </script>

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script src="public/dist/landing/js/jquery-3.2.1.min.js"></script>
    <script src="public/dist/landing/styles/bootstrap4/popper.js"></script>
    <script src="public/dist/landing/styles/bootstrap4/bootstrap.min.js"></script>
    <script src="public/dist/landing/plugins/OwlCarousel2-2.2.1/owl.carousel.js"></script>
    <script src="public/dist/landing/plugins/easing/easing.js"></script>
    <script src="public/dist/landing/js/custom.js"></script>
    <script src="public/dist/landing/js/script.js?v=<?= app_version() ?>"></script>
</body>

</html>