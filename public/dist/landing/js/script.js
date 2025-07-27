$(document).ready(function () {
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
    })
})