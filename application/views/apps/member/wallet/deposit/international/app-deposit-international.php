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
                            <a href="" class="text-white fs-5"><?=$_SESSION["currency"]?> - Deposit International</a>
                        </div>
                        <div class="action">
                        </div>
                    </div>
                </div>
            </div>
            <div>
                <form action="<?=base_url()?>wallet/international_confirm" method="post">
                    <div class="apps-member light w-100 mt-5">
                        <div class="mt-4">
                            <label class="ms-2 form-label">AMOUNT</label>
                            <div class="topup-receive-input">
                                <input type="text" class="form-control money-input" name="amount" id="amount" placeholder="Amount">
                            </div>
                        </div>
                        <div class="mt-4">
                            <label class="ms-2 form-label">CONFIRM AMOUNT</label>
                            <div class="topup-receive-input">
                                <input type="text" class="form-control money-input" name="confirm_amount" id="confirmamount" placeholder="Confirm Amount">
                            </div>
                        </div>
                        <div class="d-flex justify-content-center mt-4">
                            <button type="submit" class="btn btn-main-green w-50">Next</button>
                        </div>
                    </div>
                </form>
            </div>

        </div>
    </div>
</div>