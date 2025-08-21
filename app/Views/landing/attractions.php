<style>
    .attraction_item {
        background-color: #fff;
        border-radius: 10px;
        padding: 25px 20px;
        box-shadow: 0 8px 25px rgba(0, 0, 0, 0.07);
        transition: all 0.3s ease;
        height: 100%;
        display: flex;
        flex-direction: column;
        justify-content: start;
    }

    .attraction_item:hover {
        transform: translateY(-6px);
        box-shadow: 0 12px 30px rgba(0, 0, 0, 0.15);
    }

    .attraction_item img {
        border-radius: 10px;
        height: 200px;
        object-fit: cover;
        width: 100%;
    }

    .attraction_item h4 {
        font-size: 20px;
        margin-top: 15px;
        font-weight: 600;
        color: #2d2d2d;
    }

    .attraction_item p {
        color: #555;
        font-size: 14px;
        margin-bottom: 10px;
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

    .more-info {
        display: inline-block;
        font-size: 14px;
        padding: 8px 16px;
        border-radius: 5px;
        text-decoration: none;
        transition: background-color 0.3s ease;
    }

    .more-info:hover {
        background-color: #007bff;
        color: #fff;
        border-color: #007bff;
    }

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

    .description-truncate {
        display: -webkit-box;
        -webkit-line-clamp: 5;
        line-clamp: 5;
        -webkit-box-orient: vertical;
        overflow: hidden;
        text-overflow: ellipsis;
    }
</style>

<div class="intro">
    <div class="container">
        <div class="row">
            <!-- Section Title -->
            <div class="col-12 text-center mb-5">
                <h2 class="section_title">Top Attractions in Oras</h2>
                <p class="section_subtitle">Discover these stunning destinations in Eastern Samar</p>
            </div>

            <!-- Loop Attractions -->
            <?php if (!empty($attractions)): ?>
                <?php foreach ($attractions as $attraction): ?>
                    <?php
                    // Decode photo gallery JSON
                    $photos = json_decode($attraction['photo_gallery'], true);
                    $firstPhoto = !empty($photos) ? base_url('public/dist/landing/images/attractions/' . $photos[0]) : base_url('public/dist/landing/images/no-image.jpg');
                    $modalId = "modalAttraction_" . $attraction['id'];
                    ?>
                    <div class="col-lg-4 col-md-6 mb-4">
                        <div class="attraction_item">
                            <img src="<?= esc($firstPhoto) ?>" alt="<?= esc($attraction['name']) ?>" class="img-fluid rounded mb-3">
                            <h4 class="text-truncate" title="<?= esc($attraction['name']) ?>"><?= esc($attraction['name']) ?></h4>
                            <?php if (!empty($attraction['latitude']) && !empty($attraction['longitude'])): ?>
                                <p class="text-truncate" title="Location: <?= esc($attraction['latitude']) ?>, <?= esc($attraction['longitude']) ?>"><strong>Location:</strong> <?= esc($attraction['latitude']) ?>, <?= esc($attraction['longitude']) ?></p>
                            <?php endif; ?>
                            <p class="description-truncate"><?= esc($attraction['description']) ?></p>
                            <a href="javascript:void(0);"
                                class="btn btn-sm btn-outline-primary more-info mt-auto"
                                data-toggle="modal"
                                data-target="#attractionModal"
                                data-name="<?= esc($attraction['name']) ?>"
                                data-description="<?= esc($attraction['description']) ?>"
                                data-photos='<?= json_encode($photos) ?>'
                                data-lat="<?= esc($attraction['latitude']) ?>"
                                data-lng="<?= esc($attraction['longitude']) ?>">
                                More Info
                            </a>

                        </div>
                    </div>
                <?php endforeach; ?>
            <?php else: ?>
                <div class="col-12 text-center py-5">
                    <div class="no-gallery-placeholder">
                        <img src="<?= base_url('public/dist/landing/images/no-image.png'); ?>" alt="No images" class="mb-3" style="max-width:150px; opacity:0.6;">
                        <h4 class="text-muted">No attractions available</h4>
                        <p class="text-muted">Our attractions will be updated soon. Please check back later.</p>
                    </div>
                </div>
            <?php endif; ?>
        </div>
    </div>
</div>

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