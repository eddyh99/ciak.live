<div class="apps-body">
    <?php
    if (isset($popup)) {
        $this->load->view($popup);
    }
    ?>
    <div class="apps-member mx-auto w-100">
        <div class="banner-profile w-100" style="background-image: url('<?= base_url(); ?>');">
            <div class="changes">
            </div>
        </div>
        <div class="profile">
            <div class="d-flex flex-row position-relative">
                <a href="" class="cancel ms-3 me-auto">Discard</a>
                <div class="img-profile">
                    <div class="img rounded-circle">
                        <img src="<?= base_url(); ?>assets/img/profile.jpg" alt="" class="rounded-circle">
                    </div>
                    <label for="img_profile" class="change-profile">Change Picture</label>
                </div>
            </div>
        </div>
        <div class="biodata mt-5 px-4">
            <form action="">
                <div class="mb-3 ciak-data-input">
                    <label for="ucode" class="form-label">Unique code</label>
                    <input type="text" class="form-control" id="ucode" value="XXXxXX" disabled readonly>
                </div>
                <div class="mb-3 ciak-data-input">
                    <label for="username" class="form-label">Username</label>
                    <input type="text" class="form-control" id="username" placeholder="aSeP">
                </div>
                <div class="mb-3 ciak-data-input">
                    <label for="bio" class="form-label">Bio</label>
                    <input type="text" class="form-control" id="bio" placeholder="Hai, Iam.." maxlength="100">
                    <span class="max">Max 100</span>
                </div>
                <div class="mb-3 ciak-data-input">
                    <label for="web" class="form-label">Web</label>
                    <input type="text" class="form-control" id="web" placeholder="www.example.com">
                </div>
                <div class="mb-3 ciak-data-input">
                    <label for="email" class="form-label">Email</label>
                    <input type="text" class="form-control" id="email" placeholder="email@gmail.com">
                </div>
                <div class="mb-3 ciak-data-input">
                    <label for="phone" class="form-label">Phone number</label>
                    <input type="text" class="form-control" id="phone" placeholder="000 0000 0000">
                </div>

                <div class="mb-3 ciak-check d-flex flex-row">
                    <div class="d-flex flex-column col-8">
                        <span>Enable Comment</span>
                        <p>The platform has no moderators. By enabling the comments, you will accept everything that
                            will be written.</p>
                    </div>
                    <div class="form-check form-switch col p-0 d-flex justify-content-end align-items-center">
                        <input class="form-check-input" type="checkbox" role="switch" id="flexSwitchCheckChecked"
                            checked>
                    </div>
                </div>

                <div class="mb-3 ciak-data-input d-grid gap-2">
                    <!-- <button class="btn-orange">Confirm</button> -->
                    <a href="<?= base_url() ?>homepage/setting_price" class="btn-orange">Confirm</a>
                </div>

            </form>
        </div>
    </div>
</div>