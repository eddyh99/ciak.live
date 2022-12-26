<div class="apps-topbar">
    <div class="apps-auth mx-auto">
        <div class="d-flex flex-row">
            <div class="logo-top justify-content-start align-items-start">
                <div class="">
                    <img src="<?= base_url() ?>assets/img/ciak-logo.png" alt="Ciak.Live">
                </div>
                <span class="title light">Sign up</span>
            </div>
            <div class="mode-apps light ms-auto">
                <input type="checkbox" name="dark" id="mode" class="form-check-input light" <?= @$_SESSION['mode'] ?>>
            </div>
        </div>
    </div>
</div>

<div class="apps-body">
    <div class="apps-auth w-100 d-flex flex-column">
        <div class="col-10 mx-auto mt-5">
            <form class="form-login">
                <div class="mb-3">
                    <label for="email" class="form-label light fw-bold">Email</label>
                    <input type="text" class="form-control light py-2 rounded-pill" id="email"
                        placeholder="Input your email">
                </div>
                <div class="mb-3">
                    <label for="email" class="form-label light fw-bold">Username</label>
                    <input type="text" class="form-control light py-2 rounded-pill" id="email"
                        placeholder="Input your username">
                </div>
                <div class="mb-2">
                    <label for="pass" class="form-label light fw-bold">Password</label>
                    <input type="password" class="form-control light py-2 rounded-pill" id="pass" placeholder="******">
                </div>
                <div class="mb-3">
                    <label for="pass" class="form-label light fw-bold">Confirm Password</label>
                    <input type="password" class="form-control light py-2 rounded-pill" id="pass" placeholder="******">
                </div>
                <div class="mb-5 d-flex align-items-center flex-row agree">
                    <input class="form-check-input light me-2 my-0" type="checkbox" value="1" id="agree">
                    <label class="light" for="agree">
                        I agree with Terms and Privacy
                    </label>
                </div>
                <div class="apps-list-btn text-center">
                    <!-- <button class="rounded-pill fw-bold btn-ciak">Sign up</button> -->
                    <a href="<?= base_url() ?>auth/signup_success"
                        class="rounded-pill d-inline-block fw-bold btn-ciak">Sign up</a>
                </div>
                <div class="noted-info text-center">
                    <span class="light">Already have an account? <a
                            href="<?= base_url() ?>auth/form_login">Login</a></span>
                </div>
            </form>
        </div>
    </div>
</div>