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
                        <!-- <div class="row justify-content-end">
                            <div class="col-sm-10 mt-4 d-flex justify-content-end align-items-start">
                                <div class="shadow alert mb-0 bg-message-detail-me">
                                    <b>Me - </b> 
                                    Send Attach File : 
                                    <div>
                                        <img class="img-fluid" width="100" src="<?= base_url()?>assets/img/new-ciak/excel.png" alt="">
                                    </div>
                                    <hr>
                                    <span>Price : $4.00</span><br>
                                    <button class="btn btn-main-green mt-2">Share File </button>
                                    
                                    <br />
                                </div>
                            </div>
                            <div class="d-flex justify-content-end align-items-start">
                                <span class="pe-1 span-text-toogle-explicit"><i>2023-10-12 12:00:00</i></span>
                            </div>
                        </div> -->

                        <!-- <div class="row justify-content-start">
                            <div class="col-sm-10 mt-4 d-flex justify-content-start align-items-start">
                                <div class="pe-2">
                                    <img class="img-fluid rounded-circle" width="50" height="50" src="<?= $member->profile?>">
                                </div>
                                <div class="shadow alert mb-0 bg-message-detail-friend">
                                    <b>Naruto UZumaki - </b> 
                                    Send Attach File : 
                                    <div>
                                        <img class="img-fluid" width="100" src="<?= base_url()?>assets/img/new-ciak/excel.png" alt="">
                                    </div>
                                    <hr>
                                    <span>Price : $4.00</span><br>
                                    <button class="btn btn-main-green mt-2">Buy File </button>
                                    
                                    <br />
                                </div>
                            </div>
                            <div class="d-flex justify-content-start align-items-start">
                                <span class="pe-1 span-text-toogle-explicit"><i>2023-10-12 12:00:00</i></span>
                            </div>
                        </div> -->
                    </div>
                </div>

                <!-- THIS CODE FOR EMPTY MESSAGE -->
                <!-- <div class="d-flex justify-content-center mt-5 pt-5">
                    <img src="<?= base_url()?>assets/img/empty-message.png" alt="empty">
                </div> -->
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
<!-- <div class="modal" id="modal_attch_chat" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-body">
                <h1 class="modal-title fs-5 text-white mt-4 mb-2">Set Your Price</h1>
                <form action="">
                    <input type="text" class="form-control money-input price-attch-chat" placeholder="price...">
                </form>
            </div>
            <div class="modal-footer mt-4">
                <button type="button" class="btn btn-leave-live" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-main-green">Send Attachment</button>
            </div>
        </div>
    </div>
</div> -->
