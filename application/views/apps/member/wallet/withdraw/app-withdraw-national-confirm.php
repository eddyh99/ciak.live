<div class="row">
    <div class="col-11 col-md-7 col-lg-5 mx-auto">
        <div class="apps-body ptop pbot">
            <div class="apps-topbar alerts fixed-top light row">
                <div class="apps-member mx-auto col-12 col-lg-5" style="border-bottom: none;">
                    <div class="alert-notif d-flex justify-content-between px-4 px-lg-0">
                        <div class="action-icon">
                            <a href="<?= base_url()?>withdraw">
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
                <div class="apps-member light w-100 mt-5 pt-5">
                    <h3 class="text-head-national-confirm fw-bold">Confirm Transaction</h3>
                    <div class="topup-headwithdraw-national d-flex flex-column justify-content-center align-items-center w-auto mt-3">
                        <span class="fs-6 text-amount">
                            Amount to Withdraw
                        </span>
                        <span class="px-4 w-100 fs-3 text-center text-white fw-bold">
                            <?=number_format($balance,2)?>
                        </span>
                    </div>
                    
                    <form action="<?= base_url() ?>withdraw/withdraw_notif" method="post" id="form_submit" onsubmit="return validate()">
                        
                        <input type="hidden" id="token" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>">
                        
                        <!-- REQUIRE INPUT -->
                        <input type="hidden" name="xeuramount" value="<?= $dataWD->xeuramount ?>">
                        <input type="hidden" name="accountHolderName" value="<?= $dataWD->accountHolderName?>">
                        <input type="hidden" name="causal" value="<?= $dataWD->causal?>">
                        <input type="hidden" name="transfer_type" value="<?= $dataWD->transfer_type ?>">

                        <!-- ADDITIONAL INPUT -->
                        <input type="hidden" name="iban" value="<?= @$dataWD->iban ?>">
                        <input type="hidden" name="accountNumber" value="<?= @$dataWD->accountNumber ?>">
                        <input type="hidden" name="accountNumber" value="<?= @$dataWD->accountNumber ?>">
                        <input type="hidden" name="accountType" value="<?= @$dataWD->accountType ?>">
                        <input type="hidden" name="city" value="<?= @$dataWD->city ?>">
                        <input type="hidden" name="postCode" value="<?= @$dataWD->postCode ?>">
                        <input type="hidden" name="firstLine" value="<?= @$dataWD->firstLine ?>">
                        <input type="hidden" name="state" value="<?= @$dataWD->state ?>">
                        <input type="hidden" name="countryCode" value="<?= @$dataWD->countryCode ?>">
                        <input type="hidden" name="abartn" value="<?= @$dataWD->abartn ?>">
                        <input type="hidden" name="swiftCode" value="<?= @$dataWD->swiftCode ?>">
                        <input type="hidden" name="bsbCode" value="<?= @$dataWD->bsbCode ?>">
                        <input type="hidden" name="sortCode" value="<?= @$dataWD->sortCode ?>">
                        <input type="hidden" name="bankCode" value="<?= @$dataWD->bankCode ?>">
                        <input type="hidden" name="BIC" value="<?= @$dataWD->BIC ?>">
                        <input type="hidden" name="branchCode" value="<?= @$dataWD->branchCode ?>">
                        <input type="hidden" name="institutionNumber" value="<?= @$dataWD->institutionNumber ?>">
                        <input type="hidden" name="transitNumber" value="<?= @$dataWD->transitNumber ?>">
                        <input type="hidden" name="taxId" value="<?= @$dataWD->taxId ?>">
                        <input type="hidden" name="rut" value="<?= @$dataWD->rut ?>">
                        <input type="hidden" name="phoneNumber" value="<?= @$dataWD->phoneNumber ?>">
                        <input type="hidden" name="legalType" value="<?= @$dataWD->legalType ?>">
                        <input type="hidden" name="type" value="<?= @$dataWD->type ?>">
                        <input type="hidden" name="ifscCode" value="<?= @$dataWD->ifscCode ?>">
                        <input type="hidden" name="clabe" value="<?= @$dataWD->clabe ?>">
                        <input type="hidden" name="email" value="<?= @$dataWD->email ?>">
                        <input type="hidden" name="interacAccount" value="<?= @$dataWD->interacAccount ?>">
                        <input type="hidden" name="customerReferenceNumber" value="<?= @$dataWD->customerReferenceNumber ?>">
                        <input type="hidden" name="billerCode" value="<?= @$dataWD->billerCode ?>">


                        <div class="d-flex justify-content-between mt-4 withdraw-confirm-info ">
                            <span class="left">Recipient Name</span>
                            <span class="right"><?= $dataWD->accountHolderName?></span>
                        </div>
    
                        <?php if(
                            ($_SESSION['withdraw']['currencycode'] == 'EUR')
                        ){?>
                            <div class="d-flex justify-content-between mt-4 withdraw-confirm-info ">
                                <span class="left">IBAN</span>
                                <span class="right"><?= $dataWD->iban?></span>
                            </div>
                        <?php }?>

                        <?php if (
                                    (
                                        ($_SESSION['withdraw']['currencycode'] == "EUR") &&
                                        ($dataWD->transfer_type == "circuit")
                                    ) ||
                                    ($_SESSION['withdraw']['currencycode'] == "AED") ||
                                    ($_SESSION['withdraw']['currencycode'] == "DKK") ||
                                    ($_SESSION['withdraw']['currencycode'] == "EGP") ||
                                    (
                                        ($_SESSION['withdraw']['currencycode'] == "GBP") &&
                                        ($dataWD->transfer_type == "outside")
                                    ) ||
                                    ($_SESSION['withdraw']['currencycode'] == "GEL") ||
                                    ($_SESSION['withdraw']['currencycode'] == "HRK") ||
                                    ($_SESSION['withdraw']['currencycode'] == "ILS") ||
                                    ($_SESSION['withdraw']['currencycode'] == "NOK") ||
                                    ($_SESSION['withdraw']['currencycode'] == "PKR") ||
                                    ($_SESSION['withdraw']['currencycode'] == "PLN") ||
                                    ($_SESSION['withdraw']['currencycode'] == "RON") ||
                                    ($_SESSION['withdraw']['currencycode'] == "SEK") ||
                                    ($_SESSION['withdraw']['currencycode'] == "TRY")
                                ) { ?>
                                     <div class="d-flex justify-content-between mt-4 withdraw-confirm-info ">
                                        <span class="left">IBAN</span>
                                        <span class="right"><?= $dataWD->iban?></span>
                                    </div>
                                <?php } elseif (
                                    ($_SESSION['withdraw']['currencycode'] == "MXN")
                                ) { ?>
                                    <div class="d-flex justify-content-between mt-4 withdraw-confirm-info ">
                                        <span class="left">Clabe</span>
                                        <span class="right"><?= $dataWD->clabe?></span>
                                    </div>
                                <?php } else { ?>
                                    <div class="d-flex justify-content-between mt-4 withdraw-confirm-info ">
                                        <span class="left">Account Number</span>
                                        <span class="right"><?= $dataWD->accountNumber?></span>
                                    </div>
                                <?php } ?>
    
                        <div class="d-flex justify-content-between mt-4 withdraw-confirm-info ">
                            <span class="left">Amount to Withdraw</span>
                            <span class="right">XEUR <?= $summary->amount?></span>
                        </div>
                        <div class="d-flex justify-content-between mt-4 withdraw-confirm-info ">
                            <span class="left">Transaction Charges</span>
                            <span class="right">
                                <?php 
                                    echo $_SESSION['withdraw']['currencycode']; 
                                    echo '&nbsp';
                                    echo $summary->fee; 
                                ?>
                            </span>
                        </div>
                        <div class="d-flex justify-content-between mt-4 withdraw-confirm-info ">
                            <span class="left">You will receive</span>
                            <span class="right">    
                                <?php 
                                    echo $_SESSION['withdraw']['currencycode']; 
                                    echo '&nbsp';
                                    echo $summary->amt_trans; 
                                ?></span>
                        </div>
                        <div class="d-flex justify-content-between mt-4 withdraw-confirm-info ">
                            <span class="left">XEUR Balance</span>
                            <span class="right">
                                <?php
                                    $oldbalance = number_format($balance,2);
                                    $amountwd = $summary->amount;
                                    $totalbalance = $oldbalance - $amountwd;
                                    echo $totalbalance;
                                ?>
                            </span>
                        </div>
                        <div class="my-5 ciak-data-input d-grid gap-2 ">
                            <!-- <button class="btn-orange">Confirm</button> -->
                            <button type="submit" class="btn-main-green">CONFIRM</button>
                        </div>
                    </form>
                </div>
            </div>

        </div>
    </div>
</div>