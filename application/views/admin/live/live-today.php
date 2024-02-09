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
                <div class="card-header fw-bold text-capitalize">
                    <i class="fas fa-list me-1"></i>
                    List Live Today
                </div>
                <div class="card-body">
                    <input type="hidden" id="token" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>">
                    <table id="table_livetoday" class="table table-hover table-bordered">
                        <thead class="table-dark">
                            <tr class="align-middle">
                                <th>Username</th>
                                <th>Meeting Type</th>
                                <th>Time</th>
                                <th>Duration</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody style="border-top: 0;">
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

    </main>
</div>
</div>