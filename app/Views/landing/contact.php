<style>
    .contact-section {
        background-color: #f9f9f9;
        padding: 60px 0 30px;
    }

    .contact-card {
        background: #fff;
        border-radius: 12px;
        box-shadow: 0 10px 25px rgba(0, 0, 0, 0.08);
        padding: 30px;
        transition: all 0.3s ease;
    }

    .contact-card:hover {
        box-shadow: 0 15px 35px rgba(0, 0, 0, 0.12);
    }

    .contact-card label {
        font-weight: 600;
    }

    .contact-card .form-control {
        border-radius: 8px;
        border: 1px solid #ced4da;
        transition: border-color 0.2s;
    }

    .contact-card .form-control:focus {
        border-color: #007bff;
        box-shadow: none;
    }

    .contact-card .btn-primary {
        background-color: #007bff;
        border: none;
        padding: 10px 20px;
        border-radius: 8px;
        font-weight: 600;
        transition: background-color 0.3s ease;
    }

    .contact-card .btn-primary:hover {
        background-color: #0056b3;
    }

    .section_title {
        font-weight: 700;
        font-size: 36px;
    }

    .section_subtitle {
        font-size: 18px;
        color: #555;
    }

    .map-container {
        margin-top: 40px;
        border-radius: 12px;
        overflow: hidden;
        box-shadow: 0 10px 25px rgba(0, 0, 0, 0.08);
    }

    .map-container iframe {
        width: 100%;
        height: 450px;
        border: 0;
    }

    @media (max-width: 768px) {
        .section_title {
            font-size: 28px;
        }

        .section_subtitle {
            font-size: 16px;
        }

        .contact-card {
            padding: 20px;
        }

        .map-container iframe {
            height: 300px;
        }
    }
</style>

<!-- Contact Us Section -->
<div class="intro contact-section">
    <div class="container">
        <div class="row">
            <!-- Section Header -->
            <div class="col-12 text-center mb-4">
                <h2 class="section_title">Let’s Connect</h2>
                <p class="section_subtitle">We’d love to hear from you. Reach out anytime!</p>
            </div>

            <!-- Contact Form Card -->
            <div class="col-lg-8 offset-lg-2">
                <div class="contact-card mb-4">
                    <div class="loading d-none text-center">
                        <img src="public/dist/landing/images/loading_gif.gif" alt="Loading..." class="img-fluid mb-3">
                        <h4>Please wait...</h4>
                    </div>
                    <div class="main-form">
                        <form action="javascript:void(0)" id="contactForm">
                            <div class="form-group mb-3">
                                <label for="contact_name">Full Name</label>
                                <input type="text" id="contact_name" class="form-control" required>
                            </div>
                            <div class="form-group mb-3">
                                <label for="contact_email">Email Address</label>
                                <input type="email" id="contact_email" class="form-control" required>
                            </div>
                            <div class="form-group mb-4">
                                <label for="contact_message">Your Message</label>
                                <textarea id="contact_message" rows="5" class="form-control" required></textarea>
                            </div>

                            <button type="submit" class="btn btn-primary" id="contactSubmit">Send Message</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <!-- Map Section -->
        <div class="row">
            <div class="col-12">
                <div class="map-container">
                    <!-- Embedded Google Map with Fallback -->
                    <div class="map-responsive" style="border-radius: 10px; overflow: hidden;">
                        <div id="mapWrapper" style="width: 100%; height: 100%;">
                            <iframe
                                id="onlineMap"
                                src="https://www.google.com/maps/embed?pb=!1m23!1m12!1m3!1d579.8249251135729!2d125.43986562410234!3d12.140753658118564!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!4m8!3e6!4m0!4m5!1s0x33096efbc5c0ee8f%3A0xe9d33d6782e94687!2s4CRR%2B73V%20Oras%20Eastern%20Samar%2C%20Oras%20Municipal%20Hall%2C%20Oras%2C%20Eastern%20Samar!3m2!1d12.1408306!2d125.4402301!5e0!3m2!1sen!2sph!4v1753718322106!5m2!1sen!2sph"
                                width="100%"
                                height="450"
                                style="border:0;"
                                allowfullscreen=""
                                loading="lazy"
                                referrerpolicy="no-referrer-when-downgrade">
                            </iframe>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    // Check internet connectivity
    function checkConnection() {
        if (!navigator.onLine) {
            const mapWrapper = document.getElementById('mapWrapper');
            mapWrapper.innerHTML = `
                <img src="public/dist/landing/images/offline_map.png" alt="Offline Map" style="width:100%; height:450px; object-fit: cover; border-radius: 10px;">
            `;
        }
    }

    window.addEventListener('load', checkConnection);
    window.addEventListener('offline', checkConnection);
</script>