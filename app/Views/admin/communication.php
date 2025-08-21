<!-- Content Wrapper -->
<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Communication</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="<?= base_url() ?>">Home</a></li>
                        <li class="breadcrumb-item active">Communication</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>

    <!-- Main Dashboard Content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <table class="table table-striped dataTable text-nowrap">
                                <thead>
                                    <tr>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Message</th>
                                        <th class="text-center">Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php if (!empty($messages)): ?>
                                        <?php foreach ($messages as $msg): ?>
                                            <tr>
                                                <td><?= esc($msg['name']) ?></td>
                                                <td><?= esc($msg['email']) ?></td>
                                                <td class="text-truncate" style="max-width: 300px;" title="<?= esc($msg['message']) ?>">
                                                    <?= esc($msg['message']) ?>
                                                </td>
                                                <td class="text-center">
                                                    <i class="fas fa-reply text-primary mr-1 reply_message" role="button" title="Reply"></i>
                                                    <i class="fas fa-trash-alt text-danger delete_message" data-id="<?= $msg['id'] ?>" role="button" title="Delete"></i>
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

<!-- Reply Modal -->
<div class="modal fade" id="replyModal" tabindex="-1" role="dialog" aria-labelledby="replyModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="replyModalLabel">Reply to Message</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <form action="javascript:void(0)" id="reply_form">
                <div class="modal-body">
                    <div class="form-group">
                        <label for="reply_receiver_name">Name</label>
                        <input type="text" class="form-control" id="reply_receiver_name" readonly>
                    </div>

                    <div class="form-group">
                        <label for="reply_receiver_email">Email</label>
                        <input type="email" class="form-control" id="reply_receiver_email" readonly>
                    </div>

                    <div class="form-group">
                        <label for="reply_receiver_message">Your Reply</label>
                        <textarea class="form-control" id="reply_receiver_message" rows="6" placeholder="Write your reply here..." required></textarea>
                    </div>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-primary" id="reply_submit">Send Reply</button>
                </div>
            </form>
        </div>
    </div>
</div>