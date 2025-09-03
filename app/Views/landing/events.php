<style>
    .card {
        overflow: hidden;
        transition: transform 0.3s ease;
        border-radius: 0.5rem;
        display: flex;
        flex-direction: column;
        height: 100%;
        /* ensures equal height */
    }

    .card:hover {
        transform: scale(1.02);
        box-shadow: 0 8px 20px rgba(0, 0, 0, 0.3);
    }

    /* Portrait images (overlay style) */
    .card-img {
        height: 100%;
        object-fit: cover;
        transition: opacity 0.3s ease;
    }

    /* Landscape images */
    .card-img-top {
        height: 250px;
        /* uniform height across all landscape cards */
        object-fit: cover;
        width: 100%;
    }

    /* Overlay styling (portrait only) */
    .card-img-overlay {
        padding: 1.5rem;
        color: #fff;
        background: linear-gradient(to top, rgba(0, 0, 0, 0.85) 30%, rgba(0, 0, 0, 0) 100%);
        border-radius: 0.5rem;
        display: flex;
        flex-direction: column;
        justify-content: flex-end;
    }

    /* Card content (landscape only) */
    .card-body {
        flex: 1;
        /* makes details stretch evenly */
        display: flex;
        flex-direction: column;
    }

    /* Text & badges */
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

    /* Buttons */
    .btn-event,
    .btn.btn-sm.btn-primary {
        margin-top: 0.75rem;
        font-size: 0.8rem;
        padding: 0.4rem 0.75rem;
        border-radius: 0.25rem;
        transition: 0.3s;
        align-self: flex-start;
    }

    .btn-event {
        color: #fff;
        border: 1px solid #fff;
    }

    .btn-event:hover {
        background-color: #fff;
        color: #000;
        text-decoration: none;
    }

    /* Tabs */
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

    /* Section styling */
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

    /* Fade animation */
    @keyframes fadeIn {
        from {
            opacity: 0;
        }

        to {
            opacity: 1;
        }
    }

    /* Responsive tweak: reduce landscape height on mobile */
    @media (max-width: 768px) {
        .card-img-top {
            height: 180px;
        }
    }

    /* Landscape card body (light background) */
    .card-body.landscape {
        background: #f8f9fa;
        /* light background */
        color: #000;
        /* dark text for readability */
        flex: 1;
        display: flex;
        flex-direction: column;
        justify-content: space-between;
        /* pushes button to bottom */
        padding: 1rem 1.25rem;
        border-top: 1px solid #ddd;
        border-radius: 0 0 0.5rem 0.5rem;
    }

    /* Adjust text for landscape */
    .card-body.landscape .card-title {
        font-size: 1.2rem;
        font-weight: 600;
        margin-bottom: 0.5rem;
    }

    .card-body.landscape .event-badge {
        margin-bottom: 0.75rem;
    }

    /* Button inside landscape card */
    .card-body.landscape .btn {
        align-self: flex-start;
        margin-top: auto;
        /* stays at the bottom */
        font-size: 0.85rem;
        padding: 0.45rem 0.9rem;
    }

    /* Text truncation (2 lines with ellipsis) */
    .card-title,
    .card-body.landscape p,
    .card-img-overlay p {
        display: -webkit-box;
        -webkit-line-clamp: 2;
        line-clamp: 2;
        /* max 2 lines */
        -webkit-box-orient: vertical;
        overflow: hidden;
        text-overflow: ellipsis;
        line-height: 1.4em;
        max-height: 2.8em;
        /* ensures exactly 2 lines */
    }

    /* Portrait text color (white on overlay) */
    .card-img-overlay {
        color: #fff;
    }

    /* Landscape text color (dark on light background) */
    .card-body.landscape {
        color: #333;
        background: #f8f9fa;
    }

    /* Unified badge style (reddish background for all) */
    .event-badge,
    .card-body.landscape .badge {
        background-color: #ff5e5e !important;
        color: #fff !important;
        padding: 0.3rem 0.6rem;
        font-size: 0.75rem;
        border-radius: 0.25rem;
        display: inline-block;
        margin-bottom: 0.5rem;
        font-weight: bold;
    }

    /* Event type badge - single line with ellipsis */
    .event-badge {
        background-color: #ff5e5e;
        padding: 0.3rem 0.6rem;
        font-size: 0.75rem;
        border-radius: 0.25rem;
        display: inline-block;
        margin-bottom: 0.5rem;
        font-weight: bold;

        max-width: 100%;
        /* Prevent overflow */
        white-space: nowrap;
        /* Keep single line */
        overflow: hidden;
        /* Hide overflow */
        text-overflow: ellipsis;
        /* Add ... */
    }

    #eventModal .event-modal-body {
        padding: 1.5rem 2rem;
        background: #f9f9f9;
        border-radius: 0 0 0.5rem 0.5rem;
    }

    /* Landscape images */
    #eventModal .event-modal-body img {
        border-radius: 0.5rem;
        box-shadow: 0 4px 15px rgba(0, 0, 0, 0.15);
        margin-bottom: 1rem;
        max-height: 350px;
        /* Limit height */
        width: 100%;
        /* Responsive */
        object-fit: cover;
        /* Crop nicely */
    }

    /* Portrait background container */
    #eventModal .event-modal-body .event-image-bg {
        border-radius: 0.5rem;
        box-shadow: 0 4px 15px rgba(0, 0, 0, 0.15);
        margin-bottom: 1rem;
        height: 350px;
        /* Fixed height */
        width: 100%;
        background-size: cover;
        background-position: center;
        background-repeat: no-repeat;
        position: relative;
        overflow: hidden;
    }

    /* Optional dark overlay for better readability */
    #eventModal .event-modal-body .event-image-bg::after {
        content: "";
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background: rgba(0, 0, 0, 0.25);
        /* Semi-transparent overlay */
        border-radius: 0.5rem;
    }

    /* Text styles */
    #eventModal .event-modal-body p {
        font-size: 0.95rem;
        color: #444;
        margin-bottom: 0.8rem;
        line-height: 1.5;
    }

    #eventModal .event-modal-body strong {
        color: #222;
    }

    #eventModal .event-modal-body .event-description {
        font-size: 1rem;
        color: #333;
        margin-top: 1rem;
        padding: 1rem;
        background: #fff;
        border-left: 4px solid #ff5e5e;
        border-radius: 0.25rem;
        box-shadow: inset 0 1px 3px rgba(0, 0, 0, 0.05);
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

        <?php
        // Helper to check if image is landscape
        function isLandscape($path)
        {
            $size = @getimagesize($path);
            if ($size) {
                return $size[0] > $size[1]; // width > height → landscape
            }
            return false;
        }
        ?>

        <!-- Tab Content -->
        <div class="tab-content" id="eventTabsContent">

            <!-- UPCOMING EVENTS -->
            <div class="tab-pane fade show active" id="upcoming" role="tabpanel">
                <div class="row">
                    <?php if (!empty($upcoming)): ?>
                        <?php foreach ($upcoming as $event): ?>
                            <?php
                            $imgPath = FCPATH . "public/dist/landing/images/events/{$event['thumbnail']}";
                            $landscape = isLandscape($imgPath);
                            ?>
                            <div class="col-md-6 col-lg-4 mb-4">
                                <div class="card bg-dark text-white h-100">
                                    <?php if ($landscape): ?>
                                        <!-- Landscape layout -->
                                        <img src="<?= base_url("public/dist/landing/images/events/{$event['thumbnail']}") ?>"
                                            class="card-img-top"
                                            alt="<?= esc($event['title']) ?>">
                                        <div class="card-body landscape">
                                            <div>
                                                <span class="event-badge w-100"><?= esc($event['event_type']) ?></span>
                                                <h5 class="card-title"><?= esc($event['title']) ?></h5>
                                                <p class="mb-1"><?= esc($event['performers']) ?></p>
                                                <div class="event-time">
                                                    <i class="fa fa-calendar"></i>
                                                    <?= date('M d, Y', strtotime($event['date'])) ?> – <?= date('g:i A', strtotime($event['start_time'])) ?>
                                                </div>
                                                <div class="event-location">
                                                    <i class="fa fa-map-marker"></i> <?= esc($event['venue']) ?>
                                                </div>
                                            </div>
                                            <a href="javascript:void(0)" class="btn-event btn-primary" data-toggle="modal" data-target="#eventModal" data-id="<?= $event['id'] ?>">View Details</a>
                                        </div>
                                    <?php else: ?>
                                        <!-- Portrait layout -->
                                        <img src="<?= base_url("public/dist/landing/images/events/{$event['thumbnail']}") ?>"
                                            class="card-img"
                                            alt="<?= esc($event['title']) ?>">
                                        <div class="card-img-overlay d-flex flex-column justify-content-end">
                                            <span class="event-badge"><?= esc($event['event_type']) ?></span>
                                            <h5 class="card-title"><?= esc($event['title']) ?></h5>
                                            <p class="mb-1"><?= esc($event['performers']) ?></p>
                                            <div class="event-time">
                                                <i class="fa fa-calendar"></i>
                                                <?= date('M d, Y', strtotime($event['date'])) ?> – <?= date('g:i A', strtotime($event['start_time'])) ?>
                                            </div>
                                            <div class="event-location">
                                                <i class="fa fa-map-marker"></i> <?= esc($event['venue']) ?>
                                            </div>
                                            <a href="javascript:void(0)" class="btn-event" data-toggle="modal" data-target="#eventModal" data-id="<?= $event['id'] ?>">View Details</a>
                                        </div>
                                    <?php endif; ?>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <div class="col-12 text-center py-5">
                            <div class="empty-events">
                                <img src="<?= base_url('public/dist/landing/images/no-events.png') ?>" alt="No events" class="mb-4" style="max-width:180px; opacity:0.8;">
                                <h4 class="fw-bold text-dark mb-2">No upcoming events</h4>
                                <p class="text-muted mb-3">Check back later — we’re lining up something special for you!</p>
                            </div>
                        </div>
                    <?php endif; ?>
                </div>
            </div>

            <!-- ONGOING EVENTS -->
            <div class="tab-pane fade show" id="ongoing" role="tabpanel">
                <div class="row">
                    <?php if (!empty($ongoing)): ?>
                        <?php foreach ($ongoing as $event): ?>
                            <?php
                            $imgPath = FCPATH . "public/dist/landing/images/events/{$event['thumbnail']}";
                            $landscape = isLandscape($imgPath);
                            ?>
                            <div class="col-md-6 col-lg-4 mb-4">
                                <div class="card bg-dark text-white h-100">
                                    <?php if ($landscape): ?>
                                        <!-- Landscape layout -->
                                        <img src="<?= base_url("public/dist/landing/images/events/{$event['thumbnail']}") ?>"
                                            class="card-img-top"
                                            alt="<?= esc($event['title']) ?>">
                                        <div class="card-body landscape">
                                            <div>
                                                <span class="event-badge w-100"><?= esc($event['event_type']) ?></span>
                                                <h5 class="card-title"><?= esc($event['title']) ?></h5>
                                                <p class="mb-1"><?= esc($event['performers']) ?></p>
                                                <div class="event-time">
                                                    <i class="fa fa-calendar"></i>
                                                    <?= date('M d, Y', strtotime($event['date'])) ?> – <?= date('g:i A', strtotime($event['start_time'])) ?>
                                                </div>
                                                <div class="event-location">
                                                    <i class="fa fa-map-marker"></i> <?= esc($event['venue']) ?>
                                                </div>
                                            </div>
                                            <a href="javascript:void(0)" class="btn-event btn-primary" data-toggle="modal" data-target="#eventModal" data-id="<?= $event['id'] ?>">View Details</a>
                                        </div>
                                    <?php else: ?>
                                        <!-- Portrait layout -->
                                        <img src="<?= base_url("public/dist/landing/images/events/{$event['thumbnail']}") ?>"
                                            class="card-img"
                                            alt="<?= esc($event['title']) ?>">
                                        <div class="card-img-overlay d-flex flex-column justify-content-end">
                                            <span class="event-badge"><?= esc($event['event_type']) ?></span>
                                            <h5 class="card-title"><?= esc($event['title']) ?></h5>
                                            <p class="mb-1"><?= esc($event['performers']) ?></p>
                                            <div class="event-time">
                                                <i class="fa fa-calendar"></i>
                                                <?= date('M d, Y', strtotime($event['date'])) ?> – <?= date('g:i A', strtotime($event['start_time'])) ?>
                                            </div>
                                            <div class="event-location">
                                                <i class="fa fa-map-marker"></i> <?= esc($event['venue']) ?>
                                            </div>
                                            <a href="javascript:void(0)" class="btn-event" data-toggle="modal" data-target="#eventModal" data-id="<?= $event['id'] ?>">View Details</a>
                                        </div>
                                    <?php endif; ?>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <div class="col-12 text-center py-5">
                            <div class="empty-events">
                                <img src="<?= base_url('public/dist/landing/images/no-events.png') ?>" alt="No events" class="mb-4" style="max-width:180px; opacity:0.8;">
                                <h4 class="fw-bold text-dark mb-2">No ongoing events</h4>
                                <p class="text-muted mb-3">Check back later — we’re lining up something special for you!</p>
                            </div>
                        </div>
                    <?php endif; ?>
                </div>
            </div>

            <!-- PAST EVENTS -->
            <div class="tab-pane fade show" id="past" role="tabpanel">
                <div class="row">
                    <?php if (!empty($past)): ?>
                        <?php foreach ($past as $event): ?>
                            <?php
                            $imgPath = FCPATH . "public/dist/landing/images/events/{$event['thumbnail']}";
                            $landscape = isLandscape($imgPath);
                            ?>
                            <div class="col-md-6 col-lg-4 mb-4">
                                <div class="card bg-dark text-white h-100">
                                    <?php if ($landscape): ?>
                                        <!-- Landscape layout -->
                                        <img src="<?= base_url("public/dist/landing/images/events/{$event['thumbnail']}") ?>"
                                            class="card-img-top"
                                            alt="<?= esc($event['title']) ?>">
                                        <div class="card-body landscape">
                                            <div>
                                                <span class="event-badge w-100"><?= esc($event['event_type']) ?></span>
                                                <h5 class="card-title"><?= esc($event['title']) ?></h5>
                                                <p class="mb-1"><?= esc($event['performers']) ?></p>
                                                <div class="event-time">
                                                    <i class="fa fa-calendar"></i>
                                                    <?= date('M d, Y', strtotime($event['date'])) ?> – <?= date('g:i A', strtotime($event['start_time'])) ?>
                                                </div>
                                                <div class="event-location">
                                                    <i class="fa fa-map-marker"></i> <?= esc($event['venue']) ?>
                                                </div>
                                            </div>
                                            <a href="javascript:void(0)" class="btn-event btn-primary" data-toggle="modal" data-target="#eventModal" data-id="<?= $event['id'] ?>">View Details</a>
                                        </div>
                                    <?php else: ?>
                                        <!-- Portrait layout -->
                                        <img src="<?= base_url("public/dist/landing/images/events/{$event['thumbnail']}") ?>"
                                            class="card-img"
                                            alt="<?= esc($event['title']) ?>">
                                        <div class="card-img-overlay d-flex flex-column justify-content-end">
                                            <span class="event-badge"><?= esc($event['event_type']) ?></span>
                                            <h5 class="card-title"><?= esc($event['title']) ?></h5>
                                            <p class="mb-1"><?= esc($event['performers']) ?></p>
                                            <div class="event-time">
                                                <i class="fa fa-calendar"></i>
                                                <?= date('M d, Y', strtotime($event['date'])) ?> – <?= date('g:i A', strtotime($event['start_time'])) ?>
                                            </div>
                                            <div class="event-location">
                                                <i class="fa fa-map-marker"></i> <?= esc($event['venue']) ?>
                                            </div>
                                            <a href="javascript:void(0)" class="btn-event" data-toggle="modal" data-target="#eventModal" data-id="<?= $event['id'] ?>">View Details</a>
                                        </div>
                                    <?php endif; ?>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <div class="col-12 text-center py-5">
                            <div class="empty-events">
                                <img src="<?= base_url('public/dist/landing/images/no-events.png') ?>" alt="No events" class="mb-4" style="max-width:180px; opacity:0.8;">
                                <h4 class="fw-bold text-dark mb-2">No past events</h4>
                                <p class="text-muted mb-3">Check back later — we’re lining up something special for you!</p>
                            </div>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Event Modal -->
<div class="modal fade" id="eventModal" tabindex="-1" role="dialog" aria-labelledby="eventModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
        <div class="modal-content">

            <!-- Header -->
            <div class="modal-header">
                <h5 class="modal-title" id="eventModalLabel">Event Title</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <!-- Body -->
            <div class="modal-body event-modal-body">
                <p><strong>Performers:</strong> <span id="eventPerformers"></span></p>
                <p><strong>Date & Time:</strong> <span id="eventDateTime"></span></p>
                <p><strong>Venue:</strong> <span id="eventVenue"></span></p>

                <p class="event-description" id="eventDescription"></p>
            </div>

            <!-- Footer -->
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>

        </div>
    </div>
</div>