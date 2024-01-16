<?php require_once("withdraw-countries-list.php"); ?>
<div class="row">
    <div class="col-11 col-md-7 col-lg-5 mx-auto">
        <div class="apps-body ptop pbot">
            <div class="apps-topbar alerts fixed-top light row">
                <div class="apps-member mx-auto col-12 col-lg-5" style="border-bottom: none;">
                    <div class="alert-notif d-flex justify-content-between px-4 px-lg-0">
                        <div class="action-icon">
                            <a href="<?= base_url()?>withdraw/withdraw_payment">
                                <i class="fa-solid fa-arrow-left"></i>
                            </a>
                        </div>
                        <div class="action">
                            <a href="" class="text-white fs-5">Withdraw</a>
                        </div>
                        <div class="action">
                        </div>
                    </div>
                </div>
            </div>
            <div>
                <form action="<?= base_url() ?>withdraw/withdraw_confirm" method="POST" onsubmit="return validate()">
                    <input type="hidden" id="token" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>">

                    <input type="hidden" name="currencycode" id="currencycode" value="<?= $_SESSION['withdraw']['currencycode']?>">
                    <input type="hidden" name="xeuramount" id="xeuramount" value="<?= $_SESSION['withdraw']['usdx']?>">
                    <input type="hidden" name="transfer_type" id="transfer_type" value="outside">



                    <div class="apps-member light w-100 mt-5">
                        <div class="topup-headwithdraw-national d-flex justify-content-center w-auto">
                            <span class="py-3 px-4 w-100 text-center">
                            <?= $_SESSION['withdraw']['currencycode']?> - International
                            </span>
                        </div>
                        <div class="wrap-withdraw-national my-5 p-4">
                            <div class="withdraw-national-field mb-4">
                                <label for="accountHolderName">Recipient Name</label><br>
                                <input type="text" name="accountHolderName" id="accountHolderName" autocomplete="off">
                            </div>

                            <?php 
                                $data['type'] = "international";
                                $data['countries_list'] = $countries_list;
                                $this->load->view('apps/member/wallet/withdraw/currency/' . @$_SESSION['withdraw']['currencycode'], $data)
                            ?>

                            <div class="withdraw-national-field mb-4">
                                <label for="causal">Causal</label><br>
                                <input type="text" name="causal" id="causal" autocomplete="off">
                            </div>
                        </div>
                        <div class="mb-3 ciak-data-input d-grid gap-2 ">
                            <button type="submit" class="btn-main-green">CONTINUE</button>
                        </div>
                    </div>
                </form>
            </div>

        </div>
    </div>
</div>