<!-- Content Wrapper -->
<div class="content-wrapper">
    <!-- Content Header -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Events</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item">
                            <a href="javascript:void(0)" class="btn btn-primary" data-toggle="modal" data-target="#addEventModal">
                                <i class="fas fa-plus"></i> Add New Event
                            </a>
                        </li>
                    </ol>
                </div>
            </div>
        </div>
    </div>

    <!-- Main Dashboard Content -->
    <section class="content">
        <div class="container-fluid">
            <!-- Events Table -->
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <table class="table table-striped dataTable text-nowrap">
                                <thead>
                                    <tr>
                                        <th>Title</th>
                                        <th>Type</th>
                                        <th>Date</th>
                                        <th>Time</th>
                                        <th>Venue</th>
                                        <th>Status</th>
                                        <th class="text-center">Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php if (!empty($events)): ?>
                                        <?php foreach ($events as $event): ?>
                                            <tr>
                                                <td class="text-truncate" style="max-width: 150px;" title="<?= esc($event['title']) ?>"><?= esc($event['title']) ?></td>
                                                <td class="text-truncate" style="max-width: 100px;" title="<?= esc($event['event_type']) ?>"><?= esc($event['event_type']) ?></td>
                                                <td class="text-truncate" style="max-width: 100px;" title="<?= date('M d, Y', strtotime($event['date'])) ?>"><?= date('M d, Y', strtotime($event['date'])) ?></td>
                                                <td class="text-truncate" style="max-width: 150px;">
                                                    <?= date('h:i A', strtotime($event['start_time'])) ?>
                                                    -
                                                    <?= date('h:i A', strtotime($event['end_time'])) ?>
                                                </td>
                                                <td class="text-truncate" style="max-width: 150px;" title="<?= esc($event['venue']) ?>"><?= esc($event['venue']) ?></td>
                                                <td>
                                                    <?php if ($event['status'] === 'upcoming'): ?>
                                                        <span class="badge bg-success">Upcoming</span>
                                                    <?php elseif ($event['status'] === 'completed'): ?>
                                                        <span class="badge bg-secondary">Completed</span>
                                                    <?php else: ?>
                                                        <span class="badge bg-primary">Ongoing</span>
                                                    <?php endif; ?>
                                                </td>
                                                <td class="text-center">
                                                    <i class="fas fa-pencil-alt text-primary mr-1 update_event" data-id="<?= $event['id'] ?>" data-thumbnail="<?= $event['thumbnail'] ?>" data-performers="<?= $event['performers'] ?>" role="button" title="Edit"></i>
                                                    <i class="fas fa-trash-alt text-danger delete_event" data-id="<?= $event['id'] ?>" role="button" title="Delete"></i>
                                                </td>
                                            </tr>
                                        <?php endforeach; ?>
                                    <?php endif; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

