<style>
    .card {
        overflow: hidden;
        transition: transform 0.3s ease;
        border-radius: 0.5rem;
    }

    .card:hover {
        transform: scale(1.02);
        box-shadow: 0 8px 20px rgba(0, 0, 0, 0.3);
    }

    .card-img {
        height: 100%;
        object-fit: cover;
        transition: opacity 0.3s ease;
    }

    .card-img-overlay {
        padding: 1.5rem;
        color: #fff;
        background: linear-gradient(to top, rgba(0, 0, 0, 0.85) 30%, rgba(0, 0, 0, 0) 100%);
        border-radius: 0.5rem;
        display: flex;
        flex-direction: column;
        justify-content: flex-end;
    }

    .card-title {
        font-size: 1.3rem;
        font-weight: 600;
    }

    .event-badge {
        background-color: #ff5e5e;
        padding: 0.3rem 0.6rem;
        font-size: 0.75rem;
        border-radius: 0.25rem;
        display: inline-block;
        margin-bottom: 0.5rem;
        font-weight: bold;
    }

    .event-time,
    .event-location {
        font-size: 0.85rem;
        margin-top: 0.2rem;
    }

    .btn-event {
        margin-top: 0.75rem;
        font-size: 0.8rem;
        color: #fff;
        border: 1px solid #fff;
        padding: 0.4rem 0.75rem;
        border-radius: 0.25rem;
        transition: 0.3s;
        align-self: flex-start;
    }

    .btn-event:hover {
        background-color: #fff;
        color: #000;
        text-decoration: none;
    }

    .nav-tabs .nav-link.active {
        background-color: #ff5e5e;
        color: white !important;
        border-radius: 0.25rem;
    }

    .nav-tabs .nav-link {
        border: none;
        color: #555;
        font-weight: 600;
    }

    .intro {
        padding: 60px 0;
        background-color: #f9f9f9;
    }

    .tab-pane {
        animation: fadeIn 0.5s ease-in-out;
    }

    .section_title {
        font-size: 36px;
        font-weight: 700;
        color: #222;
        margin-bottom: 10px;
    }

    .section_subtitle {
        font-size: 16px;
        color: #777;
        max-width: 600px;
        margin: 0 auto;
    }

    @keyframes fadeIn {
        from {
            opacity: 0;
        }

        to {
            opacity: 1;
        }
    }
</style>

