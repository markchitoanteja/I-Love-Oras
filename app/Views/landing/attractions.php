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

    .no-function {
        display: inline-block;
        font-size: 14px;
        padding: 8px 16px;
        border-radius: 5px;
        text-decoration: none;
        transition: background-color 0.3s ease;
    }

    .no-function:hover {
        background-color: #007bff;
        color: #fff;
        border-color: #007bff;
    }
</style>

<!-- Intro -->
<div class="intro">
    <div class="container">
        <div class="row">
            <!-- Section Title -->
            <div class="col-12 text-center mb-5">
                <h2 class="section_title">Top Attractions in Oras</h2>
                <p class="section_subtitle">Discover these stunning destinations in Eastern Samar</p>
            </div>

            <!-- Attraction: HaraFehaFun -->
            <div class="col-lg-4 col-md-6 mb-4">
                <div class="attraction_item">
                    <img src="public/dist/landing/images/harafehafun.jpg" alt="HaraFehaFun" class="img-fluid rounded mb-3">
                    <h4>HaraFehaFun</h4>
                    <p><strong>Location:</strong> Oras Bay Area</p>
                    <p>A playful beachfront spot where locals and tourists come to relax and have fun. With calm waters and scenic sunsets, it's perfect for families and weekend escapes.</p>
                    <a href="javascript:void(0);" class="btn btn-sm btn-outline-primary no-function mt-auto">More Info</a>
                </div>
            </div>

            <!-- Attraction: Binogawan -->
            <div class="col-lg-4 col-md-6 mb-4">
                <div class="attraction_item">
                    <img src="public/dist/landing/images/binogawan.jpg" alt="Binogawan" class="img-fluid rounded mb-3">
                    <h4>Binogawan</h4>
                    <p><strong>Location:</strong> Inland Oras</p>
                    <p>A natural spring surrounded by lush vegetation, known for its clear waters and peaceful ambiance — perfect for picnics, swimming, and nature lovers.</p>
                    <a href="javascript:void(0);" class="btn btn-sm btn-outline-primary no-function mt-auto">More Info</a>
                </div>
            </div>

            <!-- Attraction: Apiton Island -->
            <div class="col-lg-4 col-md-6 mb-4">
                <div class="attraction_item">
                    <img src="public/dist/landing/images/apiton.jpg" alt="Apiton Island" class="img-fluid rounded mb-3">
                    <h4>Apiton Island</h4>
                    <p><strong>Location:</strong> Off the coast of Oras</p>
                    <p>A pristine island paradise with white sands, vibrant coral reefs, and peaceful waves. Ideal for snorkeling, island hopping, and quiet retreats.</p>
                    <a href="javascript:void(0);" class="btn btn-sm btn-outline-primary no-function mt-auto">More Info</a>
                </div>
            </div>

            <!-- Attraction: Mount Naliwatan -->
            <div class="col-lg-4 col-md-6 mb-4">
                <div class="attraction_item">
                    <img src="public/dist/landing/images/mt_naliwatan.png" alt="Mount Naliwatan" class="img-fluid rounded mb-3">
                    <h4>Mount Naliwatan</h4>
                    <p><strong>Location:</strong> Western Oras Highlands</p>
                    <p>This scenic mountain offers panoramic views of Eastern Samar and is a popular hiking and camping spot for adventurers and nature photographers.</p>
                    <a href="javascript:void(0);" class="btn btn-sm btn-outline-primary no-function mt-auto">More Info</a>
                </div>
            </div>

            <!-- Attraction: Can-avid River Trail -->
            <div class="col-lg-4 col-md-6 mb-4">
                <div class="attraction_item">
                    <img src="public/dist/landing/images/can_avid_river_trail.png" alt="Can-avid River Trail" class="img-fluid rounded mb-3">
                    <h4>Can-avid River Trail</h4>
                    <p><strong>Location:</strong> North of Oras</p>
                    <p>A tranquil river trail lined with lush mangroves and native flora. Great for kayaking, fishing, and guided eco-tours.</p>
                    <a href="javascript:void(0);" class="btn btn-sm btn-outline-primary no-function mt-auto">More Info</a>
                </div>
            </div>

            <!-- Attraction: Lugas Cave -->
            <div class="col-lg-4 col-md-6 mb-4">
                <div class="attraction_item">
                    <img src="public/dist/landing/images/lugas_cave.png" alt="Lugas Cave" class="img-fluid rounded mb-3">
                    <h4>Lugas Cave</h4>
                    <p><strong>Location:</strong> Barangay Lugas</p>
                    <p>A mysterious cave known for its crystal formations and underground streams. Local guides offer tours that explore both its beauty and legends.</p>
                    <a href="javascript:void(0);" class="btn btn-sm btn-outline-primary no-function mt-auto">More Info</a>
                </div>
            </div>

        </div>
    </div>
</div>