<!-- Add Event Modal -->
<div class="modal fade" id="addEventModal" tabindex="-1" role="dialog" aria-labelledby="addEventModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Add New Event</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <form action="javascript:void(0)" id="add_event_form">
                <div class="modal-body">
                    <!-- Thumbnail Upload -->
                    <div class="text-center mb-3">
                        <div style="width: 200px; height: 200px; border: 1px solid #ddd; border-radius: 5px; overflow: hidden; margin: 0 auto;">
                            <img id="add_event_thumbnail_preview" src="<?= base_url('public/dist/landing/images/no-image.png') ?>" alt="Preview" style="width: 100%; height: 100%; object-fit: cover;">
                        </div>
                        <div class="form-group mt-3">
                            <div class="input-group mb-3" style="max-width: 300px; margin: 0 auto;">
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input" id="add_event_thumbnail" accept="image/*" required>
                                    <label class="custom-file-label text-left" for="add_event_thumbnail">Choose file</label>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Event Details -->
                    <div class="row">
                        <div class="form-group col-md-6">
                            <label for="add_event_title">Title</label>
                            <input type="text" id="add_event_title" class="form-control" placeholder="Enter event title" required>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="add_event_type">Type</label>
                            <input type="text" id="add_event_type" class="form-control" placeholder="e.g., Live Band" required>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="add_event_performers">Performers</label>
                        <input type="text" id="add_event_performers" class="form-control" placeholder="Enter performers (comma separated)" required>
                    </div>

                    <div class="row">
                        <div class="form-group col-md-4">
                            <label for="add_event_date">Date</label>
                            <input type="date" id="add_event_date" class="form-control" required>
                        </div>
                        <div class="form-group col-md-4">
                            <label for="add_event_start_time">Start Time</label>
                            <input type="time" id="add_event_start_time" class="form-control" required>
                        </div>
                        <div class="form-group col-md-4">
                            <label for="add_event_end_time">End Time</label>
                            <input type="time" id="add_event_end_time" class="form-control" required>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="add_event_venue">Venue</label>
                        <input type="text" id="add_event_venue" class="form-control" placeholder="Enter venue" required>
                    </div>

                    <div class="form-group">
                        <label for="add_event_status">Status</label>
                        <select id="add_event_status" class="form-control" required>
                            <option value="upcoming">Upcoming</option>
                            <option value="completed">Completed</option>
                            <option value="ongoing">Ongoing</option>
                        </select>
                    </div>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-primary" id="add_event_submit">Save Event</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Update Event Modal -->
<div class="modal fade" id="updateEventModal" tabindex="-1" role="dialog" aria-labelledby="addEventModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Update Event</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <form action="javascript:void(0)" id="update_event_form">
                <input type="hidden" id="update_event_id">
                <input type="hidden" id="update_event_old_image">

                <div class="modal-body">
                    <!-- Thumbnail Upload -->
                    <div class="text-center mb-3">
                        <div style="width: 200px; height: 200px; border: 1px solid #ddd; border-radius: 5px; overflow: hidden; margin: 0 auto;">
                            <img id="update_event_thumbnail_preview" src="<?= base_url('public/dist/landing/images/no-image.png') ?>" alt="Preview" style="width: 100%; height: 100%; object-fit: cover;">
                        </div>
                        <div class="form-group mt-3">
                            <div class="input-group mb-3" style="max-width: 300px; margin: 0 auto;">
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input" id="update_event_thumbnail" accept="image/*">
                                    <label class="custom-file-label text-left" for="update_event_thumbnail">Choose file</label>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Event Details -->
                    <div class="row">
                        <div class="form-group col-md-6">
                            <label for="update_event_title">Title</label>
                            <input type="text" id="update_event_title" class="form-control" placeholder="Enter event title" required>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="update_event_type">Type</label>
                            <input type="text" id="update_event_type" class="form-control" placeholder="e.g., Live Band" required>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="update_event_performers">Performers</label>
                        <input type="text" id="update_event_performers" class="form-control" placeholder="Enter performers (comma separated)" required>
                    </div>

                    <div class="row">
                        <div class="form-group col-md-4">
                            <label for="update_event_date">Date</label>
                            <input type="date" id="update_event_date" class="form-control" required>
                        </div>
                        <div class="form-group col-md-4">
                            <label for="update_event_start_time">Start Time</label>
                            <input type="time" id="update_event_start_time" class="form-control" required>
                        </div>
                        <div class="form-group col-md-4">
                            <label for="update_event_end_time">End Time</label>
                            <input type="time" id="update_event_end_time" class="form-control" required>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="update_event_venue">Venue</label>
                        <input type="text" id="update_event_venue" class="form-control" placeholder="Enter venue" required>
                    </div>

                    <div class="form-group">
                        <label for="update_event_status">Status</label>
                        <select id="update_event_status" class="form-control" required>
                            <option value="upcoming">Upcoming</option>
                            <option value="completed">Completed</option>
                            <option value="ongoing">Ongoing</option>
                        </select>
                    </div>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-primary" id="update_event_submit">Save Event</button>
                </div>
            </form>
        </div>
    </div>
</div>