<div id="load-edit-profile" style="display: none;">
    <div class="img-load d-flex flex-column justify-content-center align-items-center">
        <div class="spinner-border fs-3" role="status">
            <span class="visually-hidden fs-3">Loading...</span>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-11 col-lg-5 mx-auto">
        <div class="apps-body ptop pbot">
                <div class="apps-topbar alerts fixed-top light row">
                    <div class="apps-member mx-auto col-12 col-lg-5">
                        <div class="alert-notif d-flex justify-content-between px-4 px-lg-0">
                            <div class="action-icon">
                                <a href="<?= base_url()?>message">
                                    <i class="fa-solid fa-arrow-left"></i>
                                </a>
                            </div>
                            <div class="action">
                                <div class="icon rounded-circle d-flex flex-column justify-content-center align-items-center">
                                    <img class="img-fluid" src="<?=$member->profile?>" alt="mp">
                                    <span class="text-center span-text-toogle-explicit"><?=$member->username?></span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div>
                    <div class="apps-member light w-100">
                        <div id="messages_area" class="app-notif mt-5"></div>
                        <div id="gobottom"></div>
                    </div>
                </div>
        </div>
    </div>
</div>

<div class="offcanvas offcanvas-bottom popup-bottom rounded-top" tabindex="-1" id="pricechat"
    aria-labelledby="offcanvasBottomLabel">
    <div class="offcanvas-header">
        <button type="button" class="ms-auto btn-close text-reset" data-bs-dismiss="offcanvas"
            aria-label="Close"></button>
    </div>
    <div class="offcanvas-body small text-center pb-5">
        <h5 class="offcanvas-title  mx-auto" id="offcanvasBottomLabel">Price File?</h5>
        <form action="" class="d-flex flex-column">
            <input type="hidden" name="id_pricefilechat">
            <div class="mt-2 mb-3 col-5 mx-auto">
                <input type="text" name="pricefilechat" id="pricefilechat" placeholder="$0.00" class="form-control money-input">
            </div>
            <div class="">
                <button type="button" id="btnsendtips" class="btn btn-main-green rounded-pill px-4">Send File</button>
            </div>
        </form>
    </div>
</div>

