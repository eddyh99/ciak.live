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
                <form action="">
                    <div class="apps-member light w-100 mt-5">
                        <div class="topup-headwithdraw-national d-flex justify-content-center w-auto">
                            <span class="py-3 px-4 w-100 text-center">
                                National <?= $_SESSION['currency']?>
                            </span>
                        </div>
                        <div class="wrap-withdraw-national my-5 p-4">

                            <?php if(($_SESSION['currency'] == 'EUR') || ($_SESSION['currency'] == 'USD') || ($_SESSION['currency'] == 'GBP')) {?>

                                <!-- Account Holder Start -->
                                <div class="withdraw-national-field mb-4">
                                    <label for="name">Account Holder</label><br>
                                    <div class="d-flex align-items-center">
                                        <input type="text" id="depo1" value="<?= $deposit->bank_detail->accountHolderName?>" disabled class="">
                                        <a class="btn btn-copy" id="btndepo1">
                                            <svg width="38" height="38" viewBox="0 0 38 38" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M22.1667 11.0833V10.3333C22.1667 8.44763 22.1667 7.50482 21.5809 6.91904C20.9951 6.33325 20.0523 6.33325 18.1667 6.33325H10.3333C8.44771 6.33325 7.5049 6.33325 6.91911 6.91904C6.33333 7.50482 6.33333 8.44763 6.33333 10.3332V18.1666C6.33333 20.0522 6.33333 20.995 6.91911 21.5808C7.5049 22.1666 8.44771 22.1666 10.3333 22.1666H11.0833" stroke="url(#paint0_linear_107_1180)" stroke-width="2"/>
                                                <rect x="15.8333" y="15.8333" width="15.8333" height="15.8333" rx="2" stroke="url(#paint1_linear_107_1180)" stroke-width="2"/>
                                                <defs>
                                                <linearGradient id="paint0_linear_107_1180" x1="6.33333" y1="14.2499" x2="22.6162" y2="14.2499" gradientUnits="userSpaceOnUse">
                                                <stop offset="0.462479" stop-color="#03B115"/>
                                                <stop offset="1" stop-color="#03B115"/>
                                                </linearGradient>
                                                <linearGradient id="paint1_linear_107_1180" x1="15.8333" y1="23.7499" x2="32.1162" y2="23.7499" gradientUnits="userSpaceOnUse">
                                                <stop offset="0.462479" stop-color="#03B115"/>
                                                <stop offset="1" stop-color="#03B115"/>
                                                </linearGradient>
                                                </defs>
                                            </svg>
                                        </a>
                                    </div>
                                </div>
                                <!-- Account Holder End -->

                                <!-- IBAN START-->
                                <div class="withdraw-national-field mb-4">
                                    <?php if (($_SESSION["currency"] == "USD") || ($_SESSION["currency"] == "GBP")) { ?>
                                        <label>Account Number</label>
                                    <?php } else { ?>
                                        <label>IBAN <small>(country belgium)</small></label>
                                    <?php } ?>

                                    <div class="d-flex align-items-center">
                                        <?php if(($_SESSION['currency'] == 'USD') || ($_SESSION['currency'] == 'GBP')) {?>
                                            <input type="text" id="depo2" value="<?= $deposit->bank_detail->accountNumber?>" disabled>
                                        <?php } else {?>
                                            <input type="text" id="depo2" value="<?= $deposit->bank_detail->IBAN?>" disabled>
                                        <?php } ?>
                                        <a class="btn btn-copy" id="btndepo2">
                                            <svg width="38" height="38" viewBox="0 0 38 38" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M22.1667 11.0833V10.3333C22.1667 8.44763 22.1667 7.50482 21.5809 6.91904C20.9951 6.33325 20.0523 6.33325 18.1667 6.33325H10.3333C8.44771 6.33325 7.5049 6.33325 6.91911 6.91904C6.33333 7.50482 6.33333 8.44763 6.33333 10.3332V18.1666C6.33333 20.0522 6.33333 20.995 6.91911 21.5808C7.5049 22.1666 8.44771 22.1666 10.3333 22.1666H11.0833" stroke="url(#paint0_linear_107_1180)" stroke-width="2"/>
                                                <rect x="15.8333" y="15.8333" width="15.8333" height="15.8333" rx="2" stroke="url(#paint1_linear_107_1180)" stroke-width="2"/>
                                                <defs>
                                                <linearGradient id="paint0_linear_107_1180" x1="6.33333" y1="14.2499" x2="22.6162" y2="14.2499" gradientUnits="userSpaceOnUse">
                                                <stop offset="0.462479" stop-color="#03B115"/>
                                                <stop offset="1" stop-color="#03B115"/>
                                                </linearGradient>
                                                <linearGradient id="paint1_linear_107_1180" x1="15.8333" y1="23.7499" x2="32.1162" y2="23.7499" gradientUnits="userSpaceOnUse">
                                                <stop offset="0.462479" stop-color="#03B115"/>
                                                <stop offset="1" stop-color="#03B115"/>
                                                </linearGradient>
                                                </defs>
                                            </svg>
                                        </a>
                                    </div>
                                </div>
                                <!-- IBAN END -->

                                <!-- ACH ROUTING USD START -->
                                <?php if($_SESSION['currency'] == 'USD'){?>
                                    <div class="withdraw-national-field mb-4">
                                        <label for="ach">ACH Routing Number</label><br>
                                        <div class="d-flex align-items-center">
                                            <input type="text" id="depo5" value="<?= $deposit->bank_detail->abartn?>" disabled >
                                            <a class="btn btn-copy" id="btndepo5">
                                                <svg width="38" height="38" viewBox="0 0 38 38" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <path d="M22.1667 11.0833V10.3333C22.1667 8.44763 22.1667 7.50482 21.5809 6.91904C20.9951 6.33325 20.0523 6.33325 18.1667 6.33325H10.3333C8.44771 6.33325 7.5049 6.33325 6.91911 6.91904C6.33333 7.50482 6.33333 8.44763 6.33333 10.3332V18.1666C6.33333 20.0522 6.33333 20.995 6.91911 21.5808C7.5049 22.1666 8.44771 22.1666 10.3333 22.1666H11.0833" stroke="url(#paint0_linear_107_1180)" stroke-width="2"/>
                                                    <rect x="15.8333" y="15.8333" width="15.8333" height="15.8333" rx="2" stroke="url(#paint1_linear_107_1180)" stroke-width="2"/>
                                                    <defs>
                                                    <linearGradient id="paint0_linear_107_1180" x1="6.33333" y1="14.2499" x2="22.6162" y2="14.2499" gradientUnits="userSpaceOnUse">
                                                    <stop offset="0.462479" stop-color="#03B115"/>
                                                    <stop offset="1" stop-color="#03B115"/>
                                                    </linearGradient>
                                                    <linearGradient id="paint1_linear_107_1180" x1="15.8333" y1="23.7499" x2="32.1162" y2="23.7499" gradientUnits="userSpaceOnUse">
                                                    <stop offset="0.462479" stop-color="#03B115"/>
                                                    <stop offset="1" stop-color="#03B115"/>
                                                    </linearGradient>
                                                    </defs>
                                                </svg>
                                            </a>
                                        </div>
                                    </div>

                                    <div class="withdraw-national-field mb-4">
                                        <label for="name">Account Type</label><br>
                                        <div class="d-flex align-items-center">
                                            <input type="text" id="depo6" value="<?= $deposit->bank_detail->accountType?>" disabled >
                                            <a class="btn btn-copy" id="btndepo6">
                                                <svg width="38" height="38" viewBox="0 0 38 38" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <path d="M22.1667 11.0833V10.3333C22.1667 8.44763 22.1667 7.50482 21.5809 6.91904C20.9951 6.33325 20.0523 6.33325 18.1667 6.33325H10.3333C8.44771 6.33325 7.5049 6.33325 6.91911 6.91904C6.33333 7.50482 6.33333 8.44763 6.33333 10.3332V18.1666C6.33333 20.0522 6.33333 20.995 6.91911 21.5808C7.5049 22.1666 8.44771 22.1666 10.3333 22.1666H11.0833" stroke="url(#paint0_linear_107_1180)" stroke-width="2"/>
                                                    <rect x="15.8333" y="15.8333" width="15.8333" height="15.8333" rx="2" stroke="url(#paint1_linear_107_1180)" stroke-width="2"/>
                                                    <defs>
                                                    <linearGradient id="paint0_linear_107_1180" x1="6.33333" y1="14.2499" x2="22.6162" y2="14.2499" gradientUnits="userSpaceOnUse">
                                                    <stop offset="0.462479" stop-color="#03B115"/>
                                                    <stop offset="1" stop-color="#03B115"/>
                                                    </linearGradient>
                                                    <linearGradient id="paint1_linear_107_1180" x1="15.8333" y1="23.7499" x2="32.1162" y2="23.7499" gradientUnits="userSpaceOnUse">
                                                    <stop offset="0.462479" stop-color="#03B115"/>
                                                    <stop offset="1" stop-color="#03B115"/>
                                                    </linearGradient>
                                                    </defs>
                                                </svg>
                                            </a>
                                        </div>
                                    </div>
                                <?php }?>
                                <!-- ACH ROUTING USD END -->

                                <?php if($_SESSION['currency'] == 'GBP'){?>
                                    <div class="withdraw-national-field mb-4">
                                        <label for="name">Sort Code</label><br>
                                        <div class="d-flex align-items-center">
                                            <input type="text" id="depo5" value="<?= $deposit->bank_detail->sortCode?>" disabled >
                                            <a class="btn btn-copy" id="btndepo5">
                                                <svg width="38" height="38" viewBox="0 0 38 38" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <path d="M22.1667 11.0833V10.3333C22.1667 8.44763 22.1667 7.50482 21.5809 6.91904C20.9951 6.33325 20.0523 6.33325 18.1667 6.33325H10.3333C8.44771 6.33325 7.5049 6.33325 6.91911 6.91904C6.33333 7.50482 6.33333 8.44763 6.33333 10.3332V18.1666C6.33333 20.0522 6.33333 20.995 6.91911 21.5808C7.5049 22.1666 8.44771 22.1666 10.3333 22.1666H11.0833" stroke="url(#paint0_linear_107_1180)" stroke-width="2"/>
                                                    <rect x="15.8333" y="15.8333" width="15.8333" height="15.8333" rx="2" stroke="url(#paint1_linear_107_1180)" stroke-width="2"/>
                                                    <defs>
                                                    <linearGradient id="paint0_linear_107_1180" x1="6.33333" y1="14.2499" x2="22.6162" y2="14.2499" gradientUnits="userSpaceOnUse">
                                                    <stop offset="0.462479" stop-color="#03B115"/>
                                                    <stop offset="1" stop-color="#03B115"/>
                                                    </linearGradient>
                                                    <linearGradient id="paint1_linear_107_1180" x1="15.8333" y1="23.7499" x2="32.1162" y2="23.7499" gradientUnits="userSpaceOnUse">
                                                    <stop offset="0.462479" stop-color="#03B115"/>
                                                    <stop offset="1" stop-color="#03B115"/>
                                                    </linearGradient>
                                                    </defs>
                                                </svg>
                                            </a>
                                        </div>
                                    </div>
                                <?php }?>

                            <?php } else { ?>

                                <!-- Account Holder Start -->
                                <div class="withdraw-national-field mb-4">
                                    <label for="name">Account Holder</label><br>
                                    <div class="d-flex align-items-center">
                                        <input type="text" id="depo1" value="<?= $deposit->bank_detail->accountHolderName?>" disabled class="">
                                        <a class="btn btn-copy" id="btndepo1">
                                            <svg width="38" height="38" viewBox="0 0 38 38" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M22.1667 11.0833V10.3333C22.1667 8.44763 22.1667 7.50482 21.5809 6.91904C20.9951 6.33325 20.0523 6.33325 18.1667 6.33325H10.3333C8.44771 6.33325 7.5049 6.33325 6.91911 6.91904C6.33333 7.50482 6.33333 8.44763 6.33333 10.3332V18.1666C6.33333 20.0522 6.33333 20.995 6.91911 21.5808C7.5049 22.1666 8.44771 22.1666 10.3333 22.1666H11.0833" stroke="url(#paint0_linear_107_1180)" stroke-width="2"/>
                                                <rect x="15.8333" y="15.8333" width="15.8333" height="15.8333" rx="2" stroke="url(#paint1_linear_107_1180)" stroke-width="2"/>
                                                <defs>
                                                <linearGradient id="paint0_linear_107_1180" x1="6.33333" y1="14.2499" x2="22.6162" y2="14.2499" gradientUnits="userSpaceOnUse">
                                                <stop offset="0.462479" stop-color="#03B115"/>
                                                <stop offset="1" stop-color="#03B115"/>
                                                </linearGradient>
                                                <linearGradient id="paint1_linear_107_1180" x1="15.8333" y1="23.7499" x2="32.1162" y2="23.7499" gradientUnits="userSpaceOnUse">
                                                <stop offset="0.462479" stop-color="#03B115"/>
                                                <stop offset="1" stop-color="#03B115"/>
                                                </linearGradient>
                                                </defs>
                                            </svg>
                                        </a>
                                    </div>
                                </div>
                                <!-- Account Holder End -->

                                <!-- Account Number START-->
                                <div class="withdraw-national-field mb-4">
                                    <label>Account Number</label>
                                    <div class="d-flex align-items-center">
                                        <input type="text" id="depo2" value="<?= $deposit->bank_detail->accountNumber?>" disabled>
                                        <a class="btn btn-copy" id="btndepo2">
                                            <svg width="38" height="38" viewBox="0 0 38 38" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M22.1667 11.0833V10.3333C22.1667 8.44763 22.1667 7.50482 21.5809 6.91904C20.9951 6.33325 20.0523 6.33325 18.1667 6.33325H10.3333C8.44771 6.33325 7.5049 6.33325 6.91911 6.91904C6.33333 7.50482 6.33333 8.44763 6.33333 10.3332V18.1666C6.33333 20.0522 6.33333 20.995 6.91911 21.5808C7.5049 22.1666 8.44771 22.1666 10.3333 22.1666H11.0833" stroke="url(#paint0_linear_107_1180)" stroke-width="2"/>
                                                <rect x="15.8333" y="15.8333" width="15.8333" height="15.8333" rx="2" stroke="url(#paint1_linear_107_1180)" stroke-width="2"/>
                                                <defs>
                                                <linearGradient id="paint0_linear_107_1180" x1="6.33333" y1="14.2499" x2="22.6162" y2="14.2499" gradientUnits="userSpaceOnUse">
                                                <stop offset="0.462479" stop-color="#03B115"/>
                                                <stop offset="1" stop-color="#03B115"/>
                                                </linearGradient>
                                                <linearGradient id="paint1_linear_107_1180" x1="15.8333" y1="23.7499" x2="32.1162" y2="23.7499" gradientUnits="userSpaceOnUse">
                                                <stop offset="0.462479" stop-color="#03B115"/>
                                                <stop offset="1" stop-color="#03B115"/>
                                                </linearGradient>
                                                </defs>
                                            </svg>
                                        </a>
                                    </div>
                                </div>
                                <!-- Account Number END -->


                                <?php if(($_SESSION["currency"] != "NZD") && ($_SESSION["currency"] != "HUF")){ ?>

                                    <!--  START-->
                                    <div class="withdraw-national-field mb-4">
                                        <?php if($_SESSION['currency'] == 'CAD'){?>
                                            <label>Institution Number</label>
                                        <?php } else if($_SESSION['currency'] == 'AUD') {?>
                                            <label>BSB Code</label>
                                        <?php } else if($_SESSION['currency'] == 'SGD') {?>
                                            <label>Bank Code</label>
                                        <?php }?>

                                        <div class="d-flex align-items-center">
                                            <?php if($_SESSION['currency'] == 'CAD'){?>
                                                <input type="text" id="depo5" value="<?= $deposit->bank_detail->instituionNumber?>" disabled>
                                            <?php } else if($_SESSION['currency'] == 'AUD') {?>
                                                <label>BSB Code</label>
                                            <?php } else if($_SESSION['currency'] == 'SGD') {?>
                                                <input type="text" id="depo5" value="<?= $deposit->bank_detail->bankCode?>" disabled>
                                            <?php }?>

                                            <a class="btn btn-copy" id="btndepo5">
                                                <svg width="38" height="38" viewBox="0 0 38 38" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <path d="M22.1667 11.0833V10.3333C22.1667 8.44763 22.1667 7.50482 21.5809 6.91904C20.9951 6.33325 20.0523 6.33325 18.1667 6.33325H10.3333C8.44771 6.33325 7.5049 6.33325 6.91911 6.91904C6.33333 7.50482 6.33333 8.44763 6.33333 10.3332V18.1666C6.33333 20.0522 6.33333 20.995 6.91911 21.5808C7.5049 22.1666 8.44771 22.1666 10.3333 22.1666H11.0833" stroke="url(#paint0_linear_107_1180)" stroke-width="2"/>
                                                    <rect x="15.8333" y="15.8333" width="15.8333" height="15.8333" rx="2" stroke="url(#paint1_linear_107_1180)" stroke-width="2"/>
                                                    <defs>
                                                    <linearGradient id="paint0_linear_107_1180" x1="6.33333" y1="14.2499" x2="22.6162" y2="14.2499" gradientUnits="userSpaceOnUse">
                                                    <stop offset="0.462479" stop-color="#03B115"/>
                                                    <stop offset="1" stop-color="#03B115"/>
                                                    </linearGradient>
                                                    <linearGradient id="paint1_linear_107_1180" x1="15.8333" y1="23.7499" x2="32.1162" y2="23.7499" gradientUnits="userSpaceOnUse">
                                                    <stop offset="0.462479" stop-color="#03B115"/>
                                                    <stop offset="1" stop-color="#03B115"/>
                                                    </linearGradient>
                                                    </defs>
                                                </svg>
                                            </a>
                                        </div>
                                    </div>
                                    <!--  END -->

                                    
                                    <!-- START-->
                                    <?php if($_SESSION['currency'] == 'CAD') {?>
                                    <div class="withdraw-national-field mb-4">
                                        <label>Transit Number</label>
                                        <div class="d-flex align-items-center">
                                            <input type="text" id="depo6" value="<?= $deposit->bank_detail->transitNumber?>" disabled>
                                            <a class="btn btn-copy" id="btndepo6">
                                                <svg width="38" height="38" viewBox="0 0 38 38" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <path d="M22.1667 11.0833V10.3333C22.1667 8.44763 22.1667 7.50482 21.5809 6.91904C20.9951 6.33325 20.0523 6.33325 18.1667 6.33325H10.3333C8.44771 6.33325 7.5049 6.33325 6.91911 6.91904C6.33333 7.50482 6.33333 8.44763 6.33333 10.3332V18.1666C6.33333 20.0522 6.33333 20.995 6.91911 21.5808C7.5049 22.1666 8.44771 22.1666 10.3333 22.1666H11.0833" stroke="url(#paint0_linear_107_1180)" stroke-width="2"/>
                                                    <rect x="15.8333" y="15.8333" width="15.8333" height="15.8333" rx="2" stroke="url(#paint1_linear_107_1180)" stroke-width="2"/>
                                                    <defs>
                                                    <linearGradient id="paint0_linear_107_1180" x1="6.33333" y1="14.2499" x2="22.6162" y2="14.2499" gradientUnits="userSpaceOnUse">
                                                    <stop offset="0.462479" stop-color="#03B115"/>
                                                    <stop offset="1" stop-color="#03B115"/>
                                                    </linearGradient>
                                                    <linearGradient id="paint1_linear_107_1180" x1="15.8333" y1="23.7499" x2="32.1162" y2="23.7499" gradientUnits="userSpaceOnUse">
                                                    <stop offset="0.462479" stop-color="#03B115"/>
                                                    <stop offset="1" stop-color="#03B115"/>
                                                    </linearGradient>
                                                    </defs>
                                                </svg>
                                            </a>
                                        </div>
                                    </div>
                                    <!--  END -->
                                <?php } }?>



                            <?php }  ?>


                            <!-- CAUSAL START -->
                            <div class="withdraw-national-field mb-4">
                                <label for="name">Causal</label><br>
                                <div class="d-flex align-items-center">
                                    <input type="text" id="depo3" value="<?= $deposit->bank_detail->causal?>" disabled class="">
                                    <a class="btn btn-copy" id="btndepo3">
                                        <svg width="38" height="38" viewBox="0 0 38 38" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M22.1667 11.0833V10.3333C22.1667 8.44763 22.1667 7.50482 21.5809 6.91904C20.9951 6.33325 20.0523 6.33325 18.1667 6.33325H10.3333C8.44771 6.33325 7.5049 6.33325 6.91911 6.91904C6.33333 7.50482 6.33333 8.44763 6.33333 10.3332V18.1666C6.33333 20.0522 6.33333 20.995 6.91911 21.5808C7.5049 22.1666 8.44771 22.1666 10.3333 22.1666H11.0833" stroke="url(#paint0_linear_107_1180)" stroke-width="2"/>
                                            <rect x="15.8333" y="15.8333" width="15.8333" height="15.8333" rx="2" stroke="url(#paint1_linear_107_1180)" stroke-width="2"/>
                                            <defs>
                                            <linearGradient id="paint0_linear_107_1180" x1="6.33333" y1="14.2499" x2="22.6162" y2="14.2499" gradientUnits="userSpaceOnUse">
                                            <stop offset="0.462479" stop-color="#03B115"/>
                                            <stop offset="1" stop-color="#03B115"/>
                                            </linearGradient>
                                            <linearGradient id="paint1_linear_107_1180" x1="15.8333" y1="23.7499" x2="32.1162" y2="23.7499" gradientUnits="userSpaceOnUse">
                                            <stop offset="0.462479" stop-color="#03B115"/>
                                            <stop offset="1" stop-color="#03B115"/>
                                            </linearGradient>
                                            </defs>
                                        </svg>
                                    </a>
                                </div>
                            </div>
                            <!-- CAUSAL END -->
                            
                            <!-- ADDRESS START -->
                            <div class="withdraw-national-field mb-4">
                                <label for="name">Company Address</label><br>
                                <div class="d-flex align-items-center">
                                    <input type="text" id="depo4" value="<?= $deposit->bank_detail->address?>" disabled class="">
                                    <a class="btn btn-copy" id="btndepo4">
                                        <svg width="38" height="38" viewBox="0 0 38 38" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M22.1667 11.0833V10.3333C22.1667 8.44763 22.1667 7.50482 21.5809 6.91904C20.9951 6.33325 20.0523 6.33325 18.1667 6.33325H10.3333C8.44771 6.33325 7.5049 6.33325 6.91911 6.91904C6.33333 7.50482 6.33333 8.44763 6.33333 10.3332V18.1666C6.33333 20.0522 6.33333 20.995 6.91911 21.5808C7.5049 22.1666 8.44771 22.1666 10.3333 22.1666H11.0833" stroke="url(#paint0_linear_107_1180)" stroke-width="2"/>
                                            <rect x="15.8333" y="15.8333" width="15.8333" height="15.8333" rx="2" stroke="url(#paint1_linear_107_1180)" stroke-width="2"/>
                                            <defs>
                                            <linearGradient id="paint0_linear_107_1180" x1="6.33333" y1="14.2499" x2="22.6162" y2="14.2499" gradientUnits="userSpaceOnUse">
                                            <stop offset="0.462479" stop-color="#03B115"/>
                                            <stop offset="1" stop-color="#03B115"/>
                                            </linearGradient>
                                            <linearGradient id="paint1_linear_107_1180" x1="15.8333" y1="23.7499" x2="32.1162" y2="23.7499" gradientUnits="userSpaceOnUse">
                                            <stop offset="0.462479" stop-color="#03B115"/>
                                            <stop offset="1" stop-color="#03B115"/>
                                            </linearGradient>
                                            </defs>
                                        </svg>
                                    </a>
                                </div>
                            </div>
                            <!-- ADDRESS END -->
                        </div>
                        <div class="mb-3 ciak-deposit-input d-grid gap-2 ">
                            <a href="<?= base_url() ?>wallet" class="btn-main-green">DONE</a>
                        </div>
                    </div>
                </form>
            </div>

        </div>
    </div>
</div>