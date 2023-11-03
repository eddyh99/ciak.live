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
                            <a href="" class="text-white fs-5"><?=$_SESSION["currency"]?> - Top up - National</a>
                        </div>
                        <div class="action">
                        </div>
                    </div>
                </div>
            </div>
            <div>
                <form action="<?=base_url()?>wallet/national_info" method="post">
                    <input type="hidden" name="amount" value="<?=$amount?>">
                    <div class="apps-member light w-100 mt-5">
                        <div class="topup-headwithdraw-national d-flex flex-column align-items-center justify-content-center w-auto">
                            <h4>Confirmation</h4>                
                            <h5>Do you want to confirm the amount ?</h5>
                            <span>
                                Amount : 
                                <b class="text-primary"><?=number_format($amount,2).' '.$_SESSION["currency"]?></b>
                            </span>
                        </div>
                        <div class="d-flex justify-content-center mt-4 gap-3">
                            <a href="<?= base_url()?>wallet/deposit_national" class="btn btn-cancel w-50">Cancel</a>
                            <button type="submit" class="btn btn-main-green w-50">Confirm</button>
                        </div>
                    </div>
                </form>
            </div>

        </div>
    </div>
</div>