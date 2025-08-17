<!-- Content Wrapper -->
<div class="content-wrapper">
    <!-- Content Header -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Photo Gallery</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item">
                            <a href="javascript:void(0)" class="btn btn-primary" data-toggle="modal" data-target="#uploadModal">
                                <i class="fas fa-upload"></i> Upload New Image
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
            <!-- Gallery Table -->
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <table class="table table-striped dataTable text-nowrap">
                                <thead>
                                    <tr>
                                        <th>Thumbnail</th>
                                        <th>Caption</th>
                                        <th>Uploaded</th>
                                        <th>Updated</th>
                                        <th class="text-center">Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php if (!empty($images)): ?>
                                        <?php foreach ($images as $index => $img): ?>
                                            <tr>
                                                <td>
                                                    <img src="<?= base_url('public/dist/landing/images/gallery/' . $img['image']) ?>" alt="<?= esc($img['caption']) ?>" style="width:80px; height:60px; object-fit:cover; border-radius:5px;">
                                                </td>
                                                <td class="text-truncate" style="max-width:250px;" title="<?= esc($img['caption']) ?>">
                                                    <?= esc($img['caption']) ?>
                                                </td>
                                                <td><?= date('M d, Y', strtotime($img['created_at'])) ?></td>
                                                <td><?= date('M d, Y', strtotime($img['updated_at'])) ?></td>
                                                <td class="text-center">
                                                    <i class="fas fa-pencil-alt text-primary mr-1 update_image" data-id="<?= $img['id'] ?>" role="button" title="Edit"></i>
                                                    <i class="fas fa-trash-alt text-danger delete_image" data-id="<?= $img['id'] ?>" role="button" title="Delete"></i>
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

<!-- Upload Modal -->
<div class="modal fade" id="uploadModal" tabindex="-1" role="dialog" aria-labelledby="uploadModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="uploadModalLabel">Upload New Image</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="javascript:void(0)" id="upload_image_form">
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-5 text-center mb-3">
                            <div style="width: 100%; height: 250px; border: 1px solid #ddd; border-radius: 5px; overflow: hidden;">
                                <img id="upload_image_preview" src="<?= base_url('public/dist/landing/images/no-image.png') ?>" alt="Preview" style="width: 100%; height: 100%; object-fit: cover;">
                            </div>
                            <small class="text-muted d-block mt-2">Preview</small>
                        </div>
                        <div class="col-md-7">
                            <div class="form-group">
                                <label>Image</label>
                                <div class="input-group mb-3">
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input" id="upload_image_image" accept="image/*" required>
                                        <label class="custom-file-label" for="upload_image_image">Choose file</label>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="upload_image_caption">Caption</label>
                                <textarea id="upload_image_caption" class="form-control" placeholder="Enter caption" rows="5" required></textarea>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-primary" id="upload_image_submit">Upload</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Update Image Modal -->
<div class="modal fade" id="update_image_modal" tabindex="-1" role="dialog" aria-labelledby="imageModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="imageModalLabel">Update Image</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="javascript:void(0)" id="update_image_form">
                <input type="hidden" id="update_image_id">
                <input type="hidden" id="update_image_old_image">

                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-5 text-center mb-3">
                            <div style="width: 100%; height: 250px; border: 1px solid #ddd; border-radius: 5px; overflow: hidden;">
                                <img id="update_image_preview" src="<?= base_url('public/dist/landing/images/no-image.png') ?>" alt="Preview" style="width: 100%; height: 100%; object-fit: cover;">
                            </div>
                            <small class="text-muted d-block mt-2">Preview</small>
                        </div>
                        <div class="col-md-7">
                            <div class="form-group">
                                <label>Image</label>
                                <div class="input-group">
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input" id="update_image_image" accept="image/*">
                                        <label class="custom-file-label" for="update_image_image">Choose file</label>
                                    </div>
                                </div>
                                <small class="text-muted">Leave empty if you don’t want to change the image.</small>
                            </div>
                            <div class="form-group">
                                <label for="update_image_caption">Caption</label>
                                <textarea id="update_image_caption" class="form-control" placeholder="Enter caption" rows="5" required></textarea>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-primary" id="update_image_submit">Update</button>
                </div>
            </form>
        </div>
    </div>
</div>