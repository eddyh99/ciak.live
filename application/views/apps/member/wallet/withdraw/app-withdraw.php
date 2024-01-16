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
                            <a href="" class="text-white fs-5">Withdraw</a>
                        </div>
                        <div class="action">
                            <a href="" class="text-white fs-5">
                                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M13.7365 21.8481C15.0297 21.62 16.2654 21.1395 17.373 20.4339C18.4806 19.7283 19.4383 18.8115 20.1915 17.7358C20.9448 16.66 21.4787 15.4465 21.763 14.1644C22.0472 12.8823 22.0761 11.5568 21.8481 10.2635C21.62 8.97025 21.1395 7.73456 20.4339 6.627C19.7283 5.51945 18.8115 4.56171 17.7358 3.80848C16.66 3.05525 15.4465 2.52127 14.1644 2.23704C12.8823 1.95281 11.5568 1.92388 10.2635 2.15192C8.97025 2.37996 7.73456 2.86049 6.627 3.56609C5.51945 4.27168 4.56171 5.18851 3.80848 6.26424C3.05525 7.33996 2.52127 8.55352 2.23704 9.83561C1.95281 11.1177 1.92388 12.4432 2.15192 13.7365C2.37996 15.0298 2.86049 16.2654 3.56609 17.373C4.27168 18.4806 5.18851 19.4383 6.26424 20.1915C7.33996 20.9448 8.55352 21.4787 9.83561 21.763C11.1177 22.0472 12.4432 22.0761 13.7365 21.8481L13.7365 21.8481Z" stroke="#9096A2" stroke-width="1.6"/>
                                    <path d="M12 12L12 18" stroke="#9096A2" stroke-width="1.6" stroke-linecap="round"/>
                                    <path d="M12 7L12 6" stroke="#9096A2" stroke-width="1.6" stroke-linecap="round"/>
                                </svg>

                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <div>
            <?php if (@isset($_SESSION["failed"])) { ?>
                <div class="col-12 alert alert-danger alert-dismissible fade show" role="alert">
                    <span class="notif-login f-poppins"><?= $_SESSION["failed"] ?></span>
                    <button type="button" class="btn-close" data-bs-dismiss="alert"
                        aria-label="Close"></button>
                </div>
            <?php } ?>
                <div class="apps-member light w-100">
                    <p class="text-center mt-5">USDX balance</p>
                    <h2 class="text-center" style="color: #03B115;"><?=number_format($balance,2)?></h2>
                    <form action="<?= base_url()?>withdraw/withdraw_payment" method="POST" class="mt-5">
                        
                        <input type="hidden" id="token"
                            name="<?php echo $this->security->get_csrf_token_name(); ?>"
                            value="<?php echo $this->security->get_csrf_hash(); ?>">
                            
                        <div>
                            <label for="topup-receive" class="ps-3">You Receive</label>
                            <div class="topup-receive-input d-flex justify-content-between text-end mt-2">
                                <label for="topup-receive">USDX</label>
                                <input type="text" id="topup-receive" name="usdx" class="usdx-input text-end w-100" placeholder="0.000" autocomplete="off" >
                            </div>
                        </div>
                        <div class="my-5">
                            <select name="currencycode" class="form-select select-currency-withdraw">
                                <?php foreach ($currency as $dt){
                                    if(
                                        $dt->currency != 'BGN' && $dt->currency != 'BWP' &&
                                        $dt->currency != 'CRC' && $dt->currency != 'CHF' &&
                                        $dt->currency != 'RUB' && $dt->currency != 'UYU' &&
                                        $dt->currency != 'XEUR' && $dt->currency != 'XOF' &&
                                        $dt->currency != 'ZMW' && $dt->currency != 'USDX'
                                    ){
                                ?>    
                                    <option value="<?=$dt->currency?>"><?=$dt->currency?></option>
                                <?php 
                                        }
                                    }
                                ?>
                            </select>
                        </div>
                                
                        <div class="mb-3 ciak-data-input d-grid gap-2 ">
                            <button type="submit" class="btn-main-green">Withdraw</button>
                            <!-- <a href="<?= base_url() ?>withdraw/withdraw_payment" class="btn-main-green">Withdraw</a> -->
                        </div>
                    </form>
                </div>
            </div>

        </div>
    </div>
</div>