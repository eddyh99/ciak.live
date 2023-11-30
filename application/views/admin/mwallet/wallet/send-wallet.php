<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid px-4">
            <?php $this->load->view("admin/header"); ?>
            <div class="row d-flex justify-content-center">
                <div class="col-12">
                    <div class="text-start">
                        <span class="me-auto f-jakarta title-top-navbar"><?= $_SESSION["currency"] ?> - Send Wallet
                            to Wallet</span>
                    </div>
                </div>
                <div class="col-12 infowallet-list-app my-4">
                    <div class="py-4">
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
                        <form method="POST" action="<?= base_url() ?>admin/sendwallet/admin_confirm" class="input-piggy-style" id="form_submit" onsubmit="return validate()">
                            <input type="hidden" id="token" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>">
                            <div class="mb-3">
                                <label class="ms-2 form-label">RECIPIENT’S UNIQUE CODE</label>
                                <input type="text" class="form-control" name="ucode" id="ucode" value="<?= @$ucode ?>" <?php echo (empty($ucode) ? "" : "readonly") ?>>
                            </div>
                            <div class="mb-3">
                                <label class="ms-2 form-label">CONFIRM RECIPIENT’S UNIQUE CODE</label>
                                <input type="text" class="form-control" name="confirm_ucode" id="confirm_ucode" value="<?= @$ucode ?>" <?php echo (empty($ucode) ? "" : "readonly") ?>>
                            </div>
                            <div class="mb-3">
                                <label class="ms-2 form-label">AMOUNT ( max :
                                    <?= max_sendtowallet(balance($_SESSION['user_id'], $_SESSION["currency"]), $_SESSION["currency"]); ?>
                                    )</label>
                                <input type="text" class="form-control money-input" name="amount" id="amount" placeholder="Amount (ex. 0.01)" value="<?= @$amount ?>" <?php echo (empty($amount) ? "" : "readonly") ?>>
                            </div>
                            <div class="mb-3">
                                <label class="ms-2 form-label">CONFIRM AMOUNT</label>
                                <input type="text" class="form-control money-input" name="confirm_amount" id="confirm_amount" placeholder="Confirm Amount (ex. 0.01)" value="<?= @$amount ?>" <?php echo (empty($amount) ? "" : "readonly") ?>>
                            </div>
                            <div class="mb-3">
                                <label class="ms-2 form-label">Causal</label>
                                <input type="text" class="form-control" name="causal" placeholder="Causal" value="<?= @$causal?>" <?php echo (empty($causal) ? "" : "readonly") ?> maxlength="10">
                            </div>
                            <div class="row">
                                <div class=" mt-4">
                                    <button class="btn btn-freedy-green shadow-none px-5 py-2 ms-3" type="submit" id="btnconfirm">Next</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </main>
</div>