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
            <div class="tab-pane fade show active" id="upcoming" role="tabpanel">
                <div class="row">
                    <?php if (!empty($upcoming)): ?>
                        <?php foreach ($upcoming as $event): ?>
                            <div class="col-md-6 col-lg-4 mb-4">
                                <div class="card bg-dark text-white h-100">
                                    <img src="<?= base_url("public/dist/landing/images/events/{$event['thumbnail']}") ?>"
                                        class="card-img"
                                        alt="<?= esc($event['title']) ?>">
                                    <div class="card-img-overlay">
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
                                        <a href="javascript:void(0)" class="btn-event no-function">View Details</a>
                                    </div>
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
            <div class="tab-pane fade show" id="ongoing" role="tabpanel">
                <div class="row">
                    <?php if (!empty($ongoing)): ?>
                        <?php foreach ($ongoing as $event): ?>
                            <div class="col-md-6 col-lg-4 mb-4">
                                <div class="card bg-dark text-white h-100">
                                    <img src="<?= base_url("public/dist/landing/images/events/{$event['thumbnail']}") ?>"
                                        class="card-img"
                                        alt="<?= esc($event['title']) ?>">
                                    <div class="card-img-overlay">
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
                                        <a href="javascript:void(0)" class="btn-event no-function">View Details</a>
                                    </div>
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
            <div class="tab-pane fade show" id="past" role="tabpanel">
                <div class="row">
                    <?php if (!empty($past)): ?>
                        <?php foreach ($past as $event): ?>
                            <div class="col-md-6 col-lg-4 mb-4">
                                <div class="card bg-dark text-white h-100">
                                    <img src="<?= base_url("public/dist/landing/images/events/{$event['thumbnail']}") ?>"
                                        class="card-img"
                                        alt="<?= esc($event['title']) ?>">
                                    <div class="card-img-overlay">
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
                                        <a href="javascript:void(0)" class="btn-event no-function">View Details</a>
                                    </div>
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