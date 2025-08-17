$(document).ready(function () {
  overlayLoader(false);

  if (notification) {
    display_alert(notification);
  }

  $(".dataTable").DataTable({
    responsive: true,
    autoWidth: false,
    lengthChange: false,
    paging: true,
    searching: true,
    ordering: false,
    info: true,
  });

  $(".logoutBtn").click(function () {
    overlayLoader(true);

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

    toggleModalLock('update_profile_modal', true);

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

            toggleModalLock('update_profile_modal', false);
          }
        }
      },
      error: function (_, _, error) {
        console.error("AJAX error:", error);
      }
    });
  });

  $('#update_profile_email').on('input change', function () {
    $(this).removeClass('is-invalid');
    $(this).next('.invalid-feedback').remove();
  });

  $('#update_profile_password, #update_profile_confirm_password').on('input change', function () {
    $('#update_profile_password, #update_profile_confirm_password')
      .removeClass('is-invalid');
    $('#update_profile_password').next('.invalid-feedback').remove();
  });

  $('#upload_image_image').on('change', function (e) {
    const file = e.target.files[0];
    const preview = $('#upload_image_preview');
    const label = $(this).next('.custom-file-label');

    if (file) {
      label.text(file.name);
      const reader = new FileReader();
      reader.onload = function (event) {
        preview.attr('src', event.target.result);
      };
      reader.readAsDataURL(file);
    } else {
      label.text('Choose file');
      preview.attr('src', "<?= base_url('public/dist/landing/images/no-image.png') ?>");
    }
  });

  $('#upload_image_form').on('submit', function (e) {
    const image = $('#upload_image_image')[0].files[0];
    const caption = $('#upload_image_caption').val().trim();

    $('#upload_image_submit').attr('disabled', true).html('Uploading...');

    toggleModalLock('uploadModal', true);

    var formData = new FormData();

    formData.append('image', image);
    formData.append('caption', caption);

    $.ajax({
      url: base_url + 'admin/upload_image',
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

  $(document).on('click', '.update_image', function () {
    const id = $(this).data('id');

    $('#update_image_id').val(id);
    $('#update_image_old_image').val($(this).closest('tr').find('td:eq(0) img').attr('src').split('/').pop());

    $('#update_image_caption').val($(this).closest('tr').find('td:eq(1)').text().trim());
    $('#update_image_preview').attr('src', $(this).closest('tr').find('td:eq(0) img').attr('src'));

    $('#update_image_modal').modal('show');
  });

  $('#update_image_form').submit(function () {
    const id = $('#update_image_id').val();
    const oldImage = $('#update_image_old_image').val();
    const caption = $('#update_image_caption').val().trim();
    const newImage = $('#update_image_image')[0].files[0];

    $('#update_image_submit').attr('disabled', true).html('Updating...');

    toggleModalLock('update_image_modal', true);

    var formData = new FormData();

    formData.append('id', id);
    formData.append('old_image', oldImage);
    formData.append('caption', caption);

    if (newImage) {
      formData.append('image', newImage);
    }

    $.ajax({
      url: base_url + 'admin/update_image',
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
            if (response.errors.caption) {
              $('#update_image_caption').addClass('is-invalid').after('<small class="invalid-feedback">' + response.errors.caption + '</small>');
            }
          }
        }
      },
      error: function (_, _, error) {
        console.error("AJAX error:", error);
      }
    });
  });

  $('#update_image_image').on('change', function (e) {
    const file = e.target.files[0];
    const preview = $('#update_image_preview');
    const label = $(this).next('.custom-file-label');

    if (file) {
      label.text(file.name);
      const reader = new FileReader();
      reader.onload = function (event) {
        preview.attr('src', event.target.result);
      };
      reader.readAsDataURL(file);
    } else {
      label.text('Choose file');
      preview.attr('src', "<?= base_url('public/dist/landing/images/no-image.png') ?>");
    }
  });

  $(document).on('click', '.delete_image', function () {
    const id = $(this).data('id');

    Swal.fire({
      title: "Are you sure?",
      text: "You won't be able to revert this!",
      icon: "warning",
      showCancelButton: true,
      confirmButtonColor: "#3085d6",
      cancelButtonColor: "#d33",
      confirmButtonText: "Yes, delete it!"
    }).then((result) => {
      if (result.isConfirmed) {
        overlayLoader(true);

        var formData = new FormData();

        formData.append('id', id);

        $.ajax({
          url: base_url + 'admin/delete_image',
          data: formData,
          type: 'POST',
          dataType: 'JSON',
          processData: false,
          contentType: false,
          success: function (response) {
            if (response.success) {
              location.reload();
            } else {
              Swal.fire({
                title: "Error!",
                text: response.message,
                icon: "error"
              });
            }
          },
          error: function (_, _, error) {
            console.error(error);
          }
        });
      }
    });
  });

  $(document).on('click', '.delete_message', function () {
    const id = $(this).data('id');

    Swal.fire({
      title: "Are you sure?",
      text: "You won't be able to revert this!",
      icon: "warning",
      showCancelButton: true,
      confirmButtonColor: "#3085d6",
      cancelButtonColor: "#d33",
      confirmButtonText: "Yes, delete it!"
    }).then((result) => {
      if (result.isConfirmed) {
        overlayLoader(true);

        var formData = new FormData();

        formData.append('id', id);

        $.ajax({
          url: base_url + 'admin/delete_message',
          data: formData,
          type: 'POST',
          dataType: 'JSON',
          processData: false,
          contentType: false,
          success: function (response) {
            if (response.success) {
              location.reload();
            } else {
              Swal.fire({
                title: "Error!",
                text: response.message,
                icon: "error"
              });
            }
          },
          error: function (_, _, error) {
            console.error(error);
          }
        });
      }
    });
  });

  $(document).on('click', '.reply_message', function () {
    const row = $(this).closest('tr');

    const name = row.find('td:eq(0)').text().trim();
    const email = row.find('td:eq(1)').text().trim();

    $('#reply_receiver_name').val(name);
    $('#reply_receiver_email').val(email);
    $('#reply_message').val('');

    $('#replyModal').modal('show');
  });

  $('#reply_form').submit(function () {
    const receiver_name = $('#reply_receiver_name').val();
    const receiver_email = $('#reply_receiver_email').val();
    const receiver_message = $('#reply_receiver_message').val();

    $('#reply_submit').attr('disabled', true).html('Sending...');

    toggleModalLock('replyModal');

    var formData = new FormData();

    formData.append('name', receiver_name);
    formData.append('email', receiver_email);
    formData.append('message', receiver_message);

    $.ajax({
      url: base_url + 'admin/reply_message',
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

  function overlayLoader(enabled) {
    if (enabled) {
      $("#overlayLoader").fadeIn(200);
    } else {
      $("#overlayLoader").fadeOut(200);
    }
  }

  function toggleModalLock(modalId, lock = true) {
    var $m = $('#' + modalId);

    if (lock) {
      // Lock modal
      $m.addClass('modal-locked');

      // Prevent hide
      $m.off('hide.bs.modal.modalLock')
        .on('hide.bs.modal.modalLock', function (e) {
          if ($m.hasClass('modal-locked')) {
            e.preventDefault();
            e.stopImmediatePropagation();
            return false;
          }
        });

      // Disable close buttons
      $m.find('[data-dismiss="modal"], .close, [data-bs-dismiss="modal"]')
        .prop('disabled', true)
        .attr('aria-disabled', 'true')
        .css('pointer-events', 'none');

      $m.addClass('cursor-wait');

    } else {
      // Unlock modal
      $m.removeClass('modal-locked');

      $m.off('hide.bs.modal.modalLock');

      $m.find('[data-dismiss="modal"], .close, [data-bs-dismiss="modal"]')
        .prop('disabled', false)
        .removeAttr('aria-disabled')
        .css('pointer-events', 'auto');

      $m.removeClass('cursor-wait');
    }
  }

  function display_alert(notification) {
    Swal.fire({
      title: notification.title,
      text: notification.text,
      icon: notification.icon
    });
  }
});