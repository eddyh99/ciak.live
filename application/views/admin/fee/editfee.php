<form id="form_submit" action="<?= base_url() ?>godmode/fee/updatefee" method="post" class="col-12"
    onsubmit="return validate()">
    <input type="hidden" id="token" name="<?php echo $this->security->get_csrf_token_name(); ?>"
        value="<?php echo $this->security->get_csrf_hash(); ?>">
    <div id="layoutSidenav_content">
        <main>
            <?php if (@isset($_SESSION["failed"])) { ?>
            <div class="col-12 alert alert-danger alert-dismissible fade show" role="alert">
                <span class="notif-login f-poppins"><?= $_SESSION["failed"] ?></span>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            <?php } ?>
            <?php if (@isset($_SESSION["success"])) { ?>
            <div class="col-12 alert alert-success alert-dismissible fade show" role="alert">
                <span class="notif-login f-poppins"><?= @$_SESSION["success"] ?></span>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            <?php } ?>
            <div class="col-10 mx-auto card fee mb-5 mt-3">
                <div class="card-header fw-bold">
                    <?=NAMETITLE?> Fee
                </div>
                <div class="card-body">
                    <h2 class="text-white">Ciak Transaction Fee</h2>
                    <div class="mb-3" id="topup_circuit_fxd_div">
                        <label class="form-label text-white">Transaction Fee (%)</label>
                        <input type="text" id="wallet2wallet_pct" name="wallet2wallet_pct" class="form-control fee-input" value="<?=$fee["wallet2wallet_pct"]?>">
                    </div>
                    <h2 class="text-white">Referral Fee</h2>
                    <div class="mb-3" id="topup_circuit_pct_div">
                        <label class="form-label text-white">Referral Level 1 (%)</label>
                        <input type="text" id="referral_lv1" name="referral_lv1" class="form-control fee-input" value="<?=$fee["referral_lv1"]?>">
                    </div>
                    <div class="mb-3" id="topup_circuit_pct_div">
                        <label class="form-label text-white">Referral Level 2 (%)</label>
                        <input type="text" id="referral_lv2" name="referral_lv2" class="form-control fee-input" value="<?=$fee["referral_lv2"]?>">
                    </div>
                    <div class="mb-3">
                        <a href="<?= base_url() ?>admin/fee" class="btn btn-warning">Cancel</a>
                        <button id="btnconfirm" class="btn btn-green">Confirm</button>
                    </div>
                </div>
            </div>
        </main>
    </div>
    </div>
</form>