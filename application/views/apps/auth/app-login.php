<div class="apps-body">
    <div class="apps-auth apps-bg-login w-100 d-flex flex-column">
        <div class="col-12 logo mt-auto text-center">
            <div class="action-icon text-start ps-5 ms-4">
                <a href="<?= base_url()?>">
                    <i class="fa-solid fa-arrow-left fs-5 "></i>
                </a>
            </div>
            <img src="<?= base_url() ?>assets/img/new-ciak/logo.png" alt="Ciak.Live">
            <h3>Login</h3>
            <?php if (@isset($_SESSION["actived"])) { ?>
                <span class="text-center text-danger">
                    YOUR ACCOUNT IS ACTIVE<br>
                    NOW ACCESS USING YOUR CREDENTIALS
                </span>
            <?php } ?>
            <?php if (@isset($_SESSION["failed"])) { ?>
                <span class="text-center text-danger">
                    <?= $_SESSION["failed"]; ?>
                </span>
            <?php } ?>
            <?php if (@isset($_SESSION["success"])) { ?>
                <span class="text-center text-danger">
                    <?= $_SESSION["success"]; ?>
                </span>
            <?php } ?>
        </div>
        <div class="col-10 col-lg-6 mx-auto mt-5 mb-auto">
            
            <form class="form-login" method="POST" action="<?= base_url(); ?>auth/form_login">
                <div class="mb-3">
                    <label for="email" class="form-label fw-bold">Email</label>
                    <input type="text" class="form-control py-2 rounded-pill" id="email" name="email" placeholder="Input your email" value="<?= set_value('email'); ?>">
                    <?= form_error('email', '<small class="text-danger d-block text-end">', '</small>'); ?>
                </div>
                <div class="mb-2">
                    <label for="pass" class="form-label fw-bold">Password</label>
                    <div class="d-flex align-items-center bg-pw-login rounded-pill">
                        <input type="password" class="form-control py-2" id="password" name="pass" placeholder="******">
                        <i class="far fa-eye me-3" id="togglePassword" style="cursor: pointer" toggle="#password"></i>
                    </div>
                </div>
                <div class="mb-5 text-end foget-pass">
                    <a href="<?= base_url() ?>auth/forget_pass" class="me-3">Forgot Password?</a>
                </div>
                <div class="apps-list-btn text-center">
                    <button class="rounded-pill fw-bold btn-ciak-o">Login</button>
                    <!-- <a href="<?= base_url() ?>homepage" class="rounded-pill d-inline-block fw-bold btn-ciak-o">Login</a> -->
                </div>
                <div class="noted-info text-center">
                    <span class="light">Don’t have an account? <a href="<?= base_url() ?>auth/form_signup">Register</a></span>
                </div>
            </form>
        </div>
    </div>
</div>