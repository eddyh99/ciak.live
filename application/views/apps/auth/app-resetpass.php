<div class="apps-topbar fixed-top">
    <div class="apps-auth mx-auto">
        <div class="d-flex flex-row">
            <div class="link-back">
                <a href="<?= base_url() ?>auth/form_login">
                    <img src="<?= base_url() ?>assets/img/icon-close.png" alt="">
                </a>
            </div>
        </div>
    </div>
</div>

<div class="apps-body">
    <div class="apps-auth w-100 d-flex flex-column">
        <div class="col-12 logo mt-auto text-center">
            <h3 class="text-center">
                Reset Password
            </h3>
            <?php if (@isset($_SESSION["failed"])) { ?>
                <span class="text-center">
                    <?= $_SESSION["failed"] ?>
                </span>
            <?php } ?>
        </div>
        <div class="col-10 mx-auto mt-5 mb-auto">
            <form class="form-login" method="POST" action="<?= base_url(); ?>auth/recovery_pass/<?= $token ?>">
                <input type="hidden" id="token" name="<?= $this->security->get_csrf_token_name(); ?>" value="<?= $this->security->get_csrf_hash(); ?>">
                <input type="hidden" name="token" value="<?= $token ?>">

                <div class="mb-2">
                    <label for="pass" class="form-label fw-bold">New Password</label>
                    <input type="password" class="form-control py-2 rounded-pill" id="pass" name="pass" placeholder="******">
                    <?= form_error('pass', '<small class="text-danger d-block text-end">', '</small>'); ?>
                </div>
                <div class="mb-3">
                    <label for="passconfirm" class="form-label fw-bold">Confirm Password</label>
                    <input type="password" class="form-control py-2 rounded-pill" id="passconfirm" name="passconfirm" placeholder="******">
                    <?= form_error('passconfirm', '<small class="text-danger d-block text-end">', '</small>'); ?>
                </div>

                <div class="apps-list-btn text-center">
                    <button class="rounded-pill fw-bold btn-ciak">Confirm</button>
                    <!-- <a href="<?= base_url() ?>auth/signup_success" class="rounded-pill d-inline-block fw-bold btn-ciak">Register</a> -->
                </div>
            </form>
        </div>
    </div>
</div>