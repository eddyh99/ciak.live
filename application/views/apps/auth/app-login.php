<div class="apps-topbar">
    <div class="apps-auth mx-auto">
        <div class="d-flex flex-row">
            <div class="logo-top justify-content-start align-items-start">
                <div class="">
                    <img src="<?= base_url() ?>assets/img/ciak-logo.png" alt="Ciak.Live">
                </div>
                <span class="title light">Login</span>
            </div>
            <div class="mode-apps light ms-auto">
                <input type="checkbox" name="dark" id="mode" class="form-check-input light" <?= @$_SESSION['mode'] ?>>
            </div>
        </div>
    </div>
</div>

<div class="apps-body">
    <div class="apps-auth w-100 d-flex flex-column">
        <div class="col-10 col-lg-6 mx-auto mt-5">
            <form class="form-login">
                <div class="mb-3">
                    <label for="email" class="form-label light fw-bold">Email</label>
                    <input type="text" class="form-control light py-2 rounded-pill" id="email"
                        placeholder="Input your email">
                </div>
                <div class="mb-2">
                    <label for="pass" class="form-label light fw-bold">Password</label>
                    <input type="password" class="form-control light py-2 rounded-pill" id="pass" placeholder="******">
                </div>
                <div class="mb-5 text-end foget-pass">
                    <a href="<?= base_url() ?>auth/forget_pass" class="me-3 light">Forgot Password?</a>
                </div>
                <div class="apps-list-btn text-center">
                    <!-- <button class="rounded-pill fw-bold btn-ciak-o">Login</button> -->
                    <a href="<?= base_url() ?>homepage" class="rounded-pill d-inline-block fw-bold btn-ciak-o">Login</a>
                </div>
                <div class="noted-info text-center">
                    <span class="light">Don’t have an account? <a href="<?= base_url() ?>auth/signup_referral">Sign
                            up</a></span>
                </div>
            </form>
        </div>
    </div>
</div>