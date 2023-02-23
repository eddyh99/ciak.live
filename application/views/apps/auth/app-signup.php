<?php
if (@$_GET['ref'] == '') {
    if (@isset($_SESSION['referral'])) {
        $ref = $_SESSION['referral'];
    } else {
        $ref = set_value('referral');
    }
} else {
    $ref = @$_GET['ref'];
}
if (set_value('agree')) {
    $checked = 'checked';
}
?>

<div class="apps-body">
    <div class="apps-auth w-100 d-flex flex-column">
        <div class="col-12 logo mt-auth-auto text-center">
            <h3 class="text-center">
                Sign up
            </h3>
            <?php if (@isset($_SESSION["failed"])) { ?>
                <span class="text-center">
                    <?= $_SESSION["failed"] ?>
                </span>
            <?php } ?>
            <?= form_error('agree', '<span class="text-center">', '</span>'); ?>
        </div>
        <div class="col-10 mx-auto mt-5 mb-auto">
            <form class="form-login" method="POST" action="<?= base_url(); ?>auth/form_signup">
                <input type="hidden" id="token" name="<?= $this->security->get_csrf_token_name(); ?>" value="<?= $this->security->get_csrf_hash(); ?>">
                <input type="hidden" name="time_location" id="time_location">

                <div class="mb-3">
                    <label for="email" class="form-label fw-bold">Email</label>
                    <input type="text" class="form-control py-2 rounded-pill" id="email" name="email" placeholder="Input your email" value="<?= set_value('email'); ?>">
                    <?= form_error('email', '<small class="text-danger d-block text-end">', '</small>'); ?>
                </div>
                <div class="mb-3">
                    <label for="username" class="form-label fw-bold">Username</label>
                    <input type="text" class="form-control py-2 rounded-pill" id="username" name="username" placeholder="Input your username" value="<?= set_value('username'); ?>">
                    <?= form_error('username', '<small class="text-danger d-block text-end">', '</small>'); ?>
                </div>
                <div class="mb-2">
                    <label for="pass" class="form-label fw-bold">Password</label>
                    <input type="password" class="form-control py-2 rounded-pill" id="pass" name="pass" placeholder="******">
                    <?= form_error('pass', '<small class="text-danger d-block text-end">', '</small>'); ?>
                </div>
                <div class="mb-3">
                    <label for="passconfirm" class="form-label fw-bold">Confirm Password</label>
                    <input type="password" class="form-control py-2 rounded-pill" id="passconfirm" name="passconfirm" placeholder="******">
                    <?= form_error('passconfirm', '<small class="text-danger d-block text-end">', '</small>'); ?>
                </div>
                <div class="mb-3">
                    <label for="referral" class="form-label fw-bold">Referral code (optional)</label>
                    <input type="text" class="form-control py-2 rounded-pill" id="referral" name="referral" placeholder="c14kl1v3" value="<?= @$ref; ?>">
                </div>
                <div class="mb-5 d-flex align-items-center flex-row agree">
                    <input class="form-check-input me-2 my-0" type="checkbox" value="1" id="agree" name="agree" <?= @$checked; ?>>
                    <label class="light" for="agree">
                        I agree with Terms and Privacy
                    </label>
                </div>
                <div class="apps-list-btn text-center">
                    <button class="rounded-pill fw-bold btn-ciak">Register</button>
                    <!-- <a href="<?= base_url() ?>auth/signup_success" class="rounded-pill d-inline-block fw-bold btn-ciak">Register</a> -->
                </div>
                <div class="noted-info text-center">
                    <span class="light">Already have an account? <a href="<?= base_url() ?>auth/form_login">Login</a></span>
                </div>
            </form>
        </div>
    </div>
</div>