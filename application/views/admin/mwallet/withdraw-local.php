<?php require_once("countries-list.php"); ?>
<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid px-4">
            <?php $this->load->view("admin/header"); ?>
            <?php if($_SESSION['currency'] == 'USDX') {?>
                <div class="receive-note ">
                    <h5 class="text-white text-center">If you want to Withdraw <?= $_SESSION["currency"] ?>, You need to swap another currency</h5>
                </div>
            <?php } else {?>
                <div class="col-12 col-md-8 card cost mt-5 mx-auto">
                    <div class="card-header fw-bold">
                        <i class="fas fa-money-bill-transfer me-1"></i>
                        Withdraw 
                    </div>
                    <div class="card-body">
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
                        <form action="<?= base_url() ?>godmode/mwallet/wdconfirm" method="post" id="form_submit"
                            onsubmit="return validate()">
                            <input type="hidden" id="token" name="<?php echo $this->security->get_csrf_token_name(); ?>"
                                value="<?php echo $this->security->get_csrf_hash(); ?>">
                            <input type="hidden" name="transfer_type" value="circuit">
                            <!-- <input type="hidden" name="currencycode" id="currencycode" value="<?= $currencycode ?>"> -->

                            <input type="hidden" name="url" value="wdlocal">

                            <div class="mb-3">
                                <label class="text-white" for="amount">Amount</label>
                                <input id="amount" class="form-control money-input cost-input mt-2" type="text" name="amount" placeholder="Amount">
                            </div>

                            <div class="mb-3">
                                <input class="form-control cost-input" type="text" name="accountHolderName"
                                    placeholder="Recipient Name">
                            </div>

                            <?php
                            $data['type'] = "local";
                            $data['countries_list'] = $countries_list;
                            $this->load->view('admin/mwallet/currency/' . @$_SESSION['currency'], $data);
                            ?>

                            <div class="mb-3">
                                <input class="form-control cost-input" type="text" name="causal" placeholder="Causal">
                            </div>

                            <div class="col-12 d-flex justify-content-center mb-3">
                                <a href="<?= base_url() ?>godmode/mwallet?curr=<?= $_SESSION['currency']?>"
                                    class="btn btn-freedy-white px-4 py-2 me-2 shadow-none">Cancel</a>
                                <button class="btn btn-green-ciak px-4 py-2 mx-2 shadow-none"
                                    id="btnconfirm">Confirm</button>
                            </div>
                        </form>
                    </div>
                </div>
            <?php }?>
        </div>
    </main>
</div>