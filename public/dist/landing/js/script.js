$(document).ready(function () {
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
        $(".loading").removeClass("d-none");
        $(".main-form").addClass("d-none");

        setTimeout(function () {
            $(".loading").addClass("d-none");
            $(".main-form").removeClass("d-none");

            $("#contactForm")[0].reset();

            Swal.fire({
                title: "Success!",
                text: "Your message has been sent successfully!",
                icon: "success"
            });
        }, 3000);
    });
})