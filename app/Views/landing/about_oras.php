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
                                    <li class="social_list_item"><a href="javascript:void(0)"><i class="fa fa-pinterest" aria-hidden="true"></i></a></li>
                                    <li class="social_list_item"><a href="javascript:void(0)"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
                                    <li class="social_list_item"><a href="javascript:void(0)"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
                                    <li class="social_list_item"><a href="javascript:void(0)"><i class="fa fa-dribbble" aria-hidden="true"></i></a></li>
                                    <li class="social_list_item"><a href="javascript:void(0)"><i class="fa fa-behance" aria-hidden="true"></i></a></li>
                                    <li class="social_list_item"><a href="javascript:void(0)"><i class="fa fa-linkedin" aria-hidden="true"></i></a></li>
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
                <div class="home_title">about us</div>
            </div>
        </div>

        <!-- Intro -->
        <div class="intro">
            <div class="container">
                <div class="row">
                    <div class="col-lg-7">
                        <div class="intro_image"><img src="public/dist/landing/images/intro.png" alt=""></div>
                    </div>
                    <div class="col-lg-5">
                        <div class="intro_content">
                            <div class="intro_title">we have the best tours</div>
                            <p class="intro_text">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus quis vulputate eros, iaculis consequat nisl. Nunc et suscipit urna. Integer elementum orci eu vehicula pretium. Donec bibendum tristique condimentum. Aenean in lacus ligula. Phasellus euismod gravida eros. Aenean nec ipsum aliquet, pharetra magna id, interdum sapien. Etiam id lorem eu nisl pellentesque semper. Nullam tincidunt metus placerat, suscipit leo ut, tempus nulla. Fusce at eleifend tellus. Ut eleifend dui nunc, non fermentum quam placerat non. Etiam venenatis nibh augue, sed eleifend justo tristique eu</p>
                            <div class="button intro_button">
                                <div class="button_bcg"></div><a href="#">explore now<span></span><span></span><span></span></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Stats -->
        <div class="stats">
            <div class="container">
                <div class="row">
                    <div class="col text-center">
                        <div class="section_title">years statistics</div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-10 offset-lg-1 text-center">
                        <p class="stats_text">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus quis vulputate eros, iaculis consequat nisl. Nunc et suscipit urna. Integer elementum orci eu vehicula pretium. Donec bibendum tristique condimentum. Aenean in lacus ligula. </p>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <div class="stats_years">
                            <div class="stats_years_last">2016</div>
                            <div class="stats_years_new float-right">2017</div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <div class="stats_contents">

                            <!-- Stats Item -->
                            <div class="stats_item d-flex flex-md-row flex-column clearfix">
                                <div class="stats_last order-md-1 order-3">
                                    <div class="stats_last_icon d-flex flex-column align-items-center justify-content-end">
                                        <img src="images/stats_1.png" alt="">
                                    </div>
                                    <div class="stats_last_content">
                                        <div class="stats_number">1642</div>
                                        <div class="stats_type">Clients</div>
                                    </div>
                                </div>
                                <div class="stats_bar order-md-2 order-2" data-x="1642" data-y="3527" data-color="#31124b">
                                    <div class="stats_bar_perc">
                                        <div>
                                            <div class="stats_bar_value"></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="stats_new order-md-3 order-1 text-right">
                                    <div class="stats_new_icon d-flex flex-column align-items-center justify-content-end">
                                        <img src="images/stats_1.png" alt="">
                                    </div>
                                    <div class="stats_new_content">
                                        <div class="stats_number">3527</div>
                                        <div class="stats_type">Clients</div>
                                    </div>
                                </div>
                            </div>

                            <!-- Stats Item -->
                            <div class="stats_item d-flex flex-md-row flex-column clearfix">
                                <div class="stats_last order-md-1 order-3">
                                    <div class="stats_last_icon d-flex flex-column align-items-center justify-content-end">
                                        <img src="images/stats_2.png" alt="">
                                    </div>
                                    <div class="stats_last_content">
                                        <div class="stats_number">768</div>
                                        <div class="stats_type">Returning Clients</div>
                                    </div>
                                </div>
                                <div class="stats_bar order-md-2 order-2" data-x="768" data-y="145" data-color="#a95ce4">
                                    <div class="stats_bar_perc">
                                        <div>
                                            <div class="stats_bar_value"></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="stats_new order-md-3 order-1 text-right">
                                    <div class="stats_new_icon d-flex flex-column align-items-center justify-content-end">
                                        <img src="images/stats_2.png" alt="">
                                    </div>
                                    <div class="stats_new_content">
                                        <div class="stats_number">145</div>
                                        <div class="stats_type">Returning Clients</div>
                                    </div>
                                </div>
                            </div>

                            <!-- Stats Item -->
                            <div class="stats_item d-flex flex-md-row flex-column clearfix">
                                <div class="stats_last order-md-1 order-3">
                                    <div class="stats_last_icon d-flex flex-column align-items-center justify-content-end">
                                        <img src="images/stats_3.png" alt="">
                                    </div>
                                    <div class="stats_last_content">
                                        <div class="stats_number">11546</div>
                                        <div class="stats_type">Reach</div>
                                    </div>
                                </div>
                                <div class="stats_bar order-md-2 order-2" data-x="11546" data-y="9321" data-color="#fa6f1b">
                                    <div class="stats_bar_perc">
                                        <div>
                                            <div class="stats_bar_value"></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="stats_new order-md-3 order-1 text-right">
                                    <div class="stats_new_icon d-flex flex-column align-items-center justify-content-end">
                                        <img src="images/stats_3.png" alt="">
                                    </div>
                                    <div class="stats_new_content">
                                        <div class="stats_number">9321</div>
                                        <div class="stats_type">Reach</div>
                                    </div>
                                </div>
                            </div>

                            <!-- Stats Item -->
                            <div class="stats_item d-flex flex-md-row flex-column clearfix">
                                <div class="stats_last order-md-1 order-3">
                                    <div class="stats_last_icon d-flex flex-column align-items-center justify-content-end">
                                        <img src="images/stats_4.png" alt="">
                                    </div>
                                    <div class="stats_last_content">
                                        <div class="stats_number">3729</div>
                                        <div class="stats_type">Items</div>
                                    </div>
                                </div>
                                <div class="stats_bar order-md-2 order-2" data-x="3729" data-y="17429" data-color="#fa9e1b">
                                    <div class="stats_bar_perc">
                                        <div>
                                            <div class="stats_bar_value"></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="stats_new order-md-3 order-1 text-right">
                                    <div class="stats_new_icon d-flex flex-column align-items-center justify-content-end">
                                        <img src="images/stats_4.png" alt="">
                                    </div>
                                    <div class="stats_new_content">
                                        <div class="stats_number">17429</div>
                                        <div class="stats_type">More Items</div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Add -->
        <div class="add">
            <div class="container">
                <div class="row">
                    <div class="col">
                        <div class="add_container">
                            <div class="add_background" style="background-image:url(images/add.jpg)"></div>
                            <div class="add_content">
                                <h1 class="add_title">thailand</h1>
                                <div class="add_subtitle">From <span>$999</span></div>
                                <div class="button add_button">
                                    <div class="button_bcg"></div><a href="#">explore now<span></span><span></span><span></span></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Milestones -->
        <div class="milestones">
            <div class="container">
                <div class="row">

                    <!-- Milestone -->
                    <div class="col-lg-3 milestone_col">
                        <div class="milestone text-center">
                            <div class="milestone_icon"><img src="images/milestone_1.png" alt=""></div>
                            <div class="milestone_counter" data-end-value="255">0</div>
                            <div class="milestone_text">Clients</div>
                        </div>
                    </div>

                    <!-- Milestone -->
                    <div class="col-lg-3 milestone_col">
                        <div class="milestone text-center">
                            <div class="milestone_icon"><img src="images/milestone_2.png" alt=""></div>
                            <div class="milestone_counter" data-end-value="1176">0</div>
                            <div class="milestone_text">Projects</div>
                        </div>
                    </div>

                    <!-- Milestone -->
                    <div class="col-lg-3 milestone_col">
                        <div class="milestone text-center">
                            <div class="milestone_icon"><img src="images/milestone_3.png" alt=""></div>
                            <div class="milestone_counter" data-end-value="39">0</div>
                            <div class="milestone_text">Countries</div>
                        </div>
                    </div>

                    <!-- Milestone -->
                    <div class="col-lg-3 milestone_col">
                        <div class="milestone text-center">
                            <div class="milestone_icon"><img src="images/milestone_4.png" alt=""></div>
                            <div class="milestone_counter" data-end-value="127">0</div>
                            <div class="milestone_text">Coffees</div>
                        </div>
                    </div>

                </div>
            </div>
        </div>

        <!-- Footer -->
        <footer class="footer">
            <div class="container">
                <div class="row">
                    <!-- Footer Column -->
                    <div class="col-lg-3 footer_column">
                        <div class="footer_col">
                            <div class="footer_content footer_about">
                                <div class="logo_container footer_logo">
                                    <div class="logo"><a href="#"><img src="public/dist/landing/images/logo.png?v=1.0" alt="" width="37">I❤️Oras</a></div>
                                </div>
                                <p class="footer_about_text"> Discover the heart of Oras with us. We bring you closer to the culture, experiences, and community that make this place unique.</p>
                                <ul class="footer_social_list">
                                    <li class="footer_social_item"><a href="javascript:void(0)"><i class="fa fa-pinterest"></i></a></li>
                                    <li class="footer_social_item"><a href="javascript:void(0)"><i class="fa fa-facebook-f"></i></a></li>
                                    <li class="footer_social_item"><a href="javascript:void(0)"><i class="fa fa-twitter"></i></a></li>
                                    <li class="footer_social_item"><a href="javascript:void(0)"><i class="fa fa-dribbble"></i></a></li>
                                    <li class="footer_social_item"><a href="javascript:void(0)"><i class="fa fa-behance"></i></a></li>
                                </ul>
                            </div>
                        </div>
                    </div>

                    <!-- Footer Column -->
                    <div class="col-lg-3 footer_column">
                        <div class="footer_col">
                            <div class="footer_title">latest blog posts</div>
                            <div class="footer_content footer_blog">

                                <!-- Footer blog item -->
                                <div class="footer_blog_item clearfix">
                                    <div class="footer_blog_image">
                                        <img src="public/dist/landing/images/footer_blog_1.jpg" alt="Sunset over a tropical beach with palm trees" />
                                    </div>
                                    <div class="footer_blog_content">
                                        <div class="footer_blog_title"><a href="blog.html">Exploring Hidden Beaches Around the World</a></div>
                                        <div class="footer_blog_date">May 15, 2025</div>
                                    </div>
                                </div>

                                <!-- Footer blog item -->
                                <div class="footer_blog_item clearfix">
                                    <div class="footer_blog_image">
                                        <img src="public/dist/landing/images/footer_blog_2.jpg" alt="Mountain trail with hikers walking at sunrise" />
                                    </div>
                                    <div class="footer_blog_content">
                                        <div class="footer_blog_title"><a href="blog.html">Top 10 Hiking Trails for Adventure Seekers</a></div>
                                        <div class="footer_blog_date">May 10, 2025</div>
                                    </div>
                                </div>

                                <!-- Footer blog item -->
                                <div class="footer_blog_item clearfix">
                                    <div class="footer_blog_image">
                                        <img src="public/dist/landing/images/footer_blog_3.jpg" alt="City skyline with colorful lights at night" />
                                    </div>
                                    <div class="footer_blog_content">
                                        <div class="footer_blog_title"><a href="blog.html">City Lights: Nightlife in the World's Best Urban Spots</a></div>
                                        <div class="footer_blog_date">May 5, 2025</div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>

                    <!-- Footer Column -->
                    <div class="col-lg-3 footer_column">
                        <div class="footer_col">
                            <div class="footer_title">tags</div>
                            <div class="footer_content footer_tags">
                                <ul class="tags_list clearfix">
                                    <li class="tag_item"><a href="javascript:void(0)">travel</a></li>
                                    <li class="tag_item"><a href="javascript:void(0)">lifestyle</a></li>
                                    <li class="tag_item"><a href="javascript:void(0)">technology</a></li>
                                    <li class="tag_item"><a href="javascript:void(0)">wellness</a></li>
                                    <li class="tag_item"><a href="javascript:void(0)">art</a></li>
                                    <li class="tag_item"><a href="javascript:void(0)">food</a></li>
                                    <li class="tag_item"><a href="javascript:void(0)">culture</a></li>
                                    <li class="tag_item"><a href="javascript:void(0)">events</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>

                    <!-- Footer Column -->
                    <div class="col-lg-3 footer_column">
                        <div class="footer_col">
                            <div class="footer_title">contact info</div>
                            <div class="footer_content footer_contact">
                                <ul class="contact_info_list">
                                    <li class="contact_info_item d-flex flex-row align-items-center">
                                        <div class="contact_info_icon">
                                            <img src="public/dist/landing/images/placeholder.svg" alt="Location Icon" />
                                        </div>
                                        <div class="contact_info_text">Butnga, Oras, Eastern Samar</div>
                                    </li>
                                    <li class="contact_info_item d-flex flex-row align-items-center">
                                        <div class="contact_info_icon">
                                            <img src="public/dist/landing/images/phone-call.svg" alt="Phone Icon" />
                                        </div>
                                        <div class="contact_info_text"><a href="tel:+639176080214">+63 917 6080 214</a></div>
                                    </li>
                                    <li class="contact_info_item d-flex flex-row align-items-center">
                                        <div class="contact_info_icon">
                                            <img src="public/dist/landing/images/message.svg" alt="Email Icon" />
                                        </div>
                                        <div class="contact_info_text">
                                            <a href="mailto:lguoras@gmail.com?Subject=Inquiry" target="_top" rel="noopener noreferrer">lguoras@gmail.com</a>
                                        </div>
                                    </li>
                                    <li class="contact_info_item d-flex flex-row align-items-center">
                                        <div class="contact_info_icon">
                                            <img src="public/dist/landing/images/planet-earth.svg" alt="Website Icon" />
                                        </div>
                                        <div class="contact_info_text">
                                            <a href="https://www.yourdomain.com" target="_blank" rel="noopener noreferrer">www.yourdomain.com</a>
                                        </div>
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
                                Copyright &copy;<script>
                                    document.write(new Date().getFullYear());
                                </script> All rights reserved.
                                
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

    <script src="public/dist/landing/js/jquery-3.2.1.min.js"></script>
    <script src="public/dist/landing/styles/bootstrap4/popper.js"></script>
    <script src="public/dist/landing/styles/bootstrap4/bootstrap.min.js"></script>
    <script src="public/dist/landing/plugins/greensock/TweenMax.min.js"></script>
    <script src="public/dist/landing/plugins/greensock/TimelineMax.min.js"></script>
    <script src="public/dist/landing/plugins/scrollmagic/ScrollMagic.min.js"></script>
    <script src="public/dist/landing/plugins/greensock/animation.gsap.min.js"></script>
    <script src="public/dist/landing/plugins/greensock/ScrollToPlugin.min.js"></script>
    <script src="public/dist/landing/plugins/parallax-js-master/parallax.min.js"></script>
    <script src="public/dist/landing/plugins/OwlCarousel2-2.2.1/owl.carousel.js"></script>
    <script src="public/dist/landing/plugins/easing/easing.js"></script>
    <script src="public/dist/landing/js/about_custom.js"></script>
    <script src="public/dist/landing/js/script.js"></script>
</body>

</html>