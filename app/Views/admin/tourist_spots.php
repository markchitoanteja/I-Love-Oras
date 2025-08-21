<style>
    .photo-grid {
        display: grid;
        grid-template-columns: repeat(5, 1fr);
        /* exactly 5 per row */
        gap: 10px;
    }

    .photo-grid .preview-wrapper {
        position: relative;
        width: 100%;
        padding-top: 70%;
        /* aspect ratio */
        border-radius: 8px;
        overflow: hidden;
        box-shadow: 0 2px 5px rgba(0, 0, 0, 0.15);
    }

    .photo-grid img {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        object-fit: cover;
    }

    .photo-grid button {
        position: absolute;
        top: 5px;
        right: 5px;
        border-radius: 50%;
        width: 24px;
        height: 24px;
        line-height: 20px;
        text-align: center;
    }
</style>

<!-- Content Wrapper -->
<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Tourist Spots</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item">
                            <a href="javascript:void(0)" class="btn btn-primary" data-toggle="modal" data-target="#new_tourist_spot_modal">
                                <i class="fas fa-plus"></i> New Tourist Spot
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
                                        <th>Name</th>
                                        <th>Description</th>
                                        <th>Latitude</th>
                                        <th>Longitude</th>
                                        <th class="text-center">Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php if (!empty($attractions)): ?>
                                        <?php foreach ($attractions as $attraction): ?>
                                            <tr>
                                                <td class="text-truncate" style="max-width: 150px;" title="<?= esc($attraction["name"]) ?>"><?= esc($attraction["name"]) ?></td>
                                                <td class="text-truncate" style="max-width: 250px;" title="<?= esc($attraction["description"]) ?>"><?= esc($attraction["description"]) ?></td>
                                                <td class="text-truncate" style="max-width: 150px;" title="<?= esc($attraction["latitude"]) ?>"><?= esc($attraction["latitude"]) ?></td>
                                                <td class="text-truncate" style="max-width: 150px;" title="<?= esc($attraction["longitude"]) ?>"><?= esc($attraction["longitude"]) ?></td>
                                                <td class="text-center">
                                                    <i class="fas fa-pencil-alt text-primary mr-1 update_attraction" data-id="<?= $attraction['id'] ?>" role="button" title="Edit"></i>
                                                    <i class="fas fa-trash-alt text-danger delete_attraction" data-id="<?= $attraction['id'] ?>" role="button" title="Delete"></i>
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

<!-- New Tourist Spot Modal -->
<div class="modal fade" id="new_tourist_spot_modal" tabindex="-1" role="dialog" aria-labelledby="uploadModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">New Tourist Spot</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <!-- Form -->
            <form id="new_tourist_spot_form" action="javascript:void(0)">
                <div class="modal-body">
                    <!-- Basic Info Card -->
                    <div class="card card-outline card-primary mb-3">
                        <div class="card-header py-2">
                            <h6 class="mb-0">Basic Information</h6>
                        </div>
                        <div class="card-body">
                            <!-- Name -->
                            <div class="form-group">
                                <label for="new_tourist_spot_name">Attraction Name</label>
                                <input type="text" class="form-control" id="new_tourist_spot_name" placeholder="Enter attraction name" required>
                            </div>

                            <!-- Description -->
                            <div class="form-group">
                                <label for="new_tourist_spot_description">Description</label>
                                <textarea class="form-control" id="new_tourist_spot_description" rows="4" placeholder="Enter description" required></textarea>
                            </div>
                        </div>
                    </div>

                    <!-- Photo Gallery Card -->
                    <div class="card card-outline card-success mb-3">
                        <div class="card-header py-2">
                            <h6 class="mb-0">Photo Gallery</h6>
                        </div>
                        <div class="card-body">
                            <!-- Upload Area -->
                            <div id="uploadArea" class="border border-dashed rounded p-4 text-center bg-light"
                                style="cursor:pointer;">
                                <i class="fas fa-cloud-upload-alt fa-2x text-success mb-2"></i>
                                <p class="mb-0 text-muted">Click or drag & drop to upload images</p>
                                <input type="file" class="d-none" id="new_tourist_spot_photos" name="photos[]" accept="image/*" multiple>
                            </div>
                            <small class="form-text text-muted">You can upload multiple images. JPG, PNG, WEBP supported.</small>

                            <!-- Preview Grid -->
                            <div id="photoPreview" class="photo-grid mt-3"></div>
                        </div>
                    </div>

                    <!-- Map Card -->
                    <div class="card card-outline card-info">
                        <div class="card-header py-2">
                            <h6 class="mb-0">Map Information</h6>
                        </div>
                        <div class="card-body">
                            <!-- Latitude & Longitude -->
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="new_tourist_spot_latitude">Latitude</label>
                                    <input type="text" class="form-control" id="new_tourist_spot_latitude" placeholder="eg., 12.1393721" required>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="new_tourist_spot_longitude">Longitude</label>
                                    <input type="text" class="form-control" id="new_tourist_spot_longitude" placeholder="eg., 125.4391028" required>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Footer -->
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-primary" id="new_tourist_spot_submit">Save Tourist Spot</button>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
    const fileInput = document.getElementById('new_tourist_spot_photos');
    const uploadArea = document.getElementById('uploadArea');
    const preview = document.getElementById('photoPreview');

    // Click to trigger file input
    uploadArea.addEventListener('click', () => fileInput.click());

    // Drag & Drop Events
    uploadArea.addEventListener('dragover', (e) => {
        e.preventDefault();
        uploadArea.classList.add('bg-white', 'border-success');
    });
    uploadArea.addEventListener('dragleave', (e) => {
        e.preventDefault();
        uploadArea.classList.remove('bg-white', 'border-success');
    });
    uploadArea.addEventListener('drop', (e) => {
        e.preventDefault();
        uploadArea.classList.remove('bg-white', 'border-success');
        handleFiles(e.dataTransfer.files);
    });

    // When using file input normally
    fileInput.addEventListener('change', (e) => handleFiles(e.target.files));

    // Function to handle files and preview
    function handleFiles(files) {
        Array.from(files).forEach((file) => {
            if (!file.type.startsWith('image/')) return;

            const reader = new FileReader();
            reader.onload = function(e) {
                const wrapper = document.createElement('div');
                wrapper.classList.add('preview-wrapper');

                const img = document.createElement('img');
                img.src = e.target.result;

                const removeBtn = document.createElement('button');
                removeBtn.type = 'button';
                removeBtn.innerHTML = '&times;';
                removeBtn.classList.add('btn', 'btn-sm', 'btn-danger', 'p-0');

                removeBtn.addEventListener('click', () => wrapper.remove());

                wrapper.appendChild(img);
                wrapper.appendChild(removeBtn);
                preview.appendChild(wrapper);
            };
            reader.readAsDataURL(file);
        });
    }
</script>