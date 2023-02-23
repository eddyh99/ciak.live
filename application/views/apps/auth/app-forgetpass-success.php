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
    <div class="apps-auth m-auto">
        <div class="notif-success d-flex flex-column justify-content-center align-items-center">
            <div class="img-notif">
                <div class="blur"></div>
                <img src="<?= base_url() ?>assets/img/notif-success.png" alt="Success">
            </div>
            <span class="title my-2 text-center lh-sm">
                Successfully<br>
                sent a request to reset password</span>
            <div class="message bg-message">
                <p class="mb-3 fw-bold">ATTENTION</p>
                <p class="mb-5 fw-bold">To reset your password click the link received in the registered email.
                </p>
                <p class="mb-3">If you do not see the email, check into the spam folder.</p>
            </div>
            <!-- <div class="apps-list-btn text-center">
                <a href="<?= base_url() ?>auth/signup_activate/<?= @$_SESSION['token']; ?>" class="rounded-pill d-inline-block fw-bold btn-ciak">Manual Activate</a>
            </div> -->
        </div>
    </div>
</div>