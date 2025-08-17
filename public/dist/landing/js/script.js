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

    function display_alert(notification) {
        Swal.fire({
            title: notification.title,
            text: notification.text,
            icon: notification.icon
        });
    }
})