<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid px-4">
            <?php $this->load->view("admin/header"); ?>
            <div class="row col-12 col-xl-8 mx-auto justify-content-center">
                <div class="col-12">
                    <div class="text-center">
                        <span class="me-auto f-hahmlet fw-bold text-blue-freedy fs-2 title-top-navbar">Confirmation</span>
                    </div>
                </div>
                <div class="col-12 infowallet-list-app f-jakarta my-4">
                    <div class="col-12 py-4 px-4">
                        <form method="POST" action="<?= base_url() ?>admin/sendwallet/admin_notif" id="form_submit" onsubmit="return validate()">
                            <input type="hidden" id="token" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>">
                            <div class="col-12 list-send-wallet d-flex flex-column mb-3">
                                <span>Recipients unique code</span>
                                <span><?= @$ucode ?></span>
                            </div>
 
                            <div class="col-12 list-send-wallet d-flex flex-column mb-3">
                                <span>Causal</span>
                                <span><?= @$causal ?></span>
                            </div>

                            <div class="col-12 list-send-wallet d-flex flex-column mb-3">
                                <span>Amount</span>
                                <span><?= $_SESSION['symbol'] ?> <?= number_format('20', 2) ?></span>
                            </div>
                            <div class="col-12 list-send-wallet d-flex flex-column mb-3">
                                <span>Transaction fee</span>
                                <span><?= $_SESSION['symbol'] ?> <?= number_format(@$fee, 2) ?></span>
                            </div>
                            <div class="col-12 list-send-wallet d-flex flex-column mb-3">
                                <span>Total Deducted</span>
                                <span><?= $_SESSION['symbol'] ?> <?= number_format(@$deduct, 2) ?></span>
                            </div>
                            <div class="col-12 list-send-wallet d-flex flex-column mb-3">
                                <span>New Balance</span>
                                <span><?= $_SESSION['symbol'] ?>
                                    <?= number_format(balance($_SESSION['user_id'], $_SESSION["currency"]) - @$deduct, 2) ?></span>
                            </div>

                            <div class="attention-box p-3 text-center">
                                <span class="title mb-3 d-inline-block">Attention</span>
                                <p>Are you sure that the data are correct? Are you sure of the sending reason?</p>
                                <p>The transaction is irrevesible and can not be cancelled after the confirmation.
                                </p>
                                <p>If you are sure to make this transaction click confirm</p>
                            </div>

                            <div class="mt-5 d-flex justify-content-center">
                                <a href="<?= base_url() ?>admin/sendwallet" class="btn  py-2">Cancel</a>
                                <button class="btn btn-freedy-blue shadow-none px-5 py-2 ms-3" type="submit" id="btnconfirm">
                                        Confirm
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </main>
</div>