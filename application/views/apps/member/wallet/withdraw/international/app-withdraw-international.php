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
                <form action="">
                    <div class="apps-member light w-100 mt-5">
                        <div class="topup-headwithdraw-national d-flex justify-content-center w-auto">
                            <span class="py-3 px-4 w-100 text-center">
                                International
                            </span>
                        </div>
                        <div class="wrap-withdraw-national my-5 p-4">
                            <div class="withdraw-national-field mb-4">
                                <label for="name">Name</label><br>
                                <input type="text">
                            </div>
                            <div class="withdraw-national-field mb-4">
                                <label for="name">Name</label><br>
                                <input type="text">
                            </div>
                            <div class="withdraw-national-field mb-4">
                                <label for="name">Name</label><br>
                                <input type="text">
                            </div>
                        </div>
                        <div class="mb-3 ciak-data-input d-grid gap-2 ">
                            <!-- <button class="btn-orange">Confirm</button> -->
                            <a href="<?= base_url() ?>withdraw/withdraw_confirm" class="btn-main-green">CONTINUE</a>
                        </div>
                    </div>
                </form>
            </div>

        </div>
    </div>
</div>