<div class="intro">
    <div class="container">
        <!-- Section Header -->
        <div class="col-12 text-center mb-5">
            <h2 class="section_title">Featured Events in Oras</h2>
            <p class="section_subtitle">Catch the best activities happening around town!</p>
        </div>

        <!-- Tabs -->
        <ul class="nav nav-tabs mb-4 justify-content-center" id="eventTabs" role="tablist">
            <li class="nav-item">
                <a class="nav-link active" id="upcoming-tab" data-toggle="tab" href="#upcoming" role="tab">Upcoming</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="ongoing-tab" data-toggle="tab" href="#ongoing" role="tab">Ongoing</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="past-tab" data-toggle="tab" href="#past" role="tab">Past</a>
            </li>
        </ul>

        <!-- Tab Content -->
        <div class="tab-content" id="eventTabsContent">

            <!-- Upcoming -->
            <div class="tab-pane fade show active" id="upcoming" role="tabpanel">
                <div class="row">
                    <!-- Event 1 -->
                    <div class="col-md-6 col-lg-4 mb-4">
                        <div class="card bg-dark text-white h-100">
                            <img src="<?= base_url("public/dist/landing/images/event-1.jpg") ?>" class="card-img" alt="Tusukan Band">
                            <div class="card-img-overlay">
                                <span class="event-badge">🎸 Live Band</span>
                                <h5 class="card-title">Tusukan Live Band</h5>
                                <p class="mb-1">Ret. Gen. Nonoy Gardiola and Dabarkads</p>
                                <div class="event-time"><i class="fa fa-calendar"></i> Feb 4, 2025 – 5:00 PM</div>
                                <div class="event-location"><i class="fa fa-map-marker"></i> Tusukan Food Park</div>
                                <a href="javascript:void(0)" class="btn-event no-function">View Details</a>
                            </div>
                        </div>
                    </div>
                    <!-- Event 2 -->
                    <div class="col-md-6 col-lg-4 mb-4">
                        <div class="card bg-dark text-white h-100">
                            <img src="<?= base_url("public/dist/landing/images/event-2.jpg") ?>" class="card-img" alt="Acoustic Night">
                            <div class="card-img-overlay">
                                <span class="event-badge">🎶 Chill</span>
                                <h5 class="card-title">Acoustic Night</h5>
                                <p class="mb-1">Local talents unplugged</p>
                                <div class="event-time"><i class="fa fa-calendar"></i> Sept 7, 2025 – 7:00 PM</div>
                                <div class="event-location"><i class="fa fa-map-marker"></i> Oras Baywalk</div>
                                <a href="javascript:void(0)" class="btn-event no-function">View Details</a>
                            </div>
                        </div>
                    </div>
                    <!-- Event 3 -->
                    <div class="col-md-6 col-lg-4 mb-4">
                        <div class="card bg-dark text-white h-100">
                            <img src="<?= base_url("public/dist/landing/images/event-3.jpg") ?>" class="card-img" alt="Barangay Fiesta">
                            <div class="card-img-overlay">
                                <span class="event-badge">🎪 Fiesta</span>
                                <h5 class="card-title">Barangay Fiesta</h5>
                                <p class="mb-1">Parade, games & food stalls</p>
                                <div class="event-time"><i class="fa fa-calendar"></i> Nov 15, 2025 – 10:00 AM</div>
                                <div class="event-location"><i class="fa fa-map-marker"></i> Brgy. Cagmani</div>
                                <a href="javascript:void(0)" class="btn-event no-function">View Details</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Ongoing -->
            <div class="tab-pane fade" id="ongoing" role="tabpanel">
                <div class="row">
                    <!-- Event 1 -->
                    <div class="col-md-6 col-lg-4 mb-4">
                        <div class="card bg-dark text-white h-100">
                            <img src="<?= base_url("public/dist/landing/images/event-1.jpg") ?>" class="card-img" alt="Disco Sayawan">
                            <div class="card-img-overlay">
                                <span class="event-badge">🕺 Disco</span>
                                <h5 class="card-title">Disco Sayawan</h5>
                                <p class="mb-1">Pahanginan ha Kalumpinayan</p>
                                <div class="event-time"><i class="fa fa-calendar"></i> Aug 1–7, 2025</div>
                                <div class="event-location"><i class="fa fa-map-marker"></i> Brgy. Sabang</div>
                                <a href="javascript:void(0)" class="btn-event no-function">View Details</a>
                            </div>
                        </div>
                    </div>
                    <!-- Event 2 -->
                    <div class="col-md-6 col-lg-4 mb-4">
                        <div class="card bg-dark text-white h-100">
                            <img src="<?= base_url("public/dist/landing/images/event-2.jpg") ?>" class="card-img" alt="DJ Night">
                            <div class="card-img-overlay">
                                <span class="event-badge">🎧 DJ</span>
                                <h5 class="card-title">Beachside Beats</h5>
                                <p class="mb-1">With DJ MARZ</p>
                                <div class="event-time"><i class="fa fa-calendar"></i> Aug 6–8, 2025</div>
                                <div class="event-location"><i class="fa fa-map-marker"></i> Tula-Tula Beach</div>
                                <a href="javascript:void(0)" class="btn-event no-function">View Details</a>
                            </div>
                        </div>
                    </div>
                    <!-- Event 3 -->
                    <div class="col-md-6 col-lg-4 mb-4">
                        <div class="card bg-dark text-white h-100">
                            <img src="<?= base_url("public/dist/landing/images/event-3.jpg") ?>" class="card-img" alt="Cultural Parade">
                            <div class="card-img-overlay">
                                <span class="event-badge">🎭 Parade</span>
                                <h5 class="card-title">Cultural Parade</h5>
                                <p class="mb-1">Street performances and floats</p>
                                <div class="event-time"><i class="fa fa-calendar"></i> Aug 5–10, 2025</div>
                                <div class="event-location"><i class="fa fa-map-marker"></i> Oras Town Proper</div>
                                <a href="javascript:void(0)" class="btn-event no-function">View Details</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Past -->
            <div class="tab-pane fade" id="past" role="tabpanel">
                <div class="row">
                    <!-- Event 1 -->
                    <div class="col-md-6 col-lg-4 mb-4">
                        <div class="card bg-dark text-white h-100">
                            <img src="<?= base_url("public/dist/landing/images/event-1.jpg") ?>" class="card-img" alt="Father's Night">
                            <div class="card-img-overlay">
                                <span class="event-badge">🎤 Father's Night</span>
                                <h5 class="card-title">Kantahan Sayawan</h5>
                                <p class="mb-1">Drei Audio ft. Alex Evardone</p>
                                <div class="event-time"><i class="fa fa-calendar"></i> June 15, 2025</div>
                                <div class="event-location"><i class="fa fa-map-marker"></i> Tusukan Food Park</div>
                                <a href="javascript:void(0)" class="btn-event no-function">View Details</a>
                            </div>
                        </div>
                    </div>
                    <!-- Event 2 -->
                    <div class="col-md-6 col-lg-4 mb-4">
                        <div class="card bg-dark text-white h-100">
                            <img src="<?= base_url("public/dist/landing/images/event-2.jpg") ?>" class="card-img" alt="Summer Festival">
                            <div class="card-img-overlay">
                                <span class="event-badge">🌞 Summer Fest</span>
                                <h5 class="card-title">Oras Summer Festival</h5>
                                <p class="mb-1">Food booths, beach games</p>
                                <div class="event-time"><i class="fa fa-calendar"></i> April 20, 2025</div>
                                <div class="event-location"><i class="fa fa-map-marker"></i> Oras Downtown</div>
                                <a href="javascript:void(0)" class="btn-event no-function">View Details</a>
                            </div>
                        </div>
                    </div>
                    <!-- Event 3 -->
                    <div class="col-md-6 col-lg-4 mb-4">
                        <div class="card bg-dark text-white h-100">
                            <img src="<?= base_url("public/dist/landing/images/event-3.jpg") ?>" class="card-img" alt="New Year">
                            <div class="card-img-overlay">
                                <span class="event-badge">🎆 New Year Bash</span>
                                <h5 class="card-title">Countdown Party</h5>
                                <p class="mb-1">Fireworks & live music</p>
                                <div class="event-time"><i class="fa fa-calendar"></i> Dec 31, 2024</div>
                                <div class="event-location"><i class="fa fa-map-marker"></i> Town Plaza</div>
                                <a href="javascript:void(0)" class="btn-event no-function">View Details</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>