            <!-- About Us Modal -->
            <div class="modal fade" id="about_us_modal" tabindex="-1" role="dialog" aria-labelledby="aboutUsModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="aboutUsModalLabel">About Us</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <div class="row">
                                <div class="col-6">
                                    <h3>Website Developers</h3>
                                    <p class="mb-0">Dizon, Alfredson C. - <b>Leader</b></p>
                                    <p class="mb-0">Docabo, Eugene P. - <b>Member</b></p>
                                    <p class="mb-0">Batinga, Pauline A. - <b>Member</b></p>
                                    <p>Bula, Eugene C - <b>Member</b></p>

                                    <p class="text-muted">&copy; Copyright <strong><span>I❤️Oras</span></strong>. All Rights Reserved.</p>
                                </div>
                                <div class="col-6 d-flex justify-content-center align-items-center bg-light">
                                    <div class="text-center">
                                        <img src="<?= base_url('public/dist/admin/img/logo.png') ?>" class="mb-2" style="width: 100px; height: 100px;">
                                        <h4>I❤️Oras Website</h4>
                                        <h5>Oras, Eastern Samar</h5>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Update Profile Modal -->
            <div class="modal fade" id="update_profile_modal" tabindex="-1" role="dialog" aria-labelledby="aboutUsModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                        <form action="javascript:void(0)" id="update_profile_form">
                            <div class="modal-header">
                                <h5 class="modal-title" id="aboutUsModalLabel">Update Profile</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            
                            <div class="modal-body">
                                <!-- Profile Image Display -->
                                <div class="form-group text-center">
                                    <div style="width: 150px; height: 150px; margin: 0 auto; overflow: hidden; border-radius: 5px;">
                                        <img id="update_profile_image_preview" src="<?= base_url('public/dist/admin/img/uploads/') . session()->get("user")["image"] ?>" alt="Profile Image" class="img-thumbnail" style="width: 100%; height: 100%; object-fit: cover;">
                                    </div>
                                    <div class="mt-3">
                                        <input type="file" class="form-control-file" id="update_profile_image" accept="image/*">
                                    </div>
                                </div>

                                <!-- Name -->
                                <div class="form-group">
                                    <label for="update_profile_name">Name</label>
                                    <input type="text" class="form-control" id="update_profile_name" value="<?= session()->get("user")["name"] ?>" required>
                                </div>

                                <!-- Email -->
                                <div class="form-group">
                                    <label for="update_profile_email">Email</label>
                                    <input type="email" class="form-control" id="update_profile_email" value="<?= session()->get("user")["email"] ?>" required>
                                </div>

                                <!-- Password -->
                                <div class="form-group">
                                    <label for="update_profile_password">Password <small class="text-muted">(Leave blank if not changing)</small></label>
                                    <input type="password" class="form-control" id="update_profile_password">
                                </div>

                                <!-- Confirm Password -->
                                <div class="form-group">
                                    <label for="update_profile_confirm_password">Confirm Password <small class="text-muted">(Leave blank if not changing)</small></label>
                                    <input type="password" class="form-control" id="update_profile_confirm_password">
                                </div>
                            </div>

                            <div class="modal-footer">
                                <button type="submit" class="btn btn-primary" id="update_profile_submit">Save changes</button>
                                <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            
            <!-- Footer -->
            <footer class="main-footer">
                <span>&copy; 2025</span>    
                <strong>I❤️Oras.</strong>
                <span>All rights reserved.</span>
                <div class="float-right d-none d-sm-inline-block">
                    <b>Version</b> 1.0
                </div>
            </footer>
        </div>

        <script>
            const base_url = "<?= base_url() ?>";
            const user = <?= json_encode(session()->get("user")) ?>;
            const notification = <?= json_encode(session()->get("notification")) ?>;
        </script>

        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        
        <!-- Scripts -->
        <script src="<?= base_url("public/plugins/jquery/jquery.min.js") ?>"></script>
        <script src="<?= base_url("public/plugins/bootstrap/js/bootstrap.bundle.min.js") ?>"></script>
        <script src="<?= base_url("public/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js") ?>"></script>
        <script src="<?= base_url("public/dist/admin/js/adminlte.js") ?>"></script>
        <script src="<?= base_url("public/dist/admin/js/script.js?v=1.1") ?>"></script>
    </body>
</html>