<style>
    .gallery_item {
        height: 250px;
        /* Fixed height for all items */
        overflow: hidden;
        border-radius: 10px;
        position: relative;
        transition: transform 0.3s ease, box-shadow 0.3s ease;
        cursor: pointer;
        display: flex;
        align-items: center;
        justify-content: center;
    }

    .gallery_item img {
        height: 100%;
        width: 100%;
        object-fit: cover;
        transition: transform 0.3s ease;
        display: block;
    }

    .gallery_item:hover img {
        transform: scale(1.05);
    }

    .gallery_item:hover {
        box-shadow: 0 15px 35px rgba(0, 0, 0, 0.2);
    }

    .gallery-modal {
        display: none;
        position: fixed;
        z-index: 9999;
        padding-top: 60px;
        left: 0;
        top: 0;
        width: 100%;
        height: 100%;
        overflow: auto;
        background-color: rgba(0, 0, 0, 0.95);
        animation: fadeIn 0.3s ease-in-out;
        text-align: center;
    }

    @keyframes fadeIn {
        from {
            opacity: 0;
        }

        to {
            opacity: 1;
        }
    }

    .gallery-modal .close {
        position: absolute;
        top: 30px;
        right: 40px;
        color: white;
        font-size: 35px;
        font-weight: bold;
        cursor: pointer;
        transition: 0.3s;
        opacity: 0.6;
    }

    .gallery-modal .close:hover {
        opacity: 1;
    }

    .gallery-modal-content {
        margin: auto;
        max-width: 90%;
        min-height: 80vh;
        max-height: 80vh;
        border-radius: 12px;
        box-shadow: 0 0 40px rgba(255, 255, 255, 0.1);
        animation: zoomIn 0.3s ease;
    }

    @keyframes zoomIn {
        from {
            transform: scale(0.9);
            opacity: 0;
        }

        to {
            transform: scale(1);
            opacity: 1;
        }
    }

    .caption {
        background: rgba(0, 0, 0, 0.6);
        display: inline-block;
        padding: 10px 20px;
        border-radius: 8px;
        color: #f1f1f1;
        font-size: 18px;
        margin-top: 20px;
        max-width: 90%;
    }

    .section_title {
        font-weight: 700;
        font-size: 36px;
    }

    .section_subtitle {
        font-size: 18px;
        color: #777;
    }

    @media (max-width: 768px) {
        .section_title {
            font-size: 28px;
        }

        .gallery-modal-content {
            max-height: 60vh;
        }

        .caption {
            font-size: 16px;
        }
    }
</style>

<!-- Gallery -->
<div class="intro">
    <div class="container">
        <div class="row">
            <!-- Section Title -->
            <div class="col-12 text-center mb-5">
                <h2 class="section_title">Scenic Glimpses</h2>
                <p class="section_subtitle">A visual journey through Oras, Eastern Samar</p>
            </div>

            <?php
            // Loop from 1 to 12
            for ($i = 1; $i <= 12; $i++):
                $imagePath = "public/dist/landing/images/gallery/{$i}.jpg";
                $altText = "Random Photo {$i}";
            ?>
                <div class="col-lg-4 col-md-6 mb-4">
                    <div class="gallery_item" onclick="openModal('<?php echo $imagePath; ?>', '<?php echo $altText; ?>')">
                        <img src="<?php echo $imagePath; ?>" alt="<?php echo $altText; ?>" class="img-fluid rounded">
                    </div>
                </div>
            <?php endfor; ?>
        </div>
    </div>
</div>


<!-- Gallery Modal -->
<div id="galleryModal" class="gallery-modal">
    <span class="close" onclick="closeModal()">&times;</span>
    <img class="gallery-modal-content modal-content" id="modalImg">
    <div id="modalCaption" class="caption"></div>
</div>

<script>
    function openModal(src, caption) {
        const modal = document.getElementById("galleryModal");
        const modalImg = document.getElementById("modalImg");
        const modalCaption = document.getElementById("modalCaption");

        modal.style.display = "block";
        modalImg.src = src;
        modalCaption.innerHTML = caption;
    }

    function closeModal() {
        document.getElementById("galleryModal").style.display = "none";
    }

    // Optional: Close when clicking outside the modal image
    window.onclick = function(event) {
        const modal = document.getElementById("galleryModal");
        if (event.target === modal) {
            closeModal();
        }
    };
</script>