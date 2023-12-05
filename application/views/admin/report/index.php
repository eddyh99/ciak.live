<div id="layoutSidenav_content">
    <main>
        <?php if (@isset($_SESSION["failed"])) { ?>
        <div class="col-12 alert alert-danger alert-dismissible fade show" role="alert">
            <span class="notif-login f-poppins"><?= $_SESSION["failed"] ?></span>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        <?php } ?>
        <?php if (@isset($_SESSION["success"])) { ?>
        <div class="col-12 alert alert-success alert-dismissible fade show" role="alert">
            <span class="notif-login f-poppins"><?= @$_SESSION["success"] ?></span>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        <?php } ?>
        <div class="container-fluid mt-5 px-4">
            <div class="col-12 card report-member mb-5">
                <div class="row g-3">
                    <!-- <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
                        See Modal
                    </button>  -->
                    <div class="col-auto m-4">
                        <label class="text-white" for="">Category</label>
                        <select name="categoryReport" id="categoryReport" class="form-select category-report">
                            <option value="all">All Category</option>
                            <option value="hate speech">Hate Speech</option>
                            <option value="spam">Spam</option>
                            <option value="wrong category">Wrong Category</option>
                            <option value="abusing">Abusing</option>
                            <option value="others">Others</option>
                        </select>
                    </div>
                </div>
                <div class="card-header fw-bold text-capitalize">
                    <i class="fas fa-list me-1"></i>
                    List Reported Post
                </div>
                <div class="card-body">
                    <input type="hidden" id="token" name="<?php echo $this->security->get_csrf_token_name(); ?>"
                        value="<?php echo $this->security->get_csrf_hash(); ?>">
                    <table id="table_post" class="table table-hover table-bordered">
                        <thead class="table-dark">
                            <tr class="align-middle">
                                <th>Username</th>
                                <th>UCode</th>
                                <th>Post ID</th>
                                <th>Reported (times)</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody style="border-top: 0;">
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <!-- Modal -->
        <!-- <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Report Preview</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="modal-preview-body d-flex">
                        <div>
                            <img src="<?= base_url()?>assets/img/profile-2.jpg" class="rounded-circle pp-preview-report" alt="">
                        </div>
                        <div>
                            <h4>Killua Zoldick</h4>
                            <span>19 Hours Ago</span>
                        </div>
                    </div>
                    <div class="owl-preview-report">
                        <div class="owl-carousel owl-posts owl-theme">
                            <div class="item">
                                <div class="img">
                                    <img src="<?= base_url()?>assets/img/new-ciak/img-8.png" class="img-post-report" alt="">
                                </div>
                            </div>
                            <div class="item">
                                <div class="img">
                                    <img src="<?= base_url()?>assets/img/new-ciak/img-9.png" class="img-post-report" alt="">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Save changes</button>
                </div>
                </div>
            </div>
        </div> -->
    </main>
</div>
</div>