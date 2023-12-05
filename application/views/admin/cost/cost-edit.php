<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid px-4">
            <div class="col-12 mt-3">
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
            </div>
            <div class="col-12 card cost mb-5 mt-3">
                <div class="card-header fw-bold">
                    Management Cost
                </div>
                <div class="card-body">
                    <form action="<?= base_url() ?>godmode/cost/editcost_prosses" method="post" id="form_submit"
                        onsubmit="return validate()">
                        <input type="hidden" id="token" name="<?php echo $this->security->get_csrf_token_name(); ?>"
                            value="<?php echo $this->security->get_csrf_hash(); ?>">
                        <div class="row mb-3">
                            <label for="currency_dcost" class="col-sm-2 col-form-label">Currency</label>
                            <div class="col-sm-10">
                                <select name="currency" id="currency_dcost" class="form-select category-cost" disabled>
                                    <option value="">-Select Currency-</option>
                                    <?php foreach ($currency as $dt) { ?>
                                    <option value="<?= $dt ?>"
                                        <?php echo ($dt == $curr) ? "selected" : "" ?>>
                                        <?= $dt ?></option>
                                    <?php } ?>
                                </select>
                                <input type="text" id="currency" name="currency" class="form-control"
                                    value="<?= $curr ?>" hidden>
                            </div>
                        </div>
                        <?php
                        if (
                            ($curr == "USD") ||
                            ($curr == "EUR") ||
                            ($curr == "AUD") ||
                            ($curr == "NZD") ||
                            ($curr == "CAD") ||
                            ($curr == "HUF") ||
                            ($curr == "SGD") ||
                            ($curr == "TRY") ||
                            ($curr == "GBP") ||
                            ($curr == "RON")
                        ) { ?>
                        <div class="mb-3" id="topup_nasional_fxd_div">
                            <label class="form-label text-white">Topup Circuit (Fixed)</label>
                            <input type="text" id="topup_circuit_fxd" name="topup_circuit_fxd"
                                class="form-control cost-input money-input" value="<?= $dcost['topup_circuit_fxd'] ?>">
                        </div>
                        <div class="mb-3" id="topup_circuit_pct_div">
                            <label class="form-label text-white">Topup Circuit (%)</label>
                            <input type="text" id="topup_circuit_pct" name="topup_circuit_pct"
                                class="form-control cost-input money-input" value="<?= $dcost['topup_circuit_pct'] ?>">
                        </div>
                        <?php 
                        } ?>

                        <div class="mb-3" id="walletbank_circuit_fxd_div">
                            <label class="form-label text-white">Walletbank Circuit (Fixed)</label>
                            <input type="text" id="walletbank_circuit_fxd" name="walletbank_circuit_fxd"
                                class="form-control cost-input money-input" value="<?= $dcost['walletbank_circuit_fxd'] ?>">
                        </div>
                        <div class="mb-3" id="walletbank_circuit_pct_div">
                            <label class="form-label text-white">Walletbank Circuit (%)</label>
                            <input type="text" id="walletbank_circuit_pct" name="walletbank_circuit_pct"
                                class="form-control cost-input money-input" value="<?= $dcost['walletbank_circuit_pct'] ?>">
                        </div>

                        <?php
                        if (($curr == "USD") ||
                            ($curr == "EUR") ||
                            ($curr == "GBP")
                        ) {
                        ?>
                        <div class="mb-3" id="walletbank_outside_fxd_div">
                            <label class="form-label text-white">Walletbank Outside (Fixed)</label>
                            <input type="text" id="walletbank_outside_fxd" name="walletbank_outside_fxd"
                                class="form-control cost-input money-input" value="<?= $dcost['walletbank_outside_fxd'] ?>">
                        </div>
                        <div class="mb-3" id="walletbank_outside_pct_div">
                            <label class="form-label text-white">Walletbank Outside (%)</label>
                            <input type="text" id="walletbank_outside_pct" name="walletbank_outside_pct"
                                class="form-control cost-input money-input" value="<?= $dcost['walletbank_outside_pct'] ?>">
                        </div>
                        <?php
                        } ?>
                        <div class="mb-3" id="swap_div">
                            <label class="form-label text-white">Swap (%)</label>
                            <input type="text" id="swap" name="swap"
                                class="form-control cost-input money-input" value="<?= $dcost['swap'] ?>">
                        </div>

                        <div class="mb-3">
                            <button id="btnconfirm"
                                class="btn btn-green-ciak px-4 py-2 mx-auto shadow-none">Confirm</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </main>
</div>