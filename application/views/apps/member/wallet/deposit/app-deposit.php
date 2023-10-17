<div class="row">
    <div class="col-11 col-md-7 col-lg-5 mx-auto">
        <div class="apps-body ptop pbot">
            <div class="apps-topbar alerts fixed-top light row">
                <div class="apps-member mx-auto col-12 col-lg-5" style="border-bottom: none;">
                    <div class="alert-notif d-flex justify-content-between px-4 px-lg-0">
                        <div class="action-icon">
                            <a href="<?= base_url()?>wallet">
                                <i class="fa-solid fa-arrow-left"></i>
                            </a>
                        </div>
                        <div class="action">
                            <a href="" class="text-white fs-5">Deposit</a>
                        </div>
                        <div class="action">
                        </div>
                    </div>
                </div>
            </div>
            <div>
                <div class="apps-member light w-100 mt-5">
                    <div class="topup-headwithdraw-national d-flex justify-content-center w-auto mb-5">
                        <span class="py-3 px-4 w-100 text-center">
                            Deposit Type
                        </span>
                    </div>
                    <?php if (($_SESSION["currency"]=="USD") || ($_SESSION["currency"]=="EUR") || ($_SESSION["currency"]=="GBP") ){?>
                        <a href="<?= base_url()?>wallet/deposit_national" class="withdraw-payment text-center my-4">
                            National
                        </a>
                    <?php }?>
                    <?php if (($_SESSION["currency"]=="USD") || ($_SESSION["currency"]=="EUR") || ($_SESSION["currency"]=="GBP") ){?>
                        <a href="<?= base_url()?>wallet/deposit_international" class="withdraw-payment text-center my-4">
                            International
                        </a>
                    <?php } ?>
                    <a href="<?= base_url()?>wallet/deposit_towallet" class="withdraw-payment text-center my-4">
                        Wallet to wallet
                    </a>
                </div>
            </div>

        </div>
    </div>
</div>