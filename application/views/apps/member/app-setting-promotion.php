<div class="apps-body">
    <?php
    if (isset($popup)) {
        $this->load->view($popup);
    }
    ?>
    <div class="apps-topbar alerts fixed-top light">
        <div class="apps-member mx-auto position-relative">
            <div class="alert-notif">
                <div class="action-icon fa">
                    <a href="">
                        <i class="fa-solid fa-arrow-left"></i>
                    </a>
                </div>
                <div class="title light mx-auto">
                    <span class="text-capitalize">Promotion</span>
                </div>
            </div>
        </div>
    </div>
    <div class="apps-member mx-auto w-100 mt-5">
        <div class="select-type-price mt-5">
            <div class="radio-btn-type">
                <input class="form-check-input" type="radio" name="typepromo" value="1" id="pct" checked>
                <label class="form-check-label" for="pct">
                    Percentage
                </label>
            </div>
            <div class="radio-btn-type">
                <input class="form-check-input" type="radio" name="typepromo" value="2" id="fxd">
                <label class="form-check-label" for="fxd">
                    Fix price
                </label>
            </div>
        </div>

        <div class="biodata mt-5 px-4">
            <form method="POST" action="<?= base_url(); ?>homepage/setting_promotion">
                <input type="text" class="form-control" id="type" value="pct" name="type" hidden>
                <div class="mb-3 ciak-data-input">
                    <label for="weekly" class="form-label" id="weeklylabel">Weekly discount price (%)</label>
                    <input type="text" class="form-control" id="weekly" placeholder="0.00">
                </div>
                <div class="mb-3 ciak-data-input">
                    <label for="monthly" class="form-label" id="monthlylabel">Monthly discount price (%)</label>
                    <input type="text" class="form-control" id="monthly" placeholder="0.00">
                </div>
                <div class="mb-3 ciak-data-input">
                    <label for="yearly" class="form-label" id="yearlylabel">Yearly discount price (%)</label>
                    <input type="text" class="form-control" id="yearly" placeholder="0.00">
                </div>
                <div class="mb-3 ciak-data-input">
                    <label for="yearly" class="form-label">*Expired time</label>
                    <input type="date" class="form-control" id="exp" placeholder="dd/mm/yyyy">
                </div>

                <div class="mb-3 ciak-data-input">
                    <label for="yearly" class="form-label">Maximum users</label>
                    <input type="text" class="form-control" id="yearly">
                </div>

                <div class="mt-5 mb-3 ciak-data-input d-grid gap-2">
                    <!-- <button class="btn-orange" type="submit">Confirm</button> -->
                    <a href="<?= base_url() ?>homepage/recomend_friends" class="btn-orange">Confirm</a>
                </div>
            </form>
        </div>
    </div>
</div>