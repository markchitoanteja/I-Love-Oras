<!-- Content Wrapper -->
<div class="content-wrapper">
    <!-- Content Header -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Dashboard</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="<?= base_url() ?>">Home</a></li>
                        <li class="breadcrumb-item active">Dashboard</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>

    <!-- Main Dashboard Content -->
    <section class="content">
        <div class="container-fluid">
            <!-- Info boxes -->
            <div class="row">
                <!-- Total Events -->
                <div class="col-lg-3 col-6">
                    <div class="small-box bg-primary">
                        <div class="inner">
                            <h3><?= esc($count_data['total_events']) ?? 0 ?></h3>
                            <p>Total Events</p>
                        </div>
                        <div class="icon"><i class="fas fa-calendar-alt"></i></div>
                        <a href="<?= base_url('admin/events') ?>" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>

                <!-- Gallery -->
                <div class="col-lg-3 col-6">
                    <div class="small-box bg-success">
                        <div class="inner">
                            <h3><?= esc($count_data['total_gallery']) ?? 0 ?></h3>
                            <p>Gallery Images</p>
                        </div>
                        <div class="icon"><i class="fas fa-image"></i></div>
                        <a href="<?= base_url('admin/photo_gallery') ?>" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>

                <!-- Tourist Spots -->
                <div class="col-lg-3 col-6">
                    <div class="small-box bg-danger">
                        <div class="inner">
                            <h3><?= esc($count_data['total_tourist_spots'] ?? 0) ?></h3>
                            <p>Tourist Spots</p>
                        </div>
                        <div class="icon"><i class="fas fa-map-marker-alt"></i></div>
                        <a href="<?= base_url('admin/tourist_spots') ?>" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>

                <!-- Online Users -->
                <div class="col-lg-3 col-6">
                    <div class="small-box bg-info">
                        <div class="inner">
                            <h3><?= esc($count_data['unique_users']) ?></h3>
                            <p>
                                Unique Users
                                <span class="badge badge-success">
                                    <?= esc($count_data['live_users']) ?> Live
                                </span>
                            </p>
                        </div>
                        <div class="icon"><i class="fas fa-users"></i></div>
                        <a href="javascript:void(0)" class="small-box-footer" data-toggle="modal" data-target="#onlineUsersModal">
                            Live Users <i class="fas fa-eye"></i>
                        </a>
                    </div>
                </div>
            </div>

            <!-- Recent Logs Table -->
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body table-responsive">
                            <h3 class="card-title">Recent Activities</h3>
                            <table class="table table-striped table-hover text-nowrap dataTable">
                                <thead>
                                    <tr>
                                        <th>Action</th>
                                        <th>Date & Time</th>
                                        <th>Type</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php if (!empty($logs)): ?>
                                        <?php foreach ($logs as $log): ?>
                                            <tr>
                                                <td><?= esc($log['action']) ?></td>
                                                <td><?= date('M d, Y h:i A', strtotime($log['created_at'])) ?></td>
                                                <td>
                                                    <?php if ($log['type'] === 'Gallery'): ?>
                                                        <span class="badge bg-success"><?= esc($log['type']) ?></span>
                                                    <?php elseif ($log['type'] === 'Event'): ?>
                                                        <span class="badge bg-primary"><?= esc($log['type']) ?></span>
                                                    <?php elseif ($log['type'] === 'Tourist Spot'): ?>
                                                        <span class="badge bg-danger"><?= esc($log['type']) ?></span>
                                                    <?php elseif ($log['type'] === 'Message'): ?>
                                                        <span class="badge bg-info"><?= esc($log['type']) ?></span>
                                                    <?php else: ?>
                                                        <span class="badge bg-warning"><?= esc($log['type']) ?></span>
                                                    <?php endif; ?>
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

<!-- Online Users Modal -->
<div class="modal fade" id="onlineUsersModal" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Unique Users</h5>
                <button type="button" class="close" data-dismiss="modal"><span>&times;</span></button>
            </div>
            <div class="modal-body table-responsive">
                <table class="table table-bordered table-hover" id="liveUsersTable">
                    <thead>
                        <tr>
                            <th>IP Address</th>
                            <th>Browser</th>
                            <th>Last Activity</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr id="loadingRow">
                            <td colspan="4" class="text-center">
                                <div class="spinner-border text-info" role="status">
                                    <span class="sr-only">Loading...</span>
                                </div>
                                <p class="mt-2">Fetching users...</p>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>