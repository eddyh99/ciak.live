<div class="apps-topbar fixed-top">
    <div class="apps-login mx-auto">
        <div class="d-flex flex-row">
            <a href="" class="me-auto">
                <img src="<?= base_url() ?>assets/img/icon-home.png" alt="Home">
            </a>
            <div class="mode-apps light ms-auto">
                <input type="checkbox" name="dark" id="mode" class="form-check-input light" <?= @$_SESSION['mode'] ?>>
            </div>
        </div>
    </div>
</div>

<div class="apps-body">
    <div class="apps-login m-auto">
        <div class="logo">
            <img src="<?= base_url() ?>assets/img/ciak-logo.png" alt="Ciak.Live">
        </div>
        <div class="apps-list-btn text-center">
            <a href="<?= base_url() ?>auth/form_login" class="rounded-pill d-block fw-bold btn-ciak-o">Login</a>
            <a href="<?= base_url() ?>auth/form_signup" class="rounded-pill d-block fw-bold btn-ciak">Sign Up</a>
        </div>
    </div>
</div>