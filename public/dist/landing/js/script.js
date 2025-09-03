$(document).ready(function () {
    if (notification) {
        display_alert(notification);
    }

    $(".no-function").click(function () {
        Swal.fire({
            title: "Oops...",
            text: "This feature is not available yet.",
            icon: "error"
        });
    });

    $("#loginForm").submit(function () {
        const email = $("#loginEmail").val();
        const password = $("#loginPassword").val();

        $("#loginSubmit").attr("disabled", true);
        $("#loginSubmit").text("Please wait...");

        var formData = new FormData();

        formData.append('email', email);
        formData.append('password', password);

        $.ajax({
            url: 'login',
            data: formData,
            type: 'POST',
            dataType: 'JSON',
            processData: false,
            contentType: false,
            success: function (response) {
                if (response.success) {
                    location.href = "admin/dashboard";
                } else {
                    $("#loginError").removeClass("d-none");

                    $("#loginSubmit").removeAttr("disabled");
                    $("#loginSubmit").text("Login");
                }

            },
            error: function (_, _, error) {
                console.error(error);
            }
        });
    });

    $("#contactForm").submit(function () {
        const name = $("#contact_name").val();
        const email = $("#contact_email").val();
        const message = $("#contact_message").val();

        $(".loading").removeClass("d-none");
        $(".main-form").addClass("d-none");

        var formData = new FormData();

        formData.append('name', name);
        formData.append('email', email);
        formData.append('message', message);

        $.ajax({
            url: 'landing/submit_contact_form',
            data: formData,
            type: 'POST',
            dataType: 'JSON',
            processData: false,
            contentType: false,
            success: function (response) {
                if (response.success) {
                    location.reload();
                }
            },
            error: function (_, _, error) {
                console.error(error);
            }
        });
    });

    $('#attractionModal').on('show.bs.modal', function (event) {
        const button = $(event.relatedTarget);

        const name = button.data('name');
        const description = button.data('description');
        const photos = button.data('photos');
        const lat = button.data('lat');
        const lng = button.data('lng');

        // Set modal title & description
        $('#modalTitle').text(name);
        $('#modalDescription').text(description);

        // Build photo carousel
        const carouselInner = $('#carouselInner');
        carouselInner.empty();

        if (photos && photos.length) {
            // chunk photos into groups of 3
            for (let i = 0; i < photos.length; i += 3) {
                const chunk = photos.slice(i, i + 3);
                let rowHtml = '<div class="row">';

                chunk.forEach(photo => {
                    rowHtml += `
                    <div class="col-4">
                        <div class="img-wrapper" style="width: 100%; height: 120px; overflow: hidden; border-radius: 0.25rem; box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);">
                            <img src="public/dist/landing/images/attractions/${photo}" 
                                 alt="${name}" 
                                 style="width: 100%; height: 100%; object-fit: cover; border-radius: 0.25rem;">
                        </div>
                    </div>
                `;
                });

                rowHtml += '</div>';

                carouselInner.append(`
                <div class="carousel-item ${i === 0 ? 'active' : ''}">
                    ${rowHtml}
                </div>
            `);
            }
        } else {
            carouselInner.append(`<div class="text-center text-muted p-3">No photos available</div>`);
        }

        // Map
        if (lat && lng) {
            $('#modalMap').attr('src', `https://www.google.com/maps?q=${lat},${lng}&hl=en&z=14&output=embed`);
        } else {
            $('#modalMap').attr('src', '');
        }
    });

    $(document).on('click', '.btn-event', function () {
        const eventId = $(this).data('id');

        let formData = new FormData();
        formData.append('id', eventId);

        $.ajax({
            url: base_url + 'landing/get-event-details',
            data: formData,
            type: 'POST',
            dataType: 'JSON',
            processData: false,
            contentType: false,
            success: function (response) {
                if (response.success) {
                    const event = response.event;

                    // Populate modal
                    $('#eventModalLabel').text(event.title);
                    $('#eventPerformers').text(event.performers);
                    $('#eventDateTime').text(`${event.date} | ${event.start_time} - ${event.end_time}`);
                    $('#eventVenue').text(event.venue);
                    $('#eventDescription').text(event.event_type); // or add another field for description

                    // Show modal
                    $('#eventModal').modal('show');
                } else {
                    alert(response.message);
                }
            },
            error: function (_, _, error) {
                console.error(error);
            }
        });
    });

    function display_alert(notification) {
        Swal.fire({
            title: notification.title,
            text: notification.text,
            icon: notification.icon
        });
    }
})