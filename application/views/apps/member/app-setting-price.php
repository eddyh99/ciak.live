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
                </div>
            </div>
        </div>
        <div class="title-apps text-center w-100 mt-5 mb-3">
            <h4>Subscription</h4>
        </div>
        <div class="biodata mt-5 px-4">
            <form action="">
                <div class="mb-3 ciak-data-input">
                    <label for="weekly" class="form-label">Weekly</label>
                    <input type="text" class="form-control" id="weekly" placeholder="0.00">
                </div>
                <div class="mb-3 ciak-data-input">
                    <label for="monthly" class="form-label">Monthly</label>
                    <input type="text" class="form-control" id="monthly" placeholder="0.00">
                </div>
                <div class="mb-3 ciak-data-input">
                    <label for="yearly" class="form-label">Yearly</label>
                    <input type="text" class="form-control" id="yearly" placeholder="0.00">
                </div>

                <div class="my-5 ciak-data-input d-grid gap-2">
                    <a href="<?= base_url() ?>homepage/setting_promotion" class="btn-border-orange">Promote your
                        subcription</a>
                </div>

                <div class="mb-3 ciak-data-input d-grid gap-2">
                    <!-- <button class="btn-orange">Confirm</button> -->
                    <a href="<?= base_url() ?>homepage/recomend_friends" class="btn-orange">Confirm</a>
                </div>

            </form>
        </div>
    </div>
</div>