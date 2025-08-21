$(document).ready(function () {
  let allFiles = [];

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

  $('#add_event_thumbnail').on('change', function (e) {
    const file = e.target.files[0];
    const preview = $('#add_event_thumbnail_preview');
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

  $("#add_event_form").submit(function () {
    const thumbnail = $('#add_event_thumbnail')[0].files[0];
    const title = $('#add_event_title').val();
    const event_type = $('#add_event_type').val();
    const performers = $('#add_event_performers').val();
    const venue = $('#add_event_venue').val();
    const date = $('#add_event_date').val();
    const start_time = $('#add_event_start_time').val();
    const end_time = $('#add_event_end_time').val();
    const status = $('#add_event_status').val();

    $('#add_event_submit').attr('disabled', true).html('Please wait...');

    toggleModalLock('addEventModal');

    var formData = new FormData();

    formData.append('thumbnail', thumbnail);
    formData.append('title', title);
    formData.append('event_type', event_type);
    formData.append('performers', performers);
    formData.append('venue', venue);
    formData.append('date', date);
    formData.append('start_time', start_time);
    formData.append('end_time', end_time);
    formData.append('status', status);

    $.ajax({
      url: base_url + 'admin/add_event',
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

  $(document).on('click', '.delete_event', function () {
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
          url: base_url + 'admin/delete_event',
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

  $(document).on('click', '.update_event', function () {
    const id = $(this).data('id');
    const thumbnail = $(this).data('thumbnail');
    const performers = $(this).data('performers');
    const row = $(this).closest('tr');

    // Fill hidden field
    $('#update_event_id').val(id);

    // Title
    $('#update_event_title').val(row.find('td:eq(0)').text().trim());

    // Event Type
    $('#update_event_type').val(row.find('td:eq(1)').text().trim());

    // Date (convert displayed format back to yyyy-mm-dd)
    const formattedDate = row.find('td:eq(2)').text().trim(); // e.g., "Aug 19, 2025"
    const dateObj = new Date(formattedDate);
    if (!isNaN(dateObj)) {
      const year = dateObj.getFullYear();
      const month = ("0" + (dateObj.getMonth() + 1)).slice(-2);
      const day = ("0" + dateObj.getDate()).slice(-2);
      $('#update_event_date').val(`${year}-${month}-${day}`);
    }

    // Time (start - end)
    const timeText = row.find('td:eq(3)').text().trim().split("-");
    if (timeText.length === 2) {
      const startTime = timeText[0].trim();
      const endTime = timeText[1].trim();

      // Convert to 24hr for <input type="time">
      function to24HourFormat(timeStr) {
        const d = new Date("1970/01/01 " + timeStr);
        return d.toTimeString().slice(0, 5);
      }

      $('#update_event_start_time').val(to24HourFormat(startTime));
      $('#update_event_end_time').val(to24HourFormat(endTime));
    }

    // Venue
    $('#update_event_venue').val(row.find('td:eq(4)').text().trim());

    // Status (match badge text with value)
    const statusText = row.find('td:eq(5) span').text().trim().toLowerCase();
    if (statusText.includes("upcoming")) {
      $('#update_event_status').val("upcoming");
    } else if (statusText.includes("completed")) {
      $('#update_event_status').val("completed");
    } else {
      $('#update_event_status').val("ongoing");
    }

    $('#update_event_performers').val(performers);
    $('#update_event_old_image').val(thumbnail);

    // Thumbnail preview (if you plan to show in table later, adjust index)
    $('#update_event_thumbnail_preview').attr('src', base_url + "public/dist/landing/images/events/" + thumbnail || base_url + 'public/dist/landing/images/no-image.png');

    // Open modal
    $('#updateEventModal').modal('show');
  });

  $("#update_event_form").submit(function () {
    const id = $('#update_event_id').val();
    const thumbnail = $('#update_event_thumbnail')[0].files[0];
    const title = $('#update_event_title').val();
    const event_type = $('#update_event_type').val();
    const performers = $('#update_event_performers').val();
    const venue = $('#update_event_venue').val();
    const date = $('#update_event_date').val();
    const start_time = $('#update_event_start_time').val();
    const end_time = $('#update_event_end_time').val();
    const status = $('#update_event_status').val();
    const old_image = $('#update_event_old_image').val();

    $('#update_event_submit').attr('disabled', true).html('Please wait...');

    toggleModalLock('updateEventModal');

    var formData = new FormData();

    formData.append('id', id);
    formData.append('thumbnail', thumbnail);
    formData.append('old_image', old_image);
    formData.append('title', title);
    formData.append('event_type', event_type);
    formData.append('performers', performers);
    formData.append('venue', venue);
    formData.append('date', date);
    formData.append('start_time', start_time);
    formData.append('end_time', end_time);
    formData.append('status', status);

    $.ajax({
      url: base_url + 'admin/update_event',
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

  $('#update_event_thumbnail').on('change', function (e) {
    const file = e.target.files[0];
    const preview = $('#update_event_thumbnail_preview');
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

  $("#new_tourist_spot_photos").on("change", function (e) {
    let newFiles = Array.from(e.target.files);

    allFiles = allFiles.concat(newFiles);

    $(this).val("");
  });

  $("#new_tourist_spot_form").on("submit", function () {
    let name = $("#new_tourist_spot_name").val();
    let description = $("#new_tourist_spot_description").val();
    let mapUrl = $("#new_tourist_spot_map_embed_url").val();
    let latitude = $("#new_tourist_spot_latitude").val();
    let longitude = $("#new_tourist_spot_longitude").val();

    $('#new_tourist_spot_submit').attr('disabled', true).html('Please wait...');

    toggleModalLock('new_tourist_spot_modal');

    let formData = new FormData();

    formData.append("name", name);
    formData.append("description", description);
    formData.append("map_embed_url", mapUrl);
    formData.append("latitude", latitude);
    formData.append("longitude", longitude);

    allFiles.forEach((file, _) => {
      formData.append("photos[]", file);
    });

    $.ajax({
      url: base_url + "admin/new_tourist_spot",
      type: "POST",
      data: formData,
      dataType: "JSON",
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

  $(document).on('click', '.delete_attraction', function () {
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
          url: base_url + 'admin/delete_tourist_spot',
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