$(document).ready(function () {
  if (notification) {
    display_alert(notification);
  }

  $(".logoutBtn").click(function () {
    $.ajax({
      url: base_url + 'logout',
      type: 'POST',
      dataType: 'JSON',
      processData: false,
      contentType: false,
      success: function (response) {
        if (response.success) {
          location.href = base_url;
        }
      },
      error: function (_, _, error) {
        console.error(error);
      }
    });
  });

  $('#update_profile_image').on('change', function () {
    const input = this;
    const preview = $('#update_profile_image_preview');
    if (input.files && input.files[0]) {
      const reader = new FileReader();
      reader.onload = function (e) {
        preview.attr('src', e.target.result);
      };
      reader.readAsDataURL(input.files[0]);
    }
  });

  $('#update_profile_form').on('submit', function (e) {
    $('#update_profile_password, #update_profile_confirm_password, #update_profile_email').removeClass('is-invalid').next('.invalid-feedback').remove();

    const name = $('#update_profile_name').val().trim();
    const email = $('#update_profile_email').val().trim();
    const password = $('#update_profile_password').val();
    const confirmPassword = $('#update_profile_confirm_password').val();
    const image = $('#update_profile_image')[0].files[0];

    let hasError = false;

    // Password validation
    if (password !== '' || confirmPassword !== '') {
      if (password !== confirmPassword) {
        $('#update_profile_password').addClass('is-invalid').after('<small class="invalid-feedback">Passwords do not match.</small>');
        $('#update_profile_confirm_password').addClass('is-invalid');

        hasError = true;
      }
    }

    if (hasError) return;

    $("#update_profile_submit").prop('disabled', true);
    $("#update_profile_submit").text('Please wait...');

    const formData = new FormData();

    formData.append('name', name);
    formData.append('email', email);
    formData.append('password', password);
    if (image) {
      formData.append('image', image);
    }

    $.ajax({
      url: base_url + 'admin/update_profile',
      type: 'POST',
      data: formData,
      processData: false,
      contentType: false,
      dataType: 'json',
      success: function (response) {
        if (response.success) {
          location.reload();
        } else {
          if (response.errors) {
            if (response.errors.email) {
              $('#update_profile_email').addClass('is-invalid').after('<small class="invalid-feedback">' + response.errors.email + '</small>');
            }
          }
        }
      },
      error: function (_, _, error) {
        console.error("AJAX error:", error);
      }
    });
  });

  // Real-time validation clear for email
  $('#update_profile_email').on('input change', function () {
    $(this).removeClass('is-invalid');
    $(this).next('.invalid-feedback').remove();
  });

  // Real-time validation clear for both password fields when either changes
  $('#update_profile_password, #update_profile_confirm_password').on('input change', function () {
    $('#update_profile_password, #update_profile_confirm_password')
      .removeClass('is-invalid');
    $('#update_profile_password').next('.invalid-feedback').remove();
  });

  function display_alert(notification) {
    Swal.fire({
      title: notification.title,
      text: notification.text,
      icon: notification.icon
    });
  }